<?php 
  include("../inc/db.inc.php");
  include("../inc/session.inc.php");
  $username = $_POST['username'];
  mysql_query("UPDATE users SET cover_photo='' WHERE username='$user' AND removed='no'");
  
  $sql= mysql_query("SELECT cover_photo FROM users WHERE username='$user' AND removed='no'");
  $row = mysql_fetch_assoc($sql);
  $cover_photo = $row['cover_photo'];
  if ($cover_photo==''){
	 echo "img/cover-photo.jpg";
  }else{
	 echo "img/cover_photo/$cover_photo";
 }

  ?>