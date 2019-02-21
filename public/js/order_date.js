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

