<!DOCTYPE html>
<head>
	<title> Welcome!</title>
	<link rel = "stylesheet" type = "text/css" href = "styling.css">
</head>
<body>
<?php 
	require "functions.php";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$usrname = $_POST['usrname'];
	$class = $_POST['class'];
	$dorm = $_POST['dorm'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	session_start();
	$_SESSION['un'] = $usrname;
	$_SESSION['pw'] = $pass1;
	//var_dump($_SESSION);
	// echo $name . " " . $email . " " . $usrname . " " . $class . " " . $dorm . " " . $pass1 . " " . $pass2."<br>";
	
	//insertuser($name, $email, $usrname, $pass1, $class, $dorm, $pass2);
?>
<h1> Welcome <?php echo $name?> </h1>

<?php

	$conn = new mysqli("localhost", "root", "", "petition");
    if($pass1 == $pass2) {
    	$pass1 = encrypt($pass1);
		$pass2 = encrypt($pass2);	
    	if(checkEmail($email) && uniqueUser($usrname)) {
    		$query = "INSERT INTO user VALUES ('NULL', '$name', '$email', '$usrname', '$pass1', '$class', '$dorm')";
    		$result = $conn->query($query);
    		if(!$result) {
    			echo "User insert error";
    			echo "<a href='homePage.php'>Home</a>";
    			die();
    		}
			
    		echo "<a href='feed.php'>Click here to get started.</a>";
    	}
    }
	
// 	function insertUser($name, $email, $username, $pass1, $class, $dorm, $pass2){
// 	$conn = new mysqli("localhost", "root", "");
//     if($pass1 == $pass2) {
//     	if(checkEmail($email) && checkUsername($username)) {
//     		$query = "INSERT INTO user VALUES (NULL, $name, $email, $username, $pass1, $class, $dorm)";
//     		$result = $conn->query($query);
//     		if(!$result) {
//     			echo "User insert error";
//     		}
//     	}
//     }
//   }
?>
</body>
