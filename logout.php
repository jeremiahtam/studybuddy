<?php
include("./inc/session.inc.php");
include("./inc/db.inc.php");

//session_destroy();
unset($_SESSION['login_user']);

header("Location: home");
?>