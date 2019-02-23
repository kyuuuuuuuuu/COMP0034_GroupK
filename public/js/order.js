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
    // console.log("today is nov");
    yyyy += 1;
    mm1 = 1;  //jan in 2 months time
} else if (mm === 12) {  //if today is dec
    // console.log("today is dec");
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

function addProduct(modalId) {
console.log("clicked" + modalId);
let name = document.getElementsByName("item")[modalId].getAttribute("value");
let price = document.getElementsByName("price")[modalId].getAttribute("value");
console.log(name);
console.log(price);
let quantity_id = "quantity_" + modalId;
console.log(quantity_id);
let quantity = document.getElementById(quantity_id).value;
console.log(quantity);
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
        //checked =false;
    }


    if (checked) {
        var orderdate = document.getElementById("menuitem");
        orderdate.style.display = "";
    }
// console.log(checked);
    return checked;
}
