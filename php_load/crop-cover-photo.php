<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");


	//if ((@$_FILES["image"]["type"]=="image/jpeg") || (@$_FILES["image"]["type"]=="image/png") || (@$_FILES["image"]["type"]=="image/jpg")){   

		$data = $_POST['image'];
		
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		
		$data = base64_decode($data);
		$imageName = $user.'-'.time().'.jpg';
		file_put_contents('../img/cover_photo/'.$imageName, $data);
		
		
		if(isset($user)){
			mysql_query("UPDATE users SET cover_photo='$imageName' WHERE username='$user' AND removed='no'");
		
			$sql = mysql_query("SELECT cover_photo FROM users WHERE username='$user' AND removed='no'");
			$row = mysql_fetch_assoc($sql);
			$cover_photo = $row['cover_photo'];
			$cover_photo = $cover_photo;
			echo "img/cover_photo/$cover_photo";
		}
	//}
?>