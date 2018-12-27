<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
$modal_content = $_POST['modal_content'];
//if the delete_type is set, give variables for the delete_type and delete_id
if(isset($_POST['delete_type'])){
  $delete_type = $_POST['delete_type'];
  $delete_id = $_POST['delete_id'];
}
//if the edit_type is set, give variables for the edit_type and delete_id
if(isset($_POST['edit_type'])){
  $edit_type = $_POST['edit_type'];
  $edit_id = $_POST['edit_id'];
}
//if the display_type is set, give variables for the display_type and delete_id
if(isset($_POST['display_type'])){
  $display_type = $_POST['display_type'];
  $display_id = $_POST['display_id'];
}

switch($modal_content){
	
	case 'upload-profile-pic':
	
		echo "
      <div class='modal-content profile-pic-crop-modal' id='profile-pic-crop-modal'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Upload Profile Picture</h4>
       </div><!--modal header-->

       <div class='modal-body'>         
		 <div class='upload-profile-pic-alert'></div>

         <form class='form-inline' id='upload-profile-pic-form'>
           <div class='form-group'>
             <label for='upload' class=''>
               <input type='file'  id='upload' class='custom-file-input' name='upload'>
               <span class=''></span>
             </label>
           </div>
         </form>

         <div class='row image-modal-container'>
           <div id='upload-demo' class='upload-demo col-lg-12'></div>
         </div><!--end row-->
       </div><!--end modal-body-->
         
       <div class='modal-footer'>        
         <!--<div class='btn-group'>
           <span class='input-group-btn'>
             <button type='button' class='btn btn-outline-dark border-0 btn-sm rotate-image' deg='-90'><span class='fa fa-rotate-left'></span> -90deg</button>
           </span>
         </div><!--end btn group-->
		 <!--
         <div class='btn-group'>
           <span class='input-group-btn'>
             <button type='button' class='btn btn-outline-dark border-0 btn-sm rotate-image' deg='90'><span class='fa fa-rotate-right'></span> 90deg</button>
           </span>
        </div><!--end btn group-->
		<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
        <button class='btn btn-outline-primary upload-result'>Upload Image
			<img src='img/ajax-loader.gif' class='preloader' width='20px' height='20px' hidden='true'/>
		</button>
       </div><!--end modal-footer-->
      </div><!--end modal-content-->
		";
		break;

	
	case 'upload-cover-photo':
	
		echo "
      <div class='modal-content cover-photo-crop-modal' id='cover-photo-crop-modal'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Upload Cover Photo</h4>
       </div><!--modal header-->

       <div class='modal-body'>         
		 <div class='upload-cover-photo-alert'></div>

         <form class='form-inline' id='upload-cover-photo-form'>
           <div class='form-group'>
             <label for='input-cover-photo' class=''>
               <input type='file'  id='input-cover-photo' class='custom-file-input' name='input-cover-photo'>
               <span class=''></span>
             </label>
           </div>
         </form>

         <div class='row image-modal-container'>
           <div id='upload-demo-cover-photo' class='upload-demo-cover-photo col-lg-12'></div>
         </div><!--end row-->
       </div><!--end modal-body-->
         
       <div class='modal-footer'>        
         <!--<div class='btn-group'>
           <span class='input-group-btn'>
             <button type='button' class='btn btn-outline-dark border-0 btn-sm rotate-image' deg='-90'><span class='fa fa-rotate-left'></span> -90deg</button>
           </span>
         </div><!--end btn group-->
		 <!--
         <div class='btn-group'>
           <span class='input-group-btn'>
             <button type='button' class='btn btn-outline-dark border-0 btn-sm rotate-image' deg='90'><span class='fa fa-rotate-right'></span> 90deg</button>
           </span>
        </div><!--end btn group-->
		<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
        <button class='btn btn-outline-primary submit-cover-photo'>Upload Image
		  <img src='img/ajax-loader.gif' class='preloader' width='20px' height='20px' hidden='true'/>
		</button>
       </div><!--end modal-footer-->
	   
      </div><!--end modal-content-->
		";
		break;


	case 'add-education':
	
	  echo"
      <div class='modal-content add-education-modal' id='add-education-modal'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Add Educational Qualifications</h4>
       </div><!--modal header-->


	   <form method='post' id='update_education_form' name='update_education_form'>

       <div class='modal-body'>         

		 <div class='update-education-info'></div><!--where alerts are displayed-->            

		 <div class='form-group'>
		   <label for='institution'>Name of Institution</label>
		   <span class='help-block'>Enter the name of the institution you attended e.g. Delta State University</span>
		   <input type='text' class='form-control' id='institution' name='institution' placeholder='Name of Institution'>
		 </div>
		 <div class='row'>
		   <div class='form-group col-md-6'>                     
			 <label for='course' class='col-form-label'>Course</label>
			 <span class='help-block'>What course did you study? E.g. Biochemistry</span>
			 <input type='text' class='form-control' placeholder='Course' id='course' name='course'>
		   </div>
		   <div class='form-group col-md-6'>                     
			 <label for='degree_obtained' class='col-form-label'>Degree Obtained</label>
			 <span class='help-block'>What degree were you awarded E.g. B.Sc.</span>
			 <input type='text' class='form-control' placeholder='Degree Obtained' id='degree_obtained' name='degree_obtained'>
		   </div>			   
		 </div>

		 <div class='row'>
		   <div class='form-group col-md-6'>                     
			 <label for='course_start_date' class='col-form-label'>Start Date</label>
			 <span class='help-block'>Date when you started the course. The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
			 <input type='text' class='form-control' placeholder='Start of course' id='course_start_date' name='course_start_date'>
		   </div>
		   <div class='form-group col-md-6'>                     
			 <label for='course_end_date' class='col-form-label'>End Date</label>
			 <span class='help-block'>Date when your course should end or ended. The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
			 <input type='text' class='form-control' placeholder='End of course' id='course_end_date' name='course_end_date'>
		   </div>			   
		 </div>		  
       </div><!--end modal-body-->
	   
	   <div class='modal-footer'>	
		 <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>	   
		 <button type='submit' class='btn btn-outline-primary' name='update_education' id='update_education'>Add Eduaction
		 <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
	   </div><!--end modal-footer-->
	   
	   </form><!--end add_education_form-->
         
      </div><!--end modal-content-->
		";
		break;
		
	case 'edit-education':

	  $query = mysql_query("SELECT * FROM educational_qualifications WHERE id='$edit_id' AND username='$user'");	  
	  $get_education = mysql_fetch_array($query);

	  $db_institution = $get_education['institution'];
	  $db_course = $get_education['course'];
	  $db_degree = $get_education['degree'];
	  $db_start_date = $get_education['start_date'];
	  $db_end_date = $get_education['end_date'];	
	
		echo "
     <div class='modal-content edit-education-modal' id='edit-education-modal'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Edit Educational Qualifications</h4>
       </div><!--modal header-->

	   <form method='post' id='edit_education_form' name='edit_education_form'>

       <div class='modal-body'>
	   <div class='edit-education-info'></div><!--where alerts are displayed-->            
		 <div class='form-group'>
		   <label for='institution'>Name of Institution</label>
		   <span class='help-block'>Enter the name of the institution you attended e.g. Delta State University</span>
		   <input type='text' class='form-control' id='institution' name='institution' placeholder='Name of Institution' value='$db_institution'>
		 </div>
		 <div class='row'>
		   <div class='form-group col-md-6'>                     
			 <label for='course' class='col-form-label'>Course</label>
			 <span class='help-block'>What course did you study? E.g. Biochemistry</span>
			 <input type='text' class='form-control' placeholder='Course' id='course' name='course' value='$db_course'>
		   </div>
		   <div class='form-group col-md-6'>                     
			 <label for='degree_obtained' class='col-form-label'>Degree Obtained</label>
			 <span class='help-block'>What degree were you awarded E.g. B.Sc.</span>
			 <input type='text' class='form-control' placeholder='Degree Obtained' id='degree_obtained' name='degree_obtained' value='$db_degree'>
		   </div>			   
		 </div>

		 <div class='row'>
		   <div class='form-group col-md-6'>                     
			 <label for='course_start_date' class='col-form-label'>Start Date</label>
			 <span class='help-block'>Date when you started the course. The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
			 <input type='text' class='form-control' placeholder='Start of course' id='course_start_date' name='course_start_date' value='$db_start_date'>
		   </div>
		   <div class='form-group col-md-6'>                     
			 <label for='course_end_date' class='col-form-label'>End Date</label>
			 <span class='help-block'>Date when your course should end or ended. The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
			 <input type='text' class='form-control' placeholder='End of course' id='course_end_date' name='course_end_date' value='$db_end_date'>
		   </div>			   
		 </div>
       </div><!--end modal-body-->
	   
	   <div class='modal-footer'>
		 <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>		  
		 <button type='submit' class='btn btn-outline-primary' name='edit_education' id='edit_education' data-id='$edit_id'>Edit Eduaction
		 <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
	   </div><!--end modal-body-->

	   </form><!--end edit_education_form-->
         
     </div><!--end modal-content-->
		";
		break;
	
	case 'delete-education':
	
		echo "
     <div class='modal-content delete-education-modal' id='delete-education-modal'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Delete Education Entry</h4>
       </div><!--modal header-->

       <div class='modal-body'>
		 <p>Are you sure you want to delete this entry</p>         		  
       </div><!--end modal-body-->
	   <div class='modal-footer'>
		 <form method='post' id='delete_education_form' name='delete_education_form'>
		   <button type='submit' class='btn btn-default' data-dismiss='modal' aria-label='Close'>Cancel</button>         
		   <button type='submit' class='btn btn-outline-danger' name='delete_education' id='delete_education' data-delete-type='$delete_type' data-delete-id='$delete_id'>Delete
		   <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
		 </form><!--end delete_education_form-->
       </div> 
     </div><!--end modal-content-->
		";
		break;

	case 'add-work-experience':
	
		echo "
      <div class='modal-content add-work-modal' id='add-work-modal'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Add Work Experience</h4>
       </div><!--modal header-->

	   <form method='post' id='update_work_form' name='update_education_form'>

       <div class='modal-body'>         

	   <div class='update-work-info'></div><!--where alerts are displayed-->            
		 <div class='form-group'>
		   <label for='organization_name'>Name of Organnization</label>
		   <span class='help-block'>Enter the name of the organnization. E.g NNPC</span>
		   <input type='text' class='form-control' id='organization_name' name='organization_name' placeholder='Name of Organnization'>
		 </div>

		 <div class='row'>
		   <div class='form-group col-md-6'>                     
			 <label for='position_held' class='col-form-label'>Position Held</label>
			 <span class='help-block'>The position you occupy or currently occupy? E.g. Manager</span>
			 <input type='text' class='form-control' placeholder='Position Held' id='position_held' name='position_held'>
		   </div>
		   <div class='form-group col-md-6'>
			 <label for='position_held' class='col-form-label'>Do you currently work here?</label>
			 <span class='help-block'>Click the checkox if you currently work here?</span>
			 <div class=''>
			   <div class='checkbox'>
				 <label>
				   <input type='checkbox' value='yes' name='currently_there' id='currently_there'> Yes, I currently work here.
				 </label>
			   </div>
			 </div>
		   </div>
		 </div><!--end row-->

		 <div class='row'>
		   <div class='form-group col-md-6'>                     
			 <label for='work_start_date' class='col-form-label'>Start Date</label>
			 <span class='help-block'>Date when you started working here. The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
			 <input type='text' class='form-control' placeholder='Date you started this job' id='work_start_date' name='work_start_date'>
		   </div>
		   <div class='form-group col-md-6'>
			 <label for='work_end_date' class='col-form-label'>End Date</label>
			 <span class='help-block'>Date when you stopped working here. The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
			 <input type='text' class='form-control' placeholder='Date you stopped this job' id='work_end_date' name='work_end_date'>
		   </div>
		 </div><!--end row-->		  
       </div><!--end modal-body-->
	   
	   <div class='modal-footer'>
		 <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
		 <button type='submit' class='btn btn-outline-primary' name='update_work' id='update_work'>Add Work Experience
		 <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>   
	   </div><!--end modal-footer-->
	   </form><!--end change_password_settings_form-->
         
      </div><!--end modal-content-->
		";
		break;

	case 'edit-work':

	  $work_query = mysql_query("SELECT * FROM work_experience WHERE id='$edit_id' AND username='$user'");	  
	  $get_work = mysql_fetch_array($work_query);

	  $db_organization_name = $get_work['organization_name'];
	  $db_position_held = $get_work['position_held'];
	  $db_start_date = $get_work['start_date'];
	  $db_end_date = $get_work['end_date'];	
	  $db_currently_there = $get_work['currently_there'];
	
		echo "
      <div class='modal-content edit-work-modal' id='edit-work-modal'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Edit Work Experience</h4>
       </div><!--modal header-->

	   <form method='post' id='edit_work_form' name='update_education_form'>
       <div class='modal-body'>         
	   <div class='edit-work-info'></div><!--where alerts are displayed-->            
		 <div class='form-group'>
		   <label for='organization_name'>Name of Organnization</label>
		   <span class='help-block'>Enter the name of the organnization. E.g NNPC</span>
		   <input type='text' class='form-control' id='organization_name' name='organization_name' placeholder='Name of Organnization' value='$db_organization_name'>
		 </div>

		 <div class='row'>
		   <div class='form-group col-md-6'>                     
			 <label for='position_held' class='col-form-label'>Position Held</label>
			 <span class='help-block'>The position you occupy or currently occupy? E.g. Manager</span>
			 <input type='text' class='form-control' placeholder='Position Held' id='position_held' name='position_held' value='$db_position_held'>
		   </div>
		   <div class='form-group col-md-6'>
			 <label for='position_held' class='col-form-label'>Do you currently work here?</label>
			 <span class='help-block'>Click the checkox if you currently work here?</span>
			 <div class=''>
			   <div class='checkbox'>
				 <label>
				   <input type='checkbox' value='yes' name='currently_there' id='currently_there' ";

				   //if the individual still works there, check this box
				   if($db_currently_there=='yes'){
					   echo "checked";
					   }

				   echo"> Yes, I currently work here.
				 </label>
			   </div>
			 </div>
		   </div>
		 </div><!--end row-->

		 <div class='row'>
		   <div class='form-group col-md-6'>                     
			 <label for='work_start_date' class='col-form-label'>Start Date</label>
			 <span class='help-block'>Date when you started working here. The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
			 <input type='text' class='form-control' placeholder='Date you started this job' id='work_start_date' name='work_start_date' value='$db_start_date'>
		   </div>
		   <div class='form-group col-md-6'>
			 <label for='work_end_date' class='col-form-label'>End Date</label>
			 <span class='help-block'>Date when you stopped working here. The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
			 <input type='text' class='form-control' placeholder='Date you stopped this job' id='work_end_date' name='work_end_date' ";
			 //if the end date is not empty, show it. Else disable the field
			 if(!empty($db_end_date)){
				 echo "value='$db_end_date'";
				 }else{
				echo"disabled='true'";
					 }
			 echo" >
		   </div>
		 </div><!--end row-->
		  
       </div><!--end modal-body-->
	   <div class='modal-footer'>
		 <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
		 <button type='submit' class='btn btn-outline-primary' name='edit_work' id='edit_work' data-id='$edit_id'>Edit Work Experience
		 <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
       </div><!--end modal-footer-->

	   </form><!--end edit_work_form-->         
      </div><!--end modal-content-->
		";
		break;
	
	case 'delete-work':
	
	echo "
     <div class='modal-content delete-work-modal' id='delete-work-modal'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Delete Work Experience Entry</h4>
       </div><!--modal header-->

       <div class='modal-body'>
		 <p>Are you sure you want to delete this entry</p>         		  
       </div><!--end modal-body-->
	   <div class='modal-footer'>
		 <form method='post' id='delete_work_form' name='delete_work_form'>
		   <button type='submit' class='btn btn-default' data-dismiss='modal' aria-label='Close'>Cancel</button>         
		   <button type='submit' class='btn btn-outline-danger' name='delete_work' id='delete_work' data-delete-type='$delete_type' data-delete-id='$delete_id'>Delete
		   <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
		 </form><!--end delete_education_form-->
       </div> 
     </div><!--end modal-content-->
		";
	break;

	case 'delete-ad':
	
	echo "
     <div class='modal-content delete-ad-modal' id='delete-ad-modal'>
         
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Delete Ad</h4>
       </div><!--modal header-->

       <div class='modal-body'>
		 <p>Are you sure you want to delete this Ad?</p>         		  
       </div><!--end modal-body-->
	   <div class='modal-footer'>
		 <form method='post' id='delete_ad_form' name='delete_ad_form'>
		   <button type='submit' class='btn btn-default' data-dismiss='modal' aria-label='Close'>Cancel</button>         
		   <button type='submit' class='btn btn-outline-danger' name='delete_ad' id='delete_ad' data-delete-type='$delete_type' data-delete-id='$delete_id'>Delete
		   <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
		 </form><!--end delete_education_form-->
       </div> 
     </div><!--end modal-content-->
		";
	break;

	case 'display-ad-interest':
	
	echo "
     <div class='modal-content display-ad-interest' id='display-ad-interest'>
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title'>Interested People</h4>
       </div><!--modal header-->
       <div class='modal-body'>";
				
	   $record_per_page = 30;
	   //$page = '';
	   //$output = '';
	   if(isset($_POST["page"])){
		   $page = $_POST['page'];
		   		   
			}else{
			 $page = 1;			
		  }
		$start_from = ($page-1) * $record_per_page;

		$limit = "$start_from,$record_per_page";
	
		//////////////////Query to show the content of the messages between two users
		$query = "SELECT * FROM interested_list WHERE ad_id='$display_id' ORDER BY id DESC LIMIT ".$limit;
		$result = mysql_query($query);		
		$num_rows = mysql_num_rows($result);
	
	while($get_interest = mysql_fetch_array($result)){
		$ad_id = $get_interest['ad_id'];
		$interested_user = $get_interest['interested_user'];
		
		$db_date = $get_interest['date'];
		$db_date = date('M j, Y',strtotime($db_date));
		$db_time = $get_interest['time'];
		$db_time = date('g:i a',strtotime($db_time));	
	
		$get_interested_user = mysql_query("SELECT * FROM users WHERE username='$interested_user'");
		$get_interested_user_details = mysql_fetch_assoc($get_interested_user);
		
		$interested_fullname = $get_interested_user_details['fullname'];
		$interested_profile_pic = $get_interested_user_details['profile_pic'];
					 
	   echo"
	   <div class='row'>
		 <div class='interest-row col-xs-12'>
		   <a href='http://localhost/studybuddy/profile/$interested_user/about'>
			 <div class='interest-image-box'><img class='' src=' ";
			 if($interested_profile_pic==''){
				   echo"img/profile_pic/user.png";
				 }else{
				   echo"img/profile_pic/$interested_profile_pic";
				 }
			 echo"
			  '></div>
			 <div class='interest-name'>$interested_fullname</div>
		   </a>
		 </div>
	   </div>
	   ";			
	}
	
	/////////////////////////////////////////	
	$page_query = "SELECT * FROM interested_list WHERE ad_id='$display_id' ORDER BY id DESC ";
	
	$page_result = mysql_query($page_query);
	$total_records = mysql_num_rows($page_result);
	$total_pages = ceil($total_records/$record_per_page);
	
	if($total_pages > 1){
		echo"
		<nav aria-label='Page navigation' class='main-interest-navigation load-newer-interest'>
		 <ul class='pager'>
		";
		if($page !=$total_pages){
			echo"
			<li class=''>
			 <a aria-label='Next' class='main_interest_pagination_link' id='".($page + 1)."' ad-id='$ad_id'>
			  <span aria-hidden='true'>Next</span>
			 </a>
			</li>
			";
			}
		echo"
		 </ul>
		</nav>
	  ";	
	}
	echo"
	  </div><!--end modal-body-->
	</div><!--end modal-content--> 
	";
	break;

	default:
		echo "";

	}
?>