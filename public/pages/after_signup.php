<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<?php
$checked = 0;

//Validation of user input :)
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $checked = 0;  //Set a variable to check how many input are validated
    $acc_type = $_POST["submit"]; //Store the user chosen account type in a variable

    //Validate email address
    if(empty($_POST["email"])) {
        $email_empty = "Email is required";
    } else{
        $email = test_input($_POST["email"]);
        if (check_email($db, $email)) {
            echo $email . " is existed, please choose another one.<br>";
            $_SESSION['error'] = "<br>" . $email . " is existed, please choose another one.<br>";
            $_SESSION['POST'] = $_POST;
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
        $user_pw = test_input($_POST["pw"]);
        $checked++;
    };

    if(empty($_POST["pw2"])) {
        $pw2_empty = "Password confirmation is required";
    } elseif (strcmp($_POST["pw2"], $_POST["pw"])  != 0){
        $pw2_empty = "Password confirmation need to be exactly the same as your Password";
    } else{
        $pw2 = test_input($_POST["pw2"]);
        $checked++;
    };

    if(empty($_POST["reference"])) {
        $reference_empty = "<br>Enter your reference";
    } elseif ($acc_type == 'student') {
        $reference = test_input($_POST["reference"]);
        if (!check_email_admin($db, $reference)) {
            $_SESSION['POST'] = $_POST;
            $_SESSION['error'] = "<br>" . $reference . " is not a valid admin's email, please choose another one.<br>";
            redirect_to(url_for('pages/signup.php'));
        }
    }elseif ($acc_type == 'parent') {
        $reference = test_input($_POST["reference"]);
        if (!check_email_student($db, $reference)) {
            $_SESSION['POST'] = $_POST;
            $_SESSION['error'] = "<br>" . $reference . " is not a valid student's email, please choose another one.<br>";
            echo check_student_avail($db,$reference);
            //exit;check_student_avail($db,$reference)
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
        $pw = password_hash($user_pw, PASSWORD_BCRYPT);


        echo $email . " is your email<br>" .
            $fname . " is your first name<br>" .$lname . " is your last name<br>" .
            $user_pw . " is your password<br>" . $pw2 . " is your password confirmation<br>" .
            $school . " is your school<br>" .  $phone . " is your phone number<br>" .
            $acc_type . " is your account type<br>" . $pw . " is the encrypted password<br>";

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } elseif ($acc_type == 'parent') {
            echo "Dinnersdirect data base is successfully connected";
            $query = "INSERT INTO $acc_type (first_name, last_name, email_address, phone_number, password) "
                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
            submit_query($db, $query);
            $data_parent = get_data($db,$email,'parent','email_address');
            $data_student = get_data($db,$reference,'student','email_address');

            if ($data_parent == 'Not Found' || $data_student == 'Not Found') {
                echo "<br>Error occurs, Data not found!! <strong>You need to import schema.sql and data.sql to your database!!!</strong><br>";
                exit;
            }
            $id_s = $data_student['student_id'];
            $id_p = $data_parent['parent_id'];
            $query_id_link = "INSERT INTO student_parent (student_id, parent_id) VALUES ('$id_s', '$id_p')";
            submit_query($db, $query_id_link);
            $_SESSION['id_field'] = 'parent_id';
            $_SESSION['user_id'] = $id_p;
        }elseif ($acc_type == 'student') {
            echo "Dinnersdirect data base is successfully connected";
            $query = "INSERT INTO $acc_type (first_name, last_name, email_address, phone_number, password) "
                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
            submit_query($db, $query);
            $data_admin = get_data($db,$reference,'administrator','email_address');
            $data_student = get_data($db,$email,'student','email_address');

            if ($data_admin == 'Not Found' || $data_student == 'Not Found') {
                echo "<br>Error occurs, Data not found!! <strong>You need to import schema.sql and data.sql to your database!!!</strong><br>";
                exit;
            }
            $id_s = $data_student['student_id'];
            $id_a = $data_admin['admin_id'];
            $query_id_link = "INSERT INTO admin_student (student_id, admin_id) VALUES ('$id_s', '$id_a')";
            submit_query($db, $query_id_link);
            $_SESSION['id_field'] = 'student_id';
            $_SESSION['user_id'] = $id_s;

        }elseif ($acc_type == 'administrator') {
            echo "Dinnersdirect data base is successfully connected";
            $query = "INSERT INTO $acc_type (first_name, last_name, email_address, phone_number, password) "
                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
            submit_query($db, $query);
            $data_school = get_data($db,$reference,'school','school_name');

            if ($data_school == 'Not Found') {
                echo "<br>Error occurs, Data not found!! <strong>You need to import schema.sql and data.sql to your database!!!</strong><br>";
                exit;
            }
            $id_s = $data_school['school_id'];
            $id_a = $data_admin['admin_id'];
            $query_id_link = "INSERT INTO school_admin (admin_id, school_id) VALUES ('$id_a', '$id_s')";
            submit_query($db, $query_id_link);
            $_SESSION['id_field'] = 'admin_id';
            $_SESSION['user_id'] = $id_a;
        }else {
            echo "unknown";

        }
        $_SESSION['credential'] = $email;
        $_SESSION['acc_type'] = $acc_type;
        if (isset($_SESSION['customer_basket'])) {
            redirect_to(url_for('/pages/order_summary.php'));
        }else {
            to_myAccount($acc_type);
        }


    }
};

?>


<?php require_once('../../private/shared/pages_footer.php');?>
