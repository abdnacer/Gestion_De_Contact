<?php
  require_once '../function.php';

  $delete = new User();
  $delete->conn = User::connect();

  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    Contact::delete(Contact::connect(), $id);
    header('location: ../contact.php'); 
    exit();
  }
?>