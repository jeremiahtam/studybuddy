<?php 
include("../inc/session.inc.php");
include("../inc/db.inc.php");

//$settings_type = $_POST['settings_type'];

$form_institution = htmlentities($_POST['institution']);
$form_course = htmlentities($_POST['course']);
$form_degree_obtained = htmlentities($_POST['degree_obtained']);
$form_course_start_date = htmlentities($_POST['course_start_date']);
$form_course_end_date = htmlentities($_POST['course_end_date']);		
$date= date('Y-m-d');
$time= date('H:i:s');

	$insert_sql = mysqli_query($conn,"INSERT INTO educational_qualifications VALUES ('','$user','$form_institution','$form_course','$form_degree_obtained','$form_course_start_date','$form_course_end_date','$date','$time')");
	
	
	
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
		  <div class='col-sm-9'>
			<p class='edu-sch'>$institution</p>
			<p class='edu-cou'>($degree) $course</p>
			<p class='edu-date'>$start_date to $end_date</p>
		  </div>

		  <div class='col-sm-3 edu-action'>
			<div class='col-sm-3 edu-action'>
			  <div class='delete-button modal-action' data-delete-id='$edu_id' data-delete-type='delete-education' id='delete-education' data-toggle='modal' data-target='#modal'>
				<span class='ion-ios-trash icon'></span> 
				<span class='text'>Delete</span>
			  </div>
			  <div class='edit-button modal-action' data-edit-id='$edu_id' data-edit-type='edit-education' id='edit-education' data-toggle='modal' data-target='#modal'>
				<span class='ion-edit icon'></span> 
				<span class='text'>Edit</span>
			  </div>
			</div>
		  </div>

		</div>
	  
	  ";
	
}

?>