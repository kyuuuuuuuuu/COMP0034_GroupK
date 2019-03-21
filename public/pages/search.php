<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once ('check_log_in_status.php');
require_once('../../private/shared/pages_header.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $get_key_word = $_GET["key_word"] ?? "";
    $search_key_words = test_input($get_key_word);
}
?>
<div class="container-fluid">
    <div class="card-header text-center">
        <h1>Searching for your favourite food...</h1>
    </div>
    <form class="form-inline my-2 my-lg-0" name="search_function" id="search_function" onsubmit="search_food()">
        <input class="form-control mr-sm-2" type="search" placeholder="Search for food..." oninput="search_on_input()"
               aria-label="Search" name="key_word" id="key_word" value="<?php echo $search_key_words ?? ""; ?>">
        <button class="btn btn-outline-success my-2 my-sm-0" id="search_button" onclick="search_food()">Search</button>
    </form>

    <div id="search_result"></div>
</div>


<?php
require_once('../../private/shared/pages_footer.php');?>