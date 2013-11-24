//confirm delete
function confirmation(id) {
	var answer = confirm("Delete entry ?")
	if (answer){
		window.location = "index.php?task=delete&uid="+id;
	}
	else{
	}
}

function submitform(task)
{
    
	var form = document.frmUser;
	form.saveButton.disabled = true;

	// ASSIGN THE Task
    var task = task;
 
    // UPDATE THE HIDDEN FIELD
    document.getElementById("task").value = task;
	
	if ( task == 'cancel' ){	
		form.submit();
	}
	
	if ( task == 'save' ){	
		if( validateForm(form)==false ){
			form.saveButton.disabled = false;
			return false;
		}		
	}
	
	form.submit();
}

//form validation
function validateForm(theForm) {
var reason = "";

  reason += validateFirstname(theForm.txtFirstname);
  reason += validateMiddlename(theForm.txtMiddlename);
  reason += validateLastname(theForm.txtLastname);
  reason += validateEmail(theForm.txtEmail);
      
  if (reason != "") {
    alert("Some fields need correction:\n" + reason);
    return false;
  }

  return true;
}

function validateFirstname(fld) {
    var error = "";
 
    if (fld.value.length == 0) {
        fld.style.background = 'Yellow'; 
		fld.focus(); 			
        error = "* The required field for First Name has not been filled in.\n"
    } else {
        fld.style.background = 'White';
    }
    return error;  
}

function validateMiddlename(fld) {
    var error = "";
 
    if (fld.value.length == 0) {
        fld.style.background = 'Yellow'; 
		fld.focus(); 			
        error = "* The required field for Middle Name has not been filled in.\n"
    } else {
        fld.style.background = 'White';
    }
    return error;  
}

function validateLastname(fld) {
    var error = "";
 
    if (fld.value.length == 0) {
        fld.style.background = 'Yellow'; 
		fld.focus(); 			
        error = "* The required field for Last Name has not been filled in.\n"
    } else {
        fld.style.background = 'White';
    }
    return error;  
}

function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
}

function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
   
	if ( fld.value !="" ){
		if (!emailFilter.test(tfld)) {              //test email for illegal characters
			fld.style.background = 'Yellow';
			error = "Please enter a valid email address.\n";
		} else if (fld.value.match(illegalChars)) {
			fld.style.background = 'Yellow';
			error = "The email address contains illegal characters.\n";
		} else {
			fld.style.background = 'White';
		}
    }
	return error;
}