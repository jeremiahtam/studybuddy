<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");

include_once("../classes/develop_php_library.php"); // Include the class library
$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions

$ad_id = htmlentities($_POST['ad_id']);		
$date = date('Y-m-d');
$time = date('H:i:s');

$ad_sql= mysql_query("SELECT * FROM ads WHERE id='$ad_id' AND removed='no'");
$ad_num_rows = mysql_num_rows($ad_sql);
if($ad_num_rows==1){
	$ad_row = mysql_fetch_assoc($ad_sql);
  
	$category = $ad_row['category'];
	$study_area = $ad_row['study_area'];
	$concentration = $ad_row['concentration'];
	$topic = $ad_row['topic'];
	$knowledge_level = $ad_row['knowledge_level'];
	$purpose = $ad_row['purpose'];
	$exam_target = $ad_row['exam_target'];
	$exam_date = $ad_row['exam_date'];
	$research_due_date = $ad_row['research_due_date'];

	$similar_ad_sql= mysql_query("SELECT * FROM ads WHERE category='$category' AND id!='$ad_id' AND removed='no' LIMIT 7");
	$similar_ad_num_rows = mysql_num_rows($similar_ad_sql);
	if($similar_ad_num_rows>0){
		while($similar_ad_row = mysql_fetch_assoc($similar_ad_sql)){
			$similar_ad_id = $similar_ad_row['id'];
			$similar_ad_username = $similar_ad_row['username'];
			
			$similar_category = $similar_ad_row['category'];
			$similar_study_area = $similar_ad_row['study_area'];
			$similar_concentration = $similar_ad_row['concentration'];

			$similar_category_edited = str_replace('_',' ',$similar_ad_row['category']);
			$similar_study_area_edited = str_replace('_',' ',$similar_ad_row['study_area']);
			$similar_concentration_edited = str_replace('_',' ',$similar_ad_row['concentration']);
			
			$similar_topic = $similar_ad_row['topic'];
			$similar_knowledge_level = $similar_ad_row['knowledge_level'];
			$similar_purpose = $similar_ad_row['purpose'];
			$similar_exam_target = $similar_ad_row['exam_target'];
			$similar_exam_date = $similar_ad_row['exam_date'];
			$similar_research_due_date = $similar_ad_row['research_due_date'];
			$similar_more_info = $similar_ad_row['more_info'];
			$similar_date = $similar_ad_row['date'];
			$similar_time = $similar_ad_row['time'];
			
			$user_sql = mysql_query("SELECT * FROM users WHERE username='$similar_ad_username' AND removed='no'");
			$user_sql_row = mysql_fetch_assoc($user_sql);
			$fullname = $user_sql_row['fullname'];
			$location = $user_sql_row['location'];
			$profile_pic = $user_sql_row['profile_pic'];
			
			if ($profile_pic == '') {
				$profile_pic = 'img/user.png';
				}else{
				$profile_pic = 'img/profile_pic/'.$user_sql_row['profile_pic'];
				}
			// Query your database here and get timestamp
			$ts = "$similar_date $similar_time";
			$convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time
			$when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time
			
			echo"
			  <div class='ad-post'>
				<div class='time'>$when</div>
				<div class='name'><a href='http://localhost/studybuddy/profile/$similar_ad_username'>$fullname</a></div>
				<div class='location'>$location</div>
				<div class='navigation'><a href='http://localhost/studybuddy/view-ads-by-category/$similar_category'>$similar_category_edited</a> <span>></span> <a href='http://localhost/studybuddy/view-ads-by-category/$similar_category/$similar_study_area'>$similar_study_area_edited</a> <span>></span> <a href='http://localhost/studybuddy/view-ads-by-category/$similar_category/$similar_study_area/$similar_concentration'>$similar_concentration_edited</a></div>
				<div class='topic-heading'>Topic</div>
				<div class='topic'>$similar_topic</div>
			  </div><!--ad-post-->			
			";
			}
	}

}

?>