<?php
include("./inc/session.inc.php");

include("./inc/db.inc.php");

//unset the pg of a full message
if(isset($_SESSION["pg"])){
	unset($_SESSION["pg"]);
	 }
//unset the last message id
if(isset($_SESSION["last-msg-id"])){
	unset($_SESSION["last-msg-id"]);
	 }
//unset the conversation page
if(isset($_SESSION["conv_pg"])){
	unset($_SESSION["conv_pg"]);
	 }


if(!isset($_SESSION["login_user"])){
	header("Location: home");
	   }
 if (isset($_GET['msg_username'])){
	  $msg_username = mysqli_real_escape_string($conn,$_GET['msg_username']);
	  //if the user tries to send a message to himself, redirect the user
	  if($msg_username==$user){
		  header("Location: home");
		}else{
		  $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$msg_username' AND removed='no' ");
		  $num_rows = mysqli_num_rows($query);
		  if($num_rows==1){
		  $row = mysqli_fetch_assoc($query);
		  $fullname = $row['fullname'];
		  $profile_pic = $row['profile_pic'];
		  if(empty($profile_pic)){
			  $profile_pic = 'img/user.png';
			}else{
			  $profile_pic = 'img/profile_pic/'.$profile_pic;
			}
		  }else{
			header("Location: home");
			  }
		
		  $conv_query = mysqli_query($conn,"SELECT * FROM conversations WHERE
		((user_1='$user' AND user_2='$msg_username') OR (user_2='$msg_username' AND user_1='$user')) ");
		  $conv_details = mysqli_fetch_assoc($conv_query);
		  $conv_id = $conv_details['id'];			  
		}
	}else{
	//header("Location: home");
  }


 ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="<?php echo base_url();?>" />


<title>Messages | StuddyBuddy</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="fonts/flaticon1/flaticon.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href='css/croppie.css' rel='stylesheet'>
<link href="css/style.css" rel="stylesheet">
<link href='css/datepicker.css' rel='stylesheet'>
</head>
<body>
  <input hidden="true" msg-username='<?php if(isset($msg_username)){echo $msg_username;}?>' class='hidden-msg-username'>

  <div class="custom-container">
    <?php include("./inc/menu.inc.php");?>
    <div class='modal fade msg-modal' id='myModal' tabindex='-1' role='dialog'>
       <div class='modal-dialog' role='document'>
	
          
  
      </div><!--modal-dialog-->
    </div><!--end modal-->

    <section class="msg-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-3 msg-connections-list <?php if(isset($msg_username)){ echo 'visible-md visible-lg';}?>">

            <p class="create-new-msg"><button class="btn btn-block">New Message</button></p>
            
            <div class="msg-connection-box">

            </div><!-- /media msg-connection-box -->
            
          </div><!--end msg-connections-list-->
          
          <div class="col-md-6 msg-content <?php if(!isset($msg_username)){ echo 'visible-md visible-lg';}?>">
            
            <div class='currently-messaging'>
            
              <form method="post" id="search-msg-username-form" class="<?php if(isset($msg_username)){ echo 'hidden';}?>">
                <div class='input-group search-msg-username'>
                  <span class="input-group-btn hidden-md hidden-lg">
                    <button class="btn btn-default msg-back-btn" type="button"><span class="ion-arrow-left-a"></span></button>
                  </span>
                  <div class="form-group">
                    <input type='text' class='form-control' name="search_msg_username_input" id="search_msg_username_input" placeholder='Enter username of recipient'>
                  </div>
                  <span class='input-group-btn'>
                    <button class='btn btn-default' type='submit' name="submit_search_msg_username" id="submit_search_msg_username"><span class='ion-search'></span></button>
                  </span>
                </div><!-- /input-group -->
              </form>

              <div class='media <?php if(!isset($msg_username)){ echo 'hidden';}?>'>
                <div class="msg-back-btn"><a <?php if(isset($msg_username)){ echo "href='messages'";}?>><span class="ion-android-arrow-back"></span></a></div>
                
                <div class='media-left'>
                  <div class='current-image-box'>
                    <img class='media-object' src='<?php if(isset($msg_username)){ echo $profile_pic;}?>' alt=''>
                  </div><!--current-image-box-->
                </div><!--end media-left-->
                <div class='media-body'>
                  <h4 class=''><?php if(isset($msg_username)){ echo $fullname;}?></h4>
                </div><!--/end media-body-->
                <div class="media-right">
                  <div class='dropdown'>
                    <a class='dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                      <span class='ion-android-more-horizontal'></span>
                    </a>
                    <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>
                      <li><a id='delete-conversation' delete-type='conversation' delete-id='<?php if(isset($msg_username)){ echo $conv_id;}?>' class="delete-conv-id" data-toggle="modal" data-target="#myModal">Delete Conversation</a></li>
                    </ul>
                  </div>
                </div><!--end media-right-->
              </div><!-- /media msg-connection -->
            </div><!--end currently-messaging-->

            <div class="search-msg-username-result">
            
            </div><!--search-msg-username-result-->
            
            <div class='msg-table'>                    
              <div class='main-msg'>
                <div class='main-msg-container'>
                
                </div><!--end main-msg-container-->
              </div><!--end main-msg-->
            </div><!--end msg-table-->            

            <div class="new-messages-available hidden">New messages available</div>

            <div class="msg-textarea <?php if(!isset($msg_username)){ echo 'hidden';}?>">
              <form id="msg-form" method="post" class="form-inline">
               
                <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><span class="ion-document"></span></button>
                </span>
                <div class="form-group">
                  <textarea class="form-control typed_msg" name="typed_msg" id="typed_msg"></textarea>                
                </div>
                <span class="input-group-btn">
                <button type="submit" class="btn btn-success" name="send-msg" id="send-msg" disabled><span class="ion-android-send"></span></button>
                </span>
              </form>
            </div><!--end msg-textarea-->
          </div><!--end msg-content-->

          <div class=""></div>
        </div><!--end row-->
      
      </div><!--end container-fluid-->
    </section><!--end view-ad-bg-->

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
$(document).ready(function() {

  //confirm delete conversations and messages
  $(document.body).on('click','#delete_conv,#delete_msg',function(e){
	e.preventDefault();
	var delete_id = $(this).attr('data-delete-id');
	var delete_type = $(this).attr('data-delete-type');
    $.ajax({
	  url:'php_load/delete-msg.php',
	  type:'POST',
	  data:{
		delete_id : delete_id,
		delete_type : delete_type   
		  },
	  beforeSend: function(){
		 $('.modal-body .btn').attr('disabled',true)
		 },		
	  success: function(info){
		  load_msg_conversations();
		  trigger_msg_action();	
		  $('.modal-header .close').click();			 
		 }
    })
  })
  //show modal-dialog to delete delete conversations and messages
  $(document).on('click','.delete-conv-id,.delete-msg-id',function(){
	var delete_id = $(this).attr('delete-id');
	var delete_type = $(this).attr('delete-type');
	var modal_content = $(this).attr('id');
	
	$.ajax({
	  type:'POST',
	  url:'php_load/load-msg-modal.php',
	  data:{
		  delete_id:delete_id,
		  delete_type:delete_type,
		  modal_content:modal_content
		  },
	  global:false,
	  beforeSend:function(){
		  },
	  success:function(data){
		  $('.msg-modal .modal-dialog').html(data)
		  }
	  })
  })//end 
  
  //search users in database so you can send a new message
  $('#search-msg-username-form').validate({
	rules:{
		search_msg_username_input:{
			required:true
			}
		},
	messages:{
		search_msg_username_input:{
			required:''
			}
		},
	submitHandler:function(form){
	  $.ajax({
		type:'POST',
		url:'php_load/search-msg-username.php',
		data:$('#search-msg-username-form').serializeArray(),
		global:false,
		beforeSend:function(){
			},
		success:function(data){
		$('.search-msg-username-result').html(data);
			}
		})
	}
  })//end validate
  
  //click back button in mobile view to go back to conversation page
  $(document.body).on('click','.msg-back-btn',function(){
	  var window_width = $(window).width();
	  //if its desktop view
	  if(window_width < 991){
		  $('.msg-content').hide(350,function(){
			$('.msg-content').addClass('visible-md').addClass('visible-lg');
		  })
		  $('.msg-connections-list').removeClass('visible-md').removeClass('visible-lg').show(300);			  
		}//end if
	  var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/messages';
	  //check if browser supports automatic update of url without loading
	  //if true, auto-update link else reload browser
	  if (history.pushState) {
		window.history.pushState({path:newurl},'',newurl);}else{ window.location = newurl;
		}
  })

  //create new message button
  $('.create-new-msg .btn').on('click',function(){
	  $('.main-msg-container').html('');
	  $('#search-msg-username-form').removeClass('hidden')
	  $('.currently-messaging .media').addClass('hidden');
	  $('.msg-textarea').addClass('hidden');
	  var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/messages';
	  //check if browser supports automatic update of url without loading
	  //if true, auto-update link else reload browser
	  if (history.pushState) {
		window.history.pushState({path:newurl},'',newurl);}else{ window.location = newurl;
		}

	  var window_width = $(window).width();
	  //if its desktop view
	  if(window_width < 991){
		  $('.msg-connections-list').hide(350,function(){
			$(this).addClass('visible-md').addClass('visible-lg');
		  })
		  $('.msg-content').removeClass('visible-md').removeClass('visible-lg').show(300);
		}//end if
  })
  
  //load new messages automatically at intervals
  $.ajaxSetup({cache:false});
  setInterval(function(){
	  check_for_new_msg()
	  check_for_new_conv()
	  },2000);

  check_for_new_conv()
  function check_for_new_conv(){  
	$.ajax({
	  type:'POST',
	  url:'php_load/check-for-new-conv.php',
	  data:{},
	  global:false,
	  beforeSend: function(){
		  },
	  success:function(data){
		if(data!==''){
			load_msg_conversations();
			  }
	  
	  }//end success			
	});
  }//end function


  //create a function that checks the url and loads messages based on the msg_username
  function check_for_new_msg(){	  
	var url = $(location).attr('href');
	var parts = url.split("/");
	var msg_uname = parts[5];
	//if the msg_username is not available do nothing
	if(msg_uname=='' || msg_uname==null){
  
	}else{
	  //else get the msg_username, page and make ajax call 
	  var msg_uname = parts[5];
	  load_main_msg();  
	  function load_main_msg(){
		var window_width = $(window).width();			  
		$.ajax({
		  type:'POST',
		  url:'php_load/check-for-new-msg.php',
		  data:{
			  msg_uname:msg_uname,
			  window_width:window_width
			  },
		  global:false,
		  beforeSend: function(){
			  },
		  success:function(data){
		  //check if the data is not empty
			if(data!==""){
			  //check the screen size to determine the way new messages would be displayed  
			  var window_width = $(window).width();
			  //if its desktop view, append new data
			  if(window_width > 991){
				$('.main-msg .main-msg-container').append(data);
				load_msg_conversations();
				
				//var bottom = $('.msg-table').prop('scrollHeight') - ($('.msg-table').scrollTop() + $('.msg-table').height());
				//alert(bottom)
				//if(bottom > 0){
			  var log = $('.msg-table');
			  log.animate({scrollTop: log.prop('scrollHeight')},500)
					//}
				  
				//if its mobile view, replace old data with new data
			  }else{
			  //if .load-newer-msg exists (if the page is not page 1:latest page),display the .new-messages-available div
				if($('.load-newer-msg').length){
					//if the data is not empty, show the .new-messages-available div
					$('.new-messages-available').removeClass('hidden');
					load_msg_conversations();
				  }else{
					//if its the most recent page(page1), just append the new message 
					$('.main-msg .main-msg-container').append(data);
					load_msg_conversations();
				  }
			  }//end if window_width>992

			}//end if
		  }//end success			
		});
	  }//end function
			  
	}//end if statement
  }//end check_for_new_msg() function
	
  
  //make sure the message formfield is not empty before enabling the send button
  $('#typed_msg').on('mouseout keypress',function(){
	var $this = $(this);
	if($this.val()==0){
	  $('#send-msg').attr('disabled',true);
		}else{
			$('#send-msg').attr('disabled',false);
			}
  })
  //validate the formfield before sending a message
  $('#msg-form').validate({
	rules:{
		typed_msg:{
			required:true
			}
		  },
	messages:{
		typed_msg:{
			required:""
			}
		},
	submitHandler:function(form){
	  var url = $(location).attr('href');
	  var parts = url.split("/");
	  var msg_uname = parts[5];
		//if the msg_username is not available do nothing
	  if(msg_uname=='' || msg_uname==null){
		}else{
		//else get the msg_username, page and make ajax call 
		var msg_uname = parts[5];
		$.ajax({
		  type:'POST',
		  url:'php_load/send-text-msg.php',
		  data:$('#msg-form').serialize()+"&msg_uname="+msg_uname,
		  global:false,
		  beforeSend:function(){
			  $('#send-msg').attr('disabled',true);
			  },
		  success:function(data){
			  $('#typed_msg').val("");
			  trigger_msg_action();
			  load_msg_conversations(1);
			  var log = $('.msg-table');
			  log.animate({scrollTop: log.prop('scrollHeight')},500)
			  }
		  })
		}//end else
			  
	}//end submitHandler
  })//end validate
  
  //if the history button is clicked, call the trigger_msg_action() function
  $(window).on('popstate', function(ev){
	var state = ev.originalEvent.state;
	//if the state of the browser url changes...
	if (state !== null){
		//if false, reload browser
		window.location.reload();
	  }else{
		//if false, reload browser
		window.location.reload();
	 }
  })
  
  //call trigger_msg_action() function
  trigger_msg_action();
  
  //create a function that checks the url and loads messages based on the msg_username
  function trigger_msg_action(){	  
	var url = $(location).attr('href');
	var parts = url.split("/");
	var msg_uname = parts[5];
	  //if the msg_username is not available do nothing
	  if(msg_uname=='' || msg_uname==null){

		}else{
		//else get the msg_username, page and make ajax call 
		var msg_uname = parts[5];
		  load_main_msg();
  
		  function load_main_msg(pg){
			  var window_width = $(window).width();
			  
			$.ajax({
			  type:'POST',
			  url:'php_load/load-msg.php',
			  data:{
				  msg_uname:msg_uname,
				  pg:pg,
				  window_width:window_width
				  },
			  global:false,
			  beforeSend: function(){
				  },
			  success:function(data){
				if(pg>1){
				  //if the page number is>1, 
				  //check the screen size to determine the way new messages would be displayed  
					var window_width = $(window).width();
					//if its desktop view, prepend new data
					if(window_width > 990){
					  $('.main-msg .main-msg-container').prepend(data);
					  //if its mobile view, replace old data with new data
						}else{
						$('.main-msg .main-msg-container').html(data);
						}
				  //end if page>1
				   }else{
				  $('.main-msg .main-msg-container').html(data);	
				  }
				  //insert a pretty srcoll bar
				  $(".msg-table").niceScroll({
					cursorwidth:"10px"
					});
				  //scroll to the bottom of the message div
				  if(pg=='' || pg==null){
					  var log = $('.msg-table');
					  log.animate({scrollTop: log.prop('scrollHeight')},500)
					}
			  }//end success			
			});
		  }//end function
		  $('.msg-content').off('click').on('click','.main_msg_pagination_link',function(e){
			var pg = $(this).attr('id');
			$('.main-msg .main-msg-container .main-msg-navigation').remove();
			load_main_msg(pg);
		  })		  		
		}//end if statement
  	}


//load messages attributed to a particular conversation by clicking on the various conversations
  //clicking a conversation msg-link
  $(document.body).on('click','.msg-connection .media-body',function(){
	$('.search-msg-username-result').html('')
	$('.currently-messaging .media').removeClass('hidden');
	$('#search-msg-username-form').addClass('hidden')
	$('.msg-textarea').removeClass('hidden');

	var window_width = $(window).width();
	//if its desktop view
	if(window_width < 991){
		$('.msg-connections-list').hide(350,function(){
		  $(this).addClass('visible-md').addClass('visible-lg');
		})
		$('.msg-content').removeClass('visible-md').removeClass('visible-lg').show(300);
	  }//end if
		
      var pg = '1';
	  var msg_uname = $(this).attr('data-uname');
	  var img_src = $(this).prev().children('.conv-image-box').children('.media-object').attr('src');
	  var fullname = $('h4',this).html();
	  var window_width = $(window).width();
	  var delete_id = $(this).next('.media-right').find('.delete-conv-id').attr('delete-id');

	  //change the image and name of the active conversation
	  $('.currently-messaging .media-left .media-object').attr('src',img_src)
	  $('.currently-messaging .media-body h4').html(fullname);
	  $('.currently-messaging .media-right .dropdown .dropdown-menu li .delete-conv-id').attr('delete-id',delete_id);
	  
	  //get the new path after clicking the link 
	  var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/messages/'+msg_uname;
	  //check if browser supports automatic update of url without loading
	  //if true, auto-update link else reload browser
	  if (history.pushState){
		window.history.pushState({path:newurl},'',newurl);
	  	
		load_main_msg(pg);
		
		function load_main_msg(pg){
		  $.ajax({
			type:'POST',
			url:'php_load/load-msg.php',
			data:{
			  pg:pg,
			  msg_uname : msg_uname,
			  window_width : window_width
			  },
			global:false,
			beforeSend: function(){
				$('.main-msg .main-msg-container').html('hold on');
				},
			success:function(data){
			  if(pg>1){
				$('.main-msg .main-msg-container').prepend(data);
				  //end if page>1
				 }else{
				$('.main-msg .main-msg-container').html(data);	
				}

			var log = $('.msg-table').scrollTop($('.msg-table')[0].scrollHeight);	

			}//end success
			
		  });
 		  load_msg_conversations();
		}//end function
		$('.msg-content').off('click').on('click','.main_msg_pagination_link',function(e){
		  var pg = $(this).attr('id');
		  $('.main-msg .main-msg-container .main-msg-navigation').remove();
		  load_main_msg(pg);
		})

	  }else{
	  //if false, reload browser
		  window.location = newurl;
		}
  })


//load conversations available attributed to the logged-in user
	//after sending a message, load the conversations again
	$('#send-msg').on('click',function(){
		load_msg_conversations(1);
		})
		
	load_msg_conversations();
	//a function to load conversations
	function load_msg_conversations(conv_pg){
	var window_width = $(window).width();
	$.ajax({
	   url:'php_load/load-conversations.php',
	   type:'POST',
	   data:{
		   conv_pg:conv_pg,
		   window_width:window_width
		   },
	   beforeSend:function(){
		   $('.msg-conversations-navigation ul li a').html("Loading...")
		   },
	   success:function(info){
		   if(conv_pg>1){
			  //check the screen size to determine the conversations would be displayed  
			  var window_width = $(window).width();
			  //if its desktop view, append new data
			  if(window_width > 991){
				//if its dsktop view, append new conversations to older ones
				$('.msg-connection-box').append(info);
			  }else{
				 //if its mobile view, insert new data in the html element tag
				 $('.msg-connection-box').html(info);
			  }//end if window_width>992
		   }else{
				$('.msg-connection-box').html(info);
			   }

		 }//end success
	  })
	}//end function
	$(document).on('click','.msg_conversations_pagination_link',function(){
	  var conv_pg = $(this).attr('id');
	  $('.msg-connection-box .msg-conversations-navigation').remove();
	  load_msg_conversations(conv_pg);
	  die();
	})
});
</script>
</body>
</html>