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
<style>
.bod{
	width:90px;
	height:390px;
	border:1px solid #999999;
	padding:5px;
}
</style>
<?php
	require_once "functions.php";
?>
<!DOCTYPE html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "styling.css">
	<title>New Petition</title>
</head>
<body>
	<a href = 'profile.php'><?php echo $username ?></a>
	&nbsp &nbsp
	<a href = 'messages.php'>Messages</a>
	&nbsp &nbsp
	<div id="topcorner"><a href="homePage.php">Logout</a></div>
	<center><h1>Write A New Petition</h1></center>
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
	?>
	<center><table>
		<center><tr>
			<form method="post" action="submitPetition.php">
			<td><input type="text" name="title" id="title" placeholder="Title" style = "width: 200px"></td>
		</tr></center>
		<tr>	
			<td><div id="bod"><input type="text" name="body" id="body" placeholder="Body" style = "width: 200px"></div></td>
		</tr>	
			<td><input type="submit" name="submit" value="Submit"></td>
			</form>
		
	</table></center>
</body>
