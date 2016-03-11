<?php

session_start();

if(isset($_SESSION['loggedin'])){
	if(isset($_GET['did'])){
		if(!isset($_SESSION['did'])){
			echo 'ok';
			$_SESSION['did'] = $_GET['did'];
			header('location: design.php?did='.$_GET['did']);
		}
		else{
			header('location: design.php?did='.$_GET['did']);
		}
	}
	else{
		header('location: index.php');
	}
}
else{
	header('location: index.php');
}

?>