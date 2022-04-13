<?php
  require_once 'function.php';

  session_unset();
  session_destroy();
  header("location: index.php");
?>