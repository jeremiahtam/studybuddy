<?php
include("./inc/session.inc.php");
include("./inc/db.inc.php");

//get the category
if(isset($_GET['category'])){
  $category = mysqli_real_escape_string($conn,$_GET['category']);
  //check if $category is not empty
  if(!empty($category)){
	  
	  if(isset($_GET['study_area'])){	
		$study_area = mysqli_real_escape_string($conn,$_GET['study_area']);
		//check if $category is not empty
		if(!empty($study_area)){
 
		  if(isset($_GET['concentration'])){	
			$concentration = mysqli_real_escape_string($conn,$_GET['concentration']);
			if(!empty($concentration)){

  				if(isset($_GET['page'])){	
				  $page = $_GET['page'];
				}else{
				  $page = 1;
					}
			  }//end if!empty(concentration)
			}//end get concentration
		  }//end if !empty(study_area)
	  }//end get_study_area  
  }//end if !empty(category)
}//end get[category]

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="<?php echo base_url();?>" />

<title>View By Category | StuddyBuddy</title>
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
    <?php include("./inc/menu.inc.php");?>
    <div class='modal fade' id='modal' tabindex='-1' role='dialog'>
       <div class='modal-dialog' role='document'>  
      </div><!--modal-dialog-->
    </div><!--end modal-->
    

	<section class='category-body'>
	  <div class='container'>

		<div class='row'>
          <div class="heading">Search By Category</div>
          <div class='col-md-3'>
            <div class="panel category-panel">
              <div class="panel-heading category-panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a>Select A Category</a>
                  <span role="button" class="ion-ios-arrow-down pull-right visible-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOuterPanel" aria-expanded="true" aria-controls="collapseOne">
                  </span>
                </h4>
              </div><!--end panel-heading-->
              <div id="collapseOuterPanel" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body category-panel-body">
                  <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control input-sm select-category" id="select-category">
                      <option value='' <?php if(!isset($category)){echo "selected='true'";}?>>-all categories-</option>
                      <option value="Certificate_Program" <?php if(isset($category)){if($category=='Certificate_Program'){echo "selected='true'";}}?>>Certificate Program</option>
                      <option value="Degree_Program" <?php if(isset($category)){if($category=='Degree_Program'){echo "selected='true'";}}?>>Degree Program</option>
                      <option value="Vocational_Program" <?php if(isset($category)){if($category=='Vocational_Program'){echo "selected='true'";}}?>>Vocational Program</option>
                      <option value="Graduate_Admission_Tests" <?php if(isset($category)){if($category=='Graduate_Admission_Tests'){echo "selected='true'";}}?>>Graduate Admission Tests</option>
                    </select>
                  </div><!--end form-group-->
                </div><!--end panel-body-->                
                <div class="panel-group inner-panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                </div><!--end inner-panel-group-->                                
              </div><!--end category-panel-collapse-->
            </div><!--end category-panel-->         
          
          </div><!--end col-md-3-->
          
          <div class="col-md-9">
            <div class="category-content">

            </div><!--category-content-->
          </div><!--end col-md-9-->
        </div><!--end row-->
        
	  </div><!--end container-->
	</section><!--end profile-body-->

    
  <?php include("./inc/footer.inc.php");?>
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

$(document).ready(function(e){
	/***********************************************/
	//On document ready,get the url and assign different sections of it
	//Use these values to load the main content of the view-ads-by-category
	var url = $(location).attr('href');
	var parts = url.split("/");
	
	var category = parts[5];
	var study_area = parts[6];
	var concentration = parts[7];
	var page = parts[8];
	
	//Load category ads main content on document.ready
	load_view_by_category_ads(category,study_area,concentration,page);
	//Get the value of the select-category dropdown menu on	document load
	//and then load the side menu and main content
	var category = $('.select-category').val();
	//call load_category_menu(category) function
	load_category_menu(category);
	/***********************************************/
	

	//change the value of the select-category on change
	//and then load the side menu based on the value
	$(document.body).on('change','.select-category',function(){
	  var category = $(this).val();
	  var study_area = '';
	  var concentration = '';
	  var page = '';
	  var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/view-ads-by-category/'+category;
	  //check if browser supports automatic update of url without loading
	  //if true, auto-update link else reload browser
	  if(history.pushState){
		window.history.pushState({path:newurl},'',newurl);
	  }else{
		window.location = newurl;
	  }
	  //load category menu
	  load_category_menu(category);
	  //load category content ads
	  load_view_by_category_ads(category,study_area,concentration,page);
	})//end on change

	//if no category is chosen, click the 'see more...' link to 
	//select a category and also change the  select-category value
	$(document.body).on('click','.category-content-sub-heading >#none_level',function(){
	  var category = $(this).attr('class');
	  $(".select-category").val(category);
	  //call the onchange event to load the contents of the specific category
	  $(".select-category").change();
	})//end on click

	//load content of a study area when you Click on study area link
	$(document.body).on('click','.study-area > a, .category-content-sub-heading > #category_level',function(){
		var category = $('.select-category').val();
		var study_area = $(this).attr('class');
		var concentration = '';
		var page = '';
		var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/view-ads-by-category/'+category+'/'+study_area;
		//check if browser supports automatic update of url without loading
		//if true, auto-update link else reload browser
		if(history.pushState){
		  window.history.pushState({path:newurl},'',newurl);
		}else{
		  window.location = newurl;
		}
		load_view_by_category_ads(category,study_area,concentration,page);
	})

	//load content of a concentration when you Click on concentration link
	$(document.body).on('click','.sub-menu > a, .category-content-sub-heading >#study_area_level',function(){
		var category = $('.select-category').val();
		var study_area = $(this).attr('data-study-area');
		var concentration = $(this).attr('class');
		var page = 1;
		var newurl =  window.location.protocol + '//' + window.location.host +'/studybuddy/view-ads-by-category/'+category+'/'+study_area+'/'+concentration;
		//check if browser supports automatic update of url without loading
		//if true, auto-update link else reload browser
		if(history.pushState){
		  window.history.pushState({path:newurl},'',newurl);
		}else{
		  window.location = newurl;
		}
		load_view_by_category_ads(category,study_area,concentration,page);
	})


//load the page number form url as the back and front history button is clicked so
//the data is automatically loaded with the correct page
  $(window).on('popstate', function(ev){
    var state = ev.originalEvent.state;	
    var url = $(location).attr('href')
    var parts = url.split("/")
	
	var category = parts[5];
	var study_area = parts[6];
	var concentration = parts[7];
	var page = parts[8];

	//if the state of the browser url changes...
	if (state !== null) {
	  //Load category ads main content on popstate
	  load_view_by_category_ads(category,study_area,concentration,page);
	  $('.select-category').val(category);
	  load_category_menu(category);
	}else{
	  //Load category ads main content on popstate
	  load_view_by_category_ads(category,study_area,concentration,page);
	  $('.select-category').val(category);
	  load_category_menu(category);
	  }
   })//end on popstate    

	//create a function to load the view-by category menu
	function load_category_menu(category){
	  $.ajax({
	   url:'php_load/load-view-by-category-menu.php',
	   type:'POST',
	   data:{
		   category:category
		   },
	   beforeSend:function(){
		   $('.inner-panel-group .preloader').attr('hidden',false);
		   },
	   success:function(info){
		   $('.inner-panel-group').html(info);
		 }//end success
		})
	}//end function load_category_menu(category)

	function load_view_by_category_ads(category,study_area,concentration,page){
		if(study_area!=='' && concentration==''){
			$('.study-area > a.'+study_area).next('span').click();
			}
		$.ajax({
		  type:'POST',
		  url:'php_load/load-view-by-category-posts.php',
		  data:{
			category:category,
			study_area:study_area,
			concentration:concentration,
			page:page
			},
		  global:false,
		  beforeSend:function(){
			  //$('.tab-content >.preloader').attr('hidden',false);
			  },
		  success:function(data){
		  //alert(data)
		  $('.category-body .category-content').html(data);
		  }
	  });
	}//function load_view_by_category_ads()

})//end document




/************************************/
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


/*$(document).ready(function(e) {
var len = $(window).width();
alert(len)    
});
*/
/*display the interested people for an ad*/
$(document).ready(function(e) {
	//create function with page number and ad-id
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
		   if(page>1){//if the interest page is greater than 1, check for the window width 
			  var window_width = $(window).width();
			  
			  if(window_width > 991){//if its desktop view, append content from new 
				$('.modal-body .display-ad-interest-navigation').append(info);
				$('#display-ad-interest .modal-body').append(info);
			  }else{//else if its mobile view, append content from new 
				 $('#display-ad-interest .modal-body').html(info);
			  }//end if window_width>992
		   }else{//if page==1, ust go ahead and use html 
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
		
//$(document).ready(function(){
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
			},
		success:function(data){
		var interest_count_id = $('.count_id_'+interest_id).html(data);
		$this.addClass('add-interest-btn');
		$this.removeClass('remove-interest-btn');
	  //alert(interest_count_id)
		 }
	  });//end ajax request
  })//end onclick
//})//end document ready

//$(document).ready(function(){
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
//})//end document ready


</script>
</body>
</html>