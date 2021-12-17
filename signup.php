<?php include("./inc/session.inc.php");?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="<?php echo base_url();?>" />


<title>Signup | StuddyBuddy</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="fonts/flaticon1/flaticon.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href='css/croppie.css' rel='stylesheet'>
<link href="css/style.css" rel="stylesheet">
</head>

<body class="signup-landing">
  <div class="custom-container">
   
    <div class="logo-heading">
      <p><a href="home">Study Buddy</a></p>
    </div>
     
    <section class="signup-bg">
      <div class="container">
        <div class="panel  signup-box">
 
          <div class="panel-heading">Signup</div>
 
          <div class="panel-body">
            <div class="signup-info"></div><!--where alerts are displayed--> 
                      
            <form method="post" id="signup" name="signup">
              <div class="form-group">
                <label for="fname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
              </div>
              <div class="form-group">
                <label for="uname">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="pword" class="col-form-label">Password</label>
                <input type="password" class="form-control" id="pword" name="pword" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="re_pword" class="col-form-label">Repeat Password</label>
                <input type="password" class="form-control" id="re_pword" name="re_pword" placeholder="Repeat Password">
              </div>
              <button type="submit" class="btn btn-success btn-block btn-lg" name="submit" id="submit">SignUp
              <img src='img/ajax-loader.gif' class="preloader" width='22px' height='22px' hidden="true"/></button>         
             
              <p>
                Already have an account? <a href="login" class="card-link">Login</a>
              </p>
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
</script>
</html>