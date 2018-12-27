<?php 
include("../inc/db.inc.php");
include("../inc/session.inc.php");

$date=date('Y-m-d');
$time=date('H:i:s');

if(isset($_SESSION["last-msg-id"])){
	$last_msg_id = $_SESSION["last-msg-id"]; 
  }else{
	  $last_msg_id='';
	  }	   

/////////////////////////////////////////	
$query = "(SELECT * FROM msg_conversations WHERE conv_with='$user' AND seen='no' ORDER BY id DESC LIMIT 1)";	
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);

$row = mysql_fetch_assoc($result);
$db_last_msg_id = $row['id'];

if($num_rows == 1){
  if($db_last_msg_id !== $last_msg_id){
	$_SESSION["last-msg-id"] = $db_last_msg_id;
		echo'New Message';
	  }else{
	
	}
  }
?>