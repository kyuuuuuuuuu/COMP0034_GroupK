<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('staff_header.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_item_name = NULL;
    $new_item_price = NULL;
    $new_item_desc = NULL;
    $new_item_image = NULL;
    $message = "";

    $boolean = true;

    if (!isset($_POST['item_name'])) {
        $boolean = false;
        $message .= "You need to input the item name. <br>";
    }else {
        $new_item_name = $_POST['item_name'];
    }
    if (!isset($_POST['item_price'])) {
        $boolean = false;
        $message .= "You need to input the item price. <br>";
    }else {
        $new_item_price = $_POST['item_price'];
    }
    if (!isset($_POST['item_description'])) {
        $boolean = false;
        $message .= "You need to input the item description. <br>";
    }else {
        $new_item_desc = $_POST['item_description'];
    }

    if(isset($_FILES["item_image"]["name"]) ) {
        echo "upload image <br>";
        echo basename($_FILES["item_image"]["name"]);
        echo "<br>";
        $uploadOk = true;
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/public/img/menu_image/";
        $saved_src = "../img/menu_image/" . basename($_FILES["item_image"]["name"]);
        echo $target_dir;
        $target_file = $target_dir . basename($_FILES["item_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $message .=  "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
            $uploadOk = false;
        }
        if (file_exists($target_file)) {
            $message .=  "Sorry, file already exists.<br>";
            $uploadOk = false;
        }
        if ($_FILES["item_image"]["size"] > 500000) {
            $message .=  "Sorry, your file is too large.<br>";
            $uploadOk = false;
        }

        if (!$uploadOk) {
            echo "Sorry, your file was not uploaded.";
            $boolean = false;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["item_image"]["name"]). " has been uploaded.";
                echo $target_file;
                $new_item_image = $saved_src;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }

    if($boolean) {
        $query = "INSERT INTO item (item_image, item_name, item_price, item_description) " .
            "VALUES ('$new_item_image', '$new_item_name', '$new_item_price', '$new_item_desc')";
        submit_query($db,$query);
        redirect_to(url_for('/staff/items.php'));
    }else {
        $message .= "New item is not added";
    }
}

?>
<div class="container">
    <header><strong>New Item</strong></header>
    <div class="text-danger">
        <p><?php echo $message ?? '';?></p>
    </div>
    <form id="edit_item_form" method="post" action="" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <label>Item name: </label>
                <input name="item_name" type="text" class="form">
            </div>
            <div class="col-md-6"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <label>Item price: </label>
                <input name="item_price" type="number" step="0.01" class="form"">
            </div>
            <div class="col-md-6"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <label>Item Description: </label>
                <textarea rows="5" cols="60" name="item_description" form="edit_item_form"></textarea>
            </div>
            <div class="col-md-6"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <label>Item image: </label>
                <input name="item_image" type="file">
            </div>
            <div class="col-md-6"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-block" name="submit" type="submit">Add this item</button>
            </div>
            <div class="col-md-6"></div>
        </div>
    </form>

</div>
<?php require_once('staff_footer.php');?>
