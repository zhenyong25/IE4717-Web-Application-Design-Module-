function chkName(event) {
  // Get the target node of the event

  var myName = event.currentTarget;

  var pos = myName.value.search(/^[A-Za-z][A-Za-z ]+$/);
  if (pos != 0) {
    alert(
      "The name you entered (" +
        myName.value +
        ") is not in the correct form. \n" +
        "Only alphabet characters and character spaces are allowed"
    );
    myName.focus();
    myName.select();
    return false;
  }
}

function chkEmail(event) {
  // Get the target node of the event

  var myEmail = event.currentTarget;
  var pos = myEmail.value.search(/^[\w\.-]+@([\w]+\.){1,3}[\w]{2,3}$/);

  if (pos != 0) {
    alert(
      "The email you entered (" +
        myEmail.value +
        ") is not in the correct form. \n" +
        "username@domainname"
    );
    myEmail.focus();
    myEmail.select();
    return false;
  }
}

function chkStartDate(event) {
  // Get the target node of the event

  var myDate = event.currentTarget;
  var today = new Date();
  var date = new Date(myDate.value);

  if (date < today) {
    alert("Start date cannot be from today and the past.");
    myDate.focus();
    myDate.select();
    return false;
  }
}
