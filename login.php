<?php

session_start();

if(!isset($_SESSION['loggedin'])){
		$_SESSION['loggedin'] = "false";
		header('location: index.php');
}else{
		if($_SESSION['loggedin']){
		header('location: profile.php');
	}
}

if(!isset($_SESSION['feedback_login'])){
	$_SESSION['feedback_login'] = "Something went wrong";
}

if(isset($_POST)){
	
	$uname = trim(htmlspecialchars($_POST['uname']));
	$pass = trim(htmlspecialchars($_POST['pass']));

	if(strlen($uname) && strlen($pass)){
		include('connect.php');

		$q_chk = "SELECT * FROM `users` WHERE `uname` = '" . $uname . "'";

		if($q_chk_exec = mysqli_query($conn, $q_chk)){
			if(mysqli_num_rows($q_chk_exec)){

				$row = mysqli_fetch_assoc($q_chk_exec);

				if(md5($pass) == $row['pass']){
					$_SESSION['username'] = $row['uname'];
					$_SESSION['loggedin'] = "true";

					header('location: profile.php');
				}
				else{
					$_SESSION['feedback_login'] = "Incorrect Password!";
					header('location: index.php');
				}
			}
			else{
				$_SESSION['feedback_login'] = "Username does not exist.";
				header('location: index.php');
			}
		}
		else{
			$_SESSION['feedback_login'] = "Error: l1";
			header('location: index.php');
		}

	}
	else{
		$_SESSION['feedback_login'] = "All fields are mandatory.";
		header('location: index.php');
	}


	/*$_SESSION['feedback_login'] = "Post is set";*/

}

?>