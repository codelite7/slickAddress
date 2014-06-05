<?php
//Check to see if session is not registered, redirect back to main page
session_start();
if($_SESSION['userName'] == ''){
	echo "Session not started";
}
else echo print_r($_SESSION);
?>
<html>
<body>
<p>Login Successful!</p>
</body>
</html>