<?php 
include("../inc/session.inc.php");
include("../inc/db.inc.php");

$ad_id = htmlentities($_POST['ad_id']);		
$comment = htmlentities($_POST['comment']);		
$date = date('Y-m-d');
$time = date('H:i:s');

?>