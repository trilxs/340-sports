<!-- Register into database -->

<?php
session_start();
  include 'connectvarsEECS.php';

  function generateID(){
    return uniqid(rand());
  }

  function generateRandomSalt(){
     return base64_encode(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
  }


  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["username"]) || empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["email"]) || empty($_POST["age"]) || empty($_POST["password"])){
      $errorMessage = "Please do not leave any field blank.";
      echo $errorMessage;
    }
    else{
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      if (!$conn) {
        die('Could not connect: ' . mysql_error());
      }

      $userID = generateID();
      $currencyAmount = 10000;
      $username = mysqli_escape_string($conn,$_POST["username"]);
      $firstName = mysqli_escape_string($conn,$_POST["firstName"]);
      $lastName = mysqli_escape_string($conn,$_POST["lastName"]);
      $email = mysqli_escape_string($conn,$_POST["email"]);
      $age = mysqli_escape_string($conn,$_POST["age"]);
      $password = mysqli_escape_string($conn,$_POST["password"]);
      $salt = generateRandomSalt();

      $query = "INSERT INTO accounts(userID, password, email, currencyAmount, username, firstName, lastName, middleName, age, salt) VALUES('$userID', MD5('$password$salt'), '$email', '$currencyAmount', '$username', '$firstName', '$lastName', '$middleName', '$age', '$salt')";
      if(mysqli_query($conn, $query)){
        echo "Success, account has been registered";
      }
      else{
        echo "Error: could not register. Try again" . mysqli_error($conn);
      }
      mysqli_close($conn);
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel = "stylesheet" href = "./css/signUp.css">
</head>

  <div class = "white-box">
    <h1>Register an account</h1>
    <div class = "inner-body">
      <body>
        <form action="success.php" method="post"><br>
          Username: <input type="text" name="username"><br>
          First name: <input type="text" name="firstName"><br>
          Last name: <input type="text" name="lastName"><br>
          Email: <input type="text" name="email"><br>
          Age: <input type="text" name="age"><br>
          Password: <input type="text" name="password"><br>
          <div class = "submit-button">
            <input type="submit">
          </div>

        </form>
      </body>
    </div>
  </div>
</html>
