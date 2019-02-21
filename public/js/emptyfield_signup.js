function validation() {
    var useraccounttype_error = "";
    var useremail_error = "";
    var userpassword_error = "";
    var userpassword2_error = "";
    var userfirstname_error = "";
    var userlastname_error = "";
    var userschool_error = "";
    var examine = 0;

    var useraccounttype = document.getElementById("account_type");
    var useremail = document.getElementById("email_of_user");
    var userpassword = document.getElementById("password_of_user");
    var userpassword2 = document.getElementById("password_of_user2");
    var userfirstname = document.getElementById("userfirst_name");
    var userlastname = document.getElementById("userlast_name");
    var userschool = document.getElementById("school_name")

    if (useraccounttype.value == "") {
        //Password is blank then add error message to variable pw_error
        useraccounttype_error = "Please choose an account type. "
    } else {
        //else check is increase by 1
        examine++;
    }

    if (useremail.value == "" || useremail.value.indexOf("@") == -1) {

        //Email is blank then add error message to variable email_error but doesn't send it to the HTML
        useremail_error = "Please enter a valid email address. ";
    } else {

        //if Email is filled then add 1 to the check >> check = 1
        examine++;
    }


    if (userpassword.value == "") {
        //Password is blank then add error message to variable pw_error
        userpassword_error = "Please enter a valid password"
    } else {
        //else check is increase by 1
        examine++;
    }

    if (userpassword2.value == "") {
        //Password is blank then add error message to variable pw_error
        userpassword2_error = "Please reconfirm your password"
    } else {
        //else check is increase by 1
        examine++;
    }

    if (userfirstname.value == "") {
        //Password is blank then add error message to variable pw_error
        userfirstname_error = "Please enter your first name."
    } else {
        //else check is increase by 1
        examine++;
    }

    if (userlastname.value == "") {
        //Password is blank then add error message to variable pw_error
        userlastname_error = "Please enter your first name."
    } else {
        //else check is increase by 1
        examine++;
    }

    if (userschool.value == "") {
        //Password is blank then add error message to variable pw_error
        userschool_error = "Please enter your first name."
    } else {
        //else check is increase by 1
        examine++;
    }
//check the value of check.
    if (examine < 6) {
        //if check is less than 2, either 1 or 0 then send the error message to HTML
        //this work even if 1 is filled as the 1 of the variable sent to HTML is blank >> no message show.
        document.getElementById("paraerror_accounttype").innerHTML = useraccounttype_error;
        document.getElementById("paraerror_email").innerHTML = useremail_error;
        document.getElementById("paraerror_pw").innerHTML = userpassword_error;
        document.getElementById("paraerror_pw2").innerHTML = userpassword2_error;
        document.getElementById("paraerror_firstname").innerHTML = userfirstname_error;
        document.getElementById("paraerror_lastname").innerHTML = userlastname_error;
        document.getElementById("paraerror_schoolname").innerHTML = userschool_error;
        //and also return false
        return false;
    } else {
        //if check is 2 >>> both are filled >>> else statement execute >> return true
        return true;
    }
}
