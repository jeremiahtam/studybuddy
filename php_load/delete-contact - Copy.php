<?php 
include("../inc/db.inc.php");
$conf_contact_id = $_POST['conf_contact_id'];

$query= mysql_query("DELETE FROM contacts WHERE id='$conf_contact_id'");
?>