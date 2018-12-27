<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
$post_type = $_POST['post_type'];
$date= date('Y-m-d');
$time= date('H:i:s');

switch($post_type){
	
	case 'create-ad':
		//$submit_ad = $_POST['submit_ad'];

		//$in_search_of = htmlentities($_POST['in_search_of']);
		$category = htmlentities($_POST['category']);
		$study_area = htmlentities($_POST['study_area']);
		$concentration = htmlentities($_POST['concentration']);
		$topic = htmlentities($_POST['topic']);
		$knowledge_level = htmlentities($_POST['knowledge_level']);
		$purpose = htmlentities($_POST['purpose']);
		
		if(isset($_POST['exam_target'])){
			$exam_target = htmlentities($_POST['exam_target']);
			}else{
			$exam_target = "";
				}
		if(isset($_POST['exam_date'])){
		$exam_date = htmlentities($_POST['exam_date']);
			}else{
		$exam_date = "";
			}
		if(isset($_POST['research_due_date'])){
		$research_due_date = htmlentities($_POST['research_due_date']);
			}else{
		$research_due_date = "";
			}
			
		$more_info= htmlentities($_POST['more_info']);
		
		if(!empty($exam_date) || !empty($research_due_date)){
		  if($exam_date < $date && $research_due_date < $date){
			echo"<p class='text-danger'><span class='ion-alert'></span> Your date due date must not be later than today!</p> ";
			}else{				
			  $sql = mysql_query("INSERT INTO ads VALUES ('','$user','Study Buddy','$category','$study_area','$concentration','$topic','$knowledge_level','$purpose','$exam_target','$exam_date','$research_due_date','$more_info','$date','$time','no')");
			  echo"<p class='text-success'><span class='ion-android-checkmark-circle'></span> Your Ad has been published successfully!</p> ";
			}
		}else{
		  $sql = mysql_query("INSERT INTO ads VALUES ('','$user','Study Buddy','$category','$study_area','$concentration','$topic','$knowledge_level','$purpose','$exam_target','$exam_date','$research_due_date','$more_info','$date','$time','no')");
		  echo"<p class='text-success'><span class='ion-android-checkmark-circle'></span> Your Ad has been published successfully!</p> ";
		}
	
		break;

	default:
		echo "
		";

	}
?>