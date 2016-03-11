<?php

session_start();

if(!isset($_GET['did'])){
	header('profile.php');
}

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
	$did = $_GET['did'];

	include('connect.php');

	$q_get_des_title = "SELECT `title` FROM desindex WHERE `did` = '" . $_GET['did'] . "'";

	if($q_get_des_title_exec = mysqli_query($conn, $q_get_des_title)){
		if(mysqli_num_rows($q_get_des_title_exec)){
			$res = mysqli_fetch_assoc($q_get_des_title_exec);
			$d_title = $res['title'];
		}
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
	<title>Create Design</title>
	<link rel="stylesheet" type="text/css" href="design.css">
	<link rel="stylesheet" type="text/css" href="top_banner.css">
	<script type="text/javascript" src = "jquery.min.js"></script>
	<script type="text/javascript" src = "app1.js"></script>
</head>
<body>
	<?php include('top_banner.php'); ?>
	<div class = "ms" id = "ms">
		<div class = "disp_sec" id = "disp_sec">
			<div class = "title_disp" id = "title_disp"><?php echo $d_title; ?></div>
			<div class = "des_canvas" id = "des_canvas">
				<?php

				$targetfile = '#';
				$q_chk_file_exists = "SELECT * FROM `desindex` WHERE `did` = '" . $did . "'";

				if($q_chk_file_exists_exec = mysqli_query($conn, $q_chk_file_exists)){

					if(mysqli_num_rows($q_chk_file_exists_exec)){
						$res1 = mysqli_fetch_assoc($q_chk_file_exists_exec);
						$d_isexist = $res1['isexist'];

						if($d_isexist == '1'){
							$targetfile = $did . '.html';

							$default = fopen($targetfile, "r") or die("Unable to open file");

							if($text = fread($default,filesize($targetfile))){
								echo $text;

								fclose($default);
							}
							else{
								echo 'File cannot br read';
							}
						}
						else{
							echo 'File is not created at this moment';
						}
					}

					/**/
				}
				else{
					echo 'Error: q_chk_file_exists';
				}

				?>
			</div>
		</div>
		<div class = "cont_sec" id = "cont_sec">
			<div class = "hr_sec" id = "hr_sec">
				<div class = "hr_title" id = "hr_title">Elements heirarchy</div>
				<ul class = "hr" id = "hr">
				<li class = "hr_li" id = "body">Body</li>
				</ul>
			</div>
			<div class = "ele_sec"  id = "ele_sec">
				<div class = "ele_title" id = "ele_title">Elements</div>
				<ul class = "ele_list" id = "ele_list">
					<li class = "ele" id = "p">p</li>
					<li class = "ele" id = "h1">h1</li>
					<li class = "ele" id = "h2">h2</li>
					<li class = "ele" id = "h3">h3</li>
					<li class = "ele" id = "h4">h4</li>
					<li class = "ele" id = "div">div</li>
				</ul>
			</div>
			<div class = "low_sec" id = "low_sec">
				<a id = "dwld_link" target = "_blank" download href="<?php echo $targetfile; ?>"><button class = "download" id = "download">Download</button></a>
				<button class = "save" id = "save">Save</button>
			</div>
		</div>
	</div>
	<div class = "overlay" id = "overlay">
		<div class = "o_content" id = "o_content">Creating element: body</div>
	</div>
	<div class = "style_wrapper" id = "style_wrapper">
		<div class = "style" id = "style">
			<div class = "style_title" id = "style_title">Edit Style</div>
			<div class = "style_body" id = "style_body">
				<div class = "each_style" id = "text">
					<div class = "each_style_title">Text</div>
					<input type = "text" class = "each_style_input" id = "text_i" placeholder = "Type some text here">
				</div>
				<div class = "each_style" id = "position">
					<div class = "each_style_title">Position</div>
					<input type = "text" class = "each_style_input" id = "position_i" placeholder = "e.x: absolute">
				</div>
				<div class = "each_style" id = "top">
					<div class = "each_style_title">Top</div>
					<input type = "text" class = "each_style_input" id = "top_i" placeholder = "e.top: 10px">
				</div>
				<div class = "each_style" id = "left">
					<div class = "each_style_title">Left</div>
					<input type = "text" class = "each_style_input" id = "left_i" placeholder = "e.x: 10px">
				</div>
				<div class = "each_style" id = "width">
					<div class = "each_style_title">Width</div>
					<input type = "text" class = "each_style_input" id = "width_i" placeholder = "e.x: 10px">
				</div>
				<div class = "each_style" id = "height">
					<div class = "each_style_title">Height</div>
					<input type = "text" class = "each_style_input" id = "height_i" placeholder = "e.x: 10px">
				</div>
				<div class = "each_style" id = "title">
					<div class = "each_style_title">Title</div>
					<input type = "text" class = "each_style_input" id = "title_i" placeholder = "Type title to be displayed">
				</div>
				<div class = "each_style" id = "background">
					<div class = "each_style_title">Background</div>
					<input type = "text" class = "each_style_input" id = "background_i" placeholder = "e.x: #ffffff or rgba(255,255,255,0.5)">
				</div>
				<div class = "each_style" id = "color">
					<div class = "each_style_title">Color</div>
					<input type = "text" class = "each_style_input" id = "color_i" placeholder = "e.x: #ffffff or rgba(255,255,255,0.5)">
				</div>
				<div class = "each_style" id = "padding">
					<div class = "each_style_title">Padding</div>
					<input type = "text" class = "each_style_input" id = "padding_i" placeholder = "e.x: 10px,10px,0px,10px (top,right,bottom,left)">
				</div>
				<div class = "each_style" id = "margin">
					<div class = "each_style_title">Margin</div>
					<input type = "text" class = "each_style_input" id = "margin_i" placeholder = "e.x: 10px,10px,0px,10px (top,right,bottom,left)">
				</div>
				<div class = "each_style" id = "border_top">
					<div class = "each_style_title">Border Top</div>
					<input type = "text" class = "each_style_input" id = "border_top_i" placeholder = "e.x: 1px solid #ff00ff">
				</div>
				<div class = "each_style" id = "border_right">
					<div class = "each_style_title">Border Right</div>
					<input type = "text" class = "each_style_input" id = "border_right_i" placeholder = "e.x: 1px solid #ff00ff">
				</div>
				<div class = "each_style" id = "border_bottom">
					<div class = "each_style_title">Border Bottom</div>
					<input type = "text" class = "each_style_input" id = "border_bottom_i" placeholder = "e.x: 1px solid #ff00ff">
				</div>
				<div class = "each_style" id = "border_left">
					<div class = "each_style_title">Border Left</div>
					<input type = "text" class = "each_style_input" id = "border_left_i" placeholder = "e.x: 1px solid #ff00ff">
				</div>
				<div class = "each_style" id = "text_align">
					<div class = "each_style_title">Text Align</div>
					<input type = "text" class = "each_style_input" id = "text_align_i" placeholder = "e.x: center">
				</div>
				<div class = "each_style" id = "font_family">
					<div class = "each_style_title">Font Family</div>
					<input type = "text" class = "each_style_input" id = "font_family_i" placeholder = "e.x: Tahoma">
				</div>
				<div class = "each_style" id = "font_size">
					<div class = "each_style_title">Font Size</div>
					<input type = "text" class = "each_style_input" id = "font_size_i" placeholder = "e.x: 16px">
				</div>
				<div class = "each_style" id = "font_style">
					<div class = "each_style_title">Font Style</div>
					<input type = "text" class = "each_style_input" id = "font_style_i" placeholder = "e.x: italic">
				</div>
				<div class = "each_style" id = "font_weight">
					<div class = "each_style_title">Font Weight</div>
					<input type = "text" class = "each_style_input" id = "font_weight_i" placeholder = "e.x: bold">
				</div>
				<div class = "each_style" id = "cursor">
					<div class = "each_style_title">Cursor</div>
					<input type = "text" class = "each_style_input" id = "cursor_i" placeholder = "e.x: pointer">
				</div>
				<div class = "each_style" id = "text_decoration">
					<div class = "each_style_title">Text Decoration</div>
					<input type = "text" class = "each_style_input" id = "text_decoration_i" placeholder = "e.x: none">
				</div>
			</div>
			<div class = "style_low_sec" id = "style_low_sec">
				<button class = "edit_button" id = "edit_button">Edit</button>
			</div>
		</div>
	</div>
</body>
</html>
