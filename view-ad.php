<?php
session_start(); 
if(!isset($_SESSION["login_user"])){
  }else{
	$user = $_SESSION["login_user"];
  }
if(!isset($_SESSION["login_user"])){
	header("Location: http://localhost/studybuddy/home");
  }

  //get the ad_id
  if(isset($_GET['ad_id'])){
	 $ad_id = mysqli_real_escape_string($_GET['ad_id']);
	if(!empty($ad_id)){

	}else{
//	  header("Location: http://localhost/studybuddy/home");
	}
  }else{
//	header("Location: http://localhost/studybuddy/home");
  }


  include("/inc/db.inc.php");
 ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="http://localhost/studybuddy/" />

<title>View Ad | StuddyBuddy</title>
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
<input data-ad-id='<?php echo $ad_id ?>' class='hidden-ad-id' hidden="true">
  <div class="custom-container">
    <?php include("./inc/menu.inc.php");?>

    <div class='modal fade' id='modal' tabindex='-1' role='dialog'>
       <div class='modal-dialog' role='document'>
  
      </div><!--modal-dialog-->
    </div><!--end modal-->

    <section class="view-ad-bg">
      <div class="container">
        <div class="row">
        
          <div class="col-md-9 view-ad-left-section">
            
          </div><!--end col-->

          <div class="col-md-3">
            <div class="similar-ads">
              <div class="heading">Similar Ads</div>
              <div class="similar-ads-body">

              </div><!--similar-ads-body-->
            </div><!--end recent ads-->
          </div><!--end col-->          
        </div><!--end row-->
      </div><!--end container-fluid-->
    </section><!--end view-ad-bg-->

  <?php include("./inc/footer.inc.php");?>

  </div><!--end custom-container-->
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

  $(document.body).on('click','#submit_comment',function(e){
	  var comment = $('#comment_textarea').val();
	  if(comment==""){
		   alert('empty');
		 }else{
		   alert(comment);
		 }
	 /*$.ajax({
		 url:'php_load/submit-comment.php',
		 type:'POST',
		 data:{
			 comment:comment
		 },
		 beforeSend: function(){
			 $('input').attr('disabled',true)
			 $('.btn').attr('disabled',true)
			 $('.preloader').attr('hidden',false);
			 },
		 success: function(info){		
				
		 if(!info){
			 //alert('empty');
			 $('.panel-body').html("<h4 class='panel-heading'><span class='ion-android-checkmark-circle'></span> Your registration was successful</h4><p class='panel-text'>To gain access to our service, login.</p><a href='http://localhost/studybuddy/login' class='btn btn-outline-danger'>Login Now!</a>");
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
	  })*/
	  e.preventDefault();
  })		 	

//load replies
$(document.body).on('click','.view-replies',function(e){
  var comment_id = $(this).attr('data-comment-id');
  $.ajax({
	 url:'php_load/load-replies.php',
	 type:'POST',
	 data:{
		 comment_id:comment_id
		 },
	 beforeSend:function(){
		 },
	 success:function(info){
		 $('#reply_'+comment_id).html(info);
	   }//end success
	})
})

//load reply form
$(document.body).on('click','.reply-action',function(e){
  var comment_id = $(this).attr('data-comment-id');
  $.ajax({
	 url:'php_load/reply-form.php',
	 type:'POST',
	 data:{
		 comment_id:comment_id
		 },
	 beforeSend:function(){
		 },
	 success:function(info){
		 $('#reply_box_'+comment_id).html(info);
	   }//end success
	})
})

//load ad
  var ad_id = $('.hidden-ad-id').attr('data-ad-id');
  $.ajax({
	 url:'php_load/load-ad.php',
	 type:'POST',
	 data:{
		 ad_id:ad_id
		 },
	 beforeSend:function(){
		 },
	 success:function(info){
		 $('.view-ad-left-section').html(info);
	   }//end success
	})

//load similar ads
  var ad_id = $('.hidden-ad-id').attr('data-ad-id');
  $.ajax({
	 url:'php_load/similar-ads.php',
	 type:'POST',
	 data:{
		 ad_id:ad_id
		 },
	 beforeSend:function(){
		 },
	 success:function(info){
		 $('.similar-ads-body').html(info);
	   }//end success
	})
	
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