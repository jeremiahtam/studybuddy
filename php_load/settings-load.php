<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
$settings_page = $_POST['settings_page'];

switch($settings_page){
	
	case 'personal':
		$sql= mysql_query("SELECT * FROM users WHERE username='$user' AND removed='no'");
		$row = mysql_fetch_assoc($sql);

		$id = $row['id'];
		$fullname = $row['fullname'];
		$username = $row['username'];
		$phone = $row['phone'];
		$email = $row['email'];
		$location = $row['location'];
		$gender = $row['gender'];
		$bio = $row['bio'];
		$date_of_birth = $row['date_of_birth'];
		
		echo "
          <div class='panel personal-info-settings-box'>
           <div class='panel-heading '>Change Personal Information</div>
           <div class='panel-body'>
             <div class='update-settings-info'></div><!--where alerts are displayed-->            
             <form method='post' id='personal_info_form' name='personal_info_form'>
			 
               <div class='form-group'>
                 <label for='fullname' class='col-form-label'>Full Name</label>
                 <span class='help-block'>Enter the fullname of the e.g. John Q.</span>
				 <input type='text' class='form-control' id='fullname' name='fullname' placeholder='Full Name' value='$fullname'>
               </div>
             
			   <div class='form-group'>                     
                 <label for='location' class='col-form-label'>Location</label>
                 <span class='help-block'>E.g. Siluko Road, Benin City, Edo State</span>
				 <input type='text' class='form-control' placeholder='Location' id='location' onFocus='geolocate()' name='location' value='$location'>
               </div>
               <div class='row'>
                 <div class='form-group col-md-4'>
                   <label for='phone_number' class='col-form-label'>Phone Number</label>
				   <span class='help-block'>It should be numbers only E.g. 07012345678</span>
				   <input type='text' class='form-control' id='phone_number' name='phone_number' placeholder='Phone Number' value='$phone'>
                 </div>
                 <div class='form-group col-md-5'>
                   <label for='date_of_birth' class='col-form-label'>Date Of Birth</label>
				   <span class='help-block'>The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
                   <input type='text' class='form-control' id='date_of_birth' name='date_of_birth' placeholder='Date of birth (yyyy-mm-dd)' value='$date_of_birth'>
                 </div>                        
                 <div class='form-group col-md-3'>
                   <label for='gender' class='col-form-label'>Gender</label>
				   <span class='help-block'>Select your gender from the options.</span>
                   <select class='form-control' id='gender' name='gender'>
					 <option value='' ";
					  if($gender==''){
						  echo"selected";
						  }
					  echo">Select your gender</option>
					 <option value='Male' ";
					  if($gender=='Male'){
						  echo"selected";
						  }					 
					 echo">Male</option>
					 <option value='Female' ";
					  if($gender=='Female'){
						  echo"selected";
						  }					 
					 echo">Female</option>
				   </select>
                 </div>                        
               </div>  
               <div class='form-group'>
				 <label for='bio'>Bio</label>
			     <span class='help-block'>Brief description of yourself. (Maximum of 250 characters)</span>
			     <span class='char'></span>
				 <textarea class='form-control bio' maxlength='250' id='bio' name='bio' rows='2' placeholder='Brief description of yourself (Maximum 250 characters)'>$bio</textarea>
			   </div>
			         
               <button type='submit' class='btn btn-success' name='update_personal_info' id='update_personal_info'>Update Personal Info
               <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
             </form><!--end update_personal_info form-->
           </div><!--end panel-body-->
          </div><!--end panel personal-info-settings-box-->
		";
		break;

	case 'privacy':
		$sql= mysql_query("SELECT * FROM privacy_settings WHERE username='$user'");
		$row = mysql_fetch_assoc($sql);

		$id = $row['id'];
		$phone = $row['phone'];
		$email = $row['email'];
		$age = $row['age'];
		$location = $row['location'];

		echo "

          <div class='panel privacy-settings-box'>
           <div class='panel-heading '>Privacy Settings</div>
          
           <div class='panel-body'>
             <div class='privacy-info'></div><!--where alerts are displayed-->            
             <form method='post' id='privacy_form' name='privacy_form'>
               <div class='form-group'>
                 <label for='phone_number' class='col-form-label'>Display Phone Number</label>
                 <div class='row'>
                   <span class='help-block col-md-8'>Choose to make your phone number visible to public viewers of your profile or yourself only.</span>
                   <div class=' col-md-4'>
                       <div class='switch-label'>Private</div>
                         <div class='checkbox checkbox-slider--b '>
                           <label><input type='checkbox' class='phone_number' id='phone_number' name='phone_number' value='checked' "; 
                           if($phone=="public"){ echo "checked";}else{echo"";}
                          echo"><span></span></label>
                         </div>
                       <div class='switch-label'>Public</div>
                   </div>               	 
                 </div>
               </div>
               <div class='form-group'>
                 <label for='email' class='col-form-label'>Display Email</label>
                 <div class='row'>
                   <span class='help-block col-md-8'>Choose to allow viewers of your profile to see your email address.</span>
                   <div class=' col-md-4'>
                       <div class='switch-label '>Private</div>
                         <div class='checkbox checkbox-slider--b '>
                           <label><input type='checkbox' class='privacy_email' id='privacy_email' name='privacy_email' value='checked' ";
                           if($email=="public"){ echo "checked";}else{echo"";}
						   echo"><span></span></label>
                         </div>
                       <div class='switch-label '>Public</div>
                   </div>               	 
                 </div>
               </div>
               <div class='form-group'>
                 <label for='age' class='col-form-label'>Display Age</label>
                 <div class='row'>
                   <span class='help-block col-md-8'>Choose to make your age visible to visitors of your profile.</span>
                   <div class=' col-md-4'>
                       <div class='switch-label '>Private</div>
                         <div class='checkbox checkbox-slider--b '>
                           <label><input type='checkbox' class='age' id='age' name='age' value='checked' ";
                           if($age=="public"){ echo "checked";}else{echo"";}
						   echo"><span></span></label>
                         </div>
                       <div class='switch-label '>Public</div>
                   </div>               	 
                 </div>
               </div>
               <div class='form-group'>
                 <label for='location' class='col-form-label'>Display Location</label>
                 <div class='row'>
                   <span class='help-block col-md-8'>Allowing your location to be public can help people connect to you based on your location.</span>
                   <div class=' col-md-4'>
                       <div class='switch-label'>Private</div>
                         <div class='checkbox checkbox-slider--b '>
                           <label><input type='checkbox' class='location' id='location' name='location' value='checked' ";
                           if($location=="public"){ echo "checked";}else{echo"";}
						   echo"><span></span></label>
                         </div>
                       <div class='switch-label'>Public</div>
                   </div>               	 
                 </div>
               </div>

               <button type='submit' class='btn btn-success' name='update_privacy' id='update_privacy'>Update Privacy
               <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
             </form><!--end privacy_form-->
           </div><!--end panel-body-->
          </div><!--end panel privacy-settings-box-->


		";
		break;

	case 'billing':
	
		$sql= mysql_query("SELECT * FROM billing_settings WHERE username='$user'");
		$row = mysql_fetch_assoc($sql);

		$id = $row['id'];
		$username = $row['username'];
		$bank_name = $row['bank_name'];
		$account_owner = $row['account_owner'];
		$account_number = $row['account_number'];
		$billing_code = $row['billing_code'];

		echo "
          <div class='panel billing-settings-box'>
           <div class='panel-heading '>Billing Details</div>
           <div class='panel-body'>
             <div class='billing-info'>";
			 if(empty($billing_code)){
				  }else{
			 echo "<p class='alert-danger'>This account details has not been confirmed yet! Click '<a class='updateBillingCode_link'>here</a>' to confirm details.</p>";
					  }
			 echo"
			 </div><!--where alerts are displayed-->
             <form method='post' id='billing_form' name='billing_form' class=''>
               <div class='form-group'>
                 <label for='account_owner' class='col-form-label'>Account Holder's Name</label>
                 <span class='help-block'>Enter the name of the bank account holder e.g. Samuel L. Jackson</span>
                 <input type='text' class='form-control' id='account_owner' name='account_owner' value='$account_owner' placeholder='Enter Name of Account Owner'>
               </div>
               <div class='form-group'>                     
                 <label for='bank_name' class='col-form-label'>Bank Name</label>
                 <span class='help-block'>E.g. Diamond Bank</span>
                 <input type='text' class='form-control' placeholder='Enter Name of Bank' id='bank_name' value='$bank_name' name='bank_name'>
               </div>
               <div class='form-group'>                     
                 <label for='account_number' class='col-form-label'>Account Number</label>
                 <span id='helpBlock2' class='help-block'>Your bank account number must be ten(10) digits long. </span>
                 <input type='text' class='form-control' placeholder='Enter Account Number' id='account_number' value='$account_number' name='account_number'>
               </div>
               <button type='submit' class='btn btn-success' name='update_billing' id='update_billing'>Update Billing Details
               <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
             </form><!--end billing_form-->
           </div><!--end panel-body-->
          </div><!--end panel billing-settings-box-->
		";
		break;

	case 'updateBillingCode':

		  echo"
          <div class='panel confirm-billing-code-info-settings-box'>
           <div class='panel-heading '>Enter Confirmation Code</div>
           <div class='panel-body'>
             <div class='billing-info'></div><!--where alerts are displayed-->
             <form method='post' id='confirm_billing_code' name='confirm_billing_code'>
               <div class='form-group'>
                 <label for='billing_code' class='col-form-label'>Enter Confirmation Code</label>
                 <span class='help-block'>Enter the six(6) digit confirmation code you received in your email.</span>
                 <input type='text' class='form-control' id='billing_code' name='billing_code' placeholder='Enter the billing code'>
               </div>
			   <button type='submit' class='btn btn-success' name='update_billing_code' id='update_billing_code'>Confirm Billing Update
			   <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
             </form><!--end onfirm_billing_cod-->
           </div><!--end panel-body-->
          </div><!--end panel personal-info-settings-box-->
		";
		break;

	case 'notifications':
		$sql= mysql_query("SELECT * FROM notification_settings WHERE username='$user'");
		$row = mysql_fetch_assoc($sql);

		$id = $row['id'];
		$comments = $row['comments'];
		$replies = $row['replies'];
		$requests = $row['requests'];
		$messages = $row['messages'];

		echo "
          <div class='panel notification-settings-box'>
           <div class='panel-heading '>Notification Settings</div>
          
           <div class='panel-body'>
             <div class='notification-settings-info'></div><!--where alerts are displayed-->            
             <form method='post' id='notification_settings_form' name='notification_settings_form'>
               <div class='form-group'>
                 <label for='requests' class='col-form-label'>Requests</label>
                 <div class='row'>
                   <span class='help-block col-md-8'>Do you want to receive email notifications whenever a request is made to connect with you, join a group you created or a tutorial you formed?</span>
                   <div class=' col-md-4'>
                       <div class='switch-label '>No</div>
                         <div class='checkbox checkbox-slider--b '>
                           <label><input type='checkbox' class='requests' id='requests' name='requests' value='checked' "; 
                           if($requests=="yes"){ echo "checked";}else{echo"";}
						   echo"><span></span></label>
                         </div>
                       <div class='switch-label '>Yes</div>
                   </div>               	 
                 </div>
               </div>
               <div class='form-group'>
                 <label for='comments' class='col-form-label'>Comments</label>
                 <div class='row'>
                   <span class='help-block col-md-8'>Receive email notification when someone makes a comment a group or tutorial you created.</span>
                   <div class=' col-md-4'>
                       <div class='switch-label '>No</div>
                         <div class='checkbox checkbox-slider--b '>
                           <label><input type='checkbox' class='comments' id='comments' name='comments' value='comments' ";
                           if($comments=="yes"){ echo "checked";}else{echo"";}
						   echo"><span></span></label>
                         </div>
                       <div class='switch-label '>Yes</div>
                   </div>               	 
                 </div>
               </div>
               <div class='form-group'>
                 <label for='replies' class='col-form-label'>Replies</label>
                 <div class='row'>
                   <span class='help-block col-md-8'>Receive email notification when someone replies a comment you made in group or tutorial.</span>
                   <div class=' col-md-4'>
                       <div class='switch-label '>No</div>
                         <div class='checkbox checkbox-slider--b '>
                           <label><input type='checkbox' class='replies' id='replies' name='replies' value='checked' ";
                           if($replies=="yes"){ echo "checked";}else{echo"";}
						   echo"><span></span></label>
                         </div>
                       <div class='switch-label '>Yes</div>
                   </div>               	 
                 </div>
               </div>
               <div class='form-group'>
                 <label for='messages' class='col-form-label'>Messages</label>
                 <div class='row'>
                   <span class='help-block col-md-8'>Receive email notification when someone sends you a direct message.</span>
                   <div class=' col-md-4'>
                       <div class='switch-label '>No</div>
                         <div class='checkbox checkbox-slider--b '>
                           <label><input type='checkbox' class='messages' id='messages' name='messages' value='checked' ";
                           if($messages=="yes"){ echo "checked";}else{echo"";}
						   echo"><span></span></label>
                         </div>
                       <div class='switch-label '>Yes</div>
                   </div>               	 
                 </div>
               </div>

               <button type='submit' class='btn btn-success' name='update_notification_settings' id='update_notification_settings'>Update Notification Settings
               <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
             </form><!--end notification_settings_form-->
           </div><!--end panel-body-->
          </div><!--end panel notification-settings-box-->


		";
		break;
	
	case 'password':
		echo "
          <div class='panel change-password-settings-box'>
           <div class='panel-heading '>Change Password</div>
           <div class='panel-body'>
             <div class='update-password-info'></div><!--where alerts are displayed-->            
             <form method='post' id='change_password_settings_form' name='change_password_settings_form'>
               <div class='form-group'>
                 <label for='old_password' class='col-form-label'>Old Password</label>
                 <span class='help-block'>Enter your old password. </span>
                 <input type='password' class='form-control' id='old_password' name='old_password' placeholder='Enter Old Password'>
               </div>
               <div class='form-group'>                     
                 <label for='new_password' class='col-form-label'>New Password</label>
                 <span class='help-block'>Enter a new password. It should not be less than six(6) characters long.</span>
                 <input type='password' class='form-control' placeholder='Enter New Password' id='new_password' name='new_password'>
               </div>
               <div class='form-group'>                     
                 <label for='repeat_new_password' class='col-form-label'>Repeat New Password</label>
                 <span class='help-block'>Re-enter your new password. It should be the same with the 'New Password' above. </span>
                 <input type='password' class='form-control' placeholder='Repeat New Password' id='repeat_new_password' name='repeat_new_password'>
               </div>
               <button type='submit' class='btn btn-success' name='change_password' id='change_password'>Change Password
               <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
             </form><!--end change_password_settings_form-->
           </div><!--end panel-body-->
          </div><!--end panel change-password-settings-box-->

		";
		break;

	case 'education':
		echo "
          <div class='panel education-settings-box'>
           <div class='panel-heading'>Add Educational Qualifications</div>
           <div class='panel-body'>
             <div class='update-education-info'></div><!--where alerts are displayed-->            
             <form method='post' id='update_education_form' name='update_education_form'>
               <div class='form-group'>
                 <label for='institution'>Name of Institution</label>
                 <span class='help-block'>Enter the name of the institution you attended e.g. Delta State University</span>
				 <input type='text' class='form-control' id='institution' name='institution' placeholder='Name of Institution' value=''>
			   </div>
			   <div class='row'>
				 <div class='form-group col-md-6'>                     
				   <label for='course' class='col-form-label'>Course</label>
				   <span class='help-block'>What course did you study? E.g. Biochemistry</span>
				   <input type='text' class='form-control' placeholder='Course' id='course' name='course'>
				 </div>
				 <div class='form-group col-md-6'>                     
				   <label for='degree_obtained' class='col-form-label'>Degree Obtained</label>
				   <span class='help-block'>What degree were you awarded e.g. B.Sc., M.Sc., etc</span>
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

               <button type='submit' class='btn btn-success' name='update_education' id='update_education'>Add Eduaction
               <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
             </form><!--end change_password_settings_form-->";
			
			 echo"
			 <div class='table-responsive'>
			   <table class='table table-striped education-content'>
				<tr class='education-content-heading'>
				  <th>Institution</th>
				  <th class='hidden-sm'>Course</th>
				  <th class='hidden-sm'>Degree Obtained</th>
				  <th class='hidden-sm'>Start Date</th>
				  <th class='hidden-sm'>End Date</th>
				  <th>Action</th>
				</tr>";
			  $sql= mysql_query("SELECT * FROM educational_qualifications WHERE username='$user'");
			  $edu_num_rows = mysql_num_rows($sql);
			  if($edu_num_rows>0){  
				while($row = mysql_fetch_assoc($sql)){
				$id = $row['id'];
				$username = $row['username'];
				$institution = $row['institution'];
				$course = $row['course'];
				$degree = $row['degree'];
				$start_date = $row['start_date'];
				$end_date = $row['end_date'];
  
				echo"
				  <tr class=''>
					<td>$institution</td>
					<td class='hidden-sm'>$course</td>
					<td  class='hidden-sm'>$degree</td>
					<td class='hidden-sm'>$start_date</td>
					<td class='hidden-sm'>$end_date</td>
					<td><button class='btn btn-danger btn-xs' data-id='$id'>Delete</button></td>
				  </tr>";
				}
			  }
			  echo"
			  </table>
				 ";
			 
		echo"
            </div><!--end panel-body-->
          </div><!--end panel education-settings-box-->
		</div><!--end table-responsive-->
		";
		break;

	case 'work':
		echo "
          <div class='panel education-settings-box'>
           <div class='panel-heading '>Add Work Experience</div>
           <div class='panel-body'>
             
			 <div class='update-password-info'></div><!--where alerts are displayed-->            
           
		     <form method='post' id='change_password_settings_form' name='change_password_settings_form'>
               <div class='form-group '>
                 <label for='old_password' class='col-form-label'>Old Password</label>
                 <span class='help-block'>Enter your old password. </span>
			     <input type='password' class='form-control' id='old_password' name='old_password' placeholder='Enter Old Password'>
			   </div>
           
		       <div class='form-group'>                     
                 <label for='new_password' class='col-form-label'>New Password</label>
                 <span class='help-block'>Enter a new password. It should not be less than six(6) characters long.</span>
                 <input type='password' class='form-control' placeholder='Enter New Password' id='new_password' name='new_password'>
               </div>
           
		       <div class='form-group'>                     
                 <label for='repeat_new_password' class='col-form-label'>Repeat New Password</label>
                 <span class='help-block'>Re-enter your new password. It should be the same with the 'New Password' above. </span>
                 <input type='password' class='form-control' placeholder='Repeat New Password' id='repeat_new_password' name='repeat_new_password'>
               </div>
           
		       <button type='submit' class='btn btn-success' name='change_password' id='change_password'>Change Password
               <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
             </form><!--end change_password_settings_form-->
           
		   </div><!--end panel-body-->
          </div><!--end panel change-password-settings-box-->
		  
		  <div class='row'>
		  
		  </div>

		";
		break;
	
	default:
		$sql= mysql_query("SELECT * FROM users WHERE username='$user' AND removed='no'");
		$row = mysql_fetch_assoc($sql);

		$id = $row['id'];
		$fullname = $row['fullname'];
		$username = $row['username'];
		$phone = $row['phone'];
		$email = $row['email'];
		$location = $row['location'];
		$gender = $row['gender'];
		$bio = $row['bio'];
		$date_of_birth = $row['date_of_birth'];
		
		echo "
          <div class='panel personal-info-settings-box'>
           <div class='panel-heading '>Change Personal Information</div>
           <div class='panel-body'>
             <div class='update-settings-info'></div><!--where alerts are displayed-->            
             <form method='post' id='personal_info_form' name='personal_info_form'>
			 
               <div class='form-group'>
                 <label for='fullname' class='col-form-label'>Full Name</label>
                 <span class='help-block'>Enter the fullname of the e.g. John Q.</span>
				 <input type='text' class='form-control' id='fullname' name='fullname' placeholder='Full Name' value='$fullname'>
               </div>
             
			   <div class='form-group'>                     
                 <label for='location' class='col-form-label'>Location</label>
                 <span class='help-block'>E.g. Siluko Road, Benin City, Edo State</span>
				 <input type='text' class='form-control' placeholder='Location' id='location' onFocus='geolocate()' name='location' value='$location'>
               </div>
               <div class='row'>
                 <div class='form-group col-md-4'>
                   <label for='phone_number' class='col-form-label'>Phone Number</label>
				   <span class='help-block'>It should be numbers only E.g. 07012345678</span>
				   <input type='text' class='form-control' id='phone_number' name='phone_number' placeholder='Phone Number' value='$phone'>
                 </div>
                 <div class='form-group col-md-5'>
                   <label for='date_of_birth' class='col-form-label'>Date Of Birth</label>
				   <span class='help-block'>The format must be yyyy-mm-dd. E.g. 1994-12-30</span>
                   <input type='text' class='form-control' id='date_of_birth' name='date_of_birth' placeholder='Date of birth (yyyy-mm-dd)' value='$date_of_birth'>
                 </div>                        
                 <div class='form-group col-md-3'>
                   <label for='gender' class='col-form-label'>Gender</label>
				   <span class='help-block'>Select your gender from the options.</span>
                   <select class='form-control' id='gender' name='gender'>
					 <option value='' ";
					  if($gender==''){
						  echo"selected";
						  }
					  echo">Select your gender</option>
					 <option value='Male' ";
					  if($gender=='Male'){
						  echo"selected";
						  }					 
					 echo">Male</option>
					 <option value='Female' ";
					  if($gender=='Female'){
						  echo"selected";
						  }					 
					 echo">Female</option>
				   </select>
                 </div>                        
               </div>  
               <div class='form-group'>
				 <label for='bio'>Bio</label>
			     <span class='help-block'>Brief description of yourself. (Maximum of 250 characters)</span>
			     <span class='char'></span>
				 <textarea class='form-control bio' maxlength='250' id='bio' name='bio' rows='2' placeholder='Brief description of yourself (Maximum 250 characters)'>$bio</textarea>
			   </div>
			         
               <button type='submit' class='btn btn-success' name='update_personal_info' id='update_personal_info'>Update Personal Info
               <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>         
             </form><!--end update_personal_info form-->
           </div><!--end panel-body-->
          </div><!--end panel personal-info-settings-box-->
		";
	}
?>