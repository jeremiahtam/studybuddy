// signup form validation
$(document).ready(function() {
   $('#signup').validate({
	 rules:{
       fullname:{
		   required:true
		   },
 	   username:{
		   required:true,
		   minlength:6
	       },
	   reg_email:{
		   required:true,
		   email:true
		   },
	  pword:{
		   required:true,
		   minlength:6
		   },
	   re_pword:{
		   required:true,
		   equalTo:'#pword'
		   }
     },//end rules
	 
	 messages:{
		 fullname:{
			 required:'Please enter your full name!'
		     },
		 username:{
			 required:'Please enter a username!',
			 minlength:'Your username should be more than 6 characters long'
			 },
		 reg_email:{
			 required:'Please enter an email address!',
			 email:'Invalid email! Please enter a valid email address.'
			 },
		 pword:{
			 required:'Please enter a password!',
			 minlength:'Your password should be more than 6 characters long'
			 },
		 re_pword:{
			 required:'Please repeat your password!',
			 equalTo:"The two passwords do not match!"
			 }
		 },//end messages
		 
	 submitHandler:function(form){
		 $.ajax({
			 url:'php_load/signup-val.php',
			 type:'POST',
			 data:$('#signup').serializeArray(),
			 beforeSend: function(){
				 $('input').attr('disabled',true)
				 $('.btn').attr('disabled',true)
				 $('.preloader').attr('hidden',false);
				 },
			 success: function(info){		
			 		
			 if(!info){
				 //alert('empty');
				 $('.panel-body').html("<h4 class='panel-heading'><span class='ion-android-checkmark-circle'></span> Your registration was successful</h4><p class='panel-text'>To gain access to our service, login.</p><a href='login' class='btn btn-outline-danger'>Login Now!</a>");
				 $('.panel-body').addClass('text-center')

				 }else{
				 $('.signup-info').empty();
				 $('.signup-info').html(info);
				 $('.preloader').attr('hidden',true);
				 $('input').attr('disabled',false)
				 $('.btn').attr('disabled',false)
				 clear();	 
				   }
					
				 }
			 })
		 }//end submitHandler
		 
    });
	
}); // end ready


// login form validation
$(document).ready(function() {
   $('#login-form').validate({
	  rules:{
		   email:{
		     required:true,
		     email:true
		      },
 	       password:{
		     required:true,
		     minlength:6
		      }
	    },//end rules
	  messages:{
		   email:{
		     required:'Please enter your email address!',
		     email:"Invalid email! Please enter a valid email address."
			   },
		   password:{
		     required:'Please enter your password!',
		     minlength:'Your password should be at least 6 characters long!'
			   }
		},//end messages
		
	  submitHandler:function(form){
		 $.ajax({
			 type:'POST',
			 cache:false,
			 url:'php_load/login-val.php',
			 data:$('#login-form').serializeArray(),
			 beforeSend: function(){
				 $('input').attr('disabled',true)
				 $('.btn').attr('disabled',true)
				 $('.preloader').attr('hidden',false);
				 },
			 success: function(info){
				 $('.login-info').empty();
				 $('.login-info').html(info);
				 $('.preloader').attr('hidden',true);
				 $('input').attr('disabled',false)
				 $('.btn').attr('disabled',false)
				 if(!info){
					 window.location.href="home";
					 }
				 
				 }			 
			})
		 }//end submitHandler
	   
    });//end validate
}); // end ready



// retrieve password by sending to user mail
$(document).ready(function(){
   $('#forgot-password').validate({
	  rules:{
		   email:{
		     required:true,
		     email:true
		      }
	    },//end rules
	  messages:{
		   email:{
		     required:'Please enter your email address!',
		     email:"Invalid email! Please enter a valid email address."
			   }
		},//end messages
		
	  submitHandler:function(form){
		 $.ajax({
			 url:'php_load/mail-password.php',
			 type:'POST',
			 data:$('#forgot-password').serializeArray(),
			 beforeSend: function(){
				 $('input').attr('disabled',true)
				 $('.btn').attr('disabled',true)
				 $('.preloader').attr('hidden',false);
				 },
			 success:function(info){
				 $('.forgot-password-info').empty();
				 $('.forgot-password-info').html(info);
				 $('.preloader').attr('hidden',true);
				 $('input').attr('disabled',false)
				 $('.btn').attr('disabled',false)
				 }
			 })
		 }//end submitHandler
	   
    });//end validate
}); // end ready


//final changing of password
$(document).ready(function() {
   $('#reset-password-form').validate({
	  rules:{
		   password:{
		     required:true,
		     minlength:6
		      },
		   re_password:{
		     required:true,
		     minlength:6,
			 equalTo:'#password'
		      }
	    },//end rules
	  messages:{
		   password:{
		     required:'Please enter your password!',
		     minlength:"Your password should contain at least 6 characters."
			   },
		   re_password:{
		     required:'Please enter your password!',
		     minlength:"Your password should contain at least 6 characters.",
			 equalTo:'Your passwords do not match!!!'
			   }
		},//end messages
		
	  submitHandler:function(form){
		 $.ajax({
			 url:'php_load/change-password.php',
			 type:'POST',
			 data:$('#reset-password-form').serializeArray(),
			 beforeSend: function(){
				 $('input').attr('disabled',true)
				 $('.btn').attr('disabled',true)
				 $('.preloader').attr('hidden',false);
				 },		
			 success: function(info){
				 //alert('empty');
				 $('.reset-info').empty();
				 $('.reset-info').html(info);
				 $('.preloader').attr('hidden',true);
				 $('input').attr('disabled',false)
				 $('.btn').attr('disabled',false)

				 }
			 })
		 }//end submitHandler
	   
    });//end validate
}); // end ready



/*profile section*/
/**************************/
/**************************/
//cropping image to upload profile pic using a plugin named croppie
$(document.body).one('click','#upload-profile-pic',function(){

  $(document).ajaxComplete(function() {
  
  $uploadCrop = $('#upload-demo').croppie({
	  enableExif: true,
	  showZoomer:true,
	  viewport: {
		  width: 150,
		  height: 150,
		  type: 'square'
	  },
	  boundary: {
		  width: 200,
		  height: 200
	  },
	  enableOrientation:true
   });
  
  $(document).on('click','.rotate-image',function(ev){
	  $uploadCrop.croppie('rotate',parseInt($(this).attr('deg')))
	  })
  
  $('#upload').change(function () { 
  
	  var reader = new FileReader();
	  reader.onload = function (e) {
		  $uploadCrop.croppie('bind', {
			  url: e.target.result
		  }).then(function(){
			  console.log('jQuery bind complete');
		  });
		  
	  }
	  reader.readAsDataURL(this.files[0]);
  
  });
  
  //upload the cropped image
  
	$('.upload-result').click(function (ev) {
		var fileExtension = ['jpeg', 'jpg','png'];
		switch(true){
  
		case ($('#upload').val()===''):
		  $(".upload-profile-pic-alert").html("<div class='text-danger'><span class='ion-android-warning'></span> Please select an image to upload</div>")
		break;
		
		case ($.inArray($('#upload').val().split('.').pop().toLowerCase(), fileExtension) == -1) :
		  $(".upload-profile-pic-alert").html("<div class='text-danger'><span class='ion-android-warning'></span> Only jpg,jpeg and png formats are allowed. </div>")
		break;
  
		default:
				
		$uploadCrop.croppie('result', {
			type: 'canvas',
			size: {width:350,height:350}
		}).then(function (resp) {
			$.ajax({
				url: 'php_load/crop-profile-pic.php',
				type: 'POST',
				data: {image:resp},
				global : false,
				beforeSend: function(){
					$('.modal-footer .btn').attr('disabled',true)
				    $('.modal-footer .preloader').attr('hidden',false);
					},
				success : function (data) {
					
					if(data){
					 $('#profile-pic-crop-modal').modal('hide');
					 $('.profile-pic').attr('src',data);
					 $('.small-profile-pic').attr('src',data);
					 $('#edit-profile-photo-menu').addClass('hidden');
					 $('.close').click();
					 }
			  }
			});//end ajax
		 
		 });
	   }//end if statement
	});//end click statement
  });//end document ajaxComplete
})//end click


//cropping image to upload cover photo using a plugin named croppie
$(document.body).one('click','#upload-cover-photo',function(){

	$(document).ajaxComplete(function() {	
	$uploadCrop = $('#upload-demo-cover-photo').croppie({
		enableExif: true,
		showZoomer:true,
		viewport: {
			width: 220,
			height: 120,
			type: 'square'
		},
		boundary: {
			width: 250,
			height: 150
		},
		enableOrientation:true
	 });
	
	$(document).on('click','.rotate-image',function(ev){
		$uploadCrop.croppie('rotate',parseInt($(this).attr('deg')))
		})
	
	$('#input-cover-photo').change(function () { 
		var reader = new FileReader();
		reader.onload = function (data) {
			$uploadCrop.croppie('bind', {
				url: data.target.result
			}).then(function(){
				console.log('jQuery bind complete');
			});
			
		}
		reader.readAsDataURL(this.files[0]);
	});
	
	//upload the cropped image
	
	  $('.submit-cover-photo').click(function (ev) {
		  var fileExtension = ['jpeg', 'jpg','png'];
		  switch(true){
	
		  case ($('#input-cover-photo').val()===''):
			$(".upload-cover-photo-alert").html("<div class='text-danger'><span class='ion-android-warning'></span> Please select an image to upload</div>")
		  break;
		  
		  case ($.inArray($('#input-cover-photo').val().split('.').pop().toLowerCase(), fileExtension) == -1) :
			$(".upload-cover-photo-alert").html("<div class='text-danger'><span class='ion-android-warning'></span> Only jpg,jpeg and png formats are allowed. </div>")
		  break;
	
		  default:
				  
		  $uploadCrop.croppie('result', {
			  type: 'canvas',
			  size: {width:733,height:400}
		  }).then(function (resp) {
			  $.ajax({
				  url: 'php_load/crop-cover-photo.php',
				  type: 'POST',
				  data: {image:resp},
				  global : false,
				  beforeSend: function(){
					  $('.modal-footer .btn').attr('disabled',true)
					  $('.modal-footer .preloader').attr('hidden',false);
					  },
				  success : function (data) {
					  
					  if(data){
					   $('#cover-photo-crop-modal').modal('hide');
					   $('.cover-photo').attr('src',data);
					   $('.close').click();
					   }
				}
			  });//end ajax
		   
		   });
		 }//end if statement
	  });//end click statement
	
	})//end document ajaxComplete
});//end click

$(document).on('focus',"#work_start_date,#work_end_date,#course_start_date,#course_end_date",function(){		
  $(this).datepicker({
	calendarWeeks:true,
	todayHighlight:true,
	autoclose:true,
	todayHighlight:true,
	format:'yyyy-mm-dd',
	orientation:'bottom auto'
  })
})


$(document.body).on('click','#currently_there',function() {
	if($("input[name='currently_there']").is(':checked')){
		$(this).attr('value','yes');
		$('#work_end_date').attr('disabled',true);
		$('#work_end_date').attr('value','0000-00-00');
	  }else{
	  $('#work_end_date').attr('disabled',false)
		$(this).attr('value','no');
	  }		
})

//validate add-work-experience
$(document.body).on('click','form',function() {
	
  $.validator.addMethod(
		"dateFormat",
		function (value, element){
		  return value.match(/^\d\d\d\d?\-\d\d?\-\d\d$/);
		},
		"Please enter a date in the format yyyy-mm-dd"
	  );
  $("#update_work_form").validate({
	  rules:{
		   organization_name:{
		     required:true,
			 maxlength:150
		      },
		   position_held:{
		     required:true,
			 maxlength:150
		      },
		   currently_working_here:{
		      },
		   work_start_date:{
		     required:true,
			 dateFormat:true
		      },
		   work_end_date:{
		     required:true,
			 dateFormat:true
		      }
			
	    },//end rules
	  messages:{
		   organization_name:{
		     required:'Please enter the name of the organization!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		   position_held:{
		     required:'Please enter the position you held/hold!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		   currently_working_here:{
			   },
		   work_start_date:{
		     required:'Please enter date you started working!',
			 dateFormat:'The date forrmat should be in form of yyyy-mm-dd'
			   },
		   work_end_date:{
		     required:'Please enter the date you stopped working!',
			 dateFormat:'The date forrmat should be in form of yyyy-mm-dd'
		      }
		},//end messages
	  submitHandler:function(form){
		 $.ajax({
			 url:'php_load/add-work-experience.php',
			 type:'POST',
			 data:$('#update_work_form').serializeArray(),
			 beforeSend: function(){
				 $('.modal-body input').attr('disabled',true)
				 $('.modal-body .btn').attr('disabled',true)
				 $('.modal-body .preloader').attr('hidden',false);
				 },		
			 success: function(info){				 
				 $('.work-panel .panel-body').empty();
				 $('.work-panel .panel-body').html(info);
				 $('.close').click();	
				 }
			 })
		 }//end submitHandler
    })
});  

//validate edit-work-experience
$(document.body).on('click','#edit_work',function() {
  var edit_id = $(this).attr("data-id") ;	
  $.validator.addMethod(
		"dateFormat",
		function (value, element){
		  return value.match(/^\d\d\d\d?\-\d\d?\-\d\d$/);
		},
		"Please enter a date in the format yyyy-mm-dd"
	  );
  $("#edit_work_form").validate({
	  rules:{
		   organization_name:{
		     required:true,
			 maxlength:150
		      },
		   position_held:{
		     required:true,
			 maxlength:150
		      },
		   currently_working_here:{
		      },
		   work_start_date:{
		     required:true,
			 dateFormat:true
		      },
		   work_end_date:{
		     required:true,
			 dateFormat:true
		      }
			
	    },//end rules
	  messages:{
		   organization_name:{
		     required:'Please enter the name of the organization!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		   position_held:{
		     required:'Please enter the position you held/hold!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		   currently_working_here:{
			   },
		   work_start_date:{
		     required:'Please enter date you started working!',
			 dateFormat:'The date forrmat should be in form of yyyy-mm-dd'
			   },
		   work_end_date:{
		     required:'Please enter the date you stopped working!',
			 dateFormat:'The date forrmat should be in form of yyyy-mm-dd'
		      }
		},//end messages
	  submitHandler:function(form){
		 $.ajax({
			 url:'php_load/edit-work-experience.php',
			 type:'POST',
			 data:$('#edit_work_form').serialize()+"&edit_id="+edit_id,
			 beforeSend: function(){
				 $('.modal-body input').attr('disabled',true)
				 $('.modal-body .btn').attr('disabled',true)
				 $('.modal-body .preloader').attr('hidden',false);
				 },		
			 success: function(info){				 
				 $('.work-panel .panel-body').empty();
				 $('.work-panel .panel-body').html(info);
				 //$('.close').click();	
				 }
			 })
		 }//end submitHandler
    })
});  

//delete work experience entry
$(document).on('click',"#delete_work",function(e){
	e.preventDefault();
	var delete_id = $(this).attr('data-delete-id');
	var delete_type = $(this).attr('data-delete-type');
    $.ajax({
	  url:'php_load/delete-work-experience.php',
	  type:'POST',
	  data:{
		delete_id : delete_id,
		delete_type : delete_type   
		  },
	  beforeSend: function(){
		 $('.modal-body .btn').attr('disabled',true)
		 $('.modal-body .preloader').attr('hidden',false);
		 },		
	  success: function(info){				 
		 $('.work-panel .panel-body').empty();
		 $('.work-panel .panel-body').append(info);
		 $('.modal .close').click();	
		 }
    })
});  

//validate add-education
$(document.body).on('click','form',function() {
	
  $.validator.addMethod(
		"dateFormat",
		function (value, element){
		  return value.match(/^\d\d\d\d?\-\d\d?\-\d\d$/);
		},
		"Please enter a date in the format yyyy-mm-dd"
	  );
  $("#update_education_form").validate({
	  rules:{
		   institution:{
		     required:true,
			 maxlength:150
		      },
		   course:{
		     required:true,
			 maxlength:150
		      },
		   degree_obtained:{
		     required:true,
			 maxlength:150
		      },
		   course_start_date:{
		     required:true,
			 dateFormat:true
		      },
		   course_end_date:{
		     required:true,
			 dateFormat:true
		      }
			
	    },//end rules
	  messages:{
		   institution:{
		     required:'Please enter the institution you attended!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		   course:{
		     required:'Please enter the course of study!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		   degree_obtained:{
		     required:'Please enter degree obtained!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		    course_start_date:{
		     required:'Please enter the start date of your course!',
			 dateFormat:'The date forrmat should be in form of yyyy-mm-dd'
			   },
		   course_end_date:{
		     required:'Please enter the end date of your course!',
			 dateFormat:'The date forrmat should be in form of yyyy-mm-dd'
		      }
		},//end messages
	  submitHandler:function(form){
		 $.ajax({
			 url:'php_load/add-education.php',
			 type:'POST',
			 data:$('#update_education_form').serializeArray(),
			 beforeSend: function(){
				 $('.modal-body input').attr('disabled',true)
				 $('.modal-body .btn').attr('disabled',true)
				 $('.modal-body .preloader').attr('hidden',false);
				 },		
			 success: function(info){				 
				 $('.education-panel .panel-body').empty();
				 $('.education-panel .panel-body').html(info);
				 $('.close').click();	
				 }
			 })
		 }//end submitHandler

    })
});  

//validate edit-education
$(document.body).on('click','#edit_education',function() {
  var edit_id = $(this).attr("data-id") 	
  $.validator.addMethod(
		"dateFormat",
		function (value, element){
		  return value.match(/^\d\d\d\d?\-\d\d?\-\d\d$/);
		},
		"Please enter a date in the format yyyy-mm-dd"
	  );
  $("#edit_education_form").validate({
	  rules:{
		   institution:{
		     required:true,
			 maxlength:150
		      },
		   course:{
		     required:true,
			 maxlength:150
		      },
		   degree_obtained:{
		     required:true,
			 maxlength:150
		      },
		   course_start_date:{
		     required:true,
			 dateFormat:true
		      },
		   course_end_date:{
		     required:true,
			 dateFormat:true
		      }
	    },//end rules
	  messages:{
		   institution:{
		     required:'Please enter the institution you attended!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		   course:{
		     required:'Please enter the course of study!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		   degree_obtained:{
		     required:'Please enter degree obtained!',
			 maxlength:'Please enter no more than 150 characters.'
			   },
		    course_start_date:{
		     required:'Please enter the start date of your course!',
			 dateFormat:'The date forrmat should be in form of yyyy-mm-dd'
			   },
		   course_end_date:{
		     required:'Please enter the end date of your course!',
			 dateFormat:'The date forrmat should be in form of yyyy-mm-dd'
		      }
		},//end messages
	  submitHandler:function(form){
		 $.ajax({
			 url:'php_load/edit-education.php',
			 type:'POST',
			 data:$('#edit_education_form').serialize()+"&edit_id="+edit_id,
			 beforeSend: function(){
				 $('.modal-body input').attr('disabled',true)
				 $('.modal-body .btn').attr('disabled',true)
				 $('.modal-body .preloader').attr('hidden',false);
				 },		
			 success: function(info){				 
				 $('.education-panel .panel-body').empty();
				 $('.education-panel .panel-body').html(info);
				 $('.close').click();	
				 }
			 })
		 }//end submitHandler

    })
});  

//delete education entry
$(document).on('click',"#delete_education",function(e){
	e.preventDefault();
	var delete_id = $(this).attr('data-delete-id');
	var delete_type = $(this).attr('data-delete-type');
    $.ajax({
	  url:'php_load/delete-education.php',
	  type:'POST',
	  data:{
		delete_id : delete_id,
		delete_type : delete_type   
		  },
	  beforeSend: function(){
		 $('.modal-body .btn').attr('disabled',true)
		 $('.modal-body .preloader').attr('hidden',false);
		 },		
	  success: function(info){				 
		 $('.education-panel .panel-body').empty();
		 $('.education-panel .panel-body').append(info);
		 $('.modal .close').click();	
		 }
    })
});  

//create group form validation
$(document).ready(function() {
  $(document.body).on('click','#submit_group',function(){
	 $('#create_group_form').validate({
	   rules:{
		 group_name:{
			 required:true,
			 maxlength:200
			 },
		 purpose:{
			 required:true
			 },
		group_type:{
			 required:true
			 },
		 field_of_study:{
			 required:true
			 },
		 topic:{
			 required:true,
			 maxlength:200
			 }
	   },//end rules
	   
	   messages:{
		   group_name:{
			   required:'Please give this group a name!',
			   maxlength:'This field should not more than 200 characters long!'
			   },
		   purpose:{
			   required:'Enter the purpose of this group!'
			   },
		   group_type:{
			   required:'Select the type of group you want!'
			   },
		   field_of_study:{
			   required:'Please select the field of study!'
			   },
		 topic:{
			   required:'Please what is the specific topic of discussion!',
			   maxlength:'This field should not more than 200 characters long!'
			 }
		   },//end messages
		   
	   submitHandler:function(form){
		   $.ajax({
			   url:'php_load/add-education.php',
			   type:'POST',
			   data:$('#create_group_form').serialize()+"&post_type=create-group",
			   beforeSend: function(){
				   $('.form-control').attr('disabled',true)
				   $('.btn').attr('disabled',true)
				   $('.btn .preloader').attr('hidden',false);
				   },
			   success: function(info){		
				   $('.create-group-alert').empty();
				   $('.create-group-alert').html(info);
				   $('.btn .preloader').attr('hidden',true);
				   $('.form-control').attr('disabled',false)
				   $('.btn').attr('disabled',false)
				   clear();	 
					  
				   }
			   })
		   }//end submitHandler
		   
	  });
	  
  }); // end ready
})


// create ads form validation
$(document).ready(function() {
  $(document.body).on('click','#submit_ad',function(){
	  $.validator.addMethod(
		"dateFormat",
		function (value, element){
		  return value.match(/^\d\d\d\d?\-\d\d?\-\d\d$/);
		},
		"Please enter a date in the format yyyy-mm-dd"
	  );

	 $('#create_ad_form').validate({
	   rules:{
		 category:{
			 required:true
			 },
		 study_area:{
			 required:true
			 },
		 concentration:{
			 required:true
			 },
		 topic:{
			 required:true,
			 maxlength:200
			 },
		knowledge_level:{
			 required:true
			 },
		 purpose:{
			 required:true
			 },
		exam_target:{
		  required:true
			},
		exam_date:{
		  required:true,
		  dateFormat:true
			},
		research_due_date:{
		  required:true,
		  dateFormat:true
			},
		more_info:{
			maxlength:300
			} 
	   },//end rules
	   
	   messages:{
		   category:{
			   required:'Please choose a category!'
			   },
		   study_area:{
			   required:'Please select a study area!'
			   },
 		   concentration:{
			   required:'Please select an area of concentration!'
			   },
		   topic:{
			   required:'Please enter the specific course or topic!',
			   maxlength:'This field should not more than 200 characters long!'
			   },
		   knowledge_level:{
			   required:'Please enter your level of knowledge in this field of study!'
			   },
		 purpose:{
			 required:'Enter the purpose of study!'
			 },
		exam_target:{
		  required:"Kindly set your exam target!"
			},
		exam_date:{
		  required:"Insert the exam date!"
			},
		research_due_date:{
		  required:"Kindly insert when the researh would be due!"
			},
		 more_info:{
			   maxlength:'This field should not more than 300 characters long!'
			 }
		   },//end messages
		   
	   submitHandler:function(form){
		   $.ajax({
			   url:'php_load/upload-post.php',
			   type:'POST',
			   data:$('#create_ad_form').serialize()+"&post_type=create-ad",
			   beforeSend: function(){
				   $('.form-control').attr('disabled',true)
				   $('.btn').attr('disabled',true)
				   $('.btn .preloader').attr('hidden',false);
				   },
			   success: function(info){		
				   $('.create-ad-alert').empty();
				   $('.create-ad-alert').html(info);
				   $('.btn .preloader').attr('hidden',true);
				   $('.form-control').attr('disabled',false)
				   $('.btn').attr('disabled',false)
				   clear();	 
				   }
			   })
		   }//end submitHandler
		   
	  });
	  
  }); // end ready
})

//load profile details/info
$(document).ready(function() {
	var username = $('.hidden-user-profile').attr('user-profile');
	$.ajax({
	   url:'php_load/profile-info.php',
	   type:'POST',
	   data:{username:username},
	   beforeSend: function(){
		 $('.profile-bg .preloader').attr('hidden',false);
		   },		
	   success: function(info){
		  $('.profile-bg').html(info);
		  $('.profile-bg .preloader').attr('hidden',true);
		   }
	   })
})

//opening modal and setting its purpose
$(document).ready(function() {
  $('body').on('click','.modal-action',function(){
	var modal_content = $(this).attr('id');
	var delete_type = $(this).attr('data-delete-type');
	var delete_id = $(this).attr('data-delete-id');
	var edit_type = $(this).attr('data-edit-type');
	var edit_id = $(this).attr('data-edit-id');
	var display_type = $(this).attr('data-display-type');
	var display_id = $(this).attr('data-display-id');
	$.ajax({
	   url:'php_load/load-profile-modal.php',
	   type:'POST',
	   data:{
		   modal_content:modal_content,
		   delete_type:delete_type,
		   delete_id:delete_id,
		   edit_type:edit_type,
		   edit_id:edit_id,
		   display_type:display_type,
		   display_id:display_id
		   },
	   beforeSend: function(){
		 //$('.modal-dialog').attr('hidden',false);
		 $('.modal-dialog').html("<div class='modal-content'><img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px'/></div>");
		   },		
	   success: function(info){
		  $('.modal-dialog').html(info);
		   }
	   })
  }) 
})

//deleting profile picture
$(document).ready(function(){
	$(document).on('click','.remove-profile-pic',function(){
	var username = $('.hidden-user-profile').attr('user-profile');
	  $.ajax({
		 url:'php_load/delete-profile-pic.php',
		 type:'POST',
	     data:{username:username},
		 global:false,
		 success:function(data){
		   $('.profile-pic').attr('src',data);
		   $('.small-profile-pic').attr('src',data);
     		 }
		 });
	})//end click event
})
//deleting cover photo
$(document).ready(function(){
	$(document).on('click','.remove-cover-photo',function(){
	var username = $('.hidden-user-profile').attr('user-profile');
	  $.ajax({
		 url:'php_load/delete-cover-photo.php',
		 type:'POST',
	     data:{username:username},
		 global:false,
		 success:function(data){
		   $('.cover-photo').attr('src',data);
     		 }
		 });
	})//end click event
})

//sending/confirming connection for connections  
//in connection-page of a profile page
$(document).ready(function() {
  $('body').on('click','.connection-btn .connection-button',function(){
	var username = $(this).attr('connection-username');		
	var connection_button = $(this).attr('id');
	var $this =$(this);
	$.ajax({
	   url:'php_load/multi-connection-val.php',
	   type:'POST',
	   data:{
		   connection_button:connection_button,
		   username:username
	   },
	   beforeSend: function(){
		// $(this > '.preloader').attr('hidden',false);
		// $(this +'>.connection-btn .btn').attr('disabled',true)
		   },		
	   success: function(info){
		 $this.parent('p').html(info);
		 $('.connection-btn .connection-button .preloader').attr('hidden',true);
		 $('.connection-btn .btn').attr('disabled',false)
		   }
	   })
  }) 
})

//sending/confirming connection for main profile page requests
$(document).ready(function() {
  $('body').on('click','.profile-box .connection-button',function(){
	var username = $('.hidden-user-profile').attr('user-profile');		
	var connection_button = $(this).attr('id');
	$.ajax({
	   url:'php_load/connection-val.php',
	   type:'POST',
	   data:{
		   connection_button:connection_button,
		   username:username
	   },
	   beforeSend: function(){
		 $('.profile-box .connection-button .preloader').attr('hidden',false);
		 $('.profile-box .connection-button').attr('disabled',true)
		   },		
	   success: function(info){
		 $('.profile-box .connection-button-box').html(info);
		 $('.profile-box .connection-button .preloader').attr('hidden',true);
		 $('.profile-box .connection-button').attr('disabled',false)
		   }
	   })
  }) 
})

//loading profile pages based on the get url value on first loading
//send data to profile-page-load.php so as to produce the necessary content
$(document).ready(function(){
  //call load_ads_action()
  load_ads_action()
  function load_ads_action(){
	var url = $(location).attr('href');
	var parts = url.split("/");
	var required_part = parts[6];
	  page = parts[7];
	  
	  webpage_name=parts[4];
	  
	  if(required_part=='' || required_part==null){
		//if the last part after profile/profile_type in the url is empty or undefined
		//set it to a default value of 'ads'
		required_part = 'ads';
		}else{
		required_part = parts[6];
		  }
	  if(page=='' || page==null){
		//if the page side of the url is empty, set it to 1
		page = '1';
		}else{
		page = parts[7];
		  }
  
	  var page = page
	  var profile_page_type = required_part
	  var username = $('.hidden-user-profile').attr('user-profile');
	  
		$.ajax({
		  type:'POST',
		  url:'php_load/profile-page-load.php',
		  data:{
			page:page,
			profile_page_type:profile_page_type,
			username : username
			},
		  global:false,
		  beforeSend: function(){
			$('.profile-body .tab-content >.preloader').attr('hidden',false);
			},
		  success:function(data){
			$('.profile-body .tab-content').html(data)					  
			var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/profile/'+username+'/'+profile_page_type+'/1';
			//check if the web_page is page is 'profile' and no the page has no content and is not page 1
			if(webpage_name=='profile' && profile_page_type=='ads' && $('.profile-body .tab-content .row .ads-col').length==0 && page>1){
			  window.location = newurl;
			}//end if statement
		   }
		 });//end ajax request
  }//end load_ads_action()
//************************************//
//deleting ads from the profile page
//************************************//
//delete ads from profile ad posts
  $(document).on('click',"#delete_ad",function(e){
	  e.preventDefault();
	  var delete_id = $(this).attr('data-delete-id');
	  var delete_type = $(this).attr('data-delete-type');
	  $.ajax({
		url:'php_load/delete-ad.php',
		type:'POST',
		data:{
		  delete_id : delete_id,
		  delete_type : delete_type   
			},
		beforeSend: function(){
		   $('.modal-body .btn').attr('disabled',true)
		   $('.modal-body .preloader').attr('hidden',false);
		   },		
		success: function(info){
		  load_ads_action();
		  $('.close').click();
		 }
	  })
  });  

})//end document ready

//***when the user clicks on the number navigation buttons...***//
//it would load automatically without refreshing
$(document.body).on('click','.pagination_link',function(){
  var page = $(this).attr('id');		 
  var url = $(location).attr('href');
  var  parts = url.split("/");
  var  required_part = parts[6];
	
  if(required_part=='' || required_part==null){
	//if the last part after profile/profile_type in the url is empty or undefined
	//set it to a default value of 'ads'
	required_part = 'ads';
	}else{
	required_part = parts[6];
	  }
  var profile_page_type = required_part
  var username = $('.hidden-user-profile').attr('user-profile');
  var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/profile/'+username+'/'+profile_page_type+'/'+page;
  //check if browsew supports automatic update of url without loading
  //if true, auto-update link else reload browser
  if (history.pushState) {
	window.history.pushState({path:newurl},'',newurl);
  }else{
  //if false, reload browser
	  window.location = newurl;
	}
  $.ajax({
	type:'POST',
	url:'php_load/profile-page-load.php',
	data:{
	  page:page,
	  profile_page_type:profile_page_type,
	  username : username
	  },
	global:false,
	beforeSend: function(){
			$('.tab-content >.preloader').attr('hidden',false);
		},
	success:function(data){
		$('.profile-body .tab-content').html(data)
	 }
   });//end ajax request
})

//load the profile-page-load.php when the profile navigation links are clicked
//the data is automatically loaded with the correct page
$(document).ready(function(e) {  
  //clicking a profile navigation link
  $('.profile-nav-target').click(function(){
      var page = '1';
	  var profile_page_type = $(this).attr('id');
	  var username = $('.hidden-user-profile').attr('user-profile');
	  //get the new path after clicking the link 
	  var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/profile/'+username+'/'+profile_page_type;
	  //check if browsew supports automatic update of url without loading
	  //if true, auto-update link else reload browser
	  if (history.pushState) {
		window.history.pushState({path:newurl},'',newurl);
	 
	  $(".profile-nav-target").removeClass("active");
	 
	  $(this).addClass("active")
	  $.ajax({
		type:'POST',
		url:'php_load/profile-page-load.php',
		data:{
		  page:page,
		  profile_page_type:profile_page_type,
		  username : username
		  },
		global:false,
		beforeSend: function(){
			$('.tab-content >.preloader').attr('hidden',false);
			},
		success:function(data){
		$('.profile-body .tab-content').html(data)
		}
	  });
	  }else{
	  //if false, reload browser
		  window.location = newurl;
		}
  })

})


//load the page number form url as the back and front history button is clicked so
//the data is automatically loaded with the correct page
$(document).ready(function(){
  $(window).on('popstate', function(ev){
    var state = ev.originalEvent.state;
	var username = $('.hidden-user-profile').attr('user-profile');
    var url = $(location).attr('href')
    var parts = url.split("/")    
	var page = parts[7];
	//if the state of the browser url changes...
      if (state !== null) {
        //load content with ajax
          required_part = parts[6];		  
          if(required_part=='' || required_part==null){          
		  //if the last part after profile/profile_type in the url is empty or undefined
		  //set it to a default value of 'ads'
            required_part = 'ads';
            }else{
            required_part = parts[6];
              }
        var profile_page_type = required_part  
      }else{
          required_part = parts[6];
          if(required_part=='' || required_part==null){
		  //if the last part after profile/profile_type in the url is empty or undefined
		  //set it to a default value of 'ads'
            required_part = 'ads';
            }else{
             required_part = parts[6];
              }
        var profile_page_type = required_part;
      }

	  //get the page number from the url
	  if(page=='' || page==null){
		//if the page side of the url is empty, set it to 1
		page = '1';
		}else{
		var page = parts[7];
		  }

	  $(".profile-nav-target").removeClass("active");
	  $('.profile-nav li #'+profile_page_type).addClass("active")
	  $.ajax({
		type:'POST',
		url:'php_load/profile-page-load.php',
		data:{
		  page:page,
		  profile_page_type:profile_page_type,
		  username : username
		},
		global:false,
		beforeSend: function(){
			$('.tab-content >.preloader').attr('hidden',false);
			},
		success:function(data){
		  $('.profile-body .tab-content').html(data);
		 }
	  });//end ajax request

   })//end on popstate    
})
