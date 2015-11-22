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
		echo "<a href = 'homePage.php'>Logout</a>";
		echo "<center><h1>Backers</h1>";
	}
}
else {
	echo "Please <a href = 'homePage.php'>Login</a> to continue";
	die();
}

if(isset($_POST['pet_id'])) {
	$pet_id= $_POST['pet_id'];
	$result = queryMysql("SELECT * FROM messages WHERE pet_id = '$pet_id'");
	if($result->num_rows>0) {
		echo "<button type='button' id = 'message_button' disabled>Message!</button>";
	}
	else {
			//Insert messages into database
			//echo "Success";
	}

}

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$result = queryMysql("SELECT * FROM petitions WHERE pet_id = '$id'");
	if($result->num_rows>0) {
		$result->data_seek(0);
		$uid = $result->fetch_assoc()['user_id'];
		$result2 = queryMysql("SELECT * FROM user WHERE user_id = '$uid'");
		$result2->data_seek(0);
		$uname = $result2->fetch_assoc()['username'];
		//$emailDetails = array();
		$emailDetails = '';
			//$usernames = array('key' => 'value');

		if($username == $uname) {
			//create table



			$result3 = queryMysql("SELECT * FROM backed WHERE pet_id = '$id'");
				// echo $result3->num_rows . "<br>";
			for($i=0;$i<$result3->num_rows;$i++){
					// echo $i . " iteration thru loop<br>";
				$result3->data_seek($i);
				$uid = $result3->fetch_assoc()['backer_id'];
					// echo "backerid is " . $uid ."<br>";	
				$result4 = queryMysql("SELECT * FROM user WHERE username = '$uid'");
				$result4->data_seek(0);
				@$uname = $result4->fetch_assoc()['name'];
				$result4->data_seek(0);
				@$email = $result4->fetch_assoc()['email'];
					// echo "backer uname is " . $uname ."<br>";
					// echo "backer email is " . $email ."<br>";
					//so you don't send yourself an email
				if(getUserID($uid) != $id){
					//populate table
					$userId = getUserID($uid);
					$emailDetails .= $userId;
					//$emailDetails[$uname]= $email;
				}

			}


				
				echo "<form method = 'post' action = sentmessage.php>";
				echo "<input type = 'hidden' name = 'pet_id' id = 'pet_id' value = '$id'>";
				echo "<input type = 'hidden' name = 'emailDetails' id = 'emailDetails' value = '$emailDetails'>";
				echo "<input type = 'submit' name = 'message' id = 'message' value = 'Message' >";
				echo "</form>";
		}

	}
}

?>


<!DOCTYPE html5>
<html>
<head>
	<title>Backers</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
	
	<?php
	if(isset($id)) {
		$result = queryMysql("SELECT * FROM backed WHERE pet_id = '$id' ");
		$rows = $result->num_rows;
		echo "<table>";
		for($j = 0; $j<$rows; $j++) {
			$result->data_seek($j);
			echo "<tr><td>".$result->fetch_assoc()['backer_id']."</td>";
			$result->data_seek($j);
			echo "<td>".@$result->fetch_assoc()['email']."</td></tr>";
		}
		echo "</table>";
	}
	?>

</body>
</html>
