//validator2.js
//the last part of validator2. Registers the event handlers
//Get the DOM addresses of the elements and register
//the event handlers 

//getElementByID
var nameNode = document.getElementById("name");
var emailNode = document.getElementById("email");
var startDateNode = document.getElementById("startDate");

//addEventListener
nameNode.addEventListener("change", chkName, false);
emailNode.addEventListener("change", chkEmail, false);
startDateNode.addEventListener("change", chkstartDate, false);
