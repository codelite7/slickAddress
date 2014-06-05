<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"content-type="text/html" charset="utf-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<title>SlickAddress</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
	<div id="top">
    	<div id="account">
        </div>
    </div>
    <div id="addNew">
    <form id="addContactForm" class="addContactForm" action="includes/addContact.php" method="post">
    	<input type="text" name="firstName" placeholder="First Name" /> <br />
        <input type="text" name="lastName" placeholder="Last Name" /> <br />
        <input type="text" name="address" placeholder="Address" /> <br />
        <input type="text" name="email" placeholder="Email Address" /> <br />
        <input type="text" name="workNumber" placeholder="Work Number" /> <br />
        <input type="text" name="cellNumber" placeholder="Cell Number" /> <br />
        <input type="text" name="homeNumber" placeholder="Home Number" /> <br />
        <input type="text" name="faxNumber" placeholder="Fax Number" /> <br />
        <input type="text" name="company" placeholder="Company" /> <br />
        <input type="text" name="website" placeholder="Website" /> <br />
        <textarea name="notes" placeholder="Notes"></textarea> <br />
        <input type="submit" name="submitAdd" value="Add Contact" class="addContactButton"/>
        
    </form>
    </div>
	<div id="mainDiv">
    <p>Main Div</p>
    <p>
      <input type="submit" value="Add" class="addButton" />
    </p>
    <div id="listDiv">
        <p>Your Contacts</p>
        <span id="sort"><a class = "sortContactsByFirstName" href="#">Sort by First Name</a> <a class = "sortContactsByLastName" href="#">Sort by Last Name</a></span>
        <div id="listDivContents">
        </div><!--End listDivContents-->
    	</div><!--End listDiv-->
        <div id="titleDiv">
        <p>titleDiv</p>
    	</div><!--End titleDiv-->
        <div id="contentDiv">
        <p>contentDiv</p>
    	</div><!--End contentDiv-->
    </div><!--End mainDiv-->
    <script src="javasacript/slickaddress.js" type="text/javascript"></script>
</body>
</html>
