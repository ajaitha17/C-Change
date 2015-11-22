<?php
	require_once "functions.php";
	@session_start();
	if(isset($_SESSION['un']) && isset($_SESSION['pw'])) {
		$username = $_SESSION['un'];
		$password = $_SESSION['pw'];
		$result = queryMysql("SELECT * FROM user WHERE username='$username' AND password = '$password'");
		if($result->num_rows == 0 ) {
			echo "Please <a href = 'homePage.php'>Login</a> to continue";
			die();
		}
		else {
			echo "<a href = 'profile.php'>$username</a> &nbsp &nbsp";
			echo "<a href = 'feed.php'>Feed</a> &nbsp &nbsp";
			echo "<a href = 'homepage.php'>Logout</a>";
			echo "<center><h1>Messages</h1></center>";
		}
	}
	else {
		echo "Please <a href = 'homePage.php'>Login</a> to continue";
		die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
</html>
