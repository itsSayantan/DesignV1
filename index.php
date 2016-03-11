<?php
	session_start();

	if(!isset($_SESSION['loggedin'])){
		$_SESSION['loggedin'] = false;
	}else{
		if($_SESSION['loggedin']){
			header('location: profile.php');
		}
	}

?>

<!DOCTYPE html>
<html lang = "en-US">
<head>
	<meta charset = "utf-8">
	<title>Design - Home</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div class = "left_sec" id = "left_sec">
		<h2>Design</h2>
		<p>Create your own design, its simple...</p>
		<a class = "about_home" id = "about_home" href="about.php">About</a>
	</div>
	<div class = "right_sec" id = "right_sec">
		<div class = "login_wrapper">
			<form class = "login_form" id = "login_form" method = "post" action = "login.php">
				<input class = "uname" id = "uname" name = "uname" type = "text" placeholder = "Username" autofocus = autofocus>
				<input class = "pass" id = "pass" name = "pass" type = "password" placeholder = "Password">
				<input class = "login_submit" id = "login_submit" name = "login_submit" type = "submit" value = "Submit">
				<input class = "create_button" id = "create_button" name = "create_button" type = "button" value = "Create" onclick = "window.location = 'register.php';">
			</form>
		</div>
		<div class = "feedback_login" id = "feedback_login">
			<?php
				if(!isset($_SESSION['feedback_login'])){
					$_SESSION['feedback_login'] = "All fields are mandatory.";
				}

				echo $_SESSION['feedback_login'];
			?>
		</div>
	</div>
</body>
</html>
