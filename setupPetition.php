<?php
	
	require_once "login.php";
	$conn = new mysqli("localhost","root","");
	
	$query = "DROP DATABASE IF EXISTS petition";
 	$result = $conn->query($query);
 	if (!$result) {
		echo "Connection Error";
	}
	
	$result = $conn->query("CREATE DATABASE petition");
	if (!$result) {
		echo "Connection Error";
	}
	$query = "USE petition";
	$result = $conn->query($query);
	if (!$result) {
		echo "Connection Error switch";
	}
	$query = "CREATE TABLE user(
	user_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name text NOT NULL,
	email text NOT NULL,
	username text NOT NULL,
	password text NOT NULL,
	class int NOT NULL,
	dorm text NOT NULL) ENGINE=InnoDB";
	$result = $conn->query($query);
	if(!$result){
		echo "Didn't create user table successfully.";
	}
	$query = "CREATE TABLE petitions(
	user_id int NOT NULL,
	title text NOT NULL,
	body text NOT NULL,
	pet_id int NOT NULL AUTO_INCREMENT,
	num_backers int NOT NULL,
	time_submitted timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (pet_id)) ENGINE=InnoDB";
	$result = $conn->query($query);
	if(!$result){
		echo "Didn't create petitions table successfully.";
	}
	$query = "CREATE TABLE backed(
	pet_id int NOT NULL,
	backer_id text NOT NULL) ENGINE=InnoDB";
	$result = $conn->query($query);
	if(!$result){
		echo "Didn't create petitions backed successfully. ";
	}
	$query = "CREATE TABLE saved(
	user_id int NOT NULL,
	saved_ids int NOT NULL) ENGINE=InnoDB";
	$result = $conn->query($query);
	if(!$result){
		echo "Didn't create saved table successfully. ";
	}
?>

<a href="homePage.php"> Click here to get going. </a>
