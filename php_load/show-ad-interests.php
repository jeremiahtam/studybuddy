<?php 
include("../inc/db.inc.php");
include("../inc/session.inc.php");
$get_ad_id = $_POST['ad_id'];
$window_width = $_POST['window_width'];

$date=date('Y-m-d');
$time=date('H:i:s');

   $record_per_page = 30;
   if(isset($_POST["page"])){
	   $page = $_POST['page'];	   
	   }else{
	     $page = 1;			
	  }
	$start_from = ($page-1) * $record_per_page;

	$limit = "$start_from,$record_per_page";

	/////////////////////////////////////////	
	$page_query = "SELECT * FROM interested_list WHERE ad_id='$get_ad_id' ORDER BY id DESC";
	$page_query_result = mysqli_query($conn,$page_query);
	
	$page_query_result_rows = mysqli_num_rows($page_query_result);
	
	$page_result = mysqli_query($conn,$page_query);
	$total_records = mysqli_num_rows($page_result);
	$total_pages = ceil($total_records/$record_per_page);

	if($window_width<992){
	  if($total_pages>1){
		  if($page>1){
			echo"
			<nav aria-label='Page navigation' class='main-interest-navigation load-older-interest'>
			 <ul class='pager'>
				<li class=''>
				 <a aria-label='Next' class='main_interest_pagination_link' id='".($page - 1)."' ad-id='$get_ad_id'>
				  <span aria-hidden='true'>Previous</span>
				 </a>
				</li>
			 </ul>
			</nav>
			";
	  	}
	  }
	}

	//////////////////Query to show the content of the messages between two users
	$query = "SELECT * FROM interested_list WHERE ad_id='$get_ad_id' ORDER BY id DESC LIMIT ".$limit;
	
	$result = mysqli_query($conn,$query);
	
	$num_rows = mysqli_num_rows($result);

while($get_interest = mysqli_fetch_array($result)){
	$ad_id = $get_interest['ad_id'];
	$interested_user = $get_interest['interested_user'];
	
	$db_date = $get_interest ['date'];
	$db_date = date('M j, Y',strtotime($db_date));
	$db_time = $get_interest ['time'];
	$db_time = date('g:i a',strtotime($db_time));	

	$get_interested_user = mysqli_query($conn,"SELECT * FROM users WHERE username='$interested_user'");
	$get_interested_user_details = mysqli_fetch_assoc($get_interested_user);
	
	$interested_fullname = $get_interested_user_details['fullname'];
	$interested_profile_pic = $get_interested_user_details['profile_pic'];
			 	 
   echo"
	   <div class='row'>
		 <div class='interest-row col-xs-12'>
		   <a href='profile/$interested_user/about'>
			 <div class='interest-image-box'><img class='' src=' ";
			 if($interested_profile_pic==''){
				   echo"img/profile_pic/user.png";
				 }else{
				   echo"img/profile_pic/$interested_profile_pic";
				 }
			 echo"
			  '></div>
			 <div class='interest-name'>$interested_fullname</div>
		   </a>
		 </div>
	   </div>
	   ";
	}//	  

	/////////////////////////////////////////	
	$page_query = "SELECT * FROM interested_list WHERE ad_id='$get_ad_id' ORDER BY id DESC ";
	
	$page_result = mysqli_query($conn,$page_query);
	$total_records = mysqli_num_rows($page_result);
	$total_pages = ceil($total_records/$record_per_page);

	if($total_pages > 1){
	  if($page !=$total_pages){
		  echo"
		  <nav aria-label='Page navigation' class='main-interest-navigation load-newer-interest'>
		   <ul class='pager'>
			<li class=''>
			 <a aria-label='Next' class='main_interest_pagination_link' id='".($page + 1)."' ad-id='$get_ad_id'>
			  <span aria-hidden='true'>Next</span>
			 </a>
			</li>
		   </ul>
		  </nav>
		 </ul>
		</nav>
	  ";
	  }
  }
?>