<?php 
  include("../inc/db.inc.php");
  include("../inc/session.inc.php");
  $username = $_POST['username'];  
  
  #get user information from database
  $sql = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND removed='no'");
  $num_rows = mysqli_num_rows($sql);
  if($num_rows == 1){
	  $row = mysqli_fetch_assoc($sql);
	  		  
	  $id = $row['id'];
	  $fullname = $row['fullname'];
	  $phone = $row['phone'];
	  $email = $row['email'];
	  $location = $row['location'];
	  $profile_pic = $row['profile_pic'];
	  $cover_photo = $row['cover_photo'];
	  $date_of_birth = $row['date_of_birth'];
	  $bio = $row['bio'];
		
	  #get age of user
	  $from = new DateTime($date_of_birth);
	  $to   = new DateTime('today');
	  $age = $from->diff($to)->y;
  }
  #check for privacy settings to determine content to show
  $privacy_sql = mysqli_query($conn,"SELECT * FROM privacy_settings WHERE username='$username'");
  $privacy_num_rows = mysqli_num_rows($privacy_sql);
  if($privacy_num_rows == 1){
	  $privacy_row = mysqli_fetch_assoc($privacy_sql);
		  
	  $phone_privacy = $privacy_row['phone'];
	  $email_privacy = $privacy_row['email'];
	  $age_privacy = $privacy_row['age'];
	  $location_privacy = $privacy_row['location'];
  }



  echo"
	<div class='cover-photo-section'>
	  
	  <div class='cover-photo-box'>
	  
		<img class='cover-photo' src=' ";
		if($cover_photo==''){
		echo"
		img/cover-photo.jpg
		";
		}else{
		echo"img/cover_photo/$cover_photo";
			}
		echo" '> ";
		//show the edit button if the profile owner is logged in
		//and viewing his own profile
		switch(isset($user)){
		case true:
		if($user==$username){
		  echo"
		  <div class='dropdown'>
			<a rel='tooltip' alt='Edit Cover Photo' title='Edit Cover Photo' class='btn dropdown-toggle' id='edit-cover-photo' data-toggle='dropdown' data-placement='bottom' aria-haspopup='true'><span class='ion-android-more-vertical'></span></a>
			<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
			  <li><a class='remove-cover-photo'>Delete Cover Photo</a></li>
			  <li><a class='visible-sm visible-xs' href='change-profile-photo'>Change Cover Photo</a></li>
			  <li><a class='modal-action hidden-sm hidden-xs' id='upload-cover-photo' data-toggle='modal' data-target='#modal'>Change Cover Photo</a></li>
			  <li><a class=''>Cancel</a></li>
			</ul>
		  </div>";
			}
		break;
	   }
  
	  echo"
	  </div> <!--end cover-photo-box-->

	
	  <div class='image'>
		<div class='shady-bg'></div>
		<div class='container'>
		  <img rel='tooltip' title='$fullname' data-placement='bottom' src=' ";
		  if($profile_pic==''){
		  echo"
		  img/user.png
		  ";
		  }else{
		  echo"img/profile_pic/$profile_pic";
			  }
		  
		  echo" ' class='profile-pic'>";
		  //show the edit button if the profile owner is logged in
		  //and viewing his own profile
		  switch(isset($user)){
		  case true:
		  if($user==$username){
			echo"
			<a class='edit-profile-photo visible-sm visible-xs' href='change-profile-photo'><img src='img/camera.png'></a>
			<a class='edit-profile-photo hidden-sm hidden-xs' id='edit-profile-photo'><img src='img/camera.png'></a>
			<ul class='edit-profile-photo-menu hidden'>
			  <li><a class='remove-profile-pic'>Delete Photo</a></li>
			  <li><a class='dropdown-item modal-action' id='upload-profile-pic' data-toggle='modal' data-target='#modal'>Change Photo</a></li>
			  <li><a class='cancel-edit-profile-photo'>Cancel</a></li>
			</ul>";
			  }
		  break;
		 }
	
		echo"
		</div><!--end container-->
	  </div><!--end image-->	  
	</div><!--cover-photo-section-->";
?>