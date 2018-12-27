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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="http://localhost/studybuddy/" />

<title>Login | StuddyBuddy</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="fonts/flaticon1/flaticon.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href='css/croppie.css' rel='stylesheet'>
<link href="css/style.css" rel="stylesheet">
</head>

<body class="login-landing">
  <div class="custom-container">
  
    <div class="logo-heading">
      <p><a href="home">Study Buddy</a></p>
    </div>

    <section class="login-bg">
      <div class="container">
        <div class="panel login-box">
          
          <div class="panel-heading">Login</div>
          
          <div class="panel-body">
 
            <div class="login-info"></div>
            
            <form method="post" id="login-form" name="login-form">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>            
              <button class="btn btn-success btn-block btn-lg" type="submit" id="login" name="login">Login
              <img src='img/ajax-loader.gif' class="preloader" width='22px' height='22px' hidden="true"/></button>
              <div class="form-group">
                <a href="http://localhost/studybuddy/forgot-password" class="card-link">Forgot Password?</a>
                <p>Dont have an account? <a href="http://localhost/studybuddy/signup" class="card-link">SignUp</a></p>
              </div>
            </form>
          </div>
        </div><!--end panel login-box-->
      </div>
    </section>
    
  </div><!--end container-fluid-->
</body>
<!--all javascript and jquery plugin-->

<script src="js/jquery.xdomainrequest.min.js"></script>
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
</script>
</html>