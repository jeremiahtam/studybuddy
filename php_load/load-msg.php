<?php 
include("../inc/db.inc.php");
include("../inc/session.inc.php");
$msg_uname = $_POST['msg_uname'];
$window_width = $_POST['window_width'];
$date=date('Y-m-d');
$time=date('H:i:s');

   $record_per_page = 10;
   //$page = '';
   //$output = '';
   if(isset($_POST["pg"]))
   {
	   $page = $_POST['pg'];
	   $_SESSION["pg"] = $page;
	   }
	   else
	   {
		   if(isset($_SESSION["pg"])){
			  $page = $_SESSION["pg"]; 
			   }else{
				   $page = 1;			
				   }		   
		   }
	$start_from = ($page-1) * $record_per_page;
	
	if($window_width>992){
		$limit = $page * $record_per_page;
		}else{
		  $limit = "$start_from,$record_per_page";
			}

	/////////////////////////////////////////	
	$page_query = "(SELECT * FROM msg_conversations WHERE 
	((username='$user' AND conv_with='$msg_uname') OR (username='$msg_uname' AND conv_with='$user'))
	ORDER BY id DESC) ORDER BY id ASC";
	$page_query_result = mysqli_query($conn,$page_query);
	
	$page_query_result_rows = mysqli_num_rows($page_query_result);
	$db_data = mysqli_fetch_assoc($page_query_result);
	$db_msg_id = $db_data['id'];
	
	$deleted_msg_query = mysqli_query($conn,"SELECT * FROM deleted_msgs WHERE msg_id='$db_msg_id' AND deleted_by='$user'");
	$deleted_msg_rows = mysqli_num_rows($deleted_msg_query);
	
	$page_result = mysqli_query($conn,$page_query);
	$total_records = mysqli_num_rows($page_result);
	$total_pages = ceil($total_records/$record_per_page);
	
	if($total_pages>1  && $page_query_result_rows==$deleted_msg_rows){
		echo"
		<nav aria-label='Page navigation' class='main-msg-navigation load-older-msg'>
		 <ul class='pager'>
		";
		if($page!=$total_pages){
			echo"
			<li class=''>
			 <a aria-label='Next' class='main_msg_pagination_link' id='".($page + 1)."'>
			  <span aria-hidden='true'>Load older messages</span>
			 </a>
			</li>
			";
			}
		echo"
		 </ul>
		</nav>
	  ";	
	}
	//////////////////Query to show the content of the messages between two users
	$query = "(SELECT * FROM msg_conversations WHERE 
	((username='$user' AND conv_with='$msg_uname') OR (username='$msg_uname' AND conv_with='$user'))
	ORDER BY id DESC LIMIT ".$limit.") ORDER BY id ASC";
	
	$result = mysqli_query($conn,$query);
	
	$num_rows = mysqli_num_rows($result);

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
		//mark every open unread conversation messages as a read message
		if($seen=='no'){
		  $mark_as_read = mysqli_query($conn,"UPDATE msg_conversations SET seen='yes' WHERE conv_id='$conv_id' AND conv_with='$user'");
		}
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
		
		}//	  
}
if($page>1){
  if($window_width < 992){
	if($total_pages > 1){
		echo"
		<nav aria-label='Page navigation' class='main-msg-navigation load-newer-msg'>
		 <ul class='pager'>
		";
		if($page>1){
			echo"
			<li class=''>
			 <a aria-label='Next' class='main_msg_pagination_link' id='".($page - 1)."'>
			  <span aria-hidden='true'>Load newer messages</span>
			 </a>
			</li>
			";
			}
		echo"
		 </ul>
		</nav>
	  ";	
	}
  }
}

?>