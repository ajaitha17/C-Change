<!DOCTYPE html>
<head>
<title> Welcome!</title>
</head>
<body>
<h1> Your info </h1>
<?php 
	include "functions.php";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$usrname = $_POST['usrname'];
	$class = $_POST['class'];
	$dorm = $_POST['dorm'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];

	echo $name . " " . $email . " " . $usrname . " " . $class . " " . $dorm . " " . $pass1 . " " . $pass2."<br>";
	
	//insertuser($name, $email, $usrname, $pass1, $class, $dorm, $pass2);
	
	$conn = new mysqli("localhost", "root", "", "petition");
    if($pass1 == $pass2) {
    	if(checkEmail($email) && checkUsername($usrname)) {
    		$query = "INSERT INTO user VALUES ('NULL', '$name', '$email', '$usrname', '$pass1', '$class', '$dorm')";
    		$result = $conn->query($query);
    		if(!$result) {
    			echo "User insert error";
    		}
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

