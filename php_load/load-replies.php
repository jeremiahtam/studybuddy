<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");

include_once("../classes/develop_php_library.php"); // Include the class library
$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions

//$ad_id = htmlentities($_POST['ad_id']);		
$comment_id = htmlentities($_POST['comment_id']);		

//replies
$replies_sql = mysql_query("SELECT * FROM replies WHERE comment_id='$comment_id' AND removed='no' ORDER BY date DESC");

while($replies_sql_row = mysql_fetch_assoc($replies_sql)){
	$replies_text = $replies_sql_row['reply'];
	$replies_username = $replies_sql_row['username'];
	$replies_date = $replies_sql_row['date'];
	$replies_time = $replies_sql_row['time'];
	
	$replies_user_sql = mysql_query("SELECT * FROM users WHERE username='$replies_username' AND removed='no'");
	$replies_user_sql_row = mysql_fetch_assoc($replies_user_sql);
	$replies_fullname = $replies_user_sql_row['fullname'];
	$replies_profile_pic = $replies_user_sql_row['profile_pic'];
	
	if ($replies_profile_pic == '') {
		$replies_profile_pic = 'img/user.png';
		}else{
		$replies_profile_pic = 'img/profile_pic/'.$replies_user_sql_row['profile_pic'];
		}

	// Query your database here and get timestamp
	$replies_ts = "$replies_date $replies_time";
	$replies_convertedTime = $timeAgoObject -> convert_datetime($replies_ts); // Convert Date Time
	$replies_when = $timeAgoObject -> makeAgo($replies_convertedTime); // Then convert to ago time

  echo"
	<div class='replies'>
	  <div class='time'>$replies_when</div>
	  <div class='image'><img src='$replies_profile_pic'></div><!--end image-->
	  <div class='text'>
		<div class='name'>$replies_fullname</div>
		<div class='content'>$replies_text</div>
	  </div><!--end text-->
	  <div class='extra-stuff'>
		<div class='delete-reply'>Delete</div>
	  </div>
	</div><!--end replies-->
	";
}//end while loop for replies
?>