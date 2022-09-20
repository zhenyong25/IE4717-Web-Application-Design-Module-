// validator.js
// Inoput validation using the change and submit 

// Name Field ( Alphabet Character and Character Spaces ) 
function chkName (event) {
	var myName = event.currentTarget;

	// A-Z a-z => Alphabet Character & [ ] => Character Spaces; + => 1 or more 
	var pos = myName.value.search(/^[A-Za-z ]+$/);

	if (pos != 0) {
		alert("The name you entered (" + myName.value + 
			") is not in the correct form. \n" +
			"Only Alphabet Character and Character Spaces are ALLOWED!");
			
		myName.focus();
		myName.select();
    }
}

/*Email Field ( User Name followed by "@" and a domain name part. The user name contains word characters including hyphen (“-”) and period (“.”). The domain name contains
two to four address extensions. Each extension is string of word
characters and separated from the others by a period (“.”). The last
extension must have two to three characters. 
For example, ZSHOON001@e.ntu.edu.sg 
*/


function chkEmail (event) {
	var myEmail = event.currentTarget;
	
	// [\w.-] + => one or more word character inlcuding hypen and period
	// @ => continue with the character "@"
	// => domain name contains two to four address extensions
	// => last extension must have two to three character 
	var pos = myEmail.value.search(/^[\w.-]+@[\w.-]+{2,4}\.[A-za-z]{2,3}$/);

	if (pos != 0) {
		alert("The name you entered (" + myEmail.value + 
			") is not in the correct form. \n" +
			"The correct form is: " +
			"User Name @ Domain Name " );
		
		myEmail.focus();
		myEmail.select();
	}
}

// Start Date ( Cannot be today or from the past ) 

function chkstartDate(event){
	var mystartDate = event.currentTarget;
	
	var pos = mystartDate.value.search(/$/);

	if (pos != 0) {
		alert("The name you entered (" + mystartDate.value + 
			") is not in the correct form. \n" +
			"The start date cannot be from today and the past");
			
		mystartDate.focus();
		mystartDate.select();
	}
}
