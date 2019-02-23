<?php session_start();
require_once('../../private/shared/pages_header.php');?>

<div class="card-header text-center">
    <h1>Welcome to My Account</h1>
</div>


<?php
$checked = 0;

//Validation of user input :)
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $checked = 0;  //Set a variable to check how many input are validated
    $accType = $_POST["submit"]; //Store the user chosen account type in a variable

    //Validate email address
    if(empty($_POST["email"])) {
        $email_empty = "Email is required";
    } else{
        $email = test_input($_POST["email"]);
        if (check_email($db, $email)) {
            echo $email . " is existed, please choose another one.<br>";
            $_SESSION['error'] = "<br>" . $email . " is existed, please choose another one.<br>";
            redirect_to(url_for('pages/signup.php'));
        }
        $checked++;
    };

    //validate User input for Last Name
    if(empty($_POST["last_name"])) {
        $lname_empty = "Last Name is required";
    } elseif(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $lname_empty = "Only letters and white space allowed";
    } else {
        $lname = test_input($_POST["last_name"]);
        $checked++;
    };

    //validate User input for First Name
    if(empty($_POST["first_name"])) {
        $fname_empty = "First name is required";
    } elseif(!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $fname_empty = "Only letters and white space allowed";
    } else {
        $fname = test_input($_POST["first_name"]);
        $checked++;
    };

    //validate User input for password
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

    if(empty($_POST["reference"])) {
        $reference_empty = "<br>Enter your reference";
    } elseif ($accType == 'student') {
        $reference = test_input($_POST["reference"]);
        if (!check_email_admin($db, $reference)) {
            //echo $email . " is not a valid admin's email, please choose another one.<br>";
            $_SESSION['error'] = "<br>" . $email . " is not a valid admin's email, please choose another one.<br>";
            redirect_to(url_for('pages/signup.php'));
        }
    }elseif ($accType == 'parent') {
        $reference = test_input($_POST["reference"]);
        if (!check_email_student($db, $reference)) {
            //echo $email . " is not a valid admin's email, please choose another one.<br>";
            $_SESSION['error'] = "<br>" . $reference . " is not a valid student's email, please choose another one.<br>";
            redirect_to(url_for('pages/signup.php'));
        }
    }else{
        $reference = test_input($_POST["reference"]);
        $checked++;
    };

    if (!empty($_POST["phone_UK"])) {
        $phone = test_input($_POST["phone_UK"]);
    }

    if ($checked = 6) {
        echo "You have registered successfully <br>";


        echo $email . " is your email<br>" .
            $fname . " is your first name<br>" .$lname . " is your last name<br>" .
            $pw . " is your password<br>" . $pw2 . " is your password confirmation<br>" .
            $school . " is your school<br>" .  $phone . " is your phone number<br>" .
            $accType . " is your account type<br>";

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } elseif ($accType == 'parent') {
            echo "Dinnersdirect data base is successfully connected";
            $query = "INSERT INTO $accType (first_name, last_name, email_address, phone_number, password) "
                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
            submit_query($db, $query);
            $data_parent = get_data($db,$email,'parent','email_address');
            $data_student = get_data($db,$reference,'student','email_address');

            if ($data_parent == 'Not Found' || $data_student == 'Not Found') {
                echo "<br>Error occurs, Data not found!! <br>";
                exit;
            }
            $id_s = $data_student['student_id'];
            $id_p = $data_parent['parent_id'];
            $query_id_link = "INSERT INTO student_parent (student_id, parent_id) VALUES ('$id_s', '$id_p')";
            //echo $query_id_link;
            submit_query($db, $query_id_link);
        }elseif ($accType == 'student') {
            echo "Dinnersdirect data base is successfully connected";
            $query = "INSERT INTO $accType (first_name, last_name, email_address, phone_number, password) "
                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
            submit_query($db, $query);
            $data_admin = get_data($db,$reference,'administrator','email_address');
            $data_student = get_data($db,$email,'student','email_address');

            if ($data_admin == 'Not Found' || $data_student == 'Not Found') {
                echo "<br>Error occurs, Data not found!! <br>";
                exit;
            }
            $id_s = $data_student['student_id'];
            $id_a = $data_admin['admin_id'];
            $query_id_link = "INSERT INTO admin_student (student_id, admin_id) VALUES ('$id_s', '$id_a')";
            //echo $query_id_link;
            submit_query($db, $query_id_link);

        }elseif ($accType == 'administrator') {
            echo "Dinnersdirect data base is successfully connected";
            $query = "INSERT INTO $accType (first_name, last_name, email_address, phone_number, password) "
                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
            submit_query($db, $query);
            $data_admin = get_data($db,$email,'administrator','email_address');
            $data_school = get_data($db,$reference,'school','school_name');

            if ($data_admin == 'Not Found' || $data_school == 'Not Found') {
                echo "<br>Error occurs, Data not found!! <br>";
                exit;
            }
            $id_s = $data_school['school_id'];
            $id_a = $data_admin['admin_id'];
            $query_id_link = "INSERT INTO school_admin (admin_id, school_id) VALUES ('$id_a', '$id_s')";
            //echo $query_id_link;
            submit_query($db, $query_id_link);
        }else {
            echo "unknown";

        }


    }
};

?>

<?php require_once('../../private/shared/pages_footer.php');?>
