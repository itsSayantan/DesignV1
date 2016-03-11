<?php

session_start();

if(isset($_SESSION['did'])){

	$filename = $_SESSION['did'].'.html';

	if(isset($_POST['content'])){
		$myfile = fopen($filename, "w") or die("Unable to open file");

		if(fwrite($myfile, $_POST['content'])){

			include('connect.php');

			fclose($myfile);

			$q = 'UPDATE `desindex` SET `isexist`="1" WHERE `did`="'.$_SESSION['did'] . '"';

			if($q_exec = mysqli_query($conn,$q)){
                                $text = "<span style='font-size: 14px;'>File successfully created. Click on the download button to download it.</span> <span style = 'cursor: pointer;position: absolute;right:10px' onclick = 'redir();'>&times;</span>";
				echo $text;
			}
			else{
				echo '<span style="font-size: 14px;">File could not be created</span> <span style = "cursor: pointer;position: absolute;right:10px" onclick = "closeOverlay();">&times;</span>';
			}
		}
		else{
			echo 'File could not be created.';
		}
	}
	else{
		echo "post not set";
	}
}
else{
	echo "session not set";
}

?>	
