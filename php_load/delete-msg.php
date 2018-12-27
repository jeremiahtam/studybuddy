<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");

$delete_type = $_POST['delete_type'];
$delete_id = $_POST['delete_id'];
$date=date('Y-m-d');
$time=date('H:i:s');

switch($delete_type){
		
	case 'conversation':
	//add to the deleted conversation table
	$delete_conv_query = mysqli_query($conn,"INSERT INTO deleted_conversations VALUES('','$delete_id','$user','$date','$time')");
	//add messages with the deleted conversation id to the deleted messages table
	$get_msg = mysqli_query($conn,"SELECT * FROM msg_conversations WHERE conv_id='$delete_id'");

	while($msg_info=mysqli_fetch_assoc($get_msg)){
	  $msg_id = $msg_info['id'];
	  //add messages with the deleted conversation id to the deleted messages table
	  $delete_msg = mysqli_query($conn,"INSERT INTO deleted_msgs VALUES('','$msg_id','$delete_id','$user','$date','$time')");
		}
	break;
	
	case 'message':
	  $conv_query = mysqli_query($conn,"SELECT * FROM msg_conversations WHERE id='$delete_id'");
	  $data_conv_query = mysqli_fetch_assoc($conv_query);
	  $conv_id = $data_conv_query['conv_id'];
	  //add message id to the deleted messages table
	  $delete_msg = mysqli_query($conn,"INSERT INTO deleted_msgs VALUES('','$delete_id','$conv_id','$user','$date','$time')");

	
		break;

	default:
		echo "
		";

	}
?>