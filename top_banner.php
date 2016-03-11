<?php

if(!isset($_SESSION['loggedin'])){
	$_SESSION['loggedin'] = "false";
	header('location: index.php');
}else{
		if(!$_SESSION['loggedin']){
		header('location: index.php');
	}
}

if(isset($_SESSION['username'])){
	$uname = $_SESSION['username'];

	if(!isset($_SESSION['nd_fb'])){
		$_SESSION['nd_fb'] = "Choose a unique design title.";
	}
}
else{
	header('location: index.php');
}

?>

<div class = "top_banner" id = "top_banner">
	<div class = "name_sec" id = "name_sec"><a href="profile.php"><?php echo $uname; ?></a></div>
	<a class = "logout_sec" id = "logout_sec" href = "logout.php">Logout</a>
</div>