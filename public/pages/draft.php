<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('check_log_in_status.php');
require_once('../../private/shared/pages_header.php');?>


<div>
    <?php $list_menus = get_list_of_menus($db);
    for ($i = 0; $i < count($list_menus); $i++) {;?>
    <button onclick="generate_menu(<?php echo $list_menus[$i]['menu_id'];?>)">Choose <?php echo $list_menus[$i]['menu_name'];?></button>
    <?php }?>
</div>
<div id="menu_set_la">

</div>



<script>
    function generate_menu(menu_id) {
        let ajax = new XMLHttpRequest();
        ajax.open("POST", "menu_for_order.php", true);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        let data_to_post = "";
        // let and = "&";
        data_to_post += "menu_id=" + menu_id;

        ajax.send(data_to_post);

        ajax.onreadystatechange = function() {
            if (ajax.readyState === 4 && ajax.status === 200) {
                document.getElementById('menu_set_la').innerHTML = ajax.responseText;
            }
        }
    }
</script>

<?php require_once('../../private/shared/pages_footer.php');?>
