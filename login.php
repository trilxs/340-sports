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

      // Puts all the usernames in our table into the variable $query
      $query = "SELECT * FROM users WHERE username = '$username'";
      echo "username was selected";

      // Checks to see if we have usernames available
      $result = mysqli_query($conn, $query);

      // Searches the usernames in the table and the inputted one to see if we have a match
      if($row = mysqli_fetch_assoc($result)){
        $salt = $row['salt'];

        // Salts the password to the matched username to see if the password is the same
        $saltSQL = "SELECT * FROM accounts WHERE username = '$username' && password = MD5('$password$salt')";
        $finalPW = mysqli_query($conn, $saltSQL);
        if($finalRow = mysqli_fetch_assoc($finalPW)){
          echo "Success";
          return true;
        }
        else{
          echo "Failed login attempt";
          return false;
        }
      }
      else{
        echo "Failed login attempt";
        return false;
      }
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
