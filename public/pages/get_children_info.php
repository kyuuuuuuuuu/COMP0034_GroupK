<?php
$result = get_parent ($db, $user_email, 'email_address');

if (count($result) === 1) {
//    echo "count is 1<br>";
    $number_of_children = 1;
}elseif (count($result) > 1) {
//    echo "more than 1<br>" . count($result) . "<br>";
    $number_of_children = count($result);
}else {
    echo "empty result";
}
$admin_p = [];
$school_p = [];
$children_p = [];
for ($i = 0; $i < count($result); $i++) {
    $admin_p[$i] = get_data($db, $result[$i]['admin_id'], 'administrator', 'admin_id');
    $school_p[$i] = get_data($db, $result[$i]['school_id'], 'school', 'school_id');
    $children_p[$i] = get_data($db, $result[$i]['student_id'], 'student', 'student_id');
}