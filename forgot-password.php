<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="http://localhost/studybuddy/" />

<title>Forgot Password | StuddyBuddy</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="fonts/flaticon1/flaticon.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href='css/croppie.css' rel='stylesheet'>
<link href="css/style.css" rel="stylesheet">
</head>

<body class="forgot-password-landing">
  <div class="custom-container">
  
    <div class="logo-heading">
      <p><a href="home">Study Buddy</a></p>
    </div>

   <section class="forgot-password-bg">
     <div class="container">
       <div class="panel forgot-password-box">
         <div class="panel-heading">Lets Retrieve Your Password</div>
         <div class="panel-body">
          
           <div class="forgot-password-info"></div><!--where alerts are displayed-->

           <form method="post" id="forgot-password" name="forgot-password">          
             <div class="form-group">
               <label for="email">Enter Email </label>
               <input type="text" class="form-control" name="email" id="email" placeholder="Enter your registered email">
               <span class="help-block">Enter the email you registered with for a retrieval code to be sent to.</span>
             </div>
           
             <button type="submit" class="btn btn-success btn-lg" name="send" id="send">Retrieve Password
              <img src='img/ajax-loader.gif' class="preloader" width='22px' height='22px' hidden="true"/></button>
             <div class="form-group">
               <a href="http://localhost/studybuddy/login" class="card-link">Login</a>               
             </div>
           </form>


         </div>
       </div><!--end card signup-box-->
     </div>
   </section>
    
  </div><!--end container-fluid-->
</body>
<!--all javascript and jquery plugin-->

<script src="js/popper.min.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/ajax-script.js"></script>
<script>
/*$(document).ready(function(){
	var width = $(window).width();
	alert(width);
	})*/
$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 80) {
	    $(".navbar").addClass('bg-dark');
	  }

	  else{
		  $(".navbar").removeClass('bg-dark');	
	  }
  })
})

// Change the speed to whatever you want
// Personally i think 1000 is too much
// Try 800 or below, it seems not too much but it will make a difference
</script>
</html>