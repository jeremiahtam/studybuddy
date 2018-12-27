<?php
include("../inc/db.inc.php");
$password=$_POST['password'];
$re_password=$_POST['re_password'];
$reset_username=$_POST['username'];
$reset=$_POST['reset'];
if(isset($reset)){
	$password = md5($password);
	mysqli_query($conn,"UPDATE users SET password='$password' WHERE username='$reset_username'");
	mysqli_query($conn,"UPDATE users SET passwordreset='' WHERE username='$reset_username'");
	echo"<p class='text-success'><span class='ion-android-checkmark-circle'></span> Your Password has been changed successfully!</p>";
	}
?>