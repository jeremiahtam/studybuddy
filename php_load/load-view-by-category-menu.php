<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
include("../php_load/category-array.php");

if(isset($_POST['category'])){
  $category = $_POST['category'];

  switch($category){
	  case 'Certificate_Program':
	  $x = 0;
	  while ($x < count($certificate_array)){
	  echo"
		<div class='panel inner-panel'>
		  <div class='panel-heading inner-panel-heading' role='tab' id='heading".$x."'>
			<h4 class='panel-title study-area'>
			  <a class='".$certificate_array[$x][0]."'>".str_replace('_', ' ', $certificate_array[$x][0])."</a>
			  <span class='ion-chevron-right' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse".$x."' aria-expanded='true' aria-controls='collapse".$x."'></span>
			</h4><!--end panel-title-->
		  </div><!--end panel-heading-->
		  <div id='collapse".$x."' class='panel-collapse collapse ".$certificate_array[$x][0]."' role='tabpanel' aria-labelledby='heading".$x."'>
			<div class='inner-panel-body'>
			  <ul>";
			  $y = 1;
			  while($y < count($certificate_array[$x])){
				  echo"<li class='sub-menu'><a data-study-area='".$certificate_array[$x][0]."' class='".$certificate_array[$x][$y]."'>".str_replace('_',' ',$certificate_array[$x][$y])."</a></li>";
				  $y = $y + 1;
				  }
  
			  echo"
			  </ul>
			</div><!--end panel-body-->
		  </div><!--end panel-collapse-->    
		</div><!--end inner-panel-->
		";
		$x = $x + 1;
	  };
	  
	  break;
  
  
	  case 'Degree_Program':
	  $x = 0;
	  while ($x < count($degree_array)){
	  echo"
		<div class='panel inner-panel'>
		  <div class='panel-heading inner-panel-heading' role='tab' id='heading".$x."'>
			<h4 class='panel-title study-area'>
			  <a class='".$degree_array[$x][0]."'>".str_replace('_', ' ', str_replace('_', ' ', $degree_array[$x][0]))."</a>
			  <span class='ion-chevron-right' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse".$x."' aria-expanded='true' aria-controls='collapse".$x."'></span>
			</h4><!--end panel-title-->
		  </div><!--end panel-heading-->
		  <div id='collapse".$x."' class='panel-collapse collapse ".$degree_array[$x][0]."' role='tabpanel' aria-labelledby='heading".$x."'>
			<div class='inner-panel-body'>
			  <ul>";
			  $y = 1;
			  while($y < count($degree_array[$x])){
				  echo"<li class='sub-menu'><a data-study-area='".$degree_array[$x][0]."' class='".$degree_array[$x][$y]."'>".str_replace('_', ' ', $degree_array[$x][$y])."</a></li>";
				  $y = $y + 1;
				  }
  
			  echo"
			  </ul>
			</div><!--end panel-body-->
		  </div><!--end panel-collapse-->    
		</div><!--end inner-panel-->
		";
		$x = $x + 1;
	  };
	  break;
  
  
	  case 'Vocational_Program':
	  $x = 0;
	  while ($x < count($vocational_array)){
	  echo"
		<div class='panel inner-panel'>
		  <div class='panel-heading inner-panel-heading' role='tab' id='heading".$x."'>
			<h4 class='panel-title study-area'>
			  <a class='".$vocational_array[$x][0]."'>".str_replace('_', ' ', $vocational_array[$x][0])."</a>
			  <span class='ion-chevron-right' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse".$x."' aria-expanded='true' aria-controls='collapse".$x."'></span>
			</h4><!--end panel-title-->
		  </div><!--end panel-heading-->
		  <div id='collapse".$x."' class='panel-collapse collapse ".$vocational_array[$x][0]."' role='tabpanel' aria-labelledby='heading".$x."'>
			<div class='inner-panel-body'>
			  <ul>";
			  $y = 1;
			  while($y < count($vocational_array[$x])){
				  echo"<li class='sub-menu'><a data-study-area='".$vocational_array[$x][0]."' class='".$vocational_array[$x][$y]."'>".str_replace('_',' ',$vocational_array[$x][$y])."</a></li>";
				  $y = $y + 1;
				  }
  
			  echo"
			  </ul>
			</div><!--end panel-body-->
		  </div><!--end panel-collapse-->    
		</div><!--end inner-panel-->
		";
		$x = $x + 1;
	  };
	  break;
  
	  case 'Graduate_Admission_Tests':
	  $x = 0;
	  while ($x < count($GAT_array)){
	  echo"
		<div class='panel inner-panel'>
		  <div class='panel-heading inner-panel-heading' role='tab' id='heading".$x."'>
			<h4 class='panel-title study-area'>
			  <a class='".$GAT_array[$x][0]."'>".str_replace('_', ' ', $GAT_array[$x][0])."</a>
			  <span class='ion-chevron-right' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse".$x."' aria-expanded='true' aria-controls='collapse".$x."'></span>
			</h4><!--end panel-title-->
		  </div><!--end panel-heading-->
		  <div id='collapse".$x."' class='panel-collapse collapse ".$certificate_array[$x][0]."' role='tabpanel' aria-labelledby='heading".$x."'>
			<div class='inner-panel-body'>
			  <ul>";
			  $y = 1;
			  while($y < count($GAT_array[$x])){
				  echo"<li class='sub-menu'><a data-study-area='".$GAT_array[$x][0]."' class='".$GAT_array[$x][$y]."'>".str_replace('_',' ',$GAT_array[$x][$y])."</a></li>";
				  $y = $y + 1;
				  }
  
			  echo"
			  </ul>
			</div><!--end panel-body-->
		  </div><!--end panel-collapse-->    
		</div><!--end inner-panel-->
		";
		$x = $x + 1;
	  };
	  break;
  }//end switch
}//end if statement
?>