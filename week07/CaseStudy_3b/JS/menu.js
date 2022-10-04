var javaPrice = 0, cafePrice = 0, capuccinoPrice = 0, total_price;
var javaQuantity = 0, cafeQuantity = 0, capuccinoQuantity = 0;
var cafeType;

function javaChange(){
    var javaQuantity = document.getElementById("javaquantity").value; 
    var javaPrice = javaQuantity * 2;
    
    document.getElementById("javaprice").innerHTML = "$" + javaPrice.toFixed(2);
    total_price();  
}

function cafeTypeChange() {
    var cafeRadio = document.getElementsByName("cafe");

    for (i = 0; i < cafeRadio.length; i++) {
        if (cafeRadio[i].checked) {
            cafeType = cafeRadio[i].value;
            break;
        }
    }
    calCafePrice();
}

function cafeQuantityChange() {
    cafeQuantity = document.getElementById("cafeQuantity").value;
    calCafePrice();
}

function calCafePrice() {
    if (cafeType == "single") {
        cafePrice = cafeQuantity * 2;
    } else {
        cafePrice = cafeQuantity * 3;
    }

    document.getElementById("cafeprice").innerHTML = "$" + cafePrice.toFixed(2);
    total_price();
}

function capuccinoTypeChange() {
    var capuccinoRadio = document.getElementsByName("cappuccino");

    for (i = 0; i < capuccinoRadio.length; i++) {
        if (capuccinoRadio[i].checked) {
            capuccinoType = capuccinoRadio[i].value;
            break;
        }
    } 
    calCapuccinoPrice();
}

function capuccinoQuantityChange() {
    capuccinoQuantity = document.getElementById("cappuccinoquantity").value;
    calCapuccinoPrice();
}

function calCapuccinoPrice() {
    if (capuccinoType == "single") {
        capuccinoPrice = capuccinoQuantity * 4.75;
    } else {
        capuccinoPrice = capuccinoQuantity * 5.75;
    }

    document.getElementById("capuccinoprice").innerHTML = "$" + capuccinoPrice.toFixed(2);
    total_price();
}


function total_price(){
    calTotalPrice = javaPrice + cafePrice + capuccinoPrice; 
    document.getElementById("totalprice").innerHTML = "$" + calTotalPrice.toFixed(2);
} 