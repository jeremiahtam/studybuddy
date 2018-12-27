<?php 
session_start(); 
if(!isset($_SESSION["login_user"])){
  }
  else
  {
  $user = $_SESSION["login_user"];
  }
?>