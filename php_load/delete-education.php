<?php 
include("../inc/session.inc.php");
include("../inc/db.inc.php");

//$settings_type = $_POST['settings_type'];
$delete_type = $_POST['delete_type'];
$delete_id = $_POST['delete_id'];

$delete_sql = mysqli_query($conn,"DELETE FROM educational_qualifications WHERE id='$delete_id' AND username='$user'");
	
	
	
	$sql= mysqli_query($conn,"SELECT * FROM educational_qualifications WHERE username='$user'");
	$num_rows = mysqli_num_rows($sql);
	
	while($row = mysqli_fetch_assoc($sql)){
		  
	  $edu_id = $row['id'];
	  $username = $row['username'];
	  $institution = $row['institution'];
	  $course = $row['course'];
	  $degree = $row['degree'];
	  $start_date = $row['start_date'];
	  $end_date = $row['end_date'];
	  
	  echo"
		<div class='edu-box'>
		  <p class='edu-sch'>$institution <span class='ion-ios-trash delete-button modal-action' data-delete-id='$edu_id' data-delete-type='delete-education' id='delete-education' data-toggle='modal' data-target='#modal'></span></p>
		  <p class='edu-cou'>($degree) $course</p>
		  <p class='edu-date'>$start_date to $end_date</p>
		</div>
	  
	  ";
	
}

?>