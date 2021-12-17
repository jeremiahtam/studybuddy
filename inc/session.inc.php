<?php 
session_start(); 
if(!isset($_SESSION["login_user"])){
  }
  else
  {
  $user = $_SESSION["login_user"];
  }
  //base url
  function base_url(){
    if(isset($_SERVER['HTTPS'])){
      $protocal = ($_SERVER['HTTPS'] && $_SERVER['HTTPS']!='off') ? "https":"http";
    }else{
      $protocal = 'http';
    }
    if($_SERVER['SERVER_NAME']=='localhost'){
      return $protocal."://".$_SERVER['SERVER_NAME'].'/studybuddy/';
    }else{
      return $protocal."://".$_SERVER['SERVER_NAME']."/";
    }
  }  

?>