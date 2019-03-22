//Wait until the whole page is loaded before this is executed
$(function () {
    search_food();
});

function search_on_input() {
    let key_word = document.getElementById("key_word").value;
    let return_result = "";
    if (key_word.length > 0) {
        return_result = "You are searching for " + key_word;
        document.getElementById("search_result").innerHTML = return_result;
    }else {
        document.getElementById("search_result").innerHTML = "";
    }
    search_food();
}

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