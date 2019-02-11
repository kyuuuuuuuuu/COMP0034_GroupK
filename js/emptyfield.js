function validate()
{
    var error = "";

    var email = document.getElementById("email_user");
    if (email.value == "") || email.value.indexOf("@") == -1)
    {
    error= "Please enter a valid email address. ";
    document.getElementById("error_para").innerHTML = error;
    return false;
    }

    else
{
    return true;
}
}