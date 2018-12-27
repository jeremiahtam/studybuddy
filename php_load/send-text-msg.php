<?php
include("../inc/db.inc.php");
include("../inc/session.inc.php");
$msg_uname = $_POST['msg_uname'];
$date=date('Y-m-d');
$time=date('H:i:s');

//$send_msg=$_POST['send-msg'];

if(isset($_POST['send-msg'])){
  //if msg_uname==user do nothing
  if($msg_uname==$user){
	
	  }else{
		if(isset($_POST['msg_uname']) && !empty($_POST['msg_uname']) ){
	  
		//check for a conversation between user and msg_username
		$check_conv = mysql_query("SELECT * FROM conversations WHERE 
		(user_1='$user' AND user_2='$msg_uname') OR (user_1='$msg_uname' AND user_2='$user') ");
		$num_rows_check_conv = mysql_num_rows($check_conv);
		//chck if a conversation exists
		if($num_rows_check_conv==0){//if no conversation exist, add a new conversation
			$add_conv = mysql_query("INSERT INTO conversations VALUES ('','$user','$msg_uname','$date','$time')");
			//get this new conversation's id so it can be inserted into msg_conversations
			$check_conv = mysql_query("SELECT * FROM conversations WHERE
			(user_1='$user' AND user_2='$msg_uname') OR (user_1='$msg_uname' AND user_2='$user')");
			$check_conv_details = mysql_fetch_assoc($check_conv);
			$conv_id = $check_conv_details['id'];
		  }else{
			//if a conversation exists between user and msg_uname, get the id of the conversation 
			$check_conv_details = mysql_fetch_assoc($check_conv);
			$conv_id =$check_conv_details['id'];
			//check if the conversation has been deleted by either user
			$deleted_conv_query = mysql_query("SELECT * FROM deleted_conversations WHERE conversation_id='$conv_id'");
			$deleted_conv_rows = mysql_num_rows($deleted_conv_query);
			//if either user has deleted the conversation, delete it from the deleted_conversation table 
			if($deleted_conv_rows==1){
				$deleted_conv_details = mysql_fetch_array($deleted_conv_query);
				$deleted_conv_id = $deleted_conv_details['id'];
				$remove_deleted_conv = mysql_query("DELETE FROM deleted_conversations WHERE id='$deleted_conv_id'");
			  }
		  }
		$typed_msg = $_POST['typed_msg'];
		$insert_message = mysql_query("INSERT INTO msg_conversations VALUES('','$conv_id','$typed_msg','text','$user','$msg_uname','no','$date','$time')");
		//update the date and time of the conversation
		$update_conv_time = mysql_query("UPDATE conversations SET date='$date',time='$time' WHERE id='$conv_id'");
	  
		}
		  
	}
}//end isset($_POST['send-msg'])
?>