<?php
include("../inc/db.inc.php");
$fullname=strip_tags($_POST['fullname']);
$username=strip_tags($_POST['username']);
$reg_email=strip_tags($_POST['reg_email']);
$pword=strip_tags($_POST['pword']);
$submit=strip_tags($_POST['submit']);
$date= date('Y-m-d');
$time= date('H:i:s');
 
if(isset($submit)){
 //check if user already exists
 $u_check = mysqli_query($conn,"SELECT username FROM users WHERE username='$username' AND removed='no'");
 //check the amount of rows where usermane = $un
 $check = mysqli_num_rows($u_check);
 if($check==0){
	 //check whether email already exists
     $e_check = mysqli_query($conn,"SELECT email FROM users WHERE email='$reg_email'");
     //count the number of rows
     $e_row = mysqli_num_rows($e_check);
	 if($e_row==0){
		 $pword = md5($pword);
		 
		 $query_user = mysqli_query($conn,"INSERT INTO users VALUES ('','$fullname','$username','$reg_email','','$pword','','','','','','','$date','$time','','no')");
		 
		 $privacy = mysqli_query($conn,"INSERT INTO privacy_settings VALUES ('','$username','public','public','public','public','$date','$time')");
		 $notification = mysqli_query($conn,"INSERT INTO notification_settings VALUES ('','$username','yes','yes','yes','yes','$date','$time')");
		 $billing = mysqli_query($conn,"INSERT INTO billing_settings VALUES ('','$username','','','','','$date','$time')");
		 
		 echo"<p class='text-success'><span class='ion-android-checkmark-circle'></span> Your registration was successful. Click <a href='login.php'>here</a> to login!</p> ";
		 }else{
			 echo"<p class='text-danger'><span class='ion-alert'></span> This email is already in use!</p>";
			 }
	 
	 }else{
	echo"<p class='text-danger'><span class='ion-alert'></span> This username already exists!</p>";
		 }
	 
}//end submit

?>