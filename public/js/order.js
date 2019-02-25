// function validateQ() {
//     var quantity_error = "";
//
//     var quantity = document.getElementsByName("burgerQuantity");
//
//     if (quantity.value == "") {
//         //Quantity is blank then add error message to variable quantity_error but doesn't send it to the HTML
//         quantity_error = "Quantity is required";
//     }
// }

// function validateQ() {
//     console.log("run");
//     var quantity = document.querySelector("#burgerQuantity").value;
//
//     if (quantity == "") {
//         alert("Quantity must be entered");
//         return false;  //Returns to the form with the values as entered
//     }
//
// }

//Order_date.js
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //Jan is 0
var yyyy = today.getFullYear();
var mm1; // next month
// console.log(mm);
if (mm === 11) {  //if today is nov
    yyyy += 1;
    mm1 = 1;  //jan in 2 months time
} else if (mm === 12) {  //if today is dec
    yyyy += 1;
    mm1 = 2;  //feb in 2 months time
} else {
    // console.log("today is not nov or dec");
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
document.getElementById("thisdate").setAttribute("min", today);
// console.log(today);
document.getElementById("thisdate").setAttribute("max", maxDate);

//order_aftersubmit.js
// document.getElementById("refresh").onclick = function () {
//     location.href = 'order.php';
// };
//
// document.getElementById("toBasket").onclick = function () {
//     location.href = 'basket.php';
// };

var basket = [];

// // function convertToInt (string) {
// //     let integer = parseInt(string);
// //     return integer;
// }


function addProduct(modalId) {
    console.log("clicked" + modalId);
    let image_src = document.getElementsByName("item_image")[modalId].src;

    let name = document.getElementsByName("item")[modalId].getAttribute("value");
    let price = document.getElementsByName("price")[modalId].getAttribute("value");
    console.log(name);
    console.log(price);
    // let quantity_id = "quantity_" + modalId;
    // console.log(quantity_id);
    // let quantity = document.getElementById(quantity_id).value;
    let quantity = document.getElementsByName("quantity")[modalId].value;
    console.log(quantity);
    let image = "<img src='" + image_src + "' style='width:100px; height:100px; border-radius: 50%'>";
    console.log(image);
    // console.log("");
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

    var html = "<table class='table table-striped text-center'>";
    html += "<td class='font-weight-bolder'>Item Image</td>";
    html += "<td class='font-weight-bolder'>Item Name</td>";
    html += "<td class='font-weight-bolder'>Quantity </td>";
    html += "<td class='font-weight-bolder'>Item Price</td>";
    html += "<td class='font-weight-bolder'>Total Price</td>";
    html += "<td class='font-weight-bolder'>Action</td>";

    // basket.push(newItem);
    if (basket === undefined || basket.length === 0) {
        console.log ("first item");
        basket.push(newItem);
    }else {
        console.log(basket.length);
        let new_or_not = false;
        for (let i = 0; i < basket.length; i++) {
            if (basket[i].item_name === newItem.item_name) {
                console.log ("repeated item");
                new_or_not = true;
                let temporary_Q = parseInt(basket[i].item_quantity);
                console.log("prev Q = " + temporary_Q);
                temporary_Q += parseInt(newItem.item_quantity);// need to be int. a string now
                basket[i].item_quantity = temporary_Q;
                break;
            }


        }
        if (!new_or_not) {
            console.log("new item");
        basket.push(newItem);
    }
    }



    for (var i = 0; i < basket.length; i++) {
        let total = parseFloat(basket[i].item_price) * parseInt(basket[i].item_quantity);
        console.log("<td>" + basket[i].item_image + "  " + basket[i].item_name + "</td>");
        html += "<tr>";
        html += "<td>" + basket[i].item_image + "</td>";
        html += "<td>" + basket[i].item_name + "</td>";
        html += "<td>" + basket[i].item_quantity + "</td>";
        html += "<td>" + basket[i].item_price + "</td>";
        html += "<td>" + total.toFixed(2) + "</td>";
        html += "<td><button type='submit' onClick='deductQuantity(\"" + basket[i].item_name + "\", this);'/>Deduct Quantity</button> &nbsp<button type='submit' onClick='addQuantity(\"" + basket[i].item_name + "\", this);'/>Add Quantity</button> &nbsp<button type='submit' onClick='deleteItem(\"" + basket[i].item_name + "\", this);'/>Delete Item</button></td>";
        html += "</tr>";
    }
    html += "</table>";
    document.getElementById("shopping_basket").innerHTML = html;

    // for (var i = 0; i < basket.length; i++) {
    //     if (basket[i].item_name == item_name) {
    //         var basketItem = null;
    //         for (var k = 0; k < basket.length; k++) {
    //             if (basket[k].item_name == basket[i].item_name) {
    //                 basketItem = basket[k];
    //                 basket[k].item_quantity++;
    //                 break;
    //             }
    //         }
    //         if (basketItem == null) {
    //
    //             var basketItem = {
    //                 item: basket[i],
    //                 item_quantity: basket[i].item_quantity,
    //             };
    //             basket.push(basketItem);
    //         }
    //     }
    // }
       renderbasket();
}

function renderbasket(){

    var html = '';
    var ele = document.getElementById('shopping_basket');
    ele.innerHTML = '';

    html += "<table class='table table-striped text-center'>";
    html += "<tr><td class='font-weight-bolder'>Item Image</td>";
    html += "<td class='font-weight-bolder'>Item Name</td>";
    html += "<td class='font-weight-bolder'>Quantity</td>";
    html += "<td class='font-weight-bolder'>Item Price</td>";
    html += "<td class='font-weight-bolder'>Total Price</td>";
    html += "<td class='font-weight-bolder'>Action</td></tr>";

    var GrandTotal = 0;

    for (var i = 0; i < basket.length; i++) {
        let total = parseFloat(basket[i].item_price) * parseInt(basket[i].item_quantity);
        html += "<tr>";

        html += "<td>" + basket[i].item_image + "</td>";
        html += "<td>" + basket[i].item_name + "</td>";
        html += "<td>" + basket[i].item_quantity + "</td>";
        html += "<td>" + basket[i].item_price + "</td>";
        html += "<td>" + total.toFixed(2) + "</td>";
        html += "<td><button type='submit' onClick='deductQuantity(\"" + basket[i].item_name + "\", this);'/>Deduct Quantity</button> &nbsp<button type='submit' onClick='addQuantity(\"" + basket[i].item_name + "\", this);'/>Add Quantity</button> &nbsp<button type='submit' onClick='deleteItem(\"" + basket[i].item_name + "\", this);'/>Delete Item</button></td>";
        html += "</tr>";

        GrandTotal += parseFloat(basket[i].item_price) * parseInt(basket[i].item_quantity);
    }
    document.getElementById('grandtotal').innerHTML = "The Grand Total is: £ "+ GrandTotal.toFixed(2);
    html += "</table>";
    ele.innerHTML = html;
}

function deleteItem(item_name, e) {
    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
    for (var i = 0; i < basket.length; i++) {
        if (basket[i].item_name == item_name) {
            basket.splice(i, 1);
        }
    }
    renderbasket();
}

function deductQuantity(item_name) {
    for (var i = 0; i < basket.length; i++) {
        if (basket[i].item_name == item_name) {
            basket[i].item_quantity--;
        }

        if (basket[i].item_quantity == 0) {
            basket.splice(i, 1);
        }
    }
    renderbasket();
}

function addQuantity(item_name) {
    for (var i = 0; i < basket.length; i++) {
        if (basket[i].item_name == item_name) {
            basket[i].item_quantity++;
        }
    }
    renderbasket();
}


function datevalidation() {
let checked = false;
    var date_input = document.getElementById('thisdate').value;
    // console.log(date_input);
    // console.log(Date.parse(date_input));


    if (Date.parse(date_input)) {
        checked = true;
    }else {
        alert("You need to input the date between " + today + " and " + maxDate);
        //checked=false;
    }


    if (checked) {
        var orderdate = document.getElementById("menuitem");
        orderdate.style.display = "";
        location.href='#step2';
    }
// console.log(checked);
    return checked;
}


// 2019/02/25 yj's code
// function quantityValidation(modalId) {
//     console.log("clicked" + modalId);
// }
//     let quantityCheck = false ;
//     let quantityInput = document.getElementsByName("quantity_")[modalId].value;
//     console.log(quantityInput);
//
//     if (quantityInput != "") {
//         quantityCheck = true;
//         addProduct(modalId);
//     } else {
//         alert("You need to input the quantity.")
//     }
//
//     console.log(quantityCheck);
//     return quantityCheck;
// }
