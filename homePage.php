<?php
	@session_destroy();
	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<head>
<title> PetitionApp </title>
<style>
body#bg{
  opacity: .7;
  background: url('images/kravis.png') no-repeat 50% 50% fixed; 
  background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  -webkit-background-size: cover;
}
#loginSection {
    background-color:green;
    color:white;
    text-align:center;
    float:right;
}
#signupSection {
	display: table;
	margin-right:auto;
	margin-left:auto;
    background-color:green;
    color:white;
    text-align:center;
}
#title {
	background-color:green;
    color:white;
    text-align:center;
    float:center;
}
</style>
</head>
<body id="bg">
<div id="title">
	<h1> C.change </h1>
</div>
<div id="loginSection">
	<form method="post" action="welcome.php">
		<table>
		<tr>
			<td><input type="text" name="username" id="username" placeholder="Username"></td>
			<td><input type="password" name="password" id="password" placeholder="******"></td>
			<td><input type="submit" name="submit" value="Login"></td>
		</tr>
		</table>	
	</form>
</div>
<br>
<br>
<div id="signupSection" align="center">
	<form method="post" action="signup.php">
		<table>
		<tr>
			<td><input type="text" name="name" id="name" placeholder="Name"></td>
		</tr>
		<tr>
			<td><input type="text" name="email" id="email" placeholder=".edu email"></td>
		</tr>
		<tr>
			<td><input type="text" name="usrname" id="usrname" placeholder="Username"></td>
		</tr>
		<tr>
			<td><select name="class" placeholder="Class">
				<option value="2018"> 2018 </option>
				<option value="2017"> 2017 </option>
				<option value="2016"> 2016 </option>
				<option value="2015"> 2015 </option>
			</select></td>
		</tr>
		<tr>
			<td><select name="dorm" placeholder="Dorm">
				<option value="appleby"> Appleby </option>
				<option value="auen"> Auen Hall </option>
				<option value="beckett"> Beckett Hall </option>
				<option value="benson"> Benson Hall </option>
				<option value="berger"> Berger Hall </option>
				<option value="boswell"> Boswell Hall </option>
				<option value="claremont"> Claremont Hall </option>
				<option value="fawcett"> Fawcett Hall </option>
				<option value="green"> Green Hall </option>
				<option value="marks"> Marks Hall </option>
				<option value="phillips"> Phillips Hall </option>
				<option value="stark"> Stark Hall </option>
				<option value="wohlford"> Wohlford Hall </option>
				<option value="appleby"> Off-Campus </option>
			</select></td>
		</tr>
		<tr>
			<td><input type="password" name="pass1" placeholder="Password"></td>
		</tr>
		<tr>
			<td><input type="password" name="pass2" placeholder="Confirm Password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="create" value="I'm Ready"></td>
		</tr>	
		</table>
	</form>
</div>
</body>
	
