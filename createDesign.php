<?php

session_start();

if(!isset($_SESSION['loggedin'])){
		$_SESSION['loggedin'] = "false";
		header('location: index.php');
}else{
		if(!$_SESSION['loggedin']){
		header('location: index.php');
	}
}

if(isset($_POST) && strlen(htmlspecialchars($_POST['des_title']))){

	include('connect.php');

	$title = trim(htmlspecialchars(($_POST['des_title'])));
	$username = $_SESSION['username'];
	$doc = date('y-m-d'); //date of creation

	$title = str_replace(' ', '_', $title);

	$did = md5($username.$title); //Design ID

	$q_chk_des_exists = "SELECT * FROM `desindex` WHERE `title` = '" . $title . "' AND `username` = '" . $username . "'";

	if($q_chk_des_exists_exec = mysqli_num_rows(mysqli_query($conn, $q_chk_des_exists))){

		$_SESSION['nd_fb'] = "Design title already exists.";
		header('location: profile.php');
	}
	else{
		$q_create_des = "INSERT INTO `desindex` VALUES('', '" . $did . "', '" . $username . "', '" . $title . "', '" . $doc . "', '0')";

		if($q_create_des_exec = mysqli_query($conn, $q_create_des)){
			$_SESSION['did'] = $did;
			header('location: design.php?did='.$did);
		}
		else{
			echo "Error: Design create";
		}
	}
}
else{
	header('location: profile.php');
}

?>