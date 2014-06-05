function addEventListeners(){//Event Listeners

//Toggle the add contact form display
$('#mainDiv').on('click', '.addButton', function(){
	$('#addNew').slideToggle();
	});
	
//Log the user in
$('#account').on('click', '.loginButton' ,function(e){
		e.preventDefault();
	$.ajax('includes/login.php',{
		type: 'POST',
		data: $('#loginForm').serialize(),
		success: function(result){
			location.reload();	
			},
		error: function(request, errorType, errorMessage){
			alert("Error: " + errorType + " with message: " + errorMessage);	
		}
	});
	});
	
//Log the user out
$('#account').on('click','.logoutButton', function(e){
		e.preventDefault();
	$.ajax('includes/logout.php',{
		type: 'POST',
		data: $('#logoutForm').serialize(),
		success: function(result){
			location.reload();
			},
		error: function(request, errorType, errorMessage){
			alert("Error: " + errorType + " with message: " + errorMessage);	
		}
	});
	});

//Submit the new contact to the Perl script to add it to the database
$('#addNew').on('click', '.addContactButton', function(e){
	e.preventDefault();
	//alert("Form Submitted!");
	$.ajax('includes/addContact.php',{
		type: 'POST',
		data: $('#addContactForm').serialize(),
		success: function(result){
			//alert("Contact Added");
			//location.reload();
			makeContactsList("lastName");	
			},
		error: function(request, errorType, errorMessage){
			alert("Error: " + errorType + " with message: " + errorMessage);	
		}
	});
});	

//sort by first name clicked
$('#sort').on('click', '.sortContactsByFirstName', function(e){
	e.preventDefault();
	makeContactsList("firstName");
});

//sort by last name clicked
$('#sort').on('click', '.sortContactsByLastName', function(e){
	e.preventDefault();
	makeContactsList("lastName");
});
};

$(document).ready(function(){
	checkSession();
	makeContactsList("lastName");
	addEventListeners();
});

function checkSession(){
	$.ajax('includes/checkSession.php',{
		type: 'POST',
		cache: false,
		success: function(result){
			$('#account').append(result).hide().fadeIn(1000);		
		}
	});
};

function makeContactsList(sort){
	$.ajax('includes/loadContactList.php', {
		type: 'POST',
		data: {orderBY: sort},
		cache: false,
		success: function(result){
			$('#listDivContents').html(result).hide().fadeIn(1000);	
		}
	});
};

function loadContactDetails(){
	
};

	