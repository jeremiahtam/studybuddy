<?php 
  include("../inc/db.inc.php");
  include("../inc/session.inc.php");
  
  #get rows where you are connected to someone  
	 $record_per_page = 1;
	 //$page = '';
	 //$output = '';
	 if(isset($_POST["page"]))
	 {
		 $page = $_POST['page'];
		 }
		 else
		 {
			 $page=1;
			 }
	  $start_from = ($page - 1) * $record_per_page;
	 // echo $page;
	  
	  $query = "SELECT * FROM connection_requests WHERE 
	  (user_from='$user' OR user_to='$user') AND status='connected'
	  ORDER BY id DESC LIMIT $start_from,$record_per_page";
	  
	  $result = mysqli_query($conn,$query);

  while($get_connections = mysqli_fetch_array($result)){
	  $id = $get_connections['id'];
	  $user_from = $get_connections['user_from'];
	  $user_to = $get_connections['user_to'];
	  $status = $get_connections['status'];
	  
	  if($user==$user_from){
		  $connection_name = $user_to;
		  }else if($user==$user_to){
		  $connection_name = $user_from;
		  }
		  
	  $connection_query = mysqli_query($conn,"SELECT * FROM users WHERE username='$connection_name'");
	  $connection_details = mysqli_fetch_assoc($connection_query);
	  
	  $connection_fullname = $connection_details['fullname'];
	  $connection_profile_pic = $connection_details['profile_pic'];
	  
	 echo" 
 	 <a class='msg-link' href='$connection_name'>
	   <div class='media msg-connection'>
		 <div class='media-left'>
		   <img class='media-object' src=' ";

			if($connection_profile_pic==""){
			echo"img/user.png";
			}else{
				echo"img/profile_pic/$connection_profile_pic";
				}

		   echo" ' alt='Picture of $connection_fullname'>
		 </div><!--end media-left-->
	 	 <div class='media-body'>
		   <h4 class=''>$connection_fullname</h4>
		 </div><!--/end media-body-->
	   </div><!-- /media msg-connection -->
	 </a><!-- /media msg-link --> 
	 ";
  }
	 /////////////////////////////////////////	
	  $page_query = "SELECT * FROM connection_requests WHERE 
	  (user_from='$user' OR user_to='$user') AND status='connected'
	  ORDER BY id DESC";
	  $page_result = mysqli_query($conn,$page_query);
	  $total_records = mysqli_num_rows($page_result);
	  $total_pages = ceil($total_records/$record_per_page);
	  
	if($total_pages>1){
		echo"
		<nav aria-label='Page navigation' class='msg-connection-navigation'>
		 <ul class='pager'>
		";
		
		/*if($page>1){
			echo"
			<li class=''>
			 <a aria-label='Previous' class='msg_connections_pagination_link' id='".($page - 1)."'>
			  <span aria-hidden='true'>&larr; Previous</span>
			 </a>
			</li>
			";
			}*/
			
		
		if($page!=$total_pages){
			echo"
			<li class=''>
			 <a aria-label='Next' class='msg_connections_pagination_link' id='".($page + 1)."'>
			  <span aria-hidden='true'>Load more</span>
			 </a>
			</li>
			";
			}
		echo"
		 </ul>
		</nav>
	  ";	
		}
  
	
?>