<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");

$settings_type = $_POST['settings_type'];


switch($settings_type){
	case 'update_personal_info':
	
		$fullname = htmlentities($_POST['fullname']);
		$location = htmlentities($_POST['location']);
		$phone_number = htmlentities($_POST['phone_number']);
		$gender = htmlentities($_POST['gender']);
		$bio = htmlentities($_POST['bio']);
		$date_of_birth = htmlentities($_POST['date_of_birth']);
		
		$sql= mysqli_query($conn,"UPDATE users SET fullname='$fullname',location='$location',phone='$phone_number',gender'$gender',bio='$bio',date_of_birth='$date_of_birth' WHERE username='$user' AND removed='no'");

		echo"<p class='alert-success'>Your personal details have been updated successfully!</p>";

	break;

	case 'change_password':
		 $old_password=$_POST['old_password'];
 		 $new_password=$_POST['new_password'];	
		 $repeat_new_password=$_POST['repeat_new_password'];
		 $md5_old_password = md5($old_password);
		 //check if old passwordd matches the one in database
		 $sql= mysqli_query($conn,"SELECT password FROM users WHERE username='$user' AND removed='no'");
		 $row = mysqli_fetch_assoc($sql);
		 //database password
		 $db_password = $row['password'];
		 if($md5_old_password==$db_password){
		  	$new_password=md5($new_password);
		    $sql2= mysqli_query($conn,"UPDATE users SET password='$new_password' WHERE username='$user' AND removed='no'");
			 echo "<p class='alert-success'>Your password has been changed successfully!</p>";
			 }else{
			 echo "<p class='alert-danger'>Your old password is incorrect!</p>";
			}
	break;
	
	case 'update_billing':
	
		$bank_name = htmlentities($_POST['bank_name']);
		$account_owner = htmlentities($_POST['account_owner']);
		$account_number = htmlentities($_POST['account_number']);
		$date= date('Y-m-d');
		$time= date('H:i:s');

		$chars= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$billing_code= substr(str_shuffle($chars), 0, 6);
 		$sql= mysqli_query($conn,"SELECT email FROM users WHERE username='$user' AND removed='no'");
 		$row = mysqli_fetch_assoc($sql);
		//database email
		$db_email = $row['email'];
		 
		$to = $db_email;
		$subject = "Confirm Bank Account Details";
		$body = "
		You have made changes to your bank account details!
		 
		The code below is your confirmation code. Kindly copy and paste it in the billing section of your settings page.
		Confirmation Code:  $billing_code
		";
		 
		mysqli_query($conn,"UPDATE billing_settings SET bank_name='$bank_name',account_owner='$account_owner',account_number='$account_number',billing_code='$billing_code',date='$date',time='$time' WHERE username='$user'");
		//send email for confirmation code 
		mail($to,$subject,$body);

	break;

	case 'update_billing_code':
	
		$billing_code = htmlentities($_POST['billing_code']);
		$date= date('Y-m-d');
		$time= date('H:i:s');
		

 		$sql= mysqli_query($conn,"SELECT billing_code FROM billing_settings WHERE username='$user'");
 		$row = mysqli_fetch_assoc($sql);
		//database email
		$db_billing_code = $row['billing_code'];
		if($db_billing_code==$billing_code){
			mysqli_query($conn,"UPDATE billing_settings SET billing_code='',date='$date',time='$time' WHERE username='$user'");
			 echo "<p class='alert-success'>Your billing details have been successfully updated!</p>";
		  }else{
			 echo "<p class='alert-danger'>Please enter the correct confirmation code!</p>";
		  }

	break;
	
	case 'update_notification_settings':

		$date= date('Y-m-d');
		$time= date('H:i:s');

		if(isset($_POST['comments'])){
			$comments = 'yes';
			}else{
			$comments='no';	
				}
		if(isset($_POST['requests'])){
			$requests = 'yes';
			}else{
			$requests='no';	
				}
		if(isset($_POST['messages'])){
			$messages = 'yes';
			}else{
			$messages='no';	
				}
		if(isset($_POST['replies'])){
			$replies = 'yes';
			}else{
			$replies='no';	
				}
			mysqli_query($conn,"UPDATE notification_settings SET requests='$requests',comments='$comments',messages='$messages',replies='$replies',time='$time',date='$date' WHERE username='$user'");
			 echo "<p class='alert-success'>Your notification settings has been successfully updated!</p>";
	break;
	
	case 'update_privacy':
	
		$date= date('Y-m-d');
		$time= date('H:i:s');

		if(isset($_POST['phone_number'])){
			$phone = 'public';
			}else{
			$phone='private';	
				}
		if(isset($_POST['privacy_email'])){
			$email = 'public';
			}else{
			$email = 'private';	
				}
		if(isset($_POST['age'])){
			$age = 'public';
			}else{
			$age ='private';	
				}
		if(isset($_POST['location'])){
			$location = 'public';
			}else{
			$location='private';	
				}
			mysqli_query($conn,"UPDATE privacy_settings SET phone='$phone',email='$email',age='$age',location='$location',time='$time',date='$date' WHERE username='$user'");
			 echo "<p class='alert-success'>Your privacy settings has been successfully updated!</p>";
	
	break;
}

?>