var javaPrice = 0, cafePrice = 0, capuccinoPrice = 0, totalPrice;
var javaQuantity = 0, cafeQuantity = 0, capuccinoQuantity = 0;
var cafeType = "Single", capuccinoType = "Single";

function javaChange() {
    javaQuantity = document.getElementById("javaquantity").value;
    
    if (javaQuantity >= 0) {
        javaPrice = javaQuantity * 2;

        document.getElementById("javaprice").innerHTML = "$" + javaPrice.toFixed(2);
        calTotalPrice();
    }

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
    cafeQuantity = document.getElementById("cafequantity").value;

    if (cafeQuantity >= 0) {
        calCafePrice();
    }

}

function calCafePrice() {
    if (cafeType == "Single") {
        cafePrice = cafeQuantity * 2;
    } else {
        cafePrice = cafeQuantity * 3;
    }

    document.getElementById("cafeprice").innerHTML = "$" + cafePrice.toFixed(2);
    calTotalPrice();
}

function capuccinoTypeChange() {
    var capuccinoRadio = document.getElementsByName("capuccino");

    for (i = 0; i < capuccinoRadio.length; i++) {
        if (capuccinoRadio[i].checked) {
            capuccinoType = capuccinoRadio[i].value;
            break;
        }
    } 
    calCapuccinoPrice();
}

function capuccinoQuantityChange() {
    capuccinoQuantity = document.getElementById("capuccinoquantity").value;

    if (capuccinoQuantity >= 0) {
        calCapuccinoPrice();
    }
    
}

function calCapuccinoPrice() {
    if (capuccinoType == "Single") {
        capuccinoPrice = capuccinoQuantity * 4.75;
    } else {
        capuccinoPrice = capuccinoQuantity * 5.75;
    }

    document.getElementById("capuccinoprice").innerHTML = "$" + capuccinoPrice.toFixed(2);
    calTotalPrice();
}

function calTotalPrice() {
    totalPrice = javaPrice + cafePrice + capuccinoPrice;

    document.getElementById("totalprice").innerHTML = "$" + totalPrice.toFixed(2);
}