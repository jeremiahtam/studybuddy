<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
$profile_page_type = $_POST['profile_page_type'];
$username=$_POST['username'];
$page=$_POST['page'];

switch($profile_page_type){
	
	case 'ads':
	   $ads_sql= mysqli_query($conn,"SELECT * FROM ads WHERE username='$username' AND removed='no'");
	   $ads_sql_num_rows = mysqli_num_rows($ads_sql);

	  //if there are no connections available
	  if($ads_sql_num_rows == 0){
		  echo"
		  <div class='alert alert-warning alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			No ads available.
		  </div>
		  ";
	  
			}else{
		   //if there are availabe posts by the profile page owner
		   $record_per_page = 20;
		   //$page = '';
		   //$output = '';
		   if(isset($_POST["page"]))
		   {
			   $page = $_POST['page'];
			   }
			   else
			   {
				   $page = 1;
				   }
			$start_from = ($page - 1) * $record_per_page;
		   // echo $page;
			
			$query = "SELECT * FROM ads WHERE username='$username' AND removed='no' ORDER BY id DESC LIMIT $start_from,$record_per_page";
			
			$result = mysqli_query($conn,$query);
			
			echo"<div class='row'>";
			
			while($get_ads = mysqli_fetch_array($result)){
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

				  include_once("../classes/develop_php_library.php"); // Include the class library
				  $timeAgoObject = new convertToAgo; // Create an object for the time conversion functions
				  // Query your database here and get timestamp
				  $ts = "$db_date $db_time";
				  $convertedTime = $timeAgoObject -> convert_datetime($ts); // Convert Date Time
				  $when = $timeAgoObject -> makeAgo($convertedTime); // Then convert to ago time

				  $ads_fullname_query = mysqli_query($conn,"SELECT * FROM users WHERE username='$db_username'");
				  $ads_db_details = mysqli_fetch_assoc($ads_fullname_query);
				  
				  $ads_fullname = $ads_db_details['fullname'];
				  $ads_profile_pic = $ads_db_details['profile_pic'];
				  $ads_location = $ads_db_details['location'];
	
				  echo "
				  <div class='col-xs-6 col-sm-6 col-md-6 col-lg-4 ads-col'>
				  	<div class='panel ads-panel'>
					  <div class='panel-heading'>
						<div class='time'><span class='ion-ios-time-outline'></span> $when</div>";
				  if(isset($user)){
					  if($user==$username){
						echo"
						<div class='dropdown'>
						  <a class='dropdown-toggle' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
							<span class='ion-android-more-vertical'></span>
						  </a>
						  <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>
							<li><a class='modal-action' data-delete-id='$db_id' data-delete-type='delete-ad' id='delete-ad' data-toggle='modal' data-target='#modal'>Delete</a></li>
						  </ul>
						</div><!--end dropdown-->
						";
					  }
				  }
					  echo"
					  </div><!--end panel-heading-->  
					  <div class='panel-body'>
						<div class='post-main-content'>
						  <div class='post-label'>Study Area:</div>
						  <div class='study-area'>$db_study_area</div>
						  <div class='post-label'>Concentration:</div>
						  <div class='concentration'>$db_concentration</div>
						  <div class='post-label'>Topic:</div>
						  <div class='topic'>$db_topic</div>
						  <div class='post-label'>Knowledge Level:</div>
						  <div class='knowledge-level'>$db_knowledge_level</div>
						  <!--<div class='progress'>						  
							<div class='progress-bar' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: 20%;'></div> 
						  </div>-->
						</div>
						<div class='location'><span class='ion-ios-location'></span> $ads_location</div>
						

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
						</div>
						
					  </div><!--end panel-body-->";
					  //display only if the user is logged in
					  if(isset($user)){
						  if($user!==$username){
					  echo"
					  <div class='panel-footer'>
						<div class='post-action'><a class=' ";
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
						
						echo" ' data-interest-id='$db_id' disabled><span class='ion-coffee'></span> Interested</a></div>
					  </div><!--end panel-footer-->";
						  }//end $user==$username
					  }//end isset($user)
					
					echo"</div><!--end ads-panel-->
				  </div><!--end col-->
				  ";
			   }	
			   echo"</div><!--end row-->";
			   /////////////////////////////////////////	
				$page_query = "SELECT * FROM ads WHERE username='$username' AND removed='no' ORDER BY id DESC";
				$page_result = mysqli_query($conn,$page_query);
				$total_records = mysqli_num_rows($page_result);
				$total_pages = ceil($total_records/$record_per_page);
				
			  if($total_pages>1){
				  echo"
				  <nav aria-label='Page navigation' class='ads-navigation'>
				   <ul class='pager'>
				  ";
				  
				  if($page>1){
					  echo"
					  <li class=''>
					   <a aria-label='Previous' class='pagination_link' id='".($page - 1)."'>
						<span aria-hidden='true'>&larr; Previous</span>
					   </a>
					  </li>
					  ";
					  }
					  
				  echo "Page ".$page." of ".$total_pages;
				  
				  if($page!=$total_pages){
					  echo"
					  <li class=''>
					   <a aria-label='Next' class='pagination_link' id='".($page + 1)."'>
						<span aria-hidden='true'>Next &rarr;</span>
					   </a>
					  </li>
					  ";
					  }
				  echo"
				   </ul>
				  </nav>
				";	
				  }
			}

		break;

	
	
	case 'connections':

	   $connection_sql= mysqli_query($conn,"SELECT * FROM connection_requests WHERE (user_from='$username' OR user_to='$username') AND status='connected'");
	   $connection_sql_num_rows = mysqli_num_rows($connection_sql);

	   //if there are no connections available
	  if($connection_sql_num_rows==0){
		  echo"
		  <div class='alert alert-warning alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			No connections available.
		  </div>
		 ";
	  
			}else{
		   //if there are availabe posts by the profile page owner
		   $record_per_page = 20;
		   if(isset($_POST["page"]))
		   {
			   $page = $_POST['page'];
			   }
			   else
			   {
				   $page=1;
				   }
			$start_from = ($page - 1) * $record_per_page;
			
			$query = "SELECT * FROM connection_requests WHERE 
			(user_from='$username' OR user_to='$username') AND status='connected'
			ORDER BY id DESC LIMIT $start_from,$record_per_page";
			
			$result = mysqli_query($conn,$query);
			
			echo"
			<div class='row'>
			";
			
			while($get_connections = mysqli_fetch_array($result)){
				  $id = $get_connections['id'];
				  $user_from = $get_connections['user_from'];
				  $user_to = $get_connections['user_to'];
				  $status = $get_connections['status'];
				  
				  if($username==$user_from){
					  $connection_name = $user_to;
					  }else if($username==$user_to){
					  $connection_name = $user_from;
					  }
				  $connection_query = mysqli_query($conn,"SELECT * FROM users WHERE username='$connection_name'");
				  $connection_details = mysqli_fetch_assoc($connection_query);
				  
				  $connection_fullname = $connection_details['fullname'];
				  $connection_profile_pic = $connection_details['profile_pic'];
				  $connection_cover_photo = $connection_details['cover_photo'];
				  $connection_username = $connection_details['username'];
				  $connection_bio = $connection_details['bio'];
				  
				  echo"
				  <div class='col-lg-4 col-md-4 col-sm-4'>
					<div class='thumbnail connection-box'>
					  <div class='connection-cover-photo-box'>";
						//check if the connection's cover-photo is available 
						if($connection_cover_photo==""){
						echo"
						  <img src='img/cover-photo.jpg' class='connection-cover-photo'/>";
						}else{
							echo"
						  <img src='img/cover_photo/$connection_cover_photo' class='connection-cover-photo'/>";
							}
					  echo"
					  </div><!--end connection-cover-photo-box--> 
					  <div class='connection-image-box'>
						<a href='profile/$connection_name/about'>";
						//check if the connection's profile_pic is available 
						if($connection_profile_pic==""){
						echo"
						  <img src='img/user.png' class='profile-pic'/>";
						}else{
							echo"
						  <img src='img/profile_pic/$connection_profile_pic' class='profile-pic'/>";
							}
						  echo"
						</a>
					  </div> <!--end connection-image-box-->
					  <div class='connection-content'>
						<div class='connection-name'><a href='profile/$connection_name/about'>$connection_fullname</a></div>
						<div class='connection-username'><a href='profile/$connection_name/about'>$connection_username</a></div>
						<div class='connection-separator'></div>
						<div class='connection-bio'>$connection_bio</div>
						<div class='connection-separator'></div>
						";
						if(isset($user)){
						//check if the loggedIn user is connected to the user 
							if($user!==$connection_name){
								  echo"<p class='connection-btn'>";			   
								  #check if the logged in user has sent a connection request to the individual
								  $sent_request_sql = mysqli_query($conn,"SELECT * FROM connection_requests WHERE user_from='$user' AND user_to='$connection_name'");
								  $sent_request_num_rows = mysqli_num_rows($sent_request_sql);
								  #check if the query result is greater than zero
								  #if a connection request has been sent
								  if($sent_request_num_rows == 1){
									  $sent_request_row = mysqli_fetch_assoc($sent_request_sql);
										  
									  $connection_id = $sent_request_row['id'];
									  $connection_from = $sent_request_row['user_from'];
									  $connection_to = $sent_request_row['user_to'];
									  $connection_status = $sent_request_row['status'];
									  switch($connection_status){
										  case 'pending':
											echo" <button class='btn btn-default btn-sm connection-button' id='cancel-connect-request' connection-username='$connection_name'><span class='ion-android-close icon'></span> <span class='connect-btn-text'>Cancel Request</span> 
													<img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
												  </button>";
										  break;
										  case 'connected':
											echo" <button class='btn btn-default btn-sm connection-button' id='disconnect' connection-username='$connection_name'><span class='ion-ios-trash-outline icon'></span> <span class='connect-btn-text'> Disconnect</span>
													<img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
												  </button>";
										  break;
										  }
									 }
								  #check if the logged in user has received a connection request to the profile owner
								  $received_request_sql = mysqli_query($conn,"SELECT * FROM connection_requests WHERE user_to='$user' AND user_from='$connection_name'");
								  $received_request_num_rows = mysqli_num_rows($received_request_sql);
								  #check if the query result is greater than zero
								  #if a connection request has been sent
								  if($received_request_num_rows == 1){
									  $received_request_row = mysqli_fetch_assoc($received_request_sql);
										  
									  $connection_id = $received_request_row['id'];
									  $connection_from = $received_request_row['user_from'];
									  $connection_to = $received_request_row['user_to'];
									  $connection_status = $received_request_row['status'];
									  switch($connection_status){
										  case 'pending':
											echo" <button class='btn btn-default btn-sm connection-button' id='accept-request' connection-username='$connection_name'><span class='ion-android-checkmark-circle icon'></span> <span class='connect-btn-text'>Accept</span> 
													<img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
												  </button>
												  <button class='btn btn-outline-danger btn-sm connection-button' id='reject-request' connection-username='$connection_name'><span class='ion-android-close icon'></span> <span class='connect-btn-text'> Reject</span>
													<img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
												  </button>";
										  break;
										  case 'connected':
											echo" <button class='btn btn-default btn-sm connection-button' id='disconnect' connection-username='$connection_name'><span class='ion-ios-trash-outline icon'></span> <span class='connect-btn-text'> Disonnect</span>
													<img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
												  </button>";
										  break;
										  }
									 }
								  if($sent_request_num_rows == 0 && $received_request_num_rows==0){#if a connection request has not been sent
									 echo"<button class='btn btn-default btn-sm connection-button' id='connect' connection-username='$connection_name'><span class='ion-person-add icon'></span> <span class='connect-btn-text'> Connect</span>
											<img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
										  </button>";
									}#end sent request query
								  echo"
								  </p><!--connection-btn-->";
													
								  }//end it $user!==$username
							//}
						}
						
					  echo"
					  </div>
					</div>
				  </div>";            
				
			   }	
			   
			   echo"</div><!--end row-->";
			   
			   /////////////////////////////////////////	
				$page_query = "SELECT * FROM connection_requests WHERE 
			    (user_from='$username' OR user_to='$username') AND status='connected'
			    ORDER BY id DESC";
				$page_result = mysqli_query($conn,$page_query);
				$total_records = mysqli_num_rows($page_result);
				$total_pages = ceil($total_records/$record_per_page);
				
			  if($total_pages>1){
				  echo"
				  <nav aria-label='Page navigation' class='connection-navigation'>
				   <ul class='pager'>
				  ";
				  
				  if($page>1){
					  echo"
					  <li class=''>
					   <a aria-label='Previous' class='pagination_link' id='".($page - 1)."'>
						<span aria-hidden='true'>&larr; Previous</span>
					   </a>
					  </li>
					  ";
					  }
					  
				  echo "Page ".$page." of ".$total_pages;
				  
				  if($page!=$total_pages){
					  echo"
					  <li class=''>
					   <a aria-label='Next' class='pagination_link' id='".($page + 1)."'>
						<span aria-hidden='true'>Next &rarr;</span>
					   </a>
					  </li>
					  ";
					  }
				  echo"
				   </ul>
				  </nav>
				";	
				  }
	   }
				
		break;

	case 'about':
	  $sql = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND removed='no'");
	  $num_rows = mysqli_num_rows($sql);
	  if($num_rows == 1){
		  $row = mysqli_fetch_assoc($sql);
				  
		  $id = $row['id'];
		  $fullname = $row['fullname'];
		  $phone = $row['phone'];
		  $email = $row['email'];
		  $location = $row['location'];
		  $profile_pic = $row['profile_pic'];
		  $cover_photo = $row['cover_photo'];
		  $date_of_birth = $row['date_of_birth'];
		  $bio = $row['bio'];
			
		  #get age of user
		  $from = new DateTime($date_of_birth);
		  $to   = new DateTime('today');
		  $age = $from->diff($to)->y;
	  }
		echo"
              <div class='panel contacts-panel'>
                <div class='panel-heading'><span class='ion-ios-person'></span> Contacts</div>
                <div class='panel-body'>
                  <div class='item-title'>Address</div>
                  <div class='item-content'>$location</div>
                  <div class='item-title'>Phone Number</div>
                  <div class='item-content'>$phone</div>
                  <div class='item-title'>Email</div>
                  <div class='item-content'>$email</div>
                  
                </div><!--end panel-body-->
              </div><!--end panel-->

              <div class='panel education-panel'>
                <div class='panel-heading'><span class='ion-ios-book'></span> Education ";
			if(isset($user)){
				if($user==$username){
				echo"
				<div class='pull-right modal-action' id='add-education' data-toggle='modal' data-target='#modal'>
				  <span class='ion-android-add icon'></span>
				  <span class='text'>Add New</span>
				</div>
				";
				}
			  }
				echo"
				</div>
                <div class='panel-body'>";
 
				$edu_sql= mysqli_query($conn,"SELECT * FROM educational_qualifications WHERE username='$username'");
				$edu_num_rows = mysqli_num_rows($edu_sql);
				
				while($edu_row = mysqli_fetch_assoc($edu_sql)){
					  
				  $edu_id = $edu_row['id'];
				  $edu_username = $edu_row['username'];
				  $edu_institution = $edu_row['institution'];
				  $edu_course = $edu_row['course'];
				  $edu_degree = $edu_row['degree'];
				  $edu_start_date = $edu_row['start_date'];
				  $edu_end_date = $edu_row['end_date'];
				  
				  echo"
					<div class='edu-box row'>
					  <div class='col-sm-9'>
						<p class='edu-sch'>$edu_institution</p>
						<p class='edu-cou'>($edu_degree) $edu_course</p>
						<p class='edu-date'>$edu_start_date to $edu_end_date</p>
					  </div>
					  ";
					  	if(isset($user)){
						  if($user==$username){
						    echo"
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
							";
							}
						  }
					echo"
					</div>
				  
				  ";
				}
				echo"
                </div><!--end panel-body-->
              </div><!--end panel-->

              <div class='panel work-panel'>
                <div class='panel-heading'><span class='ion-ios-briefcase'></span>  Work Experience ";
				if(isset($user)){
					if($user==$username){
					echo"
					<div class='pull-right modal-action' id='add-work-experience' data-toggle='modal' data-target='#modal'>
					  <span class='ion-android-add icon'></span>
					  <span class='text'>Add New</span>
					</div>
					";
					}
				  }
				echo"</div>
                <div class='panel-body'>";
				
				$work_sql= mysqli_query($conn,"SELECT * FROM work_experience WHERE username='$username'");
				$work_num_rows = mysqli_num_rows($work_sql);
				
				while($work_row = mysqli_fetch_assoc($work_sql)){
					  
				  $work_id = $work_row['id'];
				  $work_username = $work_row['username'];
				  $work_organization_name = $work_row['organization_name'];
				  $work_position_held = $work_row['position_held'];
				  $work_start_date = $work_row['start_date'];
				  $work_end_date = $work_row['end_date'];
				  $work_currently_there = $work_row['currently_there'];
				  
				  echo"
                  <div class='work-box row'>
					<div class='col-sm-9'>
					  <p class='work-org'>$work_organization_name ";				
					  echo"
					  </p>
					  <p class='work-position-held'>$work_position_held</p>
					  <p class='work-date'>$work_start_date to ";  
					  if($work_currently_there=='yes'){
						 echo ' Present';
						}else{
						 echo $work_end_date;
							}
					  echo"
					  </p>
					</div>
					";
					
					if(isset($user)){
					  if($user==$username){
						echo"
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
						";
						}
					  }
				  echo"
                  </div>
				  
				  ";
				}
				echo"

                </div><!--end panel-body-->
              </div><!--end panel-->
		";
		break;
	}
?>