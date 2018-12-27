<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");

	//if ((@$_FILES["image"]["type"]=="image/jpeg") || (@$_FILES["image"]["type"]=="image/png") || (@$_FILES["image"]["type"]=="image/jpg")){   

		$data = $_POST['image'];
		
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		
		$data = base64_decode($data);
		$chars= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$rand_dir_name= substr(str_shuffle($chars), 0, 15);
		$imageName = $user.'-'.$rand_dir_name.'.jpg';
		file_put_contents('../img/profile_pic/'.$imageName, $data);
		
		
		if(isset($user)){
			mysqli_query($conn,"UPDATE users SET profile_pic='$imageName' WHERE username='$user' AND removed='no'");
		
			//echo '<div class="positive-alert text-success bg-success">Successfully Uploaded</div>';
			$sql= mysqli_query($conn,"SELECT profile_pic FROM users WHERE username='$user' AND removed='no'");
			$row = mysqli_fetch_assoc($sql);
			$profile_pic=$row['profile_pic'];
			$profile_pic = $profile_pic;
			echo "img/profile_pic/$profile_pic";
		}
	//}
?>