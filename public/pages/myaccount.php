<?php require_once('../../private/shared/pages_header.php');?>

<?php require('../../private/functions.php') ?>

<div class="card-header text-center">
    <h1>Welcome to My Account</h1>
</div>


<?php
$checked = 0;
//Validation of user input :)
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $checked = 0;
    if(empty($_POST["email"])) {
        $email_empty = "Email is required";
    } else{
        $email = test_input($_POST["email"]);
        $checked++;
    };

    if(empty($_POST["last_name"])) {
        $lname_empty = "Last Name is required";
    } elseif(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $lname_empty = "Only letters and white space allowed";
    } else {
        $lname = test_input($_POST["last_name"]);
        $checked++;
    };

    if(empty($_POST["first_name"])) {
        $fname_empty = "First name is required";
    } elseif(!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $fname_empty = "Only letters and white space allowed";
    } else {
        $fname = test_input($_POST["first_name"]);
        $checked++;
    };

    if(empty($_POST["pw"])) {
        $pw_empty = "Password is required";
    } else{
        $pw = test_input($_POST["pw"]);
        $checked++;
    };

    if(empty($_POST["pw2"])) {
        $pw2_empty = "Password confirmation is required";
        //echo "empy confirm";
    } elseif (strcmp($_POST["pw2"], $_POST["pw"])  != 0){
        $pw2_empty = "Password confirmation need to be exactly the same as your Password";
        //echo "doesnt match";
    } else{
        $pw2 = test_input($_POST["pw2"]);
        //echo "save PW confirm";
        $checked++;
    };

    if(empty($_POST["school"])) {
        $school_empty = "School is required";
    } else{
        $school = test_input($_POST["school"]);
        $checked++;
    };

    if(empty($_POST["reference"])) {
        $reference_empty = "<br>Enter your reference";
    } else{
        $reference = test_input($_POST["reference"]);
        $checked++;
    };

    if (!empty($_POST["phone_UK"])) {
        $phone = test_input($_POST["phone_UK"]);
    }

    if ($checked = 7) {
        echo "You have registered successfully <br>";
        $accType = $_POST["submit"];
        echo $email . " is your email<br>" .
            $fname . " is your first name<br>" .$lname . " is your last name<br>" .
            $pw . " is your password<br>" . $pw2 . " is your password confirmation<br>" .
            $school . " is your school<br>" .  $phone . " is your phone number<br>" .
            $accType . " is your account type<br>";
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {
            echo "Dinnersdirect data base is successfully connected";
            $query = "INSERT INTO $accType (first_name, last_name, email_address, phone_number, password) "
                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
        }
        if (mysqli_query($db, $query)) {
            echo "<br>Data is saved succesfully";
        } else {
            echo"<br>Error occurs in saving process!";
        }
    }
};

?>

<?php require_once('../../private/shared/pages_footer.php');?>
