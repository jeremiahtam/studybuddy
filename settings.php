<?php
   session_start(); 
  if(!isset($_SESSION["login_user"])){
    }
    else
    {
    $user = $_SESSION["login_user"];
    }
  include("/inc/db.inc.php");
  if(!isset($user)){
    header("Location: http://localhost/studybuddy/home");
  }

  if (isset($_GET['settings_page'])){
	  $settings_page = mysqli_real_escape_string($_GET['settings_page']);
    }else{
		$settings_page ="";
		}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="http://localhost/studybuddy/" />

<title>Settings | StuddyBuddy</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="fonts/flaticon1/flaticon.css" rel="stylesheet">
<link href="css/titatoggle-dist.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href='css/datepicker.css' rel='stylesheet'>
<link href="css/style.css" rel="stylesheet">
</head>

<body class="">
  <div class="custom-container">
  
  <?php include('./inc/menu.inc.php');  ?>

   <section class="settings-bg">
     <div class="container">
     
        <div class="nav settings-nav float-left col-md-3" id="v-pills-tab" role="tablist">
          <li class="settings-pg-target <?php if($settings_page == '' || $settings_page == 'personal'){echo 'active';}?>"  id="personal"><a>Personal</a></li>
          <li class="settings-pg-target <?php if($settings_page == 'privacy'){echo 'active';}?>"  id="privacy"><a>Privacy</a></li>
          <li class="settings-pg-target <?php if($settings_page == 'billing'|| $settings_page == 'updateBillingCode' ){echo 'active';}?>"  id="billing"><a>Billing</a></li>
          <li class="settings-pg-target <?php if($settings_page == 'notifications'){echo 'active';}?>"  id="notifications"><a>Notifications</a></li>
          <li class="settings-pg-target <?php if($settings_page == 'password'){echo 'active';}?>"  id="password"><a>Change Password</a></li>
        </div>

        <div class="tab-content col-md-9 float-left">
          
          
                  
        </div><!--end tab-content-->

     </div>
   </section><!--end settings-bg-->
    
    <?php include("./inc/footer.inc.php");?>
  </div><!--end custom-container-->
</body>
<!--all javascript and jquery plugin-->
<script src="js/jquery-ui.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/form-validation-additional-methods.js"></script>
<script src="js/custom.js"></script>
<script src="js/ajax-script.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCM8q-vIy7XaGgIcTMI4WKXgGN7-MPKCLU&libraries=places"></script>

<script>

//privacy settings
$(document.body).on('click','#update_privacy',function() {
	$("#privacy_form").validate({	  
	  submitHandler:function(form){
	  var settings_type = $('.btn').attr('id');
	  $.ajax({
		 url:'php_load/update-settings.php',
		 type:'POST',
		 data:$('#privacy_form').serialize()+"&settings_type="+settings_type,
		 beforeSend: function(){
			 $('input').attr('disabled',true)
			 $('.btn').attr('disabled',true)
			 $('.preloader').attr('hidden',false);
			 },		
		 success: function(info){
			 $('.privacy-info').html(info);
			 $('.preloader').attr('hidden',true);
			 $('input').attr('disabled',false)
			 $('.btn').attr('disabled',false)
			 }
		 })
	  }
	})
})

//notification settings
$(document.body).on('click','#update_notification_settings',function() {
	$("#notification_settings_form").validate({	  
	  submitHandler:function(form){
	  var settings_type = $('.btn').attr('id');
	  $.ajax({
		 url:'php_load/update-settings.php',
		 type:'POST',
		 data:$('#notification_settings_form').serialize()+"&settings_type="+settings_type,
		 beforeSend: function(){
			 $('input').attr('disabled',true)
			 $('.btn').attr('disabled',true)
			 $('.preloader').attr('hidden',false);
			 },		
		 success: function(info){
			 $('.notification-settings-info').html(info);
			 $('.preloader').attr('hidden',true);
			 $('input').attr('disabled',false)
			 $('.btn').attr('disabled',false)
			 }
		 })
	  }
	})
})

//***confirm billing_code***//
//when you click on the "here" link, load the confirmation form
$(document.body).on('click','.updateBillingCode_link',function() {
	 //if billing settings has been successfully, load the confirmaition form automatically 
	  var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/settings/updateBillingCode';
	  //check if browsew supports automatic update of url without loading
	  //if true, auto-update link else reload browser
	  if (history.pushState) {
		window.history.pushState({path:newurl},'',newurl);
	  $.ajax({
		type:'POST',
		url:'php_load/settings-load.php',
		data:{
		  settings_page:'updateBillingCode'
		  },
		global:false,
		success:function(data){
		$('.settings-bg .tab-content').html(data)
		}
	  });//end ajax call
	  }else{
	  //if false, reload browser
		  window.location = newurl;
		}//end if pushstate
})


$(document.body).on('click','.panel-body',function() {
	  $("#confirm_billing_code").validate({
	  rules:{
		   billing_code:{
			 required:true,
		     minlength:6,
		     maxlength:6,
			 alphanumeric:true
		      }
	    },//end rules
	  messages:{
		   billing_code:{
		     required:'Please enter the confirmation code!',
		     minlength:'The code must be six digits long!',
		     maxlength:'The code must be six digits long!',
			 alphanumeric:'This code should contain only nimbers and alphabets!'
			   }
		},
	  submitHandler:function(form){
		  var settings_type = $('.btn').attr('id');
		 $.ajax({
			 url:'php_load/update-settings.php',
			 type:'POST',
			 data:$('#confirm_billing_code').serialize()+"&settings_type="+settings_type,
			 beforeSend: function(){
				 $('input').attr('disabled',true)
				 $('.btn').attr('disabled',true)
				 $('.preloader').attr('hidden',false);
				 },		
			 success: function(info){
				 $('.billing-info').html(info);
				 $('.preloader').attr('hidden',true);
				 $('input').attr('disabled',false)
				 $('.btn').attr('disabled',false)
				 }
			 })
		 }//end submitHandler
    })
});  

 //update billing settings
 $(document.body).on('click','.panel-body',function() {
	 jQuery.validator.addMethod("lettersWithSpace", function(value, element) {
		return this.optional(element) || /^[a-z\s]+$/i.test(value);
	  }, "Only alphabetical characters"); 

	  $("#billing_form").validate({
	  rules:{
		   account_owner:{
		     required:true,
			 lettersWithSpace:true
			 
		      },
		   bank_name:{
		     required:true,
			 lettersWithSpace:true
		      },
		   account_number:{
		     required:true,
			 digits:true
		      }
	    },//end rules
	  messages:{
		   account_owner:{
		     required:'Please enter the account holder\'s name!',
			 lettersWithSpace:'This field should contain only letters.'
			   },
		   bank_name:{
		     required:'Please enter the name of your bank!',
			 lettersWithSpace:'This field should contain only letters'
			   },
		   account_number:{
		     required:'Please enter your account number!',
			 digits:'This field must contain numbers only!'
			   }
		},
	  submitHandler:function(form){
		  var settings_type = $('.btn').attr('id');
		 $.ajax({
			 url:'php_load/update-settings.php',
			 type:'POST',
			 data:$('#billing_form').serialize()+"&settings_type="+settings_type,
			 beforeSend: function(){
				 $('input').attr('disabled',true)
				 $('.btn').attr('disabled',true)
				 $('.preloader').attr('hidden',false);
				 },		
			 success: function(info){
				 $('.panel-body').html(info);
				 $('.preloader').attr('hidden',true);
				 $('input').attr('disabled',false)
				 $('.btn').attr('disabled',false)
				 //if billing settings has been successfully, load the confirmaition form automatically 
				  var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/settings/updateBillingCode';
				  //check if browsew supports automatic update of url without loading
				  //if true, auto-update link else reload browser
				  if (history.pushState) {
					window.history.pushState({path:newurl},'',newurl);
				  $.ajax({
					type:'POST',
					url:'php_load/settings-load.php',
					data:{
					  settings_page:'updateBillingCode'
					  },
					global:false,
					success:function(data){
					$('.settings-bg .tab-content').html(data)
					}
				  });//end ajax call
				  }else{
				  //if false, reload browser
					  window.location = newurl;
					}//end if pushstate
				 
				 }//end success
			 })
		 }//end submitHandler
    })
});  



//validate personal-info settings 
$(document.body).on('click','form',function() {
	
	$('form').on('focus keyup keypress','.bio',function(){
		var $this = $(this);
			ml = parseInt($this.attr('maxlength'),10);
			length = this.value.length
			msg = ml - length +' characters left';
			$('.char').html(msg)
		})
		
  $.validator.addMethod(
		"dateFormat",
		function (value, element) {
		  // put your own logic here, this is just a (crappy) example 
		  return value.match(/^\d\d\d\d?\-\d\d?\-\d\d$/);
		},
		"Please enter a date in the format yyyy-mm-dd"
	  );
  $("#personal_info_form").validate({
	  rules:{
		   fullname:{
		     required:true
		      },
		   location:{
		     required:true
		      },
		   phone_number:{
		     required:true,
			 digits:true
		      },
		   date_of_birth:{
		     required:true,
			 dateFormat:true
		      },
		   gender:{
		     required:true
		      },
		   bio:{
			 maxlength:250
		      }
			
	    },//end rules
	  messages:{
		   fullname:{
		     required:'Please enter your fullname!'
			   },
		   location:{
		     required:'Please enter your location!'
			   },
		   phone_number:{
		     required:'Please enter your phone number!',
			 digits:'Your phone number should contain only numbers'
			   },
		   date_of_birth:{
		     required:'Please enter your date of birth!',
			 dateFormat:'The date forrmat should be in form of yyyy-mm-dd'
			   },
		   gender:{
		     required:'Please select your gender!'
		      },
		   bio:{
		     maxlength:'Your bio should not exceed 250 characters'
			   }
		},//end messages
	  submitHandler:function(form){
		  var settings_type = $('.btn').attr('id');
		 $.ajax({
			 url:'php_load/update-settings.php',
			 type:'POST',
			 data:$('#personal_info_form').serialize()+"&settings_type="+settings_type,
			 beforeSend: function(){
				 $('input').attr('disabled',true)
				 $('.btn').attr('disabled',true)
				 $('.preloader').attr('hidden',false);
				 },		
			 success: function(info){
				 $('.update-settings-info').empty();
				 $('.update-settings-info').html(info);
				 $('.preloader').attr('hidden',true);
				 $('input').attr('disabled',false)
				 $('.btn').attr('disabled',false)
				 }
			 })
		 }//end submitHandler

    })
});  
/*$(document).ready(function(){
  var width = $(window).width();
  alert(width);
  })*/


 //update password settings
 $(document.body).on('click','form',function() {
	  $("#change_password_settings_form").validate({
	  rules:{
		   old_password:{
		     required:true,
			 minlength:6
		      },
		   new_password:{
		     required:true,
			 minlength:6
		      },
		   repeat_new_password:{
		     required:true,
			 minlength:6,
			 equalTo:'#new_password'
		      }
			
	    },//end rules
	  messages:{
		   old_password:{
		     required:'Please enter your old password!',
			 minlength:'Your password should be at least six(6) characters long'
			   },
		   new_password:{
		     required:'Please enter your new password!',
			 minlength:'Your password should be at least six(6) characters long'
			   },
		  repeat_new_password:{
		     required:'Please repeat your new password!',
			 minlength:'Your password should be at least six(6) characters long',
			 equalTo:'This field must be identical to \'New Password\' field!'
			   }
		},//end messages
	  submitHandler:function(form){
		  var settings_type = $('.btn').attr('id');
		 $.ajax({
			 url:'php_load/update-settings.php',
			 type:'POST',
			 data:$('#change_password_settings_form').serialize()+"&settings_type="+settings_type,
			 beforeSend: function(){
				 $('input').attr('disabled',true)
				 $('.btn').attr('disabled',true)
				 $('.preloader').attr('hidden',false);
				 },		
			 success: function(info){
				 $('.update-password-info').empty();
				 $('.update-password-info').html(info);
				 $('.preloader').attr('hidden',true);
				 $('input').attr('disabled',false)
				 $('.btn').attr('disabled',false)
				 }
			 })
		 }//end submitHandler

    })
});  

//loading form group based on the get url value on first loading
//send data to settings-load.php so as to produce the necessary form data
$(document).ready(function(){
  var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1];
    
    if(last_part==''){
      //if the last part after settings/settings_page/ in the url is empty
      //go back to the previos item before the '/'
      last_part = parts[parts.length-2];
      }else{
      last_part = parts[parts.length-1];
        }
	var settings_page =last_part
	$.ajax({
	  type:'POST',
	  url:'php_load/settings-load.php',
	  data:{
		settings_page:settings_page
		},
	  global:false,
	  success:function(data){
		$('.settings-bg .tab-content').html(data)
		 }
	  });//end ajax request
})
//load settings-load.php form wheneve the history button back and front is pushed
//the data is automatically loaded
$(document).ready(function(){
  $(window).on('popstate', function(e){
    var state = e.originalEvent.state;
    //if the state of the browser url changes...
      if (state !== null) {
        //load content with ajax
        var url = $(location).attr('href'),
          parts = url.split("/"),
          last_part = parts[parts.length-1];
          if(last_part==''){
            //if the last part after settings/settings_page/ in the url is empty
            //go back to the previos item before the '/'
            last_part = parts[parts.length-2];
            }else{
            last_part = parts[parts.length-1];
              }
        var settings_page =last_part;   
      }else{
        var url = $(location).attr('href'),
          parts = url.split("/"),
          last_part = parts[parts.length-1];
          if(last_part==''){
            //if the last part after settings/settings_page/ in the url is empty
            //go back to the previos item before the '/'
            last_part = parts[parts.length-2];
            }else{
            last_part = parts[parts.length-1];
              }
        var settings_page =last_part;
      }
      $(".settings-pg-target").removeClass("active");
      $('.flex-column #'+settings_page).addClass("active")
      $.ajax({
        type:'POST',
        url:'php_load/settings-load.php',
        data:{
          settings_page:settings_page
        },
        global:false,
        success:function(data){
          $('.settings-bg .tab-content').html(data);
         }
      });//end ajax request
   })//end on popstate    
})

$(document).ready(function(e) {  
  //clicking a settings navigation link
  $('.settings-pg-target').click(function(){
	  var settings_page = $(this).attr('id');
	  //get the new path after clicking the link 
	  var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/settings/'+settings_page;
	  //check if browsew supports automatic update of url without loading
	  //if true, auto-update link else reload browser
	  if (history.pushState) {
		window.history.pushState({path:newurl},'',newurl);
	  $(".settings-pg-target").removeClass("active");
	  $(this).addClass("active")
	  $.ajax({
		type:'POST',
		url:'php_load/settings-load.php',
		data:{
		  settings_page:settings_page
		  },
		global:false,
		success:function(data){
		$('.settings-bg .tab-content').html(data)
		}
	  });
	  }else{
	  //if false, reload browser
		  window.location = newurl;
		}
  })

})

//google maps suggestions
google.maps.event.addDomListener(window, 'load', initialize);
function initialize(){
  var autocomplete = new google.maps.places.Autocomplete(document.getElementById('location'));
  google.maps.event.addListener(autocomplete, 'place_changed', function(){
    var places = autocomplete.getplace();
    
    var location = "<b>Location:</b>"+ places.formatted_address +"</br>";
    location += "<b>Latitude:</b>"+ places.geometry.location.A +"</br>";
    location += "<b>Longitude:</b>"+ places.geometry.location.F +"</br>";
    document.getElementById('addressResults').innerHTML = location
    });
  
  };
</script>
</html>
