<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['menu_id'])) {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php");
    //require initialise.php again only if the request is POST. this prevent the file got fatal error by require the initialise.php twice
    setcookie("chosen_menu", $_POST['menu_id']); // set cookie as the first time selected
}
$list_menus = get_list_of_menus($db); //load all available menus

if (isset($_COOKIE["chosen_menu"])) { //check if the cookie menu is loaded or not.
    for ($j = 0; $j < count($list_menus); $j++) {
        if ($_COOKIE["chosen_menu"] == $list_menus[$j]["menu_id"]) {
            $cookie_menu_id = $_COOKIE["chosen_menu"];
            break;
        }
    }
}
$default_menu = $cookie_menu_id ?? $list_menus[0]["menu_id"]; //if the cookie menu id is available, set it as default, if not set the first available menu id
$menu_id = $_POST['menu_id'] ?? $default_menu; //set the menu id to be used to display menu
$item_in_menu = get_menu($db, $menu_id); //get all item in with this menu id
$menu_info = get_data($db, $menu_id, 'list_of_menus', 'menu_id'); //get information about this menu id, description, name etc.
?>
    <h4 class="text-center"><strong><?= $menu_info["menu_name"]?></strong></h4>
<div class="row">


    <?php
    //The conditional loop from line 28 > 29 is because there will be 9 menu items, item [0,1,2] will be Main, [3,4,5] will be Dessert, and [6,7,8] will be Drink
    for ($i = 0; $i < count($item_in_menu); $i++) { if ($i == 0) {echo '<div class="col-md-4 text-center">
                    <br><h3>MAIN</h3>';}elseif ($i == 3) {echo '<div class="col-md-4 text-center">
                    <br><h3>DESSERTS</h3>';} elseif ($i == 6) {echo '<div class="col-md-4 text-center">
                    <br><h3>DRINK</h3>';}?>
        <div>
            <img name="item_image" src="<?php echo $item_in_menu[$i]['item_image'];?>" alt="<?php echo $item_in_menu[$i]['item_name'];?>"
                 class="orderOutline<?php if ($i < 3) {echo "1";}elseif ($i<6) {echo "2";}else {echo "3";}?>"
                 data-toggle="modal" data-target="#Modal<?php echo $i;?>"/>
            <?php //save modal data in a separate file to be easier to design and get form.
            //variables for the modal
            $title= $item_in_menu[$i]['item_name'];
            $price= $item_in_menu[$i]['item_price'];
            $des= $item_in_menu[$i]['item_description'];
            $modal_id = $i;?>
            <br>
            <div class="item_caption">
                <a data-toggle="modal" data-target="#Modal1"><?php echo $title;?></a>
            </div>

            <?php include("modal_menu.php"); ?>
        </div>
        <?php if($i == 2 || $i == 5 || $i == 8) {echo '</div>';}else {echo '<br>';} }?>
</div>

<?php ?>