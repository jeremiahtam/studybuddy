<?php 
include("../inc/db.inc.php");
include("../inc/session.inc.php");

$msg_uname = $_POST['msg_uname'];
$window_width = $_POST['window_width'];
$date=date('Y-m-d');
$time=date('H:i:s');

/////////////////////////////////////////	
$query = "(SELECT * FROM msg_conversations WHERE username='$msg_uname' AND conv_with='$user' AND seen='no'
ORDER BY id DESC) ORDER BY id ASC";
	
$result = mysqli_query($conn,$query);
$num_rows = mysqli_num_rows($result);

//if its desktop screen size, get the content of newly received messages and post them
//if($window_width>992){
	//start while loop
	while($get_msg = mysqli_fetch_array($result)){
	  $id = $get_msg['id'];
	  $conv_id = $get_msg['conv_id'];
	  $msg = nl2br($get_msg['msg']);
	  $type = $get_msg['type'];
	  $username = $get_msg['username'];
	  $conv_with = $get_msg['conv_with'];
	  $seen = $get_msg['seen'];
	  $db_date = $get_msg['date'];
	  $db_date = date('M j, Y',strtotime($db_date));
	  $db_time = $get_msg['time'];
	  $db_time = date('g:i a',strtotime($db_time));
	  
	  $deleted_msg_query = mysqli_query($conn,"SELECT * FROM deleted_msgs WHERE msg_id='$id' AND deleted_by='$user'");
	  $deleted_msg_rows = mysqli_num_rows($deleted_msg_query);  
  
	  if($user==$username){
			$connection_name = $conv_with;
		  }else if($user==$conv_with){
			$connection_name = $username;
		  }
  
	  $connection_query = mysqli_query($conn,"SELECT * FROM users WHERE username='$connection_name'");
	  $connection_details = mysqli_fetch_assoc($connection_query);
	  
	  $connection_fullname = $connection_details['fullname'];
	  $connection_profile_pic = $connection_details['profile_pic'];
	  
	  //if the message has not been deleted, display the message
	  if($deleted_msg_rows==0){
		echo"
		 <div class='";
		 if($user==$username){
			  echo"sent";
			}else if($user==$conv_with){
			  echo"received";
			}
		 echo"' >";
		 
		 
		 echo"
		 <span class='msg-letters' data-toggle='tooltip' data-placement='";

		 if($user==$username){
			  echo"left";
			}else if($user==$conv_with){
			  echo"right";
			}		 
		 echo"' title='$db_date  $db_time'>";
		   if($type=='text'){
				echo"$msg";
			  }
	   echo"</span>";

	   echo"
	   <div class='msg-extras'><span class='date-time'>$db_date  $db_time</span> . <span id='delete-message' delete-type='message' delete-id='$id' class='delete-msg-id' data-toggle='modal' data-target='#myModal'>Delete</span></div>
	   </div>";
		  //mark every open unread conversation messages as a read message
		  if($seen=='no'){
			$mark_as_read = mysqli_query($conn,"UPDATE msg_conversations SET seen='yes' WHERE conv_id='$conv_id' AND conv_with='$user'");
		  }
  
	  }//end deleted rows	  
	}//end while loop
	
//}//end if statement

?>