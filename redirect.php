<?php
  if(isset($_SESSION['Name'])){
    header("location: index.php");
    exit();
  }
?>