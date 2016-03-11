<?php

session_start();

if(!isset($_SESSION['loggedin'])){
		$_SESSION['loggedin'] = "false";
		header('location: index.php');
}else{
		if($_SESSION['loggedin']){
		$_SESSION['loggedin'] = "false";
		session_destroy();
		header('location: index.php');
	}
}

?>