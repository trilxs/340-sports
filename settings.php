<?php
  session_start();
  $userID = $_SESSION['userID'];
  include 'connectvarsEECS.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      if(!$conn){
        die('Could not connect: ' . mysql_error());
      }
      $oldmail = mysqli_escape_string($conn, $_POST["oldemail"]);
      $newemail1 = mysqli_escape_string($conn, $_POST["newemail"]);
      $newemail2 = mysqli_escape_string($conn, $_POST["newemail2"]);
      if(!empty($oldmail)){
        if($newemail1 != $newemail2){
          $error = "Error, emails do not match";
          echo "<script type='text/javascript'>alert('$error');</script>";
        }
        else{
          $checkMail = "SELECT email FROM accounts WHERE userID = $userID";
          $result = mysqli_query($conn, $checkMail);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $checkMail = $row['email'];
          if($oldmail != $checkMail){
            $message = "Error, email was incorrect. Try again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
          // else if(!filter_var($newemail1, FILTER_VALIDATE_EMAIL)===false){
          //   $message = "Error, incorrect email format.";
          //   echo "<script type='text/javascript'>alert('$message');</script>";
          // }
          else{
            $sql = "UPDATE accounts SET email = '$newemail1' WHERE userID = $userID AND email = '$oldmail'";
            mysqli_query($conn, $sql);
            $compEmail = "SELECT email FROM accounts WHERE userID = $userID";
            $result = mysqli_query($conn, $compEmail);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $compEmail = $row['email'];
            if($oldmail != $compEmail){
              $message = "Successfully updated the email!";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else{
              $message = "There was an unexpected error. Try again.";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
          }
        }
      }
      $oldpass = mysqli_escape_string($conn, $_POST["oldpassword"]);
      $pass = mysqli_escape_string($conn, $_POST["newpassword"]);
      $pass2 = mysqli_escape_string($conn, $_POST["newpassword2"]);
      if(!empty($oldpass)){
        if($pass != $pass2){
          $error = "Error, password's do not match";
          echo "<script type='text/javascript'>alert('$error');</script>";
        }
        else{
          $checkPass = "SELECT password FROM accounts WHERE userID = $userID";
          $result = mysqli_query($conn, $checkPass);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $checkPass = $row['password'];
          if(substr(MD5($oldpass), 0, 16) != $checkPass){
            $message = "Error, password was incorrect. Try again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
          if(strlen($pass)>16){
            $message = "Error, password cannot be longer than 16 characters. Try again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
          else{
            $sql = "UPDATE accounts SET password = MD5('$pass') WHERE userID = $userID AND password = '$checkPass'";
            mysqli_query($conn, $sql);
            $compPass = mysqli_query($conn, "SELECT password FROM accounts WHERE userID = $userID");
            $row = mysqli_fetch_array($compPass, MYSQLI_ASSOC);
            $compPass = $row['password'];
            if($origPass != $compPass){
              $message = "Successfully updated the password!";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else{
              $message = "There was an unexpected error. Try again.";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
          }
        }
      }
    }
?>

<!doctype html>

<head>
  <title>Settings</title>
  <link rel="stylesheet" href="./css/settings.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<?php include("header.php"); ?>

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
              <label>Old e-mail: </label><input type="text" name="oldemail"><br>
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
              <label>Old password: </label><input type="password" name="oldpassword"><br>
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
