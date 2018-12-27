<?php
include("../inc/db.inc.php");
$email=strip_tags($_POST['email']);
$send=strip_tags($_POST['send']);
$date= date('Y-m-d');
$time= date('H:i:s');
 
if(isset($send)){
 //check if emaily exists
 $e_check = mysql_query("SELECT * FROM users WHERE email='$email' AND removed='no'");
 $e_row = mysql_num_rows($e_check);
 //check if the user email exists in the database
 
 if ($e_row == 1){
	 
	 while($row=mysql_fetch_assoc($e_check)){
	 $db_email= $row['email'];
	 $db_username= $row['username'];
	 }
	 
	 $chars= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	 $ret_code= substr(str_shuffle($chars), 0, 7);
	 
	 $to = $db_email;
	 $subject = "Password Reset";
	 $body = "
	 This is an automated mail. Do not reply this mail!
	 
	 Click on the link below or paste it onto a browser.
	 localhost/studybuddy/reset-password.php?ret_code=$ret_code&username=$db_username
	 ";
	 
	 mysql_query("UPDATE users SET passwordreset='$ret_code' WHERE email='$email'");
	 
	 mail($to,$subject,$body);
	 
	 echo"<p class='text-success'><span class='ion-android-checkmark-circle'></span> A password reset link has been sent to your email address!</p>";
	 
	 }else{
	 echo"<p class='text-danger'><span class='ion-alert'></span> This email does not exist!</p>";
		 }
	 
}

?>