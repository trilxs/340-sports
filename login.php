<?php
  include("config.php");
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $myUsername = mysqli_real_escape_string($db, $_POST['username']);

  }


  ?>
