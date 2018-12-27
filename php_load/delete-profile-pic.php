<?php 
  include("../inc/db.inc.php");
  include("../inc/session.inc.php");
  $username = $_POST['username'];
  mysqli_query($conn,"UPDATE users SET profile_pic='' WHERE username='$user' AND removed='no'");
  
  $sql= mysqli_query($conn,"SELECT profile_pic FROM users WHERE username='$user' AND removed='no'");
  $row = mysqli_fetch_assoc($sql);
  $profile_pic=$row['profile_pic'];
  if ($profile_pic==''){
	 echo "img/user.png";
  }else{
	 echo "img/profile_pic/$profile_pic";
 }

  ?>