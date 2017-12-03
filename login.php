<!--
Login not working correctly.

Use this for login help:
https://stackoverflow.com/questions/29959689/php-login-using-mysql-data-and-hashed-password
 -->

<?php
  // Starts the session to connect to our database
  session_start();
  include 'connectvarsEECS.php';

  // If the user doesn't input into either text box, give an error message to them saying that they need to input at least something
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST["username"]) || empty($_POST["password"])){
      $errorMessage = "Please do not leave any field blank.";
      echo $errorMessage;
    }
    // If the user inputs something into both text boxes, log into the database to access our users table
    else{
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      if(!$conn){
        die('Could not connect: ' . mysql_error());
      }

      // Puts the entered username and password into variables for us to use to search
      $username = mysqli_escape_string($conn, $_POST["username"]);
      $password = mysqli_escape_string($conn, $_POST["password"]);
      $md5Pass = substr(MD5($password), 0, 16);

      $sql = "SELECT userID FROM accounts WHERE username = '$username' and password = '$md5Pass'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      if($count==1){
        echo "Login successful";
      }
      else{
        echo "Error, invalid login";
      }
      echo "Password is $md5Pass";
    }

  }

  mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>

  <h1>Login</h1>

  <body>
    <form action="login.php" method="post"><br>
      Username: <input type="text" name="username"><br>
      Password: <input type="text" name="password"><br>
      <input type="submit">

  </body>
</html>
