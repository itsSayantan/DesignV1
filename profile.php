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

<!DOCTYPE html>
<html lang = "en-US">
<head>
	<meta charset = "utf-8">
	<title><?php echo $uname . " - Design"; ?></title>
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link rel="stylesheet" type="text/css" href="top_banner.css">
</head>
<body>
	<?php include('top_banner.php'); ?>
	<div class = "main_sec" id = "main_sec">
		<div class = "new_design" id = "new_design">
			<div class = "nd_title" id = "nd_title">Create New Design</div>
			<div class = "nd_body" id = "nd_body">
				<form class = "create_design_form" id = "create_design_form" method = "post" action = "createDesign.php">
					<input type = "text" class = "des_title" id = "des_title" name = "des_title" placeholder = "Design Title">
					<input type = "submit" class = "des_create_submit" id = "des_create_submit" name = "des_create_submit" value = "Create">
				</form>
			</div>
		</div>
		<div class = "nd_feedback"><?php echo $_SESSION['nd_fb']; ?></div>
		<div class = "des_list_wrapper" id = "des_list_wrapper">
			<div class = "des_list_title" id = "des_list_title">Your Designs</div>
			<div class = "des_list_body" id = "des_list_body">

			<?php

				include('connect.php');

				$text = '';

				$q_chk_des = "SELECT * FROM `desindex`";
				
				if($q_chk_des_exec = mysqli_query($conn, $q_chk_des)){
					if($nq1 = mysqli_num_rows($q_chk_des_exec)){

						for ($i=1; $i <= $nq1; $i++) {
							$q_get_each = "SELECT * FROM `desindex` WHERE `id` = '" . $i . "' AND `username` = '" . $uname . "'";

							if($q_get_each_exec = mysqli_query($conn, $q_get_each)){
								if($nq2 = mysqli_num_rows($q_get_each_exec)){

									$res_each = mysqli_fetch_assoc($q_get_each_exec);

									$text.= '<div class = "each_design" id = "each_design"><div class = "each_des_title" id = "each_des_title"><a href="goto.php?did=' . $res_each["did"] . '">' . $res_each["title"] . '</a></div><div class = "each_des_date" id = "each_des_date">' . $res_each["doc"] . '</div></div>';
								}
								else{
									continue;
								}
							}
						}

						echo $text;
					}
					else{
						echo '<div class = "no_des" id = "no_des">There are no designs to show...</div>';
					}
				}

			?>
				
			</div>
		</div>
	</div>
</body>
</html>
