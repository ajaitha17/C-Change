<?php                                           // functions.php
  require "login.php";
  @$connection = new mysqli($hn, $un, $pw, $db);
  if ($connection->connect_error)
    die($connection->connect_error);

  function findUser($username, $password){
    $result = queryMysql("SELECT * FROM user WHERE username='$username' AND password='$password'");
    return $result;
  }

  // function insertUser($name, $email, $username, $pass1, $class, $dorm, $pass2){
//     if($pass1 == $pass2) {
//     	if(checkEmail($email) && checkUsername($username)) {
//     		$query = "INSERT INTO user (NULL, $name, $email, $username, $password, $class, $dorm)";
//     		$result = $conenction->query($query);
//     		if(!$result) {
//     			echo "User insert error";
//     		}
//     	}
//     }
//   }
  
  function checkEmail($email) {
  	return true;
  }
  
  function checkUsername($username) {
  	$username = sanitizeString($username);
  	echo $username."<br>";
  	$connection = new mysqli("localhost", "root", "", "petition");
  	$query = "SELECT * FROM user WHERE username = '$username'";
  	$result = $connection->query($query);
  	//print_r($result);
  	// if(!$result) {
//   		echo "checkusername select error";
//   		return false;
//   	}
  	//else {
	  	
	  	if($result) {
	  		echo "Username exists<br>";
	  		echo "Please pick another username<br>";
	  		echo "<a href='homePage.php>Home</a>";
	  		return false;
	  	}
	  	else {
	  		return true;
	  	}
	//}
  }
  
  function displayAll($result){
     if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>name</th>";
                echo "<th>email</th>";
                echo "<th>username</th>";
                echo "<th>password</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
  }

  function createTable($name, $query) {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query) {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }

  function destroySession() {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var) {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

  function showProfile($user) {
    if (file_exists("$user.jpg")) {
      echo "<img src='$user.jpg'><br>";
    }
    
    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
  }
  
?>
