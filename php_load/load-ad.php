<?php 
include("../inc/session.inc.php");
include("../inc/db.inc.php");

include_once("../classes/develop_php_library.php"); // Include the class library
$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions

$ad_id = htmlentities($_POST['ad_id']);		
$date = date('Y-m-d');
$time = date('H:i:s');

$ad_sql= mysqli_query($conn,"SELECT * FROM ads WHERE id='$ad_id' AND removed='no'");
$ad_num_rows = mysqli_num_rows($ad_sql);
if($ad_num_rows==1){





	while($ad_row = mysqli_fetch_assoc($ad_sql)){
  
	  $ad_id = $ad_row['id'];
	  $ad_username = $ad_row['username'];
	  $category = $ad_row['category'];
	  $study_area = $ad_row['study_area'];
	  $concentration = $ad_row['concentration'];

	  $category_edited = str_replace('_',' ',$ad_row['category']);
	  $study_area_edited = str_replace('_',' ',$ad_row['study_area']);
	  $concentration_edited = str_replace('_',' ',$ad_row['concentration']);
	  $topic = $ad_row['topic'];
	  $knowledge_level = $ad_row['knowledge_level'];
	  $purpose = $ad_row['purpose'];
	  $exam_target = $ad_row['exam_target'];
	  $exam_date = $ad_row['exam_date'];
	  $research_due_date = $ad_row['research_due_date'];
	  $more_info = $ad_row['more_info'];
	  $date = $ad_row['date'];
	  $time = $ad_row['time'];
	  $removed = $ad_row['removed'];

	  $user_sql = mysqli_query($conn,"SELECT * FROM users WHERE username='$ad_username' AND removed='no'");
	  $user_sql_row = mysqli_fetch_assoc($user_sql);
	  $fullname = $user_sql_row['fullname'];
	  $location = $user_sql_row['location'];
	  $profile_pic = $user_sql_row['profile_pic'];
	  
	  if ($profile_pic == '') {
		  $profile_pic = 'img/user.png';
		  }else{
		  $profile_pic = 'img/profile_pic/'.$user_sql_row['profile_pic'];
		  }

	  // Query your database here and get timestamp
	  $ts = "$date $time";
	  $convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time
	  $when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time
	  
	  echo"
		<div class='main-ad-content'>      
		  <div class='panel-head'>
			<div class='time'>$when</div>
		  </div><!--end panel-heading-->
		  
		  <div class='ad-user'>
			<div class='ad-user-image-box'>
			  <img src='$profile_pic'>
			</div>                
		  </div><!--ad-user-image-->
	  
		  <div class='ad-details'>                  
			<div class='ad-user-details'>
			  <div class='ad-name'><a href='http://localhost/studybuddy/profile/$ad_username'>$fullname</a></div>
			  <div class='ad-location'>$location</div>
			</div><!--ad-user-details-->
		  
			<div class='ad-breadcrumb'><a class='category' href='http://localhost/studybuddy/view-ads-by-category/$category'>$category_edited</a> <span>></span> <a class='study-area' href='http://localhost/studybuddy/view-ads-by-category/$category/$study_area'>$study_area</a> <span>></span> <a class='concentration' href='http://localhost/studybuddy/view-ads-by-category/$category/$study_area/$concentration'>$concentration_edited</a></div>
	  
			<div class='ad-item-heading'>Topic</div>
			<div class='topic'>$topic</div>
			
			<div class='ad-item-heading'>More Info</div>
			<div class='ad-item-content'>$more_info</div>
	  
			<div class='more-info'>
			  <div class='col-md-6'>
				<div class='more-info-box'>
				  <div class='more-info-head'>Purpose</div>
				  <div class='ad-purpose'>$purpose</div>
				</div><!--end more-info-box-->
			  </div><!--end col-->
			  <div class='col-md-6'>
				<div class='more-info-box'>
				  <div class='more-info-head'>Knowledge Level</div>
				  <div class='ad-knowledge-level'>$knowledge_level</div>
				</div><!--end more-info-box-->
			  </div><!--end col-->
			  <div class='col-md-6'>
				<div class='more-info-box'>
				  <div class='more-info-head'>Target</div>
				  <div class='ad-purpose'>Exam</div>
				</div><!--end more-info-box-->
			  </div><!--end col-->
			  <div class='col-md-6'>
				<div class='more-info-box'>
				  <div class='more-info-head'>Due Date</div>
				  <div class='ad-knowledge-level'>Beginner</div>
				</div><!--end more-info-box-->
			  </div><!--end col-->
			</div><!--end more-info-->                
		  </div><!--ad-details-->
	  
		  <div class='interested-section'>
			<div class='post-action pull-right'><a class=' ";
			  //check database if this user is already interested in this ad
			  $check_sql = mysqli_query($conn,"SELECT * FROM interested_list WHERE ad_id='$ad_id' and interested_user='$user'");
			  $check_rows = mysqli_num_rows($check_sql);
			  //if the user is not yet interested, display add-interest-btn
			  if($check_rows==0){
				echo"add-interest-btn";
			  //if the user is already interested, display remove-interest-btn
			  }else if($check_rows==1){
				echo"remove-interest-btn";
				  }
			  echo" ' data-interest-id='$ad_id'>Interested</a></div>
			  
			<div class='post-action pull-right'>
			  <a class='count_id_$ad_id modal-action' data-display-id='$ad_id' data-display-type='display-ad-interest' id='display-ad-interest' data-toggle='modal' data-target='#modal'>";
				//count how many people are interested in this ad post
				$count_sql = mysqli_query($conn,"SELECT * FROM interested_list WHERE ad_id='$ad_id'");
				$count_sql_rows = mysqli_num_rows($count_sql);
				//only display the number of interests if its greater than zero
				if($count_sql_rows>0){
				echo "<span class='ion-coffee'></span> <span class='number-count'>$count_sql_rows</span>";
				}
			echo"
			  </span>
			  </a>
			</div>
		  </div><!--interested section-->
		</div><!--end main-ad-content-->";
		}//end view ad post
		
		echo"
		<div class='comment-section'>
		  <div class='comment-form'>
			<div class='heading'>Leave a comment</div>
			<form id='comment_form'>
			  <label></label>
			  <textarea class='form-control' rows='1' id='comment_textarea' name='comment_textarea'></textarea>
			  <button class='btn btn-md btn-primary' id='submit_comment' name='submit_comment'>Post Comment</button>
			</form>
		  </div><!--end comment-form-->
		  <div class='body'>
		  
			<div class='comment-box'>";
			
			$comment_sql = mysqli_query($conn,"SELECT * FROM comments WHERE ad_id='$ad_id' AND removed='no' ORDER BY date DESC");
			$comment_rows = mysqli_num_rows($comment_sql);
			if($comment_rows>0){
			  while($comment_sql_row = mysqli_fetch_assoc($comment_sql)){
				  $comment_id = $comment_sql_row['id'];
				  $comment_text = $comment_sql_row['comment'];
				  $comment_username = $comment_sql_row['username'];
				  $comment_date = $comment_sql_row['date'];
				  $comment_time = $comment_sql_row['time'];
				  
				  $comment_user_sql = mysqli_query($conn,"SELECT * FROM users WHERE username='$comment_username' AND removed='no'");
				  $comment_user_sql_row = mysqli_fetch_assoc($comment_user_sql);
				  $comment_fullname = $comment_user_sql_row['fullname'];
				  $comment_profile_pic = $comment_user_sql_row['profile_pic'];
				  
				  if ($comment_profile_pic == '') {
					  $comment_profile_pic = 'img/user.png';
					  }else{
					  $comment_profile_pic = 'img/profile_pic/'.$comment_user_sql_row['profile_pic'];
					  }
			
				  // Query your database here and get timestamp
				  $ts = "$comment_date $comment_time";
				  $convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time
				  $comment_when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time
				  
			  echo"  
				<div class='comment'>
				  <div class='time'>$comment_when</div>
				  <div class='image'><img src='$comment_profile_pic'></div><!--end image-->
				  <div class='text'>
					<div class='name'>$comment_fullname</div>
					<div class='content'>$comment_text</div>
				  </div><!--end text-->
				  <div class='extra-info'>
					<div class='reply-action' data-comment-id='$comment_id'><span class='ion-forward'></span> Reply</div>
					<div class='view-replies' data-comment-id='$comment_id'>View Replies</div>
					<div class='delete-comment' data-comment-id='$comment_id'>Delete</div>
				  </div>
								  
				  <div class='reply-box' id='reply_box_$comment_id'>
  
				  </div><!--end reply-box-->
			   
				</div><!--end comment-->
  
				<div class='reply' id='reply_$comment_id'>
  
				</div><!--end reply-->";
			  
			  }//end while loop for comments
			}//end num if(rows)
			echo"
			</div><!--end comment-box-->
		  </div><!--end body-->
	  
		</div><!--end comment-section-->
	  
	";
	  










}else{
	echo"This ad has been deleted or does not exist!";
	}

?>