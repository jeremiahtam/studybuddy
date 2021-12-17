<?php
  include("./inc/session.inc.php");

if(!isset($_SESSION["login_user"])){
	header("Location: home");
	   }
  include("./inc/db.inc.php");
 ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=9">
<base href="<?php echo base_url();?>" />

<title>Change Profile Photo | StuddyBuddy</title>
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


    <section class="upload-bg">
      <div class="container">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="change-profile-photo">Profile Photo</a></li>
            <li role="presentation" class=""><a href="change-cover-photo">Cover Photo</a></li>
          </ul>
        <div class="row">
          <div class="col-sm-8">
          <h2>Change Profile Picture</h2>
          <ul>
            <li>Choose an image thats in .jpg, .jpeg or .png format.</li>
            <li>It is advisable that the image selected should be square in shape. Preferrably 350px * 350px.</li>
            <li>The image should be clear and should show your face for easy identification by other users.</li>
          </ul>
          </div>
          
          <div class="col-sm-4">
            
            <div class="thumbnail">
			<?php
			//deleting the profile picture in database
			if(isset($_POST['delete_profile_pic'])){
				$profile_pic_query= mysqli_query($conn,"UPDATE users SET profile_pic='' WHERE username='$user'");
				}
				
				
			//upload profile picture
			if(isset($_POST['upload_profile_pic'])){
				if (isset($_FILES['profile_pic'])){
			
				//to check that a file has been chosen and not empty      
				if($_FILES["profile_pic"]["size"]!==0){
					//check if the file is an image file
					if ((@$_FILES["profile_pic"]["type"]=="image/jpeg") || (@$_FILES["profile_pic"]["type"]=="image/jpg") || (@$_FILES["profile_pic"]["type"]=="image/png")){   
										
						move_uploaded_file(@$_FILES["profile_pic"]["tmp_name"],"img/profile_pic/".$_FILES["profile_pic"]["name"]);
						$profile_pic_name=@$_FILES["profile_pic"]["name"];
						$profile_pic_query= mysqli_query($conn,"UPDATE users SET profile_pic='$profile_pic_name' WHERE username='$user'");
						echo "<a class='text-success'>Successfully Updated </a>";
						}else{
						echo"<a class='text-danger'>Invalid file! Your image must be in .jpg, .png or .gif format</a>";
						  }
					  
				
					}else{
					echo"<a class='text-danger'>Please select an image to upload</a>";
					  }
					}
			}	
			//check whether the users has uploaded their pic
			$check_pic= mysqli_query($conn,"SELECT profile_pic FROM users WHERE username='$user'");
			$get_pic_row= mysqli_fetch_assoc($check_pic);
			$profile_pic_db= $get_pic_row['profile_pic'];
 
			//making a default profile pic	
			if ($profile_pic_db==""){
				$profile_pic="img/user.png";
			}else{
				$profile_pic="img/profile_pic/".$profile_pic_db;
				}
             ?>
              <img src="<?php echo $profile_pic ?>">
              <div class="caption">
              <form method="post" enctype="multipart/form-data">
                <p><input type="file" name='profile_pic'></p>
                <p><input class="btn btn-success btn-block" type="submit" name="upload_profile_pic" value="Upload Photo"/></p>
                <p><button type="submit" class="btn btn-default btn-block" name="delete_profile_pic" role="button">Delete Photo</button></p>
              </form>
              </div>
            </div>            
          </div>

        </div>      
      </div>
    </section>
    

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

</script>
</body>
</html>