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
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styling.css">
	<title> Welcome!</title>
</head>
<?php
	require_once "functions.php";
	if(isset($_POST['support'])){
		$petid = $_POST['add1'];
		increaseBackers($username, $petid, 1);
	} 
	if(isset($_POST['get_involved'])){
		$petid = $_POST['add3'];
		increaseBackers($username, $petid, 3);
	}
?>
<body>
	<a href = 'profile.php'><?php echo $username ?></a>
	&nbsp &nbsp
	<!-- <a href = 'messages.php'>Messages</a> -->
	&nbsp &nbsp
	<div id="topcorner"><a href="homePage.php">Logout</a></div>
	<center><h1>New Petitions</h1></center>
	<center><table>
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
	</table></center>

	<?php
		$result = getPetitions();
		$rows = $result->num_rows;
		echo "<center><table id = 'main'><thead></thead>";
			//echo "<th>Customer ID</th><th>Name</th><th>Address</th><th>Cookie Type></th><th>Quantity</th>";
			//echo "<th>Customer ID</th><th>Name</th><th>Address</th>";
			echo "<th>User ID</th><th>Title</th><th>Petition Text</th><th>Backers</th><th>Petition ID</th>";
		for($j=0;$j<$rows; $j++) {
			$result->data_seek($j);
			echo "<tr><td> ".$result->fetch_assoc()['user_id']."</td>";
			$result->data_seek($j);
			echo "<td> ".$result->fetch_assoc()['title']."</td>";
			$result->data_seek($j);
			echo "<td> ".$result->fetch_assoc()['body']."</td>";
			$result->data_seek($j);
			$pet_id = $result->fetch_assoc()['pet_id'];
			$result->data_seek($j);
			echo "<td><a href = backers.php?id=".$pet_id.">".$result->fetch_assoc()['num_backers']."</a></td>";
			echo "<td> ".$pet_id."</td>";
			
			echo "<td><form action='feed.php' method = 'post'><input type = 'hidden' value = '$pet_id' name = 'add1'><input type='submit' value = 'Support' name = 'support'></form></td>";
			echo "<td><form action='feed.php' method = 'post'><input type = 'hidden' value = '$pet_id' name = 'add3'><input type='submit' value = 'Get Involved' name = 'get_involved'></form></td>";
			}
		echo"</table></center>";
	?>
</body>
</html>
