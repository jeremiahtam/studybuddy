<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
//get posted values
$category = $_POST['category'];
$study_area = $_POST['study_area'];
$concentration = $_POST['concentration'];
//set arrays
$category_array = array('Certificate_Program','Degree_Program','Vocational_Program','Graduate_Admission_Tests');
$certificate_array = array('Arts_and_Design','Business','Criminal_Justice','Culinary_and_Hospitality','Education','Healthcare_and_Fitness','Legal_Certification','Skilled_Trade','Social_Services');
$degree_array = array('Agriculture','Architecture','Biological_and_Biomedical_Sciences','Business','Communications_and_Journalism','Computer_Sciences','Culinary_Arts_and_Personal_Services','Education','Engineering','Legal','Medical_and_Health_Professions','Mechanic_and_Repair_Technologies','Physical_Sciences','Psychology','Transportation_and_Distribution','Visual_and_Performing_Arts');
$vocational_array = array('Auto_Servicing','Computer_and_IT_Support','Construction_Industry','Cosmetology_and_Hair_Stylist','Food_Service','Healthcare_and_Social_Assistance','Manufacturing_Sector','Trucking_and_Transportation_Industry');
$GAT_array = array('GMAT','IELTS','SAT');

//if none is available
if(empty($category) && empty($study_area) && empty($concentration)){
	//set the url_level as
	$url_level = 'none';
	echo"<div class='category-content-heading'>All Categories</div>";
}//end if
//if only category is available
if(!empty($category) && empty($study_area) && empty($concentration)){
	//set the url_level as
	$url_level = 'category';
	echo"<div class='category-content-heading'>".str_replace('_',' ',$category)."</div>";
}//end if
//if only category, study_area are available
if(!empty($category) && !empty($study_area) && empty($concentration)){
	//set the url_level as
	$url_level = 'study_area';
	echo"<div class='category-content-heading'>".str_replace('_',' ',$category)." <span>></span> ".str_replace('_',' ',$study_area)." </div>";
}//end if
//if category, study_area, and concentration are available,
if(!empty($category) && !empty($study_area) && !empty($concentration)){
	//set the url_level as
	$url_level = 'concentration';
	echo"<div class='category-content-heading'>".str_replace('_',' ',$category)." <span>></span> ".str_replace('_',' ',$study_area)."  <span>></span> ".str_replace('_',' ',$study_area)."</div>";
	
	if(isset($_POST['page'])){
		$page = $_POST['page'];
	  }else{
		$page = 1;
	}
}//end if

switch($url_level){
	case 'none':
	
	$x = 0;//initialize array index
	while($x < 3){
	  echo"
	  <div class='row'>
		
		<div class='col-md-12 category-content-sub-heading'>".str_replace('_',' ',$category_array[$x])."
		<a>See More <span class='ion-ios-arrow-thin-right'></span></a>
		</div>
		";
		
	  $category_query = mysqli_query($conn,"SELECT * FROM ads WHERE category='".$category_array[$x]."' AND removed='no' ORDER BY id DESC LIMIT 4");
	  while($get_ads = mysqli_fetch_assoc($category_query)){
		$db_id = $get_ads['id'];
		$db_username = $get_ads['username'];
		$db_in_search_of = $get_ads['in_search_of'];
		$db_category = $get_ads['category'];
		$db_study_area = str_replace('_',' ',$get_ads['study_area']);
		$db_concentration =  str_replace('_',' ',$get_ads['concentration']);
		$db_topic = $get_ads['topic'];
		$db_knowledge_level = $get_ads['knowledge_level'];
		$db_purpose = $get_ads['purpose'];
		$db_exam_target = $get_ads['exam_target'];
		$db_exam_date = $get_ads['exam_date'];
		$db_research_due_date = $get_ads['research_due_date'];
		$db_more_info = $get_ads['more_info'];
		$db_date = $get_ads['date'];
		$db_time = $get_ads['time'];
		
		$ads_user_query = mysqli_query($conn,"SELECT * FROM users WHERE username='$db_username'");
		$get_ads_user = mysqli_fetch_assoc($ads_user_query);
		
		$ads_user_fullname = $get_ads_user['fullname'];
		if(strlen($ads_user_fullname)>20){
			$ads_user_fullname = substr($ads_user_fullname,0,20);
			$ads_user_fullname = substr($ads_user_fullname,0,strrpos($ads_user_fullname,' ')).'...';
		}
		$ads_user_location = $get_ads_user['location'];
		$ads_user_profile_pic = $get_ads_user['profile_pic'];
		
		if($ads_user_profile_pic==''){
			$user_profile_pic = 'img/user.png';
			}else{
			$user_profile_pic = 'img/profile_pic/'.$ads_user_profile_pic;
				}
		
		include_once("../classes/develop_php_library.php"); // Include the class library
		$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions
		// Query your database here and get timestamp
		$ts = "$db_date $db_time";
		$convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time
		$when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time
			    
		echo "
		<div class='col-xs-6 col-sm-4 col-md-6 col-lg-3 columns'>
		  <div class='panel view-by-category-panel'>
			<div class='image-left'>
			  <div class='image-box'>
			   <a><img class='' src='$user_profile_pic'/></a>
			  </div><!--end image-box-->
			</div><!--end image-left-->
			<div class='content-right'>
			  <div class='panel-heading'>
				<div class='name-list'>
				  <div class='name'><a>$ads_user_fullname</a></div><!--end name-->
				  <div class='time'>$when</div><!--end username-->
				</div><!--end name-list-->
				<div class='dropdown'>
				  <a class='dropdown-toggle' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
					<span class='ion-android-more-vertical'></span>
				  </a>
				  <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>
					<li><a class='modal-action' data-delete-id='$db_id' data-delete-type='delete-ad' id='delete-ad' data-toggle='modal' data-target='#modal'>Delete</a></li>
				  </ul>
			   </div><!--end dropdown-->
			  </div><!--end panel-heading-->  
			  <div class='panel-body'>
				<div class='ad-main-content'>
				  <div class='ad-sub-heading'>Topic</div>
				  <div class='topic'>$db_topic</div>
				  <div class='ad-sub-heading'>Knowledge Level</div>
				  <div class='knowledge-level'>$db_knowledge_level</div>
				  <div class='progress'>
					<div class='progress-bar' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: 0%;'>
					</div>
				  </div><!--end progress-->
				</div><!--end ad-main-content-->
				<div class='location'>$ads_user_location</div>  
				<div class='interest-count'>
				  <a class='count_id_$db_id modal-action' data-display-id='$db_id' data-display-type='display-ad-interest' id='display-ad-interest' data-toggle='modal' data-target='#modal'>";
				  //count how many people are interested in this ad post
				  $count_sql = mysqli_query($conn,"SELECT * FROM interested_list WHERE ad_id='$db_id'");
				  $count_sql_rows = mysqli_num_rows($count_sql);
				  //only display the number of interests if its greater than zero
				  if($count_sql_rows>0){
				  echo "<span class='ion-coffee'></span> <span class='number-count'>$count_sql_rows</span>";
				  }
				echo"
				  </a>
				</div><!--end interest-count-->
			  </div><!--end panel-body-->
			</div><!--content-right-->
			<div class='panel-footer'>
			  <div class='post-action'>
			  
			  <a class='";
			  //check database if this user is already interested in this ad
			  $check_sql = mysqli_query($conn,"SELECT * FROM interested_list WHERE ad_id='$db_id' and interested_user='$user'");
			  $check_rows = mysqli_num_rows($check_sql);
			  //if the user is not yet interested, display add-interest-btn
			  if($check_rows==0){
				echo"add-interest-btn";
			  //if the user is already interested, display remove-interest-btn
			  }else if($check_rows==1){
				echo"remove-interest-btn";
				  }
			  echo" ' data-interest-id='$db_id'>
			  <span class='ion-coffee'></span> Interested
			  </a>
			  
			  </div>
			</div><!--end panel-footer-->                                        
		  </div><!--end view-by-category-panel-->
		</div><!--end col-->              
	  ";
	  }//end while query loop
	  
	  echo"
	  </div><!--end row-->
	  ";
	  
	  $x = $x + 1;//
	}//end while $x 
}
?>