function show_selected_tab (index) {
    let all_tabs = document.getElementsByName("my_account_tab");

    hide_and_show(index, all_tabs);
}

function select_form(index) {
    let forms = document.getElementsByName("registerForm");

    hide_and_show(index, forms);
}

function show_log_in(index) {
    let log_in = document.getElementsByName("log_in");

    hide_and_show(index,log_in);
}

function hide_and_show(index, html_element) {
    for (let i = 0; i < html_element.length; i++) {
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

    function referenceCodeLength (message) {
        return function (value) {
            let regex = /[a-zA-Z0-9]{15}/;
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
        oldPassword: [required("Password is required"), pwStrength("Password must have at least 6 characters and contain at least 1 number, 1 lowercase, 1 uppercase")],
        phone: [phoneUK("You must enter a valid UK mobile phone")],
        reference: [required("You must enter your reference")],
        schoolPassword: [required("You must enter the school password")],
        code: [required("You must enter your children's reference code."), referenceCodeLength("The reference code only contains letters and numbers (exactly 15 characters long).")]
    };

    let schema_fields = Object.keys(schema); //Get all the key of the object 'schema' and store in an array
    let fields = [];
    let exist_schema_field = [];

    for (let f = 0; f < schema_fields.length; f++) { //Go through all of schema key
        let field_id = schema_fields[f] + acc_type;
        let DOM = document.getElementById(field_id);
        if (DOM) {  //Check if there is and element with that ID exists.
            console.log("exists " + field_id);
            fields.push(field_id);
            exist_schema_field.push(schema_fields[f])
        }
    }

    let values ={};
    let errors = {};

    for (let i = 0; i < fields.length; i++) {
        values[fields[i]] = document.getElementById(fields[i]).value;
    }

    for (let j = 0; j < fields.length; j++) {
        let validators = schema[exist_schema_field[j]];
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

    let two_password_fields = ["password" + acc_type, "password2" + acc_type];

    if (containsAll(two_password_fields,fields)) {
        if (values["password" + acc_type] !== "" && values["password2" + acc_type] !== "" && values["password2" + acc_type] !== values["password" + acc_type]) {
            let error_field = "password2" + acc_type + "_error";
            document.getElementById(error_field).innerHTML = "Password confirmation need to be exactly same as Password";
            verification = false;
        }
    }

    return verification;
}


//Get from stack overflow to check if the haystack array include all values of needles array.
// scr="https://stackoverflow.com/questions/9204283/how-to-check-whether-multiple-values-exist-within-an-javascript-array#comment46388832_9204298"
function containsAll(needles, haystack){
    for(var i = 0 , len = needles.length; i < len; i++){
        if($.inArray(needles[i], haystack) == -1) return false;
    }
    return true;
}
