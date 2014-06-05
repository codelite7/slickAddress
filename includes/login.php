<?php

require("dbconnect.php");

//Get form data
$userName = $_POST['userName'];
$password = $_POST['password'];

//Prevent MySQL Injection
$userName = stripslashes($userName);
$password = stripslashes($password);

//Query the database
$query = "SELECT * FROM users WHERE userName = '$userName' AND password = '$password'";
$result = $con->query($query) or die($con->error.__LINE__);

if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			session_start();
			$_SESSION['userName']=$row['userName'];
			$_SESSION['userID']=$row['userID'];	
		}
}
else echo "Incorrect username or password";

$con->close();
echo $query;

?>