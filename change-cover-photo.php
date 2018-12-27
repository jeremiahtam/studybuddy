<?php
session_start(); 

if(!isset($_SESSION["login_user"])){

	   }
	else
	   {
	$user = $_SESSION["login_user"];
	   }
if(!isset($_SESSION["login_user"])){
	header("Location: http://localhost/studybuddy/home");
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

<title>Upload Cover Photo | StuddyBuddy</title>
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
            <li role="presentation" class=""><a href="http://localhost/studybuddy/change-profile-photo">Profile Photo</a></li>
            <li role="presentation" class="active"><a href="http://localhost/studybuddy/change-cover-photo">Cover Photo</a></li>
          </ul>
        <div class="row">
          <div class="col-sm-8">
          <h2>Upload Cover Photo</h2>
          <ul>
            <li>Selected image must be in .jpg, .jpeg or .png format.</li>
            <li>It is advisable that the image selected should be in landscape view (rectangular shape).Preferrably 733px * 400px</li>
            <li>The image should be at least medium quality.</li>
          </ul>
          </div>
          
          <div class="col-sm-4">
            
            <div class="thumbnail">
			<?php
			//deleting the profile picture in database
			if(isset($_POST['delete_cover_photo'])){
				$cover_photo_query= mysqli_query($conn,"UPDATE users SET cover_photo='' WHERE username='$user'");
				}
				
			//upload profile picture
			if(isset($_POST['upload_cover_photo'])){
				if (isset($_FILES['cover_photo'])){
			
				//to check that a file has been chosen and not empty      
				if($_FILES["cover_photo"]["size"]!==0){
					//check if the file is an image file
					if ((@$_FILES["cover_photo"]["type"]=="image/jpeg") || (@$_FILES["cover_photo"]["type"]=="image/jpg") || (@$_FILES["cover_photo"]["type"]=="image/png")){   
										
						move_uploaded_file(@$_FILES["cover_photo"]["tmp_name"],"img/cover_photo/".$_FILES["cover_photo"]["name"]);
						$cover_photo_name=@$_FILES["cover_photo"]["name"];
						$cover_photo_query= mysqli_query($conn,"UPDATE users SET cover_photo='$cover_photo_name' WHERE username='$user'");
						echo "<a class='text-success'> Successfully Updated </a>";
						}else{
						echo"<a class='text-danger'>Invalid file! Your image must be in .jpg, .png or .gif format</a>";
						  }
					}else{
					echo"<a class='text-danger'>Please select an image to upload</a>";
					  }
					}
			}	
			//check whether the users has uploaded their pic
			$check_pic= mysqli_query($conn,"SELECT cover_photo FROM users WHERE username='$user'");
			$get_pic_row= mysqli_fetch_assoc($check_pic);
			$cover_photo_db= $get_pic_row['cover_photo'];
 
			//making a default profile pic	
			if ($cover_photo_db==""){
				$cover_photo="img/cover-photo.jpg";
			}else{
				$cover_photo="img/cover_photo/".$cover_photo_db;
				}
             ?>
              <img src="<?php echo $cover_photo ?>">
              <div class="caption">
              <form method="post" enctype="multipart/form-data">
                <p><input type="file" name='cover_photo'></p>
                <p><input class="btn btn-success btn-block" type="submit" name="upload_cover_photo" value="Upload Photo"/></p>
                <p><button type="submit" class="btn btn-default btn-block" name="delete_cover_photo" role="button">Delete Photo</button></p>
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