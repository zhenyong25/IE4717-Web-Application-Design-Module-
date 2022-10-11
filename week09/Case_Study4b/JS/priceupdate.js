function myFunction(obj, num) {
  var checkBox = obj;
  checkBox.parentNode.parentNode;
  // Get the output text
  var tr = checkBox.closest("tr");
  var checked = tr.querySelector(".checked");
  var uncheck = tr.querySelector(".uncheck");
  if (checkBox.checked == true) {
    checked.setAttribute("style", "display:inline ");
    uncheck.setAttribute("style", "display: none;");
  } else {
    checked.setAttribute("style", "display:none ");
    uncheck.setAttribute("style", "display: inline;");
  }
}
