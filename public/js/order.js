var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //Jan is 0
var yyyy = today.getFullYear();
var mm1; // next month
if (mm === 11) {  //if today is nov
    yyyy += 1;
    mm1 = 1;  //jan in 2 months time
} else if (mm === 12) {  //if today is dec
    yyyy += 1;
    mm1 = 2;  //feb in 2 months time
} else {
    mm1 = mm + 2;
}

if (dd < 10) {
    dd = '0' + dd
}
if (mm < 10) {
    mm = '0' + mm
}
if (mm1 < 10) {
    mm1 = '0' + mm1
}

today = yyyy + '-' + mm + '-' + dd;
var maxDate = yyyy + '-' + mm1 + '-' + dd;

var select_date = document.getElementById("select_date");
if (select_date) {
    select_date.setAttribute("min", today);
    select_date.setAttribute("max", maxDate);
}

var basket = [];
var GrandTotal;

function addProduct(modalId) {
    let image_src = document.getElementsByName("item_image")[modalId].src;
    let name = document.getElementsByName("item")[modalId].getAttribute("value");
    let price = document.getElementsByName("price")[modalId].getAttribute("value");
    let quantity = document.getElementsByName("quantity")[modalId].value;
    let image = "<img src='" + image_src + "' style='width:100px; height:100px; border-radius: 50%'>";

    var newItem = {
        item_image: null,
        item_name: null,
        item_price: 0.00,
        item_quantity: 0,
    };

    newItem.item_image = image;
    newItem.item_name = name;
    newItem.item_quantity = quantity;
    newItem.item_price = price;

    if (basket === undefined || basket.length === 0) {
        basket.push(newItem);
    }else {
        let new_or_not = false;
        for (let i = 0; i < basket.length; i++) {
            if (basket[i].item_name === newItem.item_name) {
                new_or_not = true;
                let temporary_Q = parseInt(basket[i].item_quantity);
                temporary_Q += parseInt(newItem.item_quantity);
                basket[i].item_quantity = temporary_Q;
                break;
            }
        }
        if (!new_or_not) {
            basket.push(newItem);
        }
    }
    render_basket();
}

function render_basket(){
    let basket_table = '';
    let shopping_basket = document.getElementById('shopping_basket');
    shopping_basket.innerHTML = '';

    basket_table += "<table class='table table-striped text-center'>";
    basket_table += "<tr><td class='font-weight-bolder'>Item Image</td>";
    basket_table += "<td class='font-weight-bolder'>Item Name</td>";
    basket_table += "<td class='font-weight-bolder'>Quantity</td>";
    basket_table += "<td class='font-weight-bolder'>Item Price</td>";
    basket_table += "<td class='font-weight-bolder'>Total Price</td>";
    basket_table += "<td class='font-weight-bolder'>Action</td></tr>";

    GrandTotal = 0;
    var name_session = [];

    for (let i = 0; i < basket.length; i++) {
        let total = parseFloat(basket[i].item_price) * parseInt(basket[i].item_quantity);
        basket_table += "<tr>";

        basket_table += "<td>" + basket[i].item_image + "</td>";
        basket_table += "<td>" + basket[i].item_name + "</td>";
        basket_table += "<td>" + basket[i].item_quantity + "</td>";
        basket_table += "<td>" + basket[i].item_price + "</td>";
        basket_table += "<td>" + total.toFixed(2) + "</td>";
        basket_table += "<td><button type='submit' class='btn btn-primary' onClick='deductQuantity(\"" + basket[i].item_name + "\", this);'/>Deduct Quantity</button> &nbsp<button type='submit' class='btn btn-primary' onClick='addQuantity(\"" + basket[i].item_name + "\", this);'/>Add Quantity</button> &nbsp<button type='submit' class='btn btn-primary' onClick='deleteItem(\"" + basket[i].item_name + "\", this);'/>Delete Item</button></td>";
        basket_table += "</tr>";
        name_session[i] = basket[i].item_name;
        GrandTotal += parseFloat(basket[i].item_price) * parseInt(basket[i].item_quantity);
    }
    document.getElementById('grand_total').innerHTML = "The Grand Total is: £ "+ GrandTotal.toFixed(2);
    basket_table += "</table>";
    shopping_basket.innerHTML = basket_table;
}

function deleteItem(item_name, e) {
    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
    for (let i = 0; i < basket.length; i++) {
        if (basket[i].item_name === item_name) {
            basket.splice(i, 1);
        }
    }
    render_basket();
}

function deductQuantity(item_name) {
    for (let i = 0; i < basket.length; i++) {
        if (basket[i].item_name === item_name) {
            basket[i].item_quantity--;
        }

        if (basket[i].item_quantity === 0) {
            basket.splice(i, 1);
        }
    }
    render_basket();
}

function addQuantity(item_name) {
    for (let i = 0; i < basket.length; i++) {
        if (basket[i].item_name === item_name) {
            basket[i].item_quantity++;
        }
    }
    render_basket();
}

function date_validation() {
    let checked = false;
    var date_input = document.getElementById('select_date').value;
    if (Date.parse(date_input)) {
        checked = true;
    }else {
        alert("You need to input the date between " + today + " and " + maxDate);
    }
    if (checked) {
        var order_date = document.getElementById("menu_item");
        order_date.style.display = "";
        location.href='#step2';
    }
    return checked;
}

function save_basket() {
    let basket_stringify = JSON.stringify(basket);
    console.log(basket_stringify);
    sessionStorage.setItem('order_basket',basket_stringify);
    window.location.href = "order_summary.php";
}

function post_data_xhr() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "after_order.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var data_to_post = "";
    let and = "&";
    data_to_post += "basket_length=" + basket.length;
    data_to_post += and + "grand_total=" + GrandTotal;

    // var data = JSON.parse(stringify);
    console.log(basket);
    for (let i = 0; i < basket.length; i++) {

        data_to_post += and + "item_name_" + i + "=" + basket[i].item_name;
        data_to_post += and + "item_quantity_" + i + "=" + basket[i].item_quantity;
        data_to_post += and + "item_price_" + i + "=" + basket[i].item_price;
    }
    console.log(data_to_post);
    xhr.send(data_to_post);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            window.location.href = "order_summary.php";
        }
    }
}