<?php

session_start();

if(!isset($_SESSION['loggedin'])){
	$_SESSION['loggedin'] = "false";
}
else{
		if($_SESSION['loggedin']){
		header('location: profile.php');
	}
}

$feedback_reg = "All fields are mandatory.";

if(isset($_POST['username']) || isset($_POST['pass']) || isset($_POST['rpass'])){
	$uname = trim(htmlspecialchars($_POST['username']));
	$pass = trim(htmlspecialchars($_POST['pass']));
	$rpass = trim(htmlspecialchars($_POST['rpass']));

	$wruname = 1;

	for ($i=0; $i <strlen($uname) ; $i++) { 
		if($uname[$i] == ' '){
			$wruname = 0;
		}
		else{
			$wruname = 1;
		}
	}

	if(strlen($uname) == 0 || strlen($pass) == 0 || strlen($rpass) == 0){
		$feedback_reg = "All fields are mandatory.";
	}
	else if(strlen($uname) > 15){
		$feedback_reg = "Username can be 15 characters max.";
	}
	else if(strlen($pass) <= 5 && strlen($pass) > 8){
		$feedback_reg = "Password should be 6 to 8 characters.";
	}
	else if(!$wruname){
		$feedback_reg = "Username cannot conatin spaces.";
	}
	else{
		include('connect.php');

		if($pass == $rpass){
			$pass = md5($pass);
			$rpass = md5($rpass);

			/*Check if the entered username exists */

			$q_chk_uname_exists = "SELECT * FROM `users` WHERE `uname` = '" . $uname . "'";

			if($q_exec = mysqli_query($conn, $q_chk_uname_exists)){
				
				if(mysqli_num_rows($q_exec)){
					$feedback_reg = "Username already taken";
				}
				else{

					$q_add_data = "INSERT INTO `users` VALUES('', '" . $uname . "', '" . $pass . "')";

					if($q_add_exec = mysqli_query($conn, $q_add_data)){
						$feedback_reg = "Account successfully created.";
					}
					else{
						$feedback_reg = "Something went wrong. Error: r2";
					}
				}
			}
			else{
				$feedback_reg = "Something went wrong. Error: r1";
			}
		}
		else{
			$feedback_reg = "Passwords don't match";
		}
	}
}

?>

<!DOCTYPE html>
<html lang = "en-US">
<head>
	<meta chatset = "utf-8">
	<title>Register - Design</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
	<div class = "register_wrapper" id = "register_wrapper">
		<form class = "register_form" class = "register_form" id = "register_form" method = "post" action = "register.php">
			<input type = "text" class = "username" id = "username" name = "username" placeholder = "Username">
			<input type = "password" class = "pass" id = "pass" name = "pass" placeholder = "Password">
			<input type = "password" class = "rpass" id = "rpass" name = "rpass" placeholder = "Repeat Password">
			<input type = "submit" value = "Register" class = "reg_sub" id = "reg_sub" name = "reg_sub">
			<input type = "button" value = "Home" class = "home" id = "home" onclick = "window.location = 'index.php';">
		</form>
	</div>
	<div class = "reg_feedback" id = "reg_feedback"><?php echo $feedback_reg; ?></div>
</body>
</html>
