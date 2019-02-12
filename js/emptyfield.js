function validate() {
    var error1 = "";
    var error2="";

    var email = document.getElementById("email_user");
    if (email.value == "") {
    error1 = "Please enter a valid email address. ";
    document.getElementById("error_para1").innerHTML = error1;
    return false;
    }

    var password = document.getElementById("password_user");
    if (password.value == "")
    {
        error2 = "Please enter your password. "
        document.getElementById("error_para2").innerHTML = error2;
    return false;
    }

else
    {
        return true;
    }

}