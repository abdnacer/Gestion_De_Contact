<?php
  require_once 'function.php';
  $info = new Contact();
  $info->conn = Contact::connect();
  if(!(isset($_SESSION['Name']))){
  header("location: index.php");
  exit();
  }
?>