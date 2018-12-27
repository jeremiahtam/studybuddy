<?php 
include("../inc/session.inc.php");
include("../inc/db.inc.php");

//$settings_type = $_POST['settings_type'];
$delete_type = $_POST['delete_type'];
$delete_id = $_POST['delete_id'];

	$delete_sql = mysqli_query($conn,"DELETE FROM work_experience WHERE id='$delete_id' AND username='$user'");
		
	
	$sql= mysqli_query($conn,"SELECT * FROM  work_experience WHERE username='$user'");
	$num_rows = mysqli_num_rows($sql);
	
	while($row = mysqli_fetch_assoc($sql)){
		  
	  $work_id = $row['id'];
	  $username = $row['username'];
	  $organization_name = $row['organization_name'];
	  $position_held = $row['position_held'];
	  $currently_there = $row['currently_there'];
	  $start_date = $row['start_date'];
	  $end_date = $row['end_date'];
	  
	  echo"
		<div class='work-box'>
		  <p class='work-org'>$organization_name <span class='ion-ios-trash delete-button modal-action' data-delete-id='$work_id' data-delete-type='delete-work' id='delete-work' data-toggle='modal' data-target='#modal'></span></p>
		  <p class='work-position-held'>$position_held</p>
		  <p class='work-date'>$start_date to";
		  if($currently_there=='yes'){
			 echo ' Present';
			}else{
			 echo $end_date;
				}
		   "</p>
		</div>
	  
	  ";
	
}

?>