<?php
session_start();
$userID = $_SESSION['userID'];
$orderBY = $_POST['orderBY'];

//echo "User ID: " . $userID . "<br />";
//if the user is logged in we can proceed
if($userID != ''){
require("dbconnect.php");
//query database for user's contacts
if($orderBY == "lastName"){
$sql = "SELECT lastName, firstName FROM contacts WHERE userID = $userID ORDER BY " . $orderBY;
}

else $sql = "SELECT firstName, lastName FROM contacts WHERE userID = $userID ORDER BY firstName";
$result = $con->query($sql);

//put the results into an rarray named data[]
$data = array();
while($row = mysqli_fetch_array($result)){
	$data[] = $row;
}
$alphas = range('a','z');
$contactsArray = array();
$contactsArrayKeys = array();
//for each letter
foreach($alphas as $alpha){
	//create an array for the letter
	$$alpha = array();
	//echo "Looking for names starting with $alpha <br />";
	//loop through the contacts
	$keyCount = 0;
	foreach($data as $contact){
		//if the contact's first name matches the current letter, add it to that letter's array.
		$firstName = $contact['firstName'];
		$lastName = $contact['lastName'];
		//echo "Examining " . $firstName . " " . $lastName . "<br />";
		//if sort is by first name, make the list sorted by firstname
		if($orderBY == "firstName"){
		if(strcasecmp($firstName[0], $alpha) == 0){
			//got a match, increment the counter
			$keyCount++;
			//echo "We have a match, pushing name to array <br />";
			array_push($$alpha, $firstName . " " . $lastName);
			//print_r($$alpha);
			//If the match is the first one, add the alpha to the keys array.
			if($keyCount == 1){
				//echo "Pushing the alpha as a key into the keys array <br />";
				array_push($contactsArrayKeys, $alpha);
				//reset the counter			
			}
		}
		}
		
		else{
			if(strcasecmp($lastName[0], $alpha) == 0){
			//got a match, increment the counter
			$keyCount++;
			//echo "We have a match, pushing name to array <br />";
			array_push($$alpha, $lastName . " " . $firstName);
			//print_r($$alpha);
			//If the match is the first one, add the alpha to the keys array.
			if($keyCount == 1){
				//echo "Pushing the alpha as a key into the keys array <br />";
				array_push($contactsArrayKeys, $alpha);
				//reset the counter			
			}
		}
		}
	}
	
	//push the finalized letter array to the contactsarray
	//echo "Pushing finished letter array to the contacts array <br />";
	array_push($contactsArray, $$alpha);
}

//echo "finished array of contacts categorized by letter <br />";
//print_r($contactsArray);

//loop through the contactsArray and move array with names to a new Array
$finalList = array();
foreach($contactsArray as $contact){
	if(! empty($contact)){
	array_push($finalList, $contact);	
	}
}

//echo "The final list <br />";
//print_r($finalList);
//echo "<br /> The keys <br />";
//print_r($contactsArrayKeys);

//echo "Combine the keys array and the final list so the list is organized by letter";
$finalList = array_combine($contactsArrayKeys, $finalList);
//print_r($finalList);


//now create the unordered list
foreach($contactsArrayKeys as $key){
	echo "<ul>" . ucfirst($key) . "<hr />";
	for($j = 0; $j < count($finalList[$key]); $j++){
		echo "<li>" . $finalList[$key][$j] . "</li>";
	}
	echo "</ul>";
}
}
$con->close();
?>