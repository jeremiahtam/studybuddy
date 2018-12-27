<?php
include("./php_load/category-array.php");

//Get the basename of the current page
$title=basename($_SERVER['SCRIPT_FILENAME'],'.php');

//Get details of the user 
  if(isset($user)){
	$user_sql=mysqli_query($conn,"SELECT * FROM users WHERE username='$user' AND removed='no'");
	$user_row = mysqli_fetch_assoc($user_sql);
	$user_fullname = $user_row['fullname'];
	$small_profile_pic = $user_row['profile_pic'];
	}   
?>
<nav class="topmost-nav navbar navbar-fixed-top <?php if($title!=='index'){echo "dark-bg";}else{echo 'bg-transparent';} ?>
">
  <div class="container">
      <ul class="nav navbar-nav">
      <a class="navbar-brand hidden-xs" href="home">Study Buddy</a>
            <?php
            if(!isset($user)){
			echo"
			  <a class='navbar-brand visible-xs' href='home'>Study Buddy</a>
              <a class='btn pull-right login' href='http://localhost/studybuddy/login'>Login</a>
              <a class='btn pull-right signup' href='http://localhost/studybuddy/signup'>SignUp</a>
           ";

			}else{				
            echo"
			<li class='dropdown pull-right hidden-xs'>
			  <img class='small-profile-pic dropdown-toggle small-profile-pic' title='Profile' rel='tooltip' data-placement='bottom' src=' ";
			   if ($small_profile_pic==''){
					echo "img/user.png";
					}else{
					echo "img/profile_pic/$small_profile_pic";
					}
			  echo" '
			  alt='$user_fullname' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' width='35px' height='35px'>
              <ul class='dropdown-menu'>
                <li><a class='' href='profile/$user'>Hi, $user_fullname</a></li>
				<li class='divider'></li>
                <li><a class='' href='profile/$user'><span class='ion-ios-person-outline'></span> Profile</a></li>
                <li><a class='' href='settings/personal'><span class='ion-ios-settings-strong'></span> Update Settings</a></li>
				<li class='divider'></li>
                <li><a class='dropdown-item' href='logout.php'><span class='ion-android-exit'></span> Logout</a></li>
              </ul>
            </li>

			<a href='profile/$user' class='pull-right topmost-nav-items visible-xs ";
			  if($title=='profile'){echo "active";}
			  echo" ' title='Profile' rel='tooltip' data-placement='bottom'>
			  <span class=' ";
			   if($title=='profile'){echo "ion-ios-contact";}else{echo "ion-ios-contact-outline ";}  
			  echo" topmost-nav-icon' alt=''></span>
			  <span class='topmost-nav-text'>Profile</span>
			</a>

			<a href='http://localhost/studybuddy/create-ad' class='pull-right topmost-nav-items ";
			  if($title=='create-ad'){echo "active";}
			  echo" ' title='Create Ad' rel='tooltip' data-placement='bottom'>
			  <span class=' ";
			   if($title=='create-ad'){echo "ion-ios-compose";}else{echo "ion-ios-compose-outline";}  
			   echo" topmost-nav-icon' alt=''></span>
			  <span class='topmost-nav-text'>Create Ad</span>
			</a>

			<div class='separator'></div>

			<a href='' class='pull-right topmost-nav-items ";
			  if($title=='notifications'){echo "active";}
			  echo" ' title='Notifications' rel='tooltip' data-placement='bottom'>
			  <span class=' "; 
			   if($title=='notifications'){echo "ion-ios-bell";}else{echo "ion-ios-bell-outline";}  
			  echo" topmost-nav-icon' alt=''></span>
			  <span class='topmost-nav-text'>Notifications</span>
			</a>

			<div class='separator'></div>

			<a href='http://localhost/studybuddy/messages' class='pull-right topmost-nav-items ";
			 if($title=='messages'){echo "active";}
			  echo" ' title='Messages' rel='tooltip' data-placement='bottom'>
			  <span class=' ";
			  if($title=='messages'){echo "ion-ios-chatboxes";}else{echo "ion-ios-chatboxes-outline";}
			  echo" topmost-nav-icon' alt=''></span>
			  <span class='topmost-nav-text'>Messages</span>
			</a>

			<a href='http://localhost/studybuddy/home' class='pull-right topmost-nav-items visible-xs ";
			 if($title=='index'){echo "active";}
			 echo" ' title='Home' rel='tooltip' data-placement='bottom'>
			  <span class=' ";
			  if($title=='index'){echo "ion-ios-home";}else{echo "ion-ios-home-outline ";}
			  echo" topmost-nav-icon' alt=''></span>
			  <span class='topmost-nav-text'>Home</span>
			</a>
			
            ";
			}
            ?>        
      </ul>

  </div><!-- /.container-fluid -->
</nav>    


<nav class="main-navbar navbar navbar-default hidden">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false">
      <ul class="nav navbar-nav">
        <!--<li class=""><a href="#"><span class='ion-ios-home'></span> Home </a></li>-->
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo str_replace('_',' ',$category_array[0])?></a>
          <ul class="dropdown-menu">
			<?php
            $i = 0;
            while($i < count($certificate_array)){
               echo"
			   <li class='dropdown-submenu'>
			   <a href='http://localhost/studybuddy/view-ads-by-category/$category_array[0]/".$certificate_array[$i][0]."'>".str_replace('_',' ',$certificate_array[$i][0])."</a>
                <ul class='dropdown-menu'>";
				$j = 1;
				while($j < count($certificate_array[$i])){
					echo"<li><a href='http://localhost/studybuddy/view-ads-by-category/$category_array[0]/".$certificate_array[$i][0]."/".$certificate_array[$i][$j]."'>".str_replace('_',' ',$certificate_array[$i][$j])."</a></li>";
					$j++;
					}
				echo"
				</ul>
			   </li>"; 
               $i++;
              }
            ?>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo str_replace('_',' ',$category_array[1])?></a>
          <ul class="dropdown-menu">
			<?php
            $i = 0;
            while($i < count($degree_array)){
               echo"
			   <li class='dropdown-submenu'>
			   <a href='http://localhost/studybuddy/view-ads-by-category/$category_array[1]/".$degree_array[$i][0]."'>".str_replace('_',' ',$degree_array[$i][0])."</a>
                <ul class='dropdown-menu'>";
				$j = 1;
				while($j < count($degree_array[$i])){
					echo"<li><a href='http://localhost/studybuddy/view-ads-by-category/$category_array[1]/".$degree_array[$i][0]."/".$degree_array[$i][$j]."'>".str_replace('_',' ',$degree_array[$i][$j])."</a></li>";
					$j++;
					}
				echo"
				</ul>
			   </li>";
               $i++;
              }
            ?>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo str_replace('_',' ',$category_array[2])?></a>
          <ul class="dropdown-menu">
			<?php
            $i = 0;
            while($i < count($vocational_array)){
               echo"
			   <li class='dropdown-submenu'>
			   <a href='http://localhost/studybuddy/view-ads-by-category/$category_array[2]/".$vocational_array[$i][0]."'>".str_replace('_',' ',$vocational_array[$i][0])."</a>
                <ul class='dropdown-menu'>";
				$j = 1;
				while($j < count($vocational_array[$i])){
					echo"<li><a href='http://localhost/studybuddy/view-ads-by-category/$category_array[2]/".$vocational_array[$i][0]."/".$vocational_array[$i][$j]."'>".str_replace('_',' ',$vocational_array[$i][$j])."</a></li>";
					$j++;
					}
				echo"
				</ul>
			   </li>";
               $i++;
              }
            ?>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo str_replace('_',' ',$category_array[3])?></a>
          <ul class="dropdown-menu">
			<?php
            $i = 0;
            while($i < count($GAT_array)){
               echo"
			   <li class='dropdown-submenu'>
			   <a href='http://localhost/studybuddy/view-ads-by-category/$category_array[3]/".$GAT_array[$i][0]."'>".str_replace('_',' ',$GAT_array[$i][0])."</a>
                <ul class='dropdown-menu'>";
				$j = 1;
				while($j < count($GAT_array[$i])){
					echo"<li><a href='http://localhost/studybuddy/view-ads-by-category/$category_array[3]/".$GAT_array[$i][0]."/".$GAT_array[$i][$j]."'>".str_replace('_',' ',$GAT_array[$i][$j])."</a></li>";
					$j++;
					}
				echo"
				</ul>
			   </li>";
               $i++;
              }
            ?>
          </ul>
        </li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>