<?php 
include("../inc/db.inc.php");
$conf_contact_id = $_POST['conf_contact_id'];

$query= mysqli_query($conn,"DELETE FROM contacts WHERE id='$conf_contact_id'");
?>