<?php
include("./inc/db.inc.php");

session_start();
if(!isset($_SESSION["user_login"])){
	}
	else
	{
	$user = $_SESSION["user_login"];
		}
//session_destroy();
unset($_SESSION['user_login']);

header("Location: http://localhost/studybuddy/home");
?>