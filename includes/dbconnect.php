<?php

//Database connection info
$host="localhost";
$db_user="zackstev_slickad";
$db_pass="Blackbird89!";
$db_name="zackstev_slickaddress";

//Connect to the server and database
$con = new mysqli($host, $db_user, $db_pass, $db_name);
//check the connection
if($con->connect_error){
	echo "Failed to connect to the MySQL database: " . $con->connect_error, E_USER_ERROR;	
}

?>