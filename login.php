<?php
include 'connectvarsEECS.php'
function login(){
  session_start();
  $error = '';
  if (isset($_POST['submit'])) {
      if (empty($_POST['username']) || empty($_POST['password'])) {
          $error = "Username or Password is invalid";
          echo $error;
      }
      else {
          //set user inputs to variables
          $username = $_POST['username'];
          $password = $_POST['password'];

          //establish a connection with server
          $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

          if (!$connection) {
              die("Could not connect to the database: " .mysql_error());
          }

          //mysql injection
          $username = stripslashes($username);
          $password = stripslashes($password);
          $username = mysqli_real_escape_string($username);
          $password = mysqli_real_escape_string($password);

          //sql query and find the matching information
          $query = mysqli_query($connection, "SELECT * FROM Users WHERE password='$password' AND username='$username'");
          $rows = mysqli_num_rows($query);
          if ($rows == 1) {
              $_SESSION['login_user'] = $username;
              header("location:success.php");
          } else {
              $error = "Username or Password is invalid";
              echo $error;
          }
          mysqli_close($connection);
      }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>

<body>
  <p>testtest</p>
</body>
</html>
