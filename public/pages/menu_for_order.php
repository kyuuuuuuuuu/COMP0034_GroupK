<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php");
    setcookie("chosen_menu", $_POST['menu_id']);
} ?>

<div id="step2">
    <h2> STEP 2: Choose items</h2>
    <h4 class="redcolour">Click items for more information and to choose quantity</h4><br>
</div>
<div class="row">
    <div id="choose_a_menu">
        <?php $list_menus = get_list_of_menus($db);
        for ($i = 0; $i < count($list_menus); $i++) {;?>
            <div class="col-md-3">
                <button class="choose-menu list-group-item" onclick="generate_menu(<?php echo $list_menus[$i]['menu_id'];?>)">Choose <?php echo $list_menus[$i]['menu_name'];?></button>

            </div>
        <?php }?>
    </div>
    <?php
    $default_menu = $_COOKIE["chosen_menu"] ?? 1;
    $menu_id = $_POST['menu_id'] ?? $default_menu;
    $menu = get_menu($db, $menu_id);
    for ($i = 0; $i < count($menu); $i++) { if ($i == 0) {echo '<div class="col-md-3">
                    <h3>MAIN</h3>';}elseif ($i == 3) {echo '<div class="col-md-3">
                    <h3>DESSERTS</h3>';} elseif ($i == 6) {echo '<div class="col-md-3">
                    <h3>DRINK</h3>';}?>
        <div>
            <img name="item_image" src="<?php echo $menu[$i]['item_image'];?>" alt="<?php echo $menu[$i]['item_name'];?>"
                 class="orderOutline<?php if ($i < 3) {echo "1";}elseif ($i<6) {echo "2";}else {echo "3";}?>"
                 data-toggle="modal" data-target="#Modal<?php echo $i;?>"/>
            <?php
            $title= $menu[$i]['item_name'];
            $price= $menu[$i]['item_price'];
            $des= $menu[$i]['item_description'];
            $modal_id = $i;
            include("modal_menu.php"); ?>
        </div>
        <?php if($i == 2 || $i == 5 || $i == 8) {echo '</div>';}else {echo '<br>';} }?>
</div>

<?php ?>