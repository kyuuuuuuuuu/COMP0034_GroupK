function validation() {
    var verification = true;
    function string(message) {
        return function(value) {
            if (typeof value !== "string") {
                return message;
            }
        };
    }

    function required(message) {
        return function(value) {
            if (!value) {
                return message;
            }
        };
    }

    function pwStrength(message) {
        return function(value) {
            var regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            if (!regex.test(value)) {
                return message;
            }
        }
    }

    function lettersSpace (message) {
        return function(value) {
            var regex = /^[a-zA-Z\s]*$/;
            if (!regex.test(value)) {
                return message;
            }
        }
    }

    function phoneUK (message) {
        return function (value) {
            var regex = /((\+44(\s\(0\)\s|\s0\s|\s)?)|0)7\d{3}(\s)?\d{6}/g;
            if (value) {
                if (!regex.test(value)) {
                    return message;
                }
            }
        }
    }

    var schema = {
        userfirst_name: [required("Name is required"), string("Name must be string"),lettersSpace("Name must contain only letters and spaces")],
        userlast_name: [required("Name is required"), string("Name must be string"),lettersSpace("Name must contain only letters and spaces")],
        email_of_user: [required("Email is required")],
        password_of_user: [required("Password is required"), pwStrength("Password must have at least 6 characters and contain at least 1 number, 1 lowercase, 1 uppercase")],
        password_of_user2: [required("Confirmation is required")],
        phone_UK: [phoneUK("You must enter a valid UK mobile phone")]
    };
    var errors = {};
    var fields = Object.keys(schema);
    var values ={};

    for (var i = 0; i < fields.length; i++) {
        values[fields[i]] = document.getElementById(fields[i]).value;
    }

    for (var j = 0; j < fields.length; j++) {
        var validators = schema[fields[j]];
        var error = null;
        for (var k = 0; k < validators.length; k++) {
            error = validators[k](values[fields[j]]);
            var error_field = fields[j] + "_error";
            if (error) {
                document.getElementById(error_field).innerHTML = error;
                errors[fields[j]] = error;
                verification = false;
                break;
            } else {
                document.getElementById(error_field).innerHTML = "";
            }
        }
    }
    console.log(values['password_of_user2']);
    console.log(values['password_of_user']);
    if (values['password_of_user2'] !== "" && values['password_of_user2'] !== values['password_of_user']) {
        document.getElementById('password_of_user2_error').innerHTML = "Password confirmation need to be exactly same as Password";
        verification = false;
    }

    return verification;
}
