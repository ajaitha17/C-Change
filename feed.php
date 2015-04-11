<?php
	require_once "functions.php";
	$topcorner="";
	@session_start();
	if(isset($_SESSION['un']) && isset($_SESSION['pw'])) {
		$username = $_SESSION['un'];
		$password = $_SESSION['pw'];
		$result = queryMysql("SELECT * FROM user WHERE username='$username' AND password = '$password'");
		if($result->num_rows == 0 ) {
			echo "Please <a href = 'homePage.php'>Login</a> to continue";
			die();
		}
	}
	else {
		echo "Please <a href = 'homePage.php'>Login</a> to continue";
		die();
	}
?>
<!DOCTYPE html>
<style type="text/css">
.topcorner{
	position: absolute;
	top:0;
	float: left;
}
</style>
<head>
<title> Welcome!</title>
</head>
<?php
	require_once "functions.php";
	if(isset($_POST['support'])){
		$petid = $_POST['add1'];
		increaseBackers($petid,1);
	} 
	if(isset($_POST['get_involved'])){
		$petid = $_POST['add3'];
		increaseBackers($petid,3);
	}
?>
<body>
<div id="topcorner"><a href="homePage.php">Logout</a></div>
<a href = 'profile.php'>Profile</a>
<h1>Feed Page</h1>
	<table>
		<tr>
			<form method="post" action="feed.php">
			<td><input type="submit" name="submit" value="New"></td>
			</form>
			<form method="post" action="feedPopular.php">
			<td><input type="submit" name="submit" value="Popular"></td>
			</form>
			<form method="post" action="newPetition.php">
			<td><input type="submit" name="submit" value="Write"></td>
			</form>
		</tr>
	</table>
	
	<?php
		
		$result = getPetitions();
		$rows = $result->num_rows;
		echo "<table><thead><caption><b>New Petitions</br></caption></thead>";
			//echo "<th>Customer ID</th><th>Name</th><th>Address</th><th>Cookie Type></th><th>Quantity</th>";
			//echo "<th>Customer ID</th><th>Name</th><th>Address</th>";
			echo "<th>User_id</th><th>Title</th><th>Petition Text</th><th>Backers</th><th>Pet_Id</th>";
		for($j=0;$j<$rows; $j++) {
			$result->data_seek($j);
			echo "<tr><td> ".$result->fetch_assoc()['user_id']."</td>";
			$result->data_seek($j);
			echo "<td> ".$result->fetch_assoc()['title']."</td>";
			$result->data_seek($j);
			echo "<td> ".$result->fetch_assoc()['body']."</td>";
			$result->data_seek($j);
			echo "<td> ".$result->fetch_assoc()['num_backers']."</td>";
			$result->data_seek($j);
			$pet_id = $result->fetch_assoc()['pet_id'];
			echo "<td> ".$pet_id."</td>";
			
			echo "<td><form action='feed.php' method = 'post'><input type = 'hidden' value = '$pet_id' name = 'add1'><input type='submit' value = 'support' name = 'support'></form></td>";
			echo "<td><form action='feed.php' method = 'post'><input type = 'hidden' value = '$pet_id' name = 'add3'><input type='submit' value = 'get_involved' name = 'get_involved'></form></td>";
			}
		echo"</table>";
	?>
</body>
