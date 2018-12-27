<?php
session_start(); 

if(!isset($_SESSION["login_user"])){
	   }
	else
	   {
	$user = $_SESSION["login_user"];
	   }
  include("/inc/db.inc.php");
  
  if (isset($_GET['u'])){
  $username = mysqli_real_escape_string($_GET['u']);
  if (!empty($username)){
  //check user exists
  $check = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND removed='no'");
  if (mysqli_num_rows($check)===1){
        $get = mysqli_fetch_assoc($check);
        $username = $get['username'];
        $profile_pic = $get['profile_pic'];
        
		#get profile page type
		if (isset($_GET['profile_type'])){
			$profile_type=$_GET['profile_type'];
			if($profile_type =="ads" || $profile_type =="connections" || $profile_type =="about"){
			  }else{
				 header("Location: http://localhost/studybuddy/home");
				exit();
				  }
		}else{
		  $profile_type='';
			}
		#after getting the profile page type, get the page number
		if (isset($_GET['page'])){
			$page=$_GET['page'];
			}else{
			  $page='';
				}					
      }#end num-rows check
    else
      {
	header("Location: http://localhost/studybuddy/home");
    exit();
        }
      }else{
	header("Location: http://localhost/studybuddy/home");
        }
      }else{
	header("Location: http://localhost/studybuddy/home");
    }

 ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="http://localhost/studybuddy/" />

<title>Profile | StuddyBuddy</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="fonts/flaticon1/flaticon.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href='css/croppie.css' rel='stylesheet'>
<link href="css/style.css" rel="stylesheet">
<link href='css/datepicker.css' rel='stylesheet'>
</head>
<input hidden="true" user-profile='<?php echo $username?>' class='hidden-user-profile'>
<body>
  <div class="custom-container">
    <?php include("./inc/menu.inc.php");?>

    <div class='modal fade' id='modal' tabindex='-1' role='dialog'>
       <div class='modal-dialog' role='document'>
  
      </div><!--modal-dialog-->
    </div><!--end modal-->

    <section class="profile-bg">

      <img src='img/ajax-loader(2).gif' class='preloader' width='22px' height='22px' hidden='true'/>    

    </section>
    
	<section class='profile-body'>
	  <div class='container'>

		<div class='row'>
	  	  
          <div class='col-md-3'>
            <div class='profile-box'>  
          <?php
            #get user information from database
            $sql = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND removed='no'");
            $num_rows = mysqli_num_rows($sql);
            if($num_rows == 1){
                $row = mysqli_fetch_assoc($sql);
                        
                $id = $row['id'];
                $fullname = $row['fullname'];
                $gender = $row['gender'];
				$date_of_birth = $row['date_of_birth'];
				$bio = $row['bio'];
				  
				#get age of user
				$from = new DateTime($date_of_birth);
				$to   = new DateTime('today');
				$age = $from->diff($to)->y;
            }
            #check for privacy settings to determine content to show
            $privacy_sql = mysqli_query($conn,"SELECT * FROM privacy_settings WHERE username='$username'");
            $privacy_num_rows = mysqli_num_rows($privacy_sql);
            if($privacy_num_rows == 1){
                $privacy_row = mysqli_fetch_assoc($privacy_sql);                    
				$age_privacy = $privacy_row['age'];
            }
  
  
            echo"
                <div class='name'><a>$fullname</a></div>
                <div class='username'>$username</div>";
                if($age_privacy='public'){
                    if($date_of_birth!=''){
                        echo "<div class='age'> <span class='ion-ios-calendar-outline'></span> $age years old</div>";
                        }
                    }
                echo" 
				<div class='gender'> $gender</div>
                <div class='bio'>$bio</div>";
                #check if a user is logged in
                if(isset($user)){
                  #only show if the profile belongs to the user 
                  if($user!==$username){
                     echo"
                        <a class='send-message-button btn btn-outline-primary' href='http://localhost/studybuddy/messages/$username'>Message</a>
                      ";			  
                    }
                }
               #check connection requests to determine the status of the connect button
               if(isset($user)){ 
                 #display connect button only if the user and username are different
                 if($user!==$username){
                     
                    echo"<a class='connection-button-box'>";			   
                    #check if the logged in user has sent a connection request to the profile owner
                    $sent_request_sql = mysqli_query($conn,"SELECT * FROM connection_requests WHERE user_from='$user' AND user_to='$username'");
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
                              echo" <button class='btn btn-default connection-button' id='cancel-connect-request'><span class='connect-btn-text'>Cancel Request</span> 
                                      <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
                                    </button>";
                            break;
                            case 'connected':
                              echo" <button class='btn btn-default connection-button' id='disconnect'><span class='connect-btn-text'> Disconnect</span>
                                      <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
                                    </button>";
                            break;
                            }
                       }
                    #check if the logged in user has received a connection request to the profile owner
                    $received_request_sql = mysqli_query($conn,"SELECT * FROM connection_requests WHERE user_to='$user' AND user_from='$username'");
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
                              echo" <button class='btn btn-default connection-button' id='accept-request'><span class='connect-btn-text'> Accept Connection</span> 
                                      <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
                                    </button>
                                    <button class='btn btn-default connection-button' id='reject-request'><span class='connect-btn-text'> Reject</span>
                                      <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
                                    </button>";
                            break;
                            case 'connected':
                              echo" <button class='btn btn-default connection-button' id='disconnect'><span class='connect-btn-text'> Disonnect</span>
                                      <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
                                    </button>";
                            break;
                            }
                       }
                    if($sent_request_num_rows == 0 && $received_request_num_rows==0){#if a connection request has not been sent
                       echo"<button class='btn btn-default connection-button' id='connect'><span class='connect-btn-text'> Connect</span>
                              <img src='img/ajax-loader.gif' class='preloader' width='12px' height='12px' hidden='true'/>
                            </button>";
                      }#end sent request query
                    echo"
                    </a><!--connection-button-box-->";
                                      
                    }//end it $user!==$username
                }
      
              ?>
      
               
            </div><!--end profile-box-->
          </div><!--end col-md-3-->
          
          <div class="col-md-9 main-profile-content">
            
            <ul class="nav nav-pills profile-nav" id="myTab" role="tablist">
              <li class="">
                <a class="profile-nav-target <?php if($profile_type == '' || $profile_type == 'ads'){echo 'active';}?>"  id="ads">Ads</a>
              </li>
              <li class="">
                <a class="profile-nav-target <?php if($profile_type == 'connections'){echo 'active';}?>"  id="connections">Connections</a>
              </li>
              <li class="">
                <a class="profile-nav-target <?php if($profile_type == 'about'){echo 'active';}?>" id="about">About</a>
              </li>
            </ul>
            
            <div class="tab-content" id="myTabContent">

              <img src='img/ajax-loader(2).gif' class='preloader' width='30px' height='30px' hidden="true"/>  

            </div><!--end tab-content-->  
          </div><!--end col-md-9-->
        </div><!--end row-->
        
	  </div><!--end container-->
	</section><!--end profile-body-->

    
  <?php //include("./inc/footer.inc.php");?>
  </div><!--end container-fluid-->

<!--all javascript and jquery plugin-->
<script src="js/jquery-ui.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/croppie.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<script src="js/ajax-script.js"></script>
<script>
/*$(document).ready(function(e) {
var len = $(window).width();
alert(len)    
});
*/   
$(document).ready(function(e) {
	function load_interests(page,ad_id){
	var window_width = $(window).width();
	$.ajax({
	   url:'php_load/show-ad-interests.php',
	   type:'POST',
	   data:{
		   ad_id:ad_id,
		   page:page,
		   window_width:window_width
		   },
	   beforeSend:function(){
		   },
	   success:function(info){
		   if(page>1){
			  var window_width = $(window).width();
			  if(window_width > 991){
				$('.modal-body .display-ad-interest-navigation').append(info);
				$('#display-ad-interest .modal-body').append(info);
			  }else{
				 $('#display-ad-interest .modal-body').html(info);
			  }//end if window_width>992
		   }else{
				$('#display-ad-interest .modal-body').html(info);
			   }

		 }//end success
	  })
	}//end function
	$(document).on('click','.main_interest_pagination_link',function(){
	  var page = $(this).attr('id');
	  var ad_id = $(this).attr('ad-id');
	  $('.main-interest-navigation').remove();
	  load_interests(page,ad_id);
	})
});
		
/*$(document).ready(function(){
	var width = $(window).width();
	alert(width);
	})*/
$(document).ready(function(){
  $(document.body).on('click','.remove-interest-btn',function(){
	  var $this = $(this);
	  var interest_id = $this.attr('data-interest-id');
	  $.ajax({
		type:'POST',
		url:'php_load/remove_interest.php',
		data:{
		  interest_id:interest_id
		  },
		global:false,
		beforeSend: function(){
			//$('').attr('hidden',false);
			},
		success:function(data){
		var interest_count_id = $('.count_id_'+interest_id).html(data);
		$this.addClass('add-interest-btn');
		$this.removeClass('remove-interest-btn');
	  //alert(interest_count_id)
	  
		 }
	  });//end ajax request
  })//end onclick
})//end document ready

$(document).ready(function(){
  $(document.body).on('click','.add-interest-btn',function(){
	  var $this = $(this);
	  var interest_id = $this.attr('data-interest-id');
	  $.ajax({
		type:'POST',
		url:'php_load/add_interest.php',
		data:{
		  interest_id:interest_id
		  },
		global:false,
		beforeSend: function(){
			//$('').attr('hidden',false);
			},
		success:function(data){
		var interest_count_id = $('.count_id_'+interest_id).html(data);
		$this.addClass('remove-interest-btn');
		$this.removeClass('add-interest-btn');
	  //alert(interest_count_id)
	  
		 }
	  });//end ajax request
  })//end onclick
})//end document ready


</script>
</body>
</html>