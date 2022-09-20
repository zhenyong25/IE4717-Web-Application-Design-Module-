
function validateName(){
	var my_name = document.getElementById("name").value; 
	my_name.trim();
	var regexp = /^[A-za-z, .\s?]+$/;
	if(regexp.test(my_name)){
		return true; 
	}
	else{
		alert("The name you entered is not in the correct form. \n" +
			"Only Alphabet Character and Character Spaces are ALLOWED!");
		return false; 
	}
}

function validateEmail(){
	var my_email = document.getElementById("email").value; 
	my_email.trim();
	var regexp = /^([\w\.-])+@([\w]+\.){1,3}([A-z]){2,3}$/;
	if(regexp.test(my_email)){
		return true;  
	}
	else{
		alert("The email you entered is not in the correct form. \n" +
		"The correct form is: " +
		"User Name @ Domain Name " );
		return false; 
	}
}

function validateDate(){
	var date = new Date(document.getElementById("startDate").value); 
	var currentDate = new Date();
	if(date.getFullYear()>currentDate.getFullYear()){
		return true; 
	}
	else if(date.getFullYear() == currentDate.getFullYear()){
		if(date.getMonth()> currentDate.getFullYear()){
			return true;
		}
		else if(date.getMonth() == currentDate.getMonth()){
			if(date.getDate()> currentDate.getDate()){
				return true; 
			}
		}
	} 
		alert("The date you entered is not in the correct form. \n" +
		"The start date cannot be from today and the past");
		return false; 
}