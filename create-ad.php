<?php
session_start(); 

if(!isset($_SESSION["login_user"])){
	   }
	else
	   {
	$user = $_SESSION["login_user"];
	   }
  include("./inc/db.inc.php");
  
  if (!isset($_SESSION["login_user"])){
	  header("Location: http://localhost/studybuddy/login");
    }

 ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="http://localhost/studybuddy/"/>

<title>Create Ad | StuddyBuddy</title>
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
  <div class="custom-container">
    <?php include("inc/menu.inc.php");?>

    <section class="create-ad-bg">


    </section>
        
	<section class='create-ad-body'>
	  <div class='container'>

          <div class="panel create-ad-box">            
            <div class="panel-heading">Create an ad</div>            
            <div class="panel-body">
               <div class='create-ad-alert'></div>
               <form id='create_ad_form'>
                 <div class='form-group'>
                   <label for='category' class='col-form-label'>Category</label>
                   <select id='category' name='category' class='form-control'>
                     <option value=''>-select category-</option>
                     <option value='certificate_program'>Certificate Program</option>
                     <option value='degree_program'>Degree Program</option>
                     <option value='vocational_program'>Vocational Program</option>
                   </select>
                 </div>
                 <div class='form-group'>
                   <label for='study_area' class='col-form-label'>Study Area</label>
                   <select id='study_area' name='study_area' class='form-control'>
                     <option value=''>-first select a category-</option>
                   </select>
                 </div>
                 <div class='form-group'>
                   <label for='concentration' class='col-form-label'>Concentration</label>
                   <select id='concentration' name='concentration' class='form-control'>
                     <option value=''>-first select a study area-</option>
                   </select>
                 </div>
                 <div class='form-group'>
                   <label for='topic' class='col-form-label'>Topic:</label>
                   <input type='text' id='topic' name='topic' class='form-control' placeholder='Topic of interest'>
                 </div>
                 <div class='row'>
                   <div class='form-group col-md-6'>
                     <label for='knowledge_level' class='col-form-label'>Your current knowledge level:</label>
                     <select id='knowledge_level' name='knowledge_level' class='form-control'>
                       <option value=''>-choose-</option>
                       <option value='Beginner'>Beginner</option>
                       <option value='Expert'>Expert</option>
                     </select>
                   </div>
                   <div class='form-group col-md-6'>
                     <label for='purpose' class='col-form-label'>Purpose:</label>
                     <select id='purpose' name='purpose' class='form-control'>
                       <option value=''>-choose-</option>
                       <option value='Fun'>Fun</option>
                       <option value='Research'>Research</option>
                       <option value='Exam Preparation'>Exam Preparation</option>
                     </select>
                   </div>
                 </div><!--end row-->
                 
                 <div class='row extra-purpose-fields'>
                 </div><!--end row extra-purpose-fields-->
                 
                 <div class='form-group'>
                   <label for='more_info' class='col-form-label'>More Info (not required)</label>
                   <textarea class='form-control' name='more_info' id='more_info' rows='2' placeholder='Not more than 300 characters'></textarea>
                 </div>
                 <button type='submit' class='btn btn-success btn-lg btn-block' id='submit_ad' name='submit_ad'>Post Ad 
                   <img src='img/ajax-loader.gif' class='preloader' width='20px' height='20px' hidden='true'/>
                 </button>
               </form>
            </div><!--end panel-body-->
          </div><!--end panel create-ad-box-->
          
	  </div><!--end container-->
	</section><!--create-ad-body-->

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
/*$(document).ready(function(e) {
var len = $(window).width();
alert(len)    
});
*/   
$(document).ready(function(e) {
  $('#create_ad_form #category').on('change',function(){
	  var empty_option = "<option value=''>-first select a study area-</option>";
	  var loading = "<option value=''>Loading...</option>";
	  //make the concentration value empty
	  $('#create_ad_form #concentration').html(empty_option);
	  //get value of the category
	  var category = $(this).val();
	  $.ajax({
		 url:'php_load/create-ad-study-area.php',
		 type:'POST',
		 data:{
			 category:category
			 },
		 beforeSend: function(){
			 $('#create_ad_form #study_area').html('loading..');
			 },
		 success: function(info){		
			 $('#create_ad_form #study_area').html(info);
			 }
	   })//end ajax call
  })//end onChange

  $('#create_ad_form #study_area').on('change',function(){
	  var category = $('#create_ad_form #category').val();
	  var loading = "<option value=''>Loading...</option>";
	  var study_area = $(this).val();
	  $.ajax({
		 url:'php_load/create-ad-concentration.php',
		 type:'POST',
		 data:{
			 category:category,
			 study_area:study_area
			 },
		 beforeSend: function(){
			 $('#create_ad_form #concentration').html(loading);
			 },
		 success: function(info){		
			 $('#create_ad_form #concentration').html(info);
			 }
	   })//end ajax call
  })//end onChange

});

/*$(document).ready(function(){
	var width = $(window).width();
	alert(width);
	})*/



</script>
</body>
</html>