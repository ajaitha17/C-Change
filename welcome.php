<?php
	
	require_once "functions.php";
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = sanitizeString($_POST['username']);
		$enteredPassword = sanitizeString($_POST['password']);
		$dbPassword = getUserPassword($username);
		if($dbPassword != null){
			if(verifyPassword($enteredPassword,$dbPassword)){
				session_start();
				$_SESSION['un'] = $username;
				$_SESSION['pw'] = $dbPassword;
				echo "<h2>Welcome $username</h2><br>";
				echo "Click <a href = 'feed.php'>Here</a> to see the current Feed of Petitions";
			}
			else{
				echo "Incorrect Username Password combination<br>";
				echo "Click <a href = 'homePage.php'>Here</a> to try logging in again";
			}
		}
		else{
			echo "Incorrect Username Password combination<br>";
			echo "Click <a href = 'homePage.php'>Here</a> to try logging in again";

		}
	}


	// 	$rowNum= mysqli_num_rows($result);
	// 	//check number of rows instead
	// 	if($rowNum > 0){
	// 		session_start();
	// 		$_SESSION['un'] = $username;
	// 		$_SESSION['pw'] = $password;
	// 		//var_dump($_SESSION);
	// 		//include "feed.php";
	// 		echo "<h2>Welcome $username</h2><br>";
	// 		echo "Click <a href = 'feed.php'>Here</a> to see the current Feed of Petitions";
	// 	} else {
	// 		//include "homePage.php";
	// 		echo "Incorrect Username Password combination<br>";
	// 		echo "Click <a href = 'homePage.php'>Here</a> to try logging in again";
	// 	}
	// }
	// else{
	// 	//include "homePage.php";	
	// 	echo "Incorrect Username Password combination<br>";
	// 	echo "Click <a href = 'homePage.php'>Here</a> to try logging in again";
	// }
	
	
?>

<!DOCTYPE html5>
<html>
<head>
	<title>Welcome!</title>
	<link rel = "stylesheet" type = "text/css" href = "styling.css">
</head>
</html>
