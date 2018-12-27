<?php 
  include("../inc/db.inc.php");
  include("../inc/session.inc.php");
  $date=date('Y-m-d');
  $time=date('H:i:s');
  $window_width = $_POST['window_width'];

  #get rows where you are connected to someone  
   $record_per_page = 20;
   if(isset($_POST["conv_pg"])){
	   $conv_pg = $_POST['conv_pg'];
	   $_SESSION["conv_pg"]=$conv_pg; 
	 }else{
	   if(isset($_SESSION["conv_pg"])){
		  $conv_pg = $_SESSION["conv_pg"];
		   }else{
			 $conv_pg=1;
			   }
	 }
	$start_from = ($conv_pg - 1) * $record_per_page;

	$page_query = "(SELECT * FROM conversations WHERE user_1='$user' OR user_2='$user'
	ORDER BY date DESC)";
	$page_result = mysql_query($page_query);
	$total_records = mysql_num_rows($page_result);
	$total_pages = ceil($total_records/$record_per_page);
  if($window_width < 992){
	if($total_pages>1){
		echo"
		<nav aria-label='Page navigation' class='msg-conversations-navigation'>
		 <ul class='pager'>
		";			
		if($conv_pg>1){
			echo"
			<li class=''>
			 <a aria-label='Next' class='msg_conversations_pagination_link' id='".($conv_pg - 1)."'>
			  <span aria-hidden='true'>Previous</span>
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
	  $query = "(SELECT * FROM conversations WHERE user_1='$user' OR user_2='$user'
	  ORDER BY date DESC LIMIT $start_from,$record_per_page)";

	  $result = mysql_query($query);

  while($get_conv = mysql_fetch_array($result)){
	  $conv_id = $get_conv['id'];
	  $user_1 = $get_conv['user_1'];
	  $user_2 = $get_conv['user_2'];
	  $date = $get_conv['date'];
	  $time = $get_conv['time'];
	  		  
	  $deleted_conv_query = mysql_query("SELECT * FROM deleted_conversations WHERE conversation_id='$conv_id' AND deleted_by='$user'");
	  $deleted_conv_rows = mysql_num_rows($deleted_conv_query);	  
	  
	  if($user==$user_1){
			$connection_name = $user_2;
		  }else if($user==$user_2){
			$connection_name = $user_1;
		  }
	  $connection_query = mysql_query("SELECT * FROM users WHERE username='$connection_name'");
	  $connection_details = mysql_fetch_assoc($connection_query);
	  
	  $connection_fullname = $connection_details['fullname'];
	  $connection_profile_pic = $connection_details['profile_pic'];

	  if($deleted_conv_rows==0){
		  //get list of messages from the msg_conversation sent or received starting from the most recent
		  $last_msg = mysql_query("SELECT * FROM msg_conversations WHERE conv_id='$conv_id' ORDER BY id DESC");
		  //get the number of rows of conversation between the two users
		  $num_rows_last_msg = mysql_num_rows($last_msg);
		  //start checking the msgs one after the other to see if its been deleted
		  while($rows_last_msg = mysql_fetch_assoc($last_msg)){
			  $msg_id = $rows_last_msg['id'];
			  //check if a message has been deleted
			  $deleted_msg_query = mysql_query("SELECT * FROM deleted_msgs WHERE msg_id='$msg_id' AND conv_id='$conv_id' AND deleted_by='$user'");
			  $deleted_msg_rows = mysql_num_rows($deleted_msg_query);
			  
			  if($num_rows_last_msg == $deleted_msg_rows){
				  $delete_empty_conv_query = mysql_query("INSERT INTO deleted_conversations VALUES('','$conv_id','$user','$date','$time')");
				  continue 2;
				  break;
			  }
			  //a message has not been deleted yet, display it as the last message and break out of the loop
			  if($deleted_msg_rows==0){ 
				$msg = $rows_last_msg['msg'];
				$seen = $rows_last_msg['seen'];
				$msg_sender = $rows_last_msg['username'];
				$conv_with = $rows_last_msg['conv_with'];
				$msg_date = $rows_last_msg['date'];
				$msg_time = $rows_last_msg['time'];
				break;
			  }
		  }
		  			
		  include_once("../classes/develop_php_library.php"); // Include the class library
		  $timeAgoObject = new convertToAgo; // Create an object for the time conversion functions
		  // Query your database here and get timestamp
		  $ts = "$msg_date $msg_time";
		  $convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time
		  $when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time
		  
		  if(strlen($msg)>20){
			  $msg=substr($msg,0,20);
			  $msg=substr($msg,0,strrpos($msg,' ')).'...';
		  }
		  if(strlen($connection_fullname)>20){
			  $connection_fullname=substr($connection_fullname,0,20);
			  $connection_fullname=substr($connection_fullname,0,strrpos($connection_fullname,' ')).'...';
		  }
		  
  		  echo"
			<div class='media msg-connection ";

			if($seen=='no' && $conv_with==$user){
			  echo"unread-msg";
			}else{
				echo"read-msg";
				}
						
			echo" '>
			  <div class='media-left'>
				<div class='conv-image-box'>
				  <img class='media-object' ";
				  if($connection_profile_pic==''){
					echo" src='img/user.png' ";
				  }else{
					echo" src='img/profile_pic/$connection_profile_pic' ";
					  }
				  
			  echo" alt=''>
				</div><!--conv-image-box-->
			  </div><!--end media-left-->
			  
			  <div class='media-body' data-uname='$connection_name'>
				<h4>$connection_fullname</h4>
				<div class='last-msg'>";
				if($msg_sender==$user){
					echo"<span class='ion-forward'></span> ";
					}
				echo"
				$msg</div>
				<div class='time'>$when</div>				
			  </div><!--/end media-body-->

			  <div class='media-right'>
				<div class='dropdown'>
				  <a class='dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
					<span class='ion-android-more-horizontal'></span>
				  </a>
				  <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>
					<li><a id='delete-conversation' delete-type='conversation' delete-id='$conv_id' class='delete-conv-id' data-toggle='modal' data-target='#myModal'>Delete Conversation</a></li>
				  </ul>
				</div>
			  </div><!-- /end media-right--> 

			</div><!-- /media msg-connection -->
		  ";
		  }	  
  }
	  /////////////////////////////////////////	
	  $page_query = "(SELECT * FROM conversations WHERE user_1='$user' OR user_2='$user'
	  ORDER BY date DESC)";
	  
	  $page_result = mysql_query($page_query);
	  $total_records = mysql_num_rows($page_result);
	  $total_pages = ceil($total_records/$record_per_page);
	  
	  if($total_pages>1){
		  echo"
		  <nav aria-label='Page navigation' class='msg-conversations-navigation'>
		   <ul class='pager'>
		  ";
		  if($conv_pg !=$total_pages){
			  echo"
			  <li class=''>
			   <a aria-label='Next' class='msg_conversations_pagination_link' id='".($conv_pg + 1)."'>
				<span aria-hidden='true'>Next</span>
			   </a>
			  </li>
			  ";
			  }
		  echo"
		   </ul>
		  </nav>
		";	
		  }
  
	
?>