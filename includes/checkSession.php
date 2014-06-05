<?php
	session_start();
	$userName = $_SESSION["userName"];
	
	if($userName ==''){
		//session has expired
		echo '<form id="loginForm" class="loginForm" action="login.php" method="post">
        		<input type="text" name="userName" placeholder="Username or Email Address" /><br />
           	 	<input type="password" name="password" placeholder="password" /><br />
            	<input type="submit" class="loginButton" name="submit" value="Login" />
        	  </form>';
	}
	
	//session is still active
	else{
		
		echo '<form id="logoutForm" class="logoutForm" action="logout.php" method="post">
        		<input type="submit" class="logoutButton" name="submit" value="Logout" />
        	  </form>';
		//echo "Username: " . $userName . " ID: " . $id . " Email Address: " . $emailAddress;
	}
?>