<?php
  /* Starts the session to connect to our database*/
  session_start();

  /* Includes file to connect to the database*/
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
      $sql = "SELECT userID FROM accounts WHERE username = '$username' AND password = '$md5Pass' LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      if($count==1){
        $userID = $row['userID'];
        $_SESSION['userID'] = $userID;
        echo "<script type = 'text/javascript'> document.location = 'index.php'; </script>";
      }
      else{
        echo "<script> alert('Invalid login information!');</script>";
      }
    }
  }
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel = "stylesheet" href = "./css/login.css">
</head>

  <div class = "white-box">
    <h1>Login</h1>
    <div class = "inner-body">
      <body>
        <form action="login.php" method="post"><br>
          <div class = "submit-login-info">
            <label>Username: </label><input type="text" name="username"><br>
            <label>Password: </label><input type="password" name="password"><br>
          </div>
          <div class = "submit-button-container">
            <input name = "submit-button" class = "submit-button" type = "submit">
          </div>
        </form>
        <div class="signup"><a href="signup.php">Click here to sign up</a></div>
      </body>
    </div>
  </div>
</html>
