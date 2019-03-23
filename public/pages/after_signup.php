<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php
$checked = 0;

//Validation of user input :)
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $checked = 0;  //Set a variable to check how many input are validated
    $all_correct = true; //Check if all field are entered correctly, If 1 or more fields are wrong. set value to false.
    $acc_type = $_POST["submit"]; //Store the user chosen account type in a variable. The value is given to the button
    $error_message = "";
    //Validate email address
    if(empty($_POST["email"])) {
        $error_message .= "Email is required<br>";
        $all_correct = false;
    } else{
        $email = test_input($_POST["email"]);
        if (check_email($db, $email)) {
            $all_correct = false;
//            echo $email . " is existed, please choose another one.<br>";
            $error_message .= $email . " is existed, please choose another one.<br>";
        }
        $checked++;
    };

    //validate User input for Last Name
    if(empty($_POST["last_name"])) {
        $error_message .= "Last Name is required<br>";
        $all_correct = false;
    } elseif(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $error_message .= "Only letters and white space allowed<br>";
        $all_correct = false;
    } else {
        $lname = test_input($_POST["last_name"]);
        $checked++;
    };

    //validate User input for First Name
    if(empty($_POST["first_name"])) {
        $error_message .= "First name is required<br>";
        $all_correct = false;
    } elseif(!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $error_message .= "Only letters and white space allowed<br>";
        $all_correct = false;
    } else {
        $fname = test_input($_POST["first_name"]);
        $checked++;
    };

    //validate User input for password
    if(empty($_POST["pw"])) {
        $error_message .= "Password is required<br>";
        $all_correct = false;
    } else{
        $user_pw = test_input($_POST["pw"]);
        $checked++;
    };

    if(empty($_POST["pw2"])) {
        $error_message .= "Password confirmation is required<br>";
        $all_correct = false;
    } elseif (strcmp($_POST["pw2"], $_POST["pw"])  != 0){
        $error_message .= "Password confirmation need to be exactly the same as your Password<br>";
        $all_correct = false;
    } else{
        $pw2 = test_input($_POST["pw2"]);
        $checked++;
    };

    if(empty($_POST["reference"])) {
        $error_message .= "Your must enter your reference email<br>";
        $all_correct = false;
    }else {
        $reference = test_input($_POST["reference"]);
        switch ($acc_type) {
            case "parent":
                if (!check_email_student($db, $reference)) {
                    $all_correct = false;
                    $error_message .= $reference . " is not a valid student's email, please choose another one.<br>";
                }elseif (!check_student_avail($db,$reference)) {
                    $all_correct = false;
                    $error_message .= $reference . " is registered with another parent's account, please choose another one.<br>";
                }

                if (empty($_POST["registration_code"])) {
                    $all_correct = false;
                    $error_message .= "You must enter your children's reference code<br>";
                }else {
                    $registration_code = test_input($_POST["registration_code"]);
                    if (!check_student_ref_code($db,$reference,$registration_code)) {
                        $all_correct = false;
                        $error_message .= "The registration code you entered is incorrect.<br>";
                    }
                }
                break;

            case "student":
                break;

            case "administrator":
                if (empty($_POST["school_password"])) {
                    $all_correct = false;
                    $error_message .= "You must enter the school password.<br>";
                }else {
                    $school_password = test_input($_POST["school_password"]);
                    if (!check_school_password($db,$reference,$school_password)) {
                        $all_correct = false;
                        $error_message .= "The school password you entered is incorrect.<br>";
                    }
                }
                break;
            default:
                error_500("Unknown account type.");
        }
    }


    if (!empty($_POST["phone_UK"])) {
        $phone = test_input($_POST["phone_UK"]);
    }

    if ($all_correct) {
        //do stuff if all fields are entered correctly
        $pw = password_hash($user_pw, PASSWORD_BCRYPT);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }else {
            switch ($acc_type) {
                case "student":
                    $query = "INSERT INTO $acc_type (first_name, last_name, email_address, phone_number, password) "
                        ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
                    mysqli_query($db, $query);
                    $submitted_id = mysqli_insert_id($db);
                    $sql_admin_id = get_specific_data($db, 'admin_id', $reference, 'administrator', 'email_address');
                    $admin_id = $sql_admin_id['admin_id'];
                    $query_id_link = "INSERT INTO admin_student (student_id, admin_id) VALUES ('$submitted_id', '$admin_id')";

                    if (generate_registration_code($db, $submitted_id) && submit_query($db, $query_id_link)) {
                        $_SESSION['id_field'] = 'student_id';
                        $_SESSION['user_id'] = $submitted_id;
                    }else {
                        error_500("Submit query error!");
                    }

                    break;
                case "parent":
                    $query = "INSERT INTO $acc_type (first_name, last_name, email_address, phone_number, password) "
                        ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
                    mysqli_query($db, $query);
                    $submitted_id = mysqli_insert_id($db);

                    $sql_student_id = get_specific_data($db, 'student_id', $reference, 'student', 'email_address');
                    $student_id = $sql_student_id['student_id'];
                    $query_id_link = "INSERT INTO student_parent (student_id, parent_id) VALUES ('$student_id', '$submitted_id')";
                    if (submit_query($db, $query_id_link)) {
                        $_SESSION['id_field'] = 'parent_id';
                        $_SESSION['user_id'] = $submitted_id;
                    }else {
                        error_500("Submit query error!");
                    }
                    break;
                case "administrator":
                    $query = "INSERT INTO $acc_type (first_name, last_name, email_address, phone_number, password) "
                        ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
                    mysqli_query($db, $query);
                    $submitted_id = mysqli_insert_id($db);

                    $school_id = $reference;
                    $query_id_link = "INSERT INTO school_admin (admin_id, school_id) VALUES ('$submitted_id', '$school_id')";
                    if (submit_query($db, $query_id_link)) {
                        $_SESSION['id_field'] = 'admin_id';
                        $_SESSION['user_id'] = $submitted_id;
                    }else {
                        error_500("Submit query error!");
                    }
                    break;
                default:
                    error_500("Unknown account type.");
            }
            $_SESSION['credential'] = $email;
            $_SESSION['acc_type'] = $acc_type;
            if (isset($_SESSION['customer_basket'])) {
                redirect_to(url_for('/pages/order_summary.php'));
            }else {
                to_myAccount($acc_type);
            }
        }

    }else {
        //Redirect back to sign up and show error
        $_SESSION['POST'] = $_POST; //Store to post in session to echo back into the form so the user doesn't have to enter some fields again
        $_SESSION['error'] = $error_message; //store the error message in session to echo out after redirecting
        redirect_to(url_for('pages/signup.php')); //redirect to sign up
    }

//    if ($checked = 6) {
////        echo "You have registered successfully <br>";
////        $pw = password_hash($user_pw, PASSWORD_BCRYPT);
////
////
////        echo $email . " is your email<br>" .
////            $fname . " is your first name<br>" .$lname . " is your last name<br>" .
////            $user_pw . " is your password<br>" . $pw2 . " is your password confirmation<br>" .
////            $school . " is your school<br>" .  $phone . " is your phone number<br>" .
////            $acc_type . " is your account type<br>" . $pw . " is the encrypted password<br>";
////
////        if (mysqli_connect_errno())
////        {
////            echo "Failed to connect to MySQL: " . mysqli_connect_error();
////        } elseif ($acc_type == 'parent') {
////            echo "Dinnersdirect data base is successfully connected";
////            $query = "INSERT INTO $acc_type (first_name, last_name, email_address, phone_number, password) "
////                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
////            submit_query($db, $query);
////            $data_parent = get_data($db,$email,'parent','email_address');
////            $data_student = get_data($db,$reference,'student','email_address');
////
////            if ($data_parent == 'Not Found' || $data_student == 'Not Found') {
////                echo "<br>Error occurs, Data not found!! <strong>You need to import schema.sql and data.sql to your database!!!</strong><br>";
////                exit;
////            }
////            $id_s = $data_student['student_id'];
////            $id_p = $data_parent['parent_id'];
////            $query_id_link = "INSERT INTO student_parent (student_id, parent_id) VALUES ('$id_s', '$id_p')";
////            submit_query($db, $query_id_link);
////            $_SESSION['id_field'] = 'parent_id';
////            $_SESSION['user_id'] = $id_p;
////        }elseif ($acc_type == 'student') {
////            echo "Dinnersdirect data base is successfully connected";
////            $query = "INSERT INTO $acc_type (first_name, last_name, email_address, phone_number, password) "
////                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
////            submit_query($db, $query);
////            $data_admin = get_data($db,$reference,'administrator','email_address');
////            $data_student = get_data($db,$email,'student','email_address');
////
////            if ($data_admin == 'Not Found' || $data_student == 'Not Found') {
////                echo "<br>Error occurs, Data not found!! <strong>You need to import schema.sql and data.sql to your database!!!</strong><br>";
////                exit;
////            }
////            $id_s = $data_student['student_id'];
////            $id_a = $data_admin['admin_id'];
////            $query_id_link = "INSERT INTO admin_student (student_id, admin_id) VALUES ('$id_s', '$id_a')";
////            submit_query($db, $query_id_link);
////            $_SESSION['id_field'] = 'student_id';
////            $_SESSION['user_id'] = $id_s;
////
////        }elseif ($acc_type == 'administrator') {
////            echo "Dinnersdirect data base is successfully connected";
////            $query = "INSERT INTO $acc_type (first_name, last_name, email_address, phone_number, password) "
////                ."VALUES ('$fname', '$lname', '$email', '$phone', '$pw')";
////            submit_query($db, $query);
////            $data_school = get_data($db,$reference,'school','school_name');
////
////            if ($data_school == 'Not Found') {
////                echo "<br>Error occurs, Data not found!! <strong>You need to import schema.sql and data.sql to your database!!!</strong><br>";
////                exit;
////            }
////            $id_s = $data_school['school_id'];
////            $id_a = $data_admin['admin_id'];
////            $query_id_link = "INSERT INTO school_admin (admin_id, school_id) VALUES ('$id_a', '$id_s')";
////            submit_query($db, $query_id_link);
////            $_SESSION['id_field'] = 'admin_id';
////            $_SESSION['user_id'] = $id_a;
////        }else {
////            echo "unknown";
////
////        }
////        $_SESSION['credential'] = $email;
////        $_SESSION['acc_type'] = $acc_type;
////        if (isset($_SESSION['customer_basket'])) {
////            redirect_to(url_for('/pages/order_summary.php'));
////        }else {
////            to_myAccount($acc_type);
////        }
////
////
////    }
};

?>

