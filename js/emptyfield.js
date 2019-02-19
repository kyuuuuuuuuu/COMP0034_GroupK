function validate() {
    var email_error = "";
    var pw_error = "";
    var check = 0;

    var email = document.getElementById("email_user");
    var pw = document.getElementById("password_user");


    if (email.value == "" || email.value.indexOf("@") == -1) {

        //Email is blank then add error message to variable email_error but doesn't send it to the HTML
        email_error = "Please enter a valid email address. ";
    } else {

        //if Email is filled then add 1 to the check >> check = 1
        check++;
    }


    if (pw.value == "") {
        //Password is blank then add error message to variable pw_error
        pw_error = "Please enter a valid password"
    } else {
        //else check is increase by 1
        check++;
    }

//check the value of check.
    if (check < 2) {
        //if check is less than 2, either 1 or 0 then send the error message to HTML
        //this work even if 1 is filled as the 1 of the variable sent to HTML is blank >> no message show.
        document.getElementById("error_para_email").innerHTML = email_error;
        document.getElementById("error_para_pw").innerHTML = pw_error;
        //and also return false
        return false;
    } else {
        //if check is 2 >>> both are filled >>> else statement execute >> return true
        return true;
    }
}
