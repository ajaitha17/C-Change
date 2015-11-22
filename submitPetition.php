<?php
	
	//still need to write insertPetition
	require_once "functions.php";
	if(isset($_POST['title']) && isset($_POST['body'])){
		$title = sanitizeString($_POST['title']);
		$body = sanitizeString($_POST['body']);
		insertPetitions($title, $body);
	}
?>
<!DOCTYPE html5>
<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "styling.css">
	<title>Submit</title>
</head>
</html>
