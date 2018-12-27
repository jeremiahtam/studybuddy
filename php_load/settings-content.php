<?php 
include('../inc/db.inc.php');
$user = $_POST['user'];

$sql= mysql_query("SELECT * FROM users WHERE username='$user' AND removed='no'");
$row = mysql_fetch_assoc($sql);

$id = $row['id'];
$fullname = $row['fullname'];
$username = $row['username'];
$phone = $row['phone'];
$email = $row['email'];
$state = $row['state'];
$city = $row['city'];
$address = $row['address'];
$about = $row['about'];
  
echo" 
 <!-- Nav tabs -->
 <ul class='nav' role='tablist'>
   <li class='active'><a href='#personal' aria-controls='personal' role='tab' data-toggle='tab'>Personal</a></li>
   <li ><a href='#change-password' aria-controls='change-password' role='tab' data-toggle='tab'>Password</a></li>
   <li ><a href='#privacy' aria-controls='privacy' role='tab' data-toggle='tab'>Privacy</a></li>
 </ul>
 
 <!--tab-content-->
 <div class='tab-content'>
   <div role='tabpanel' class='tab-pane active' id='personal'>
     <div class='panel-body'>
       <form id='personal-settings'>
         <div class='row form-group'>               
           <div class='col-md-6'>
             <label for='fullname' class='control-label'>Fullname</label>
             <input type='text' class='form-control' id='fullname' placeholder='Fullname' value='$fullname'>
           </div>
           <div class='col-md-6'>
             <label for='username' class='control-label'>Username</label>
             <input type='text' class='form-control' id='username' placeholder='Username' value='$username'>
           </div>
         </div><!-- end row-->               

         <div class='row form-group'>               
           <div class='col-md-4'>
             <label for='phoneNumber' class='control-label'>Phone Number</label>
             <input type='text' class='form-control' id='phoneNumber' placeholder='Phone Number' value='$phone'>
           </div>
           <div class='col-md-4'>
             <label for='state' class='control-label'>State</label>
             <input type='text' class='form-control' id='state' placeholder='State' value='$state'>
           </div>
           <div class='col-md-4'>
             <label for='city' class='control-label'>City</label>
             <input type='text' class='form-control' id='city' placeholder='City' value='$city'>
           </div>
          </div><!-- end row-->               
          
          <div class='form-group'>
            <label for='address' class='control-label'>Address</label>
            <input type='text' class='form-control' id='addressAutocomplete' placeholder='Address' value='$address' onFocus='geolocate()'>
		  </div>
          <div class='form-group'>
            <label for='about' class='control-label'>About</label>
            <textarea class='form-control' rows='3' placeholder='About' id='about'>$about</textarea>
          </div>
          <button type='submit' class='btn btn-default'>Update Personal Info</button>
      </form>
   </div><!--end panel-body-->
 </div><!--end personal settings tab-pane-->  
 
 <div role='tabpanel' class='tab-pane' id='change-password'>
   <div class='panel-body'>
     <form class='form-horizontal' id='change-password-form'>
       <div class='form-group has-feedback'>
         <label for='old_password' class='col-md-2 control-label'>Old password</label>
         <div class='col-md-10'>
           <span class='glyphicon glyphicon-warning-sign form-control-feedback' aria-hidden='true'></span>
           <input type='password' class='form-control' id='old_password' name='old_password' placeholder='Input old password'>
         </div>
       </div><!--end form-group-->
       
       <div class='form-group'>
         <label for='new_password' class='col-md-2 control-label'>New password</label>
         <div class='col-md-10'>
           <input type='password' class='form-control' id='new_password' name='new_password' placeholder='Input new password'>
         </div>
       </div><!--end form-group-->
       
       <div class='form-group'>
         <label for='new_password_repeat' class='col-md-2 control-label'>Re-enter new password</label>
         <div class='col-md-10'>
           <input type='password' class='form-control' id='new_password_repeat' name='new_password_repeat' placeholder='Re-enter new password'>
         </div>
       </div><!--end form-group-->

       <div class='form-group'>
         <div class='col-md-2'></div>
         <div class='col-md-10'>
           <button type='submit' class='btn btn-default'>Change Password</button>
         </div>
       </div><!--end form-group-->
       
     </form>
   </div><!--end panel-body-->
 </div><!--end change-password tab-pane-->
 
 <div role='tabpanel' class='tab-pane' id='privacy'>
   <div class='panel-body'>
     <form class='form-horizontal' id='privacy-settings'>
       
       <div class='form-group'>
         <label for='new_password_repeat' class='col-md-6 control-label'>Who do you want to see your phone number?</label>
         <div class='col-md-6'>
           <!-- Extra small button group -->
            <div class='btn-group'>
              <button class='btn btn-default btn-xs dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
               <span class='glyphicon glyphicon-globe'></span> Everyone <span class='caret'></span>
              </button>
              <ul class='dropdown-menu'>
                <li><a><span class='glyphicon glyphicon-globe'></span> Everyone</a></li>
                <li><a><span class='glyphicon glyphicon-user'></span> Only Me</a></li>
              </ul>
            </div><!--end extra-small button-->
         </div>
       </div><!--end form-group-->
        
       <div class='form-group'>
         <label for='new_password_repeat' class='col-md-6 control-label'>Who do you want to see your email address?</label>
         <div class='col-md-6'>
           <!-- Extra small button group -->
            <div class='btn-group'>
              <button class='btn btn-default btn-xs dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
               <span class='glyphicon glyphicon-globe'></span> Everyone <span class='caret'></span>
              </button>
              <ul class='dropdown-menu'>
                <li><a><span class='glyphicon glyphicon-globe'></span> Everyone</a></li>
                <li><a><span class='glyphicon glyphicon-user'></span> Only Me</a></li>
              </ul>
            </div><!--end extra-small button-->
         </div>
       </div><!--end form-group-->
      </form>
    </div><!--end panel-body-->
  </div><!--end privacy tab-pane-->

</div><!--end tab-content-->
";//end echo
?>