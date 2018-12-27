<?php 
  include("../inc/db.inc.php");
  include("../inc/session.inc.php");
  $username = $_POST['username'];
  mysqli_query($conn,"UPDATE users SET cover_photo='' WHERE username='$user' AND removed='no'");
  
  $sql= mysqli_query($conn,"SELECT cover_photo FROM users WHERE username='$user' AND removed='no'");
  $row = mysqli_fetch_assoc($sql);
  $cover_photo = $row['cover_photo'];
  if ($cover_photo==''){
	 echo "img/cover-photo.jpg";
  }else{
	 echo "img/cover_photo/$cover_photo";
 }

  ?>