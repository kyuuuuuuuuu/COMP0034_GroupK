//Wait until the whole page is loaded before this is executed
//This is to make sure the initial search value is searched automatically
$(function () {
    search_food();
});

//execute every time  users type anything in the search form
function search_on_input() {
    let key_word = document.getElementById("key_word").value;

    if (key_word.length > 0) {
        document.getElementById("search_result").innerHTML = "You are searching for " + key_word;
    }else {
        document.getElementById("search_result").innerHTML = "";
    }
    search_food();
}

//Use AJAX to search for result
function search_food() {
    let key_word = document.getElementById("key_word").value;
    if (key_word.length > 0) {
        let ajax = new XMLHttpRequest();
        ajax.open("POST", "find_result.php", true);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        let data_to_post = "";
        data_to_post += "key_word=" + key_word;

        ajax.send(data_to_post);

        ajax.onreadystatechange = function() {
            if (ajax.readyState === 4 && ajax.status === 200) {
                document.getElementById('search_result').innerHTML = ajax.responseText;
            }
        }
    }else {
        document.getElementById("search_result").innerHTML = "";
    }

}