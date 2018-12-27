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

<title>Reset Password | StuddyBuddy</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="fonts/flaticon1/flaticon.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href='css/croppie.css' rel='stylesheet'>
<link href="css/style.css" rel="stylesheet">
</head>

<body class="reset-password-landing">
  <div class="custom-container">
  
    <div class="logo-heading">
      <p><a href="home">Study Buddy</a></p>
    </div>

   <section class="reset-password-bg">
     <div class="container">
       <div class="panel  reset-password-box">
         <div class="panel-heading">Reset Password</div>
         <div class="panel-body">

           <div class="reset-info"></div>
          
  <?php
   if ($_GET['ret_code']){
      $get_ret_code = $_GET['ret_code'];
      $get_username = $_GET['username'];
    
      $sql=mysql_query("SELECT * FROM users WHERE username='$get_username'");
        $num_sql=mysql_num_rows($sql);
    
      //check if the username is available in the database
            
      if($num_sql ==1){
  
          while($row= mysql_fetch_assoc($sql)){
          $db_ret_code=$row['passwordreset'];
          $db_username=$row['username'];
          }
                //check if the username and reset code in the database are the same with that of the GET values
        if($db_ret_code==$get_ret_code && $db_username == $get_username){
          echo"
           <form method='post' id='reset-password-form' name='reset-password-form'>
             <div class='form-group'>
               <label for='password'>Password</label>
               <input type='password' class='form-control' id='password' name='password' placeholder='New Password'>
             </div>
             <div class='form-group'>
               <label for='re_password'>Repeat Password</label>
               <input type='password' class='form-control' id='re_password' name='re_password' placeholder='Repeat New Password'>
             </div>            
             <input type='hidden' value='$get_username' name='username'>
             <button class='btn btn-success btn-lg btn-block' type='submit' id='reset' name='reset'>Reset Password
             <img src='img/ajax-loader.gif' class='preloader' width='22px' height='22px' hidden='true'/></button>             
           </form>";
          
              }else{
                echo"<p class='text-danger'> Damaged reset link!!!</p>";
                }
         }else{
            echo"<p class='text-danger'> Damaged reset link!!!</p>";
            }
      }else{
          header("Location:index.php");
      }

          ?>



         </div>
       </div><!--end card login-box-->
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