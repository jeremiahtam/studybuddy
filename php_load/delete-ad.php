<?php 
include("../inc/session.inc.php");
include("../inc/db.inc.php");
$delete_id = $_POST['delete_id'];

$query= mysqli_query($conn,"UPDATE ads SET removed='yes' WHERE id='$delete_id' AND username='$user'");
?>