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

function validateQ() {
    console.log("run");
    var quantity = document.querySelector("#burgerQuantity").value;

    if (quantity == "") {
        alert("Quantity must be entered");
        return false;  //Returns to the form with the values as entered
    }

}