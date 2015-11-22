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
			echo "<a href = 'homepage.php'>Logout</a> &nbsp &nbsp";
			echo "<a href = 'feed.php'>Feed</a><center>";
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
	<title>Profile</title>
	<link rel = "stylesheet" type = "text/css" href = "styling.css">
</head>
<body>
	<h1>Profile</h1>
	<?php
		$conn = new mysqli("localhost","root", "");
		//if(isset($_SESSION['un'])) {
			// $username = $_SESSION['un'];
			$query = "SELECT * FROM user WHERE username = '$username'";
			$result = queryMysql($query);
			if(!$result) {
				echo "Username doesn't exist";
				echo "Please <a href='homepage.php>Login</a> to continue";
				die();
			}
			$result->data_seek(0);
			echo "<h2>Username:</h2>".$result->fetch_assoc()['username']."<br>";
			$result->data_seek(0);
			echo "<h3>Name:</h3>".$result->fetch_assoc()['name']."<br>";
			$result->data_seek(0);
			echo "<h4>Email:</h4>".$result->fetch_assoc()['email']."<br>";
			$result->data_seek(0);
			echo "<h4>Class:</h4>".$result->fetch_assoc()['class']."<br>";
			$result->data_seek(0);
			echo "<h4>Dorm:</h4>".$result->fetch_assoc()['dorm']."<br>";
			$result->data_seek(0);
			$user_id = $result->fetch_assoc()['user_id'];
			$query = "SELECT * FROM petitions WHERE user_id = '$user_id'";
			$result = queryMysql($query);
			$rows = $result->num_rows;
			echo "<table id = 'main'><thead><caption><b>My Petitions</br></caption></thead>";
			//echo "<th>Title</th><th>Body</th><th>Number of backers</th><th>Time Submitted</th>";
			echo "<th>Title</th><th>Body</th><th>Number of backers</th>";
			for($j=0;$j<$rows; $j++) {
				$result->data_seek($j);
				$pet_id = $result->fetch_assoc()['pet_id'];
				$result->data_seek($j);
				echo "<tr><td>".$result->fetch_assoc()['title']."</td>";
				$result->data_seek($j);
				echo "<td>".$result->fetch_assoc()['body']."</td>";
				$result->data_seek($j);
				echo "<td><a href = backers.php?id=".$pet_id.">".$result->fetch_assoc()['num_backers']."</a></td>";
				// $result->data_seek($j);
				// echo "<td>".$result->fetch_assoc()['time_submitted']."</td></tr>";
			}
			echo "</table></center>"
		//}

	?>
</body>

</html>
