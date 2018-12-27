<?php
include("../inc/session.inc.php");
include("../inc/db.inc.php");
$interest_id = $_POST['interest_id'];
$date= date('Y-m-d');
$time= date('H:i:s');
//check if this user has already shown interest
$check_sql = mysql_query("SELECT * FROM interested_list WHERE ad_id='$interest_id' and interested_user='$user'");
$check_rows = mysql_num_rows($check_sql);
if($check_rows==0)
{ 
  $sql = mysql_query("INSERT INTO interested_list VALUES ('','$user','$interest_id','$date','$time')");
  
  //count how many people are interested in this ad post
  $count_sql = mysql_query("SELECT * FROM interested_list WHERE ad_id='$interest_id'");
  $count_sql_rows = mysql_num_rows($count_sql);
  //only display the number of interests if its greater than zero
  if ($count_sql_rows>0){
	  echo "<span class='ion-coffee'></span> <span class='number-count'>$count_sql_rows</span>";
  }
}
?>