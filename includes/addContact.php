<?php
session_start();
$userID = $_SESSION['userID'];
require("dbconnect.php");
$firstName = stripslashes($_POST['firstName']);
$lastName = stripslashes($_POST['lastName']);
$address = stripslashes($_POST['address']);
$email = stripslashes($_POST['email']);
$workNumber = stripslashes($_POST['workNumber']);
$cellNumber = stripslashes($_POST['cellNumber']);
$homeNumber = stripslashes($_POST['homeNumber']);
$faxNumber = stripslashes($_POST['faxNumber']);
$company = stripslashes($_POST['company']);
$website = stripslashes($_POST['website']);
$notes = stripslashes($_POST['notes']);

$query = "INSERT INTO contacts
(userID, firstName, lastName, address, email, workNumber, cellNumber, homeNumber, faxNumber, company, website, notes)
VALUES ('$userID', '$firstName', '$lastName', '$address', '$email', '$workNumber', '$cellNumber', '$homeNumber', '$faxNumber', '$company', '$website', '$notes');";

if($con->query($query) === false){
	trigger_error('Bad SQL: ' . $query . 'ERROR: ' . $con->error, E_USER_ERROR);	
}
else{
	$last_inserted_id = $con->insert_id;
	$affected_rows = $con->affected_rows;	
}
?>