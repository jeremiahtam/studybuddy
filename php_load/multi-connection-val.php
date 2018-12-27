<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
$connection_button = $_POST['connection_button'];
$username = $_POST['username'];
$date= date('Y-m-d');
$time= date('H:i:s');

switch($connection_button){
	
	case 'connect':
			
		$sql = mysql_query("INSERT INTO connection_requests VALUES('','$user','$username','pending','$date','$time')");
		echo" 
		<button class='btn btn-default btn-sm connection-button' id='cancel-connect-request' connection-username='$username'><span class='ion-android-close icon'></span> <span class='connect-btn-text'> Cancel Request</span> 
			<img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
		</button>";
		
		//get request_id from connection_requests 
		
		$request_id_sql = mysql_query("SELECT * FROM connection_requests WHERE user_from='$user' AND user_to='$username' ");
		$request_id_sql_row = mysql_fetch_assoc($request_id_sql);
		$request_id = $request_id_sql_row['id'];
		$request_notifications_sql = mysql_query("INSERT INTO request_notifications VALUES('','$username','connection','$user','$request_id','no','$date','$time')");;

		break;

	case 'cancel-connect-request':
		//get request_id from connection_requests 
		
		$request_id_sql = mysql_query("SELECT * FROM connection_requests WHERE user_from='$user' AND user_to='$username'");
		$request_id_sql_row = mysql_fetch_assoc($request_id_sql);
		$request_id = $request_id_sql_row['id'];
		
		//delete the notification in the database
		
		$request_notifications_sql = mysql_query("DELETE FROM request_notifications WHERE user_from='$user' AND username='$username' AND type='connection'");
	
		$sql = mysql_query("DELETE FROM connection_requests WHERE user_from='$user' AND user_to='$username'");

		echo"
		<button class='btn btn-default btn-sm connection-button' id='connect' connection-username='$username'><span class='ion-person-add icon'></span> <span class='connect-btn-text'> Connect</span>
		  <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
		</button>";
		
		
	break;

	case 'disconnect':
		$sql = mysql_query("DELETE FROM connection_requests WHERE (user_from='$user' AND user_to='$username') OR (user_to='$user' AND user_from='$username')");

		echo"
		<button class='btn btn-default btn-sm connection-button' id='connect' connection-username='$username'><span class='ion-person-add icon'></span> <span class='connect-btn-text'> Connect</span>
		  <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
		</button>";
	
	break;

	case 'accept-request':
		$sql = mysql_query("UPDATE connection_requests SET status='connected',date='$date',time='$time' WHERE user_to='$user' AND user_from='$username'");
		//indicate that the user has responded to the request notification
		$request_notifications_sql = mysql_query("UPDATE request_notifications SET responded='yes' WHERE user_from='$username' AND username='$user' AND type='connection'");

		echo"
		<button class='btn btn-default btn-sm connection-button' id='disconnect' connection-username='$username'><span class='ion-ios-trash-outline icon'></span> <span class='connect-btn-text'>Disonnect</span>
		  <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
		</button>";
	break;

	case 'reject-request':
		$sql = mysql_query("DELETE FROM connection_requests WHERE user_to='$user' AND user_from='$username'");
		//indicate that the user has responded to the request notification
		$request_notifications_sql = mysql_query("UPDATE request_notifications SET responded='yes',date='$date',time='$time' WHERE user_from='$username' AND username='$user' AND type='connection'");

		echo"
		<button class='btn btn-default btn-sm connection-button' id='connect' connection-username='$username'><span class='ion-person-add icon'></span> <span class='connect-btn-text'> Connect</span>
		  <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
		</button>";
	break;
	

	default:
		echo "
		";

	}
?>