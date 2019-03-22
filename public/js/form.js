function show_selected_tab (index) {
    let all_tabs = document.getElementsByName("my_account_tab");

    hide_and_show(index, all_tabs);
}

function select_form(index) {
    let forms = document.getElementsByName("registerForm");

    hide_and_show(index, forms);
}

function hide_and_show(index, html_element) {
    for (let i = 0; i <= html_element.length; i++) {
        if (i === index) {
            html_element[i].className = "display_block";
        } else {
            html_element[i].className = "display_none";
        }
    }
}

function validate(type) {
    let acc_type = type;
    let verification = true;
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
            let regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            if (!regex.test(value)) {
                return message;
            }
        }
    }

    function lettersSpace (message) {
        return function(value) {
            let regex = /^[a-zA-Z\s]*$/;
            if (!regex.test(value)) {
                return message;
            }
        }
    }

    function phoneUK (message) {
        return function (value) {
            let regex = /((\+44(\s\(0\)\s|\s0\s|\s)?)|0)7\d{3}(\s)?\d{6}/g;
            if (value) {
                if (!regex.test(value)) {
                    return message;
                }
            }
        }
    }

    function emailFormat (message) {
        return function (value) {
            let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/; //This regression expression is from "https://www.w3resource.com/javascript/form/email-validation.php"
            if (value) {
                if (!regex.test(value)) {
                    return message;
                }
            }
        }
    }

    let schema = {
        firstName: [required("Name is required"), string("Name must be string"),lettersSpace("Name must contain only letters and spaces")],
        lastName: [required("Name is required"), string("Name must be string"),lettersSpace("Name must contain only letters and spaces")],
        email: [required("Email is required"), emailFormat("You must enter a valid email address")],
        password: [required("Password is required"), pwStrength("Password must have at least 6 characters and contain at least 1 number, 1 lowercase, 1 uppercase")],
        password2: [required("Confirmation is required")],
        phone: [phoneUK("You must enter a valid UK mobile phone")],
        reference: [required("You must enter your reference")]
    };

    let schema_fields = Object.keys(schema);
    let fields = [];
    for (let f = 0; f < schema_fields.length; f++) {
        fields[f] = schema_fields[f] + acc_type;
    }

    let values ={};
    let errors = {};

    for (let i = 0; i < fields.length; i++) {
        values[fields[i]] = document.getElementById(fields[i]).value;
    }

    for (let j = 0; j < fields.length; j++) {
        let validators = schema[schema_fields[j]];
        let error = null;
        for (let k = 0; k < validators.length; k++) {
            error = validators[k](values[fields[j]]);
            let error_field = fields[j] + "_error";
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

    if (values[fields[4]] !== "" && values[fields[4]] !== values[fields[3]]) {
        let error_field = fields[4] + "_error";
        document.getElementById(error_field).innerHTML = "Password confirmation need to be exactly same as Password";
        verification = false;
    }



    return verification;
}

