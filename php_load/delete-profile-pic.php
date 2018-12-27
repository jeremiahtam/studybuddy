<?php 
  include("../inc/db.inc.php");
  include("../inc/session.inc.php");
  $username = $_POST['username'];
  mysql_query("UPDATE users SET profile_pic='' WHERE username='$user' AND removed='no'");
  
  $sql= mysql_query("SELECT profile_pic FROM users WHERE username='$user' AND removed='no'");
  $row = mysql_fetch_assoc($sql);
  $profile_pic=$row['profile_pic'];
  if ($profile_pic==''){
	 echo "img/user.png";
  }else{
	 echo "img/profile_pic/$profile_pic";
 }

  ?>