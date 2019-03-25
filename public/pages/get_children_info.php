<?php
$result = get_parent ($db, $user_email, 'email_address');

if (count($result) === 1) {
    $number_of_children = 1;
}elseif (count($result) > 1) {
    $number_of_children = count($result);
}else { //this will only run if the user credential get changed by unknown and unexpected 3rd party.
    error_500("Can find parent data");
}
$admin_p = [];
$school_p = [];
$children_p = [];
for ($i = 0; $i < count($result); $i++) {
    $admin_p[$i] = get_data($db, $result[$i]['admin_id'], 'administrator', 'admin_id');
    $school_p[$i] = get_data($db, $result[$i]['school_id'], 'school', 'school_id');
    $children_p[$i] = get_data($db, $result[$i]['student_id'], 'student', 'student_id');
}