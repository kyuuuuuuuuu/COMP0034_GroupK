function validate() {
    var error1 = "";

    var email = document.getElementById("email_user");
    if (email.value == "" || email.value.indexOf("@") == -1) {
    error1 = "Please enter a valid email address. ";
    document.getElementById("error_para").innerHTML = error1;
    return false;
    } else {
    return true;
}
}