<?php 
  include("../inc/db.inc.php");
  include("../inc/session.inc.php");
  $search_msg_username_input = $_POST['search_msg_username_input'];
 
  $record_per_page = 5;
  if(isset($_POST["page"]))
  {
	  $page = $_POST['page'];
	  }
	  else
	  {
		  $page=1;
		  }
  $start_from = ($page - 1) * $record_per_page;
  
  $page_result = mysqli_query($conn,"(SELECT * FROM users WHERE removed='no' AND 
  (MATCH (username,fullname) AGAINST ('$search_msg_username_input'))
  ) ORDER BY time DESC");
	  
  $total_records = mysqli_num_rows($page_result);
  $total_pages = ceil($total_records/$record_per_page);
  if($total_pages>1){
	  echo"
	  <nav aria-label='Page navigation' class='main-msg-navigation load-older-msg'>
	   <ul class='pager'>
	  ";
	  if($page!=$total_pages){
		  echo"
		  <li class=''>
		   <a aria-label='Next' class='main_msg_pagination_link' id='".($page + 1)."'>
			<span aria-hidden='true'>Load older messages</span>
		   </a>
		  </li>
		  ";
		  }
	  echo"
	   </ul>
	  </nav>
	";	
	  }

  $query = mysqli_query($conn,"SELECT * FROM users WHERE removed='no' AND  
  MATCH (fullname,username) AGAINST ('$search_msg_username_input')
  LIMIT $start_from,$record_per_page");

  while($get_user = mysqli_fetch_array($query)){
	  $username = $get_user['username'];
	  $fullname = $get_user['fullname'];
	  $profile_pic= $get_user['profile_pic'];
	  		  
	echo"
	  <div class='media msg-connection'>
		<div class='media-left'>
		  <div class='conv-image-box'>
			<img class='media-object' ";
			if($profile_pic==''){
			  echo" src='img/user.png' ";
			}else{
			  echo" src='img/profile_pic/$profile_pic' ";
				}
			echo" alt=''>
		  </div><!--conv-image-box-->
		</div><!--end media-left-->
		
		<div class='media-body' data-uname='$username'>
		  <h4>$fullname</h4>
		</div><!--/end media-body-->  
	  </div><!-- /media msg-connection -->
	";
  }
  /////////////////////////////////////////	
  $page_result = mysqli_query($conn,"(SELECT * FROM users WHERE removed='no' AND 
  (MATCH (username,fullname) AGAINST ('$search_msg_username_input'))
  ) ORDER BY time DESC");
  
  $total_records = mysqli_num_rows($page_result);
  $total_pages = ceil($total_records/$record_per_page);
  
	if($total_pages>1){
		echo"
		<nav aria-label='Page navigation' class='msg-conversations-navigation'>
		 <ul class='pager'>
		";					
		if($page!=$total_pages){
			echo"
			<li class=''>
			 <a aria-label='Next' class='msg_conversations_pagination_link' id='".($page + 1)."'>
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