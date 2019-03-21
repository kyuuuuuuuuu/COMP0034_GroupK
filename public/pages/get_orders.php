<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    error_404();
}else {
    if (!empty($_POST['date_selected'])) {
        $date_selected = $_POST['date_selected'];
//        echo $date_selected;
//        echo gettype($date_selected);

        $admin_id = $_POST['admin_id'];

        $orders_to_return = [];

        $list_of_students = get_admin($db, $admin_id, 'admin_id');

        for ($i = 0; $i < count($list_of_students); $i++) {
            $list_of_orders = get_order_details($db, $list_of_students[$i]['student_id'],'student_id','student_order', $date_selected);
//            print_r($list_of_orders);
            $student_name = get_person_name($db, $list_of_students[$i]['student_id'], 'student', 'student_id');
            for ($j = 0; $j < count($list_of_orders); $j++) {
                $item_array = get_order_item ($db, $list_of_orders[$j]['order_id']);
                $item_list = "";
                for ($k = 0; $k < count($item_array); $k++) {
                    $item_list .= $item_array[$k]['quantity'] . " x " . $item_array[$k]['item_name'];
                    if ($k == count($item_array) - 1) {
                        $item_list .= ".";
                    }else {
                        $item_list .= ", ";
                    }
                }

                $one_order = array("order_id" => $list_of_orders[$j]['order_id'],
                                   "student_id" => $list_of_orders[$j]['student_id'],
                                   "student_name" => $student_name,
                                   "item_list" => $item_list,
                                   "total_price" => $list_of_orders[$j]['total_price']);
                array_push($orders_to_return, $one_order);

            }
        }

        echo json_encode($orders_to_return);
    }
}

?>