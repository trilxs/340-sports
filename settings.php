<?php

  session_start();
  $userID = $_SESSION['userID'];

  include 'connectvarsEECS.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      if(!$conn){
        die('Could not connect: ' . mysql_error());
      }

      $newemail1 = mysqli_escape_string($conn, $_POST["newemail"]);
      $newemail2 = mysqli_escape_string($conn, $_POST["newemail2"]);
      if($newemail1 != $newemail2){
        echo "Error, email's do not match";
      }
      else{
        $sql = "UPDATE accounts SET email = '$newemail1' WHERE userID = $userID";
        if(mysqli_query($conn, $sql)){
          echo "Success ";
        }
      }

      $pass = mysqli_escape_string($conn, $_POST["newpassword"]);
      $pass2 = mysqli_escape_string($conn, $_POST["newpassword2"]);
      if($pass != $pass2){
        echo "Error, passwords's do not match";
      }
      else{
        $sql = "UPDATE accounts SET password = MD5('$pass') WHERE userID = $userID";
        if(mysqli_query($conn, $sql)){
          echo "Success ";
        }
      }
    }
?>

<!doctype html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="./css/settings.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<?php include("header.html"); ?>

<div class="content-container">
<div class="bg-image-container">
    <h1 class="page-title">ACCOUNT</h1>
</div>
<nav class="game-tabs">
    <ul>
    </ul>
</nav>

<div class="body-container">
    <div class="game-container" style="display: inline-block;">
        <div class="change-user">
           <h1 class="change-text">Change e-mail</h1>
    <div class = "inner-body">
      <body>
        <form method="post"><br>
            <div class="submit-info-container">
              <label>New e-mail: </label><input type="text" name="newemail"><br>
              <label>Confirm new e-mail: </label><input type="text" name="newemail2"><br>
            </div>
          <div class = "submit-button-container">
            <input name = "email-button" class ="submit-button" type="submit">
          </div>

        </form>
      </body>
    </div>
    </div>
                <div class="change-password">
           <h1 class="change-text">Change password</h1>
    <div class = "inner-body">
      <body>
        <form method="post"><br>
            <div class="submit-info-container">
              <label>New password: </label><input type="password" name="newpassword"><br>
              <label>Confirm new password: </label><input type="password" name="newpassword2"><br>
            </div>
          <div class = "submit-button-container">
            <input name = "password-button" class ="submit-button" type="submit">
          </div>

        </form>
      </body>
    </div>
    </div>
    </div>

</div>
    </div>

<?php include("footer.html"); ?>

</html>
