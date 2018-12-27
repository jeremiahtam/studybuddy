<?php
  session_start();   
if(!isset($_SESSION["login_user"])){
	}
	else
	{
	$user = $_SESSION["login_user"];
	}
  include("/inc/db.inc.php");
 ?>

<!doctype html>
<html lang="en">
<head>
<base href="/studybuddy/"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9" >

<title>Home | StuddyBuddy</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="fonts/flaticon1/flaticon.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href='css/croppie.css' rel='stylesheet'>
<link href="css/style.css" rel="stylesheet">
<link href="css/homepage-style.css" rel="stylesheet">
<link href='css/datepicker.css' rel='stylesheet'>
</head>

<body>
  <div class="custom-container">
    <?php include("./inc/menu.inc.php");?>

    <section class="jumbotron">
      <h1>Study Buddy!</h1>
      <p>For everyone with a brain.</p>
      <p><a class="btn btn-success btn-lg smoothScroll"  href="#course-list" role="button">Learn more</a></p>
    </section>    
    

    <section class="basic-info">
      <div class="container">
        <h5 class="main-heading">Welcome, here's what we offer </h5>
        <p class="sub-heading">Master your area of study by connecting with </p>
        <p class="sub-heading">like-minded people.  </p>

        <div class="row">
          <div class="container">
            <div class="col-md-4">
              <div class="thumbnail">
                <img src="img/search-users.png" class="">
                <div class="caption">
                  <h5>Search For Users</h5>
                  <p class="">We provide an opportunity to search for both users and courses depending on your area of interest.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="thumbnail">
                <img src="img/connect.png" class="">
                <div class="caption">
                  <h5>Connect With Other Users</h5>
                  <p class="">Connect with study partners and get started with exchanging ideas and materials.</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="thumbnail">
                <img src="img/advertise.png" class="">
                <div class="caption">
                  <h5>Advertise</h5>
                  <p class="">Create an advert to let the community know which study area you need a partner.</p>
                </div>
              </div>
            </div>
          </div><!--end container-->
        </div><!--end row-->
      </div><!--end container-->
    </section><!--end basic-info-->

   
    <section class="course-list" id="course-list">
      <div class="container">
        <h5 class="main-heading">Categories</h5>
        <p class="sub-heading">Choose from any of the numerous courses</p>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-4">
            <a href="#">
              <div class="thumbnail">
                <img src="img/study-group.jpg" alt="Card image cap">
                <div class="caption">
                  <h5>Certificate Program</h5>
                  <p class="">Find courses, topics and buddies relating to certificate programmes of your choice.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-4">
            <a href="#">
              <div class="thumbnail">
                <img src="img/degree-course.jpg" alt="Card image cap">
                <div class="caption">
                  <h5>Degree Program</h5>
                  <p class="">Search for topics and buddies relating to your degree programme such as Biochemistry, etc.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-4">
            <a href="#">
              <div class="thumbnail">
                <img src="img/wood-work.jpeg" alt="Card image cap">
                <div class="caption">
                  <h5>Vocational Program</h5>
                  <p class="">Search for buddies who have interests in learning and teaching crafts like weaving, carpentry, etc.</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-4">
            <a href="#">
              <div class="thumbnail">
                <img src="img/graduate-admission-tests.jpg" alt="Card image cap">
                <div class="caption">
                  <h5>Graduate Admission Tests</h5>
                  <p class="">Be better prepared for your graduate admission test like GMAT, IELTS, etc. by exchanging ideas with other users. </p>
                </div>
              </div>
            </a>
          </div>

        </div><!--end row-->
      </div><!--end container-->
    </section>

    <section class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-9 left-content">
            <h3>JOIN US TODAY</h3>
            <p>Be a part of our growing community of knowledge seekers and givers. Register with us by following simple steps and start connecting and learning.</p>
          </div>
          <div class="col-md-3 right-btn">
            <a class="btn btn-lg btn-success" href="http://localhost/studybuddy/signup">SIGN UP</a>
          </div>
        </div><!--end row-->
      </div><!--end container-->    
    </section><!--end call to action section-->
    
    <section class="testimonial">
      <div class="container">
        <h5 class="main-heading">What People Say About Us</h5>
        
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="img/jeremiahtam-1508167574.jpg">
                </a>
              </div><!--end media-left-->
              <div class="media-body">
                <h4 class="media-heading">Jeremiah Tam</h4>
                I was searching for a Maths teacher for my son to prepare for his NECO exams in three weeks, and hired one from Tuteria. He was really good, he took the time to explain any topic perfectly. Today my son has passed his exams and gained admission into Federal Science and Technology College. I am happy about my son's performance and the service rendered. 
                <p>- Father</p>
              </div><!--end media body-->
            </div><!--end media-->
          </div><!--end col div-->
          <div class="col-sm-6 col-md-6">
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="img/jeremiahtam-1508167574.jpg">
                </a>
              </div><!--end media-left-->
              <div class="media-body">
                <h4 class="media-heading">Jeremiah Tam</h4>
                I was searching for a Maths teacher for my son to prepare for his NECO exams in three weeks, and hired one from Tuteria. He was really good, he took the time to explain any topic perfectly. Today my son has passed his exams and gained admission into Federal Science and Technology College. I am happy about my son's performance and the service rendered. 
                <p>- Father</p>
              </div><!--end media body-->
            </div><!--end media-->
          </div><!--end col div-->
          <div class="col-sm-6 col-md-6">
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="img/jeremiahtam-1508167574.jpg">
                </a>
              </div><!--end media-left-->
              <div class="media-body">
                <h4 class="media-heading">Jeremiah Tam</h4>
                I was searching for a Maths teacher for my son to prepare for his NECO exams in three weeks, and hired one from Tuteria. He was really good, he took the time to explain any topic perfectly. Today my son has passed his exams and gained admission into Federal Science and Technology College. I am happy about my son's performance and the service rendered. 
                <p>- Father</p>
              </div><!--end media body-->
            </div><!--end media-->
          </div><!--end col div-->
          <div class="col-sm-6 col-md-6">
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="img/jeremiahtam-1508167574.jpg">
                </a>
              </div><!--end media-left-->
              <div class="media-body">
                <h4 class="media-heading">Jeremiah Tam</h4>
                I was searching for a Maths teacher for my son to prepare for his NECO exams in three weeks, and hired one from Tuteria. He was really good, he took the time to explain any topic perfectly. Today my son has passed his exams and gained admission into Federal Science and Technology College. I am happy about my son's performance and the service rendered. 
                <p>- Father</p>
              </div><!--end media body-->
            </div><!--end media-->
          </div><!--end col div-->
        </div><!--end row-->
      </div><!--end container-->
    </section><!--end testimonial section-->
    
    <?php include("./inc/footer.inc.php");?>
  </div><!--end container-fluid-->
</body>
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
/*$(document).ready(function(){
	var width = $(window).width();
	alert(width);
	})*/
$(function() {
	$("a[href^='#']").click(function(e){
 	  e.preventDefault()
	  var target = $(this).attr('href')
	  $('html, body').animate({
		  scrollTop: $(target).offset().top
	  }, 2000);
	})
})
$(document).ready(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll >630) {
	    $(".topmost-nav").removeClass('transparent-bg');
	    $(".topmost-nav").addClass('dark-bg');
	  }
	  else{
	    $(".topmost-nav").addClass('transparent-bg');
	    $(".topmost-nav").removeClass('dark-bg');
      
	  }

  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 630) {
	    $(".topmost-nav").removeClass('transparent-bg');
	    $(".topmost-nav").addClass('dark-bg');
	  }
	  else{
	    $(".topmost-nav").addClass('transparent-bg');
	    $(".topmost-nav").removeClass('dark-bg');
      
	  }
  })
})

</script>
</html>