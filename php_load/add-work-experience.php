<?php 
include("../inc/session.inc.php");
include("../inc/db.inc.php");

//$settings_type = $_POST['settings_type'];

$edit_id = htmlentities($_POST['edit_id']);
$form_organization_name = htmlentities($_POST['organization_name']);
$form_position_held = htmlentities($_POST['position_held']);
$form_currently_there = htmlentities($_POST['currently_there']);
$form_work_start_date = htmlentities($_POST['work_start_date']);
if(isset($_POST['work_end_date'])){
	$form_work_end_date = htmlentities($_POST['work_end_date']);		
}else{
	$form_work_end_date = "";		
	}
$date= date('Y-m-d');
$time= date('H:i:s');

	$insert_sql = mysql_query("INSERT INTO work_experience VALUES ('','$user','$form_organization_name','$form_position_held','$form_work_start_date','$form_work_end_date','$form_currently_there','$date','$time')");
	
	
	
	$sql= mysql_query("SELECT * FROM  work_experience WHERE username='$user'");
	$num_rows = mysql_num_rows($sql);
	
	while($row = mysql_fetch_assoc($sql)){
		  
	  $work_id = $row['id'];
	  $username = $row['username'];
	  $organization_name = $row['organization_name'];
	  $position_held = $row['position_held'];
	  $currently_there = $row['currently_there'];
	  $start_date = $row['start_date'];
	  $end_date = $row['end_date'];
	  
	  echo"
		<div class='work-box row'>
		  <div class='col-sm-9'>
			<p class='work-org'>$organization_name</p>
			<p class='work-position-held'>$position_held</p>
			<p class='work-date'>$start_date to";
			if($currently_there=='yes'){
			   echo ' Present';
			  }else{
			   echo $end_date;
				  }
			 echo"</p>
		  </div>
		  <div class='col-sm-3'>
			<div class='delete-work-button modal-action' data-delete-id='$work_id' data-delete-type='delete-work' id='delete-work' data-toggle='modal' data-target='#modal'>
			  <span class='ion-ios-trash icon'></span> 
			  <span class='text'>Delete</span>
			</div>
			<div class='edit-work-button modal-action' data-edit-id='$work_id' data-edit-type='edit-work' id='edit-work' data-toggle='modal' data-target='#modal'>
			  <span class='ion-edit icon'></span> 
			  <span class='text'>Edit</span>
			</div>
		  </div>
		</div>	  
	  ";
	
}

?>