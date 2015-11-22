
<!DOCTYPE html5>
<html>
<head>
	<title>Sent</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
	<?php
	require_once "functions.php";
	@$emailDetails = $_POST['emailDetails'];
	$emailDetails = splitIdList($emailDetails);
	if(is_array($emailDetails)){
		$senderName = getUserName($_POST['pet_id']);
		$senderEmail = getUserEmail($_POST['pet_id']);
		foreach($emailDetails as $num => $id){
			$to = getUserEmail($id);
			$subject = 'Get involved!';
			$name = getUserName($id);

			$message = "
			<html>
			<head>
			<title>C.change Email</title>
			</head>
			<body>
			<h1>Dear " . $name ."</h1>
			<p> Thank you for for supporting
			my petition. If you would like
			to talk about the next steps, 
			contact me here:</p>
			<table>
			<tr>
			<th>" . $senderEmail ."</th>
			</tr>
			</table>
			<p> I look forward to talking with 
			you soon,</p>
			<br>
			" . $senderName ."
			<br>
			<br>
			<br>
			C.change Team
			</body>
			</html>
			";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: webmaster@example.com' . "\r\n";
			

			mail($to, $subject, $message, $headers); 
		}
	}
	else{
		echo "Not an array.";
	}

	echo "Please <a href = 'feed.php'>Click Messages</a> to continue";
	?>
	
	</body>
	</html>
