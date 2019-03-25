<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once ('check_log_in_status.php');
$page_title = "Search Function";
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
    <form class="my-2 row" name="search_function" id="search_function" onsubmit="search_food()">

        <div class="col-md-12 text-center">
            <input class="searchitem" type="search" placeholder="Search for food..." oninput="search_on_input()"
                   aria-label="Search" name="key_word" id="key_word" value="<?php echo $search_key_words ?? ""; ?>">
            <button class="btn btn-outline-success" id="search_button" onclick="search_food()">Search</button>
        </div>
    </form>

    <div id="search_result" class="text-center"></div>
</div>


<?php
require_once('../../private/shared/pages_footer.php');?>