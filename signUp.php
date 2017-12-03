<!-- Register into database -->

<?php
session_start();
  include 'connectvarsEECS.php';

  function generateID(){
      $a = mt_rand(100000,999999);
      return $a;
  }

  function generateRandomSalt(){
     return base64_encode(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
  }


  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["username"]) || empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["email"]) || empty($_POST["age"]) || empty($_POST["password"])){
      $errorMessage = "<script> alert('Please do not leave any fields blank!')</script>";
      echo $errorMessage;
    }
    else{
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      if (!$conn) {
        die('Could not connect: ' . mysql_error());
      }

    if (isset($_POST['submit-button'])) {
    // btnDelete
      $userID = generateID();
      $currencyAmount = 10000;
      $username = mysqli_escape_string($conn,$_POST["username"]);
      $firstName = mysqli_escape_string($conn,$_POST["firstName"]);
      $lastName = mysqli_escape_string($conn,$_POST["lastName"]);
      $email = mysqli_escape_string($conn,$_POST["email"]);
      $age = mysqli_escape_string($conn,$_POST["age"]);
      $password = mysqli_escape_string($conn,$_POST["password"]);
      $salt = generateRandomSalt();

      $query = "INSERT INTO accounts(userID, password, email, currencyAmount, username, firstName, lastName, middleName, age, salt) VALUES('$userID', MD5('$password'), '$email', '$currencyAmount', '$username', '$firstName', '$lastName', '$middleName', '$age', '$salt')";
      if(mysqli_query($conn, $query)){
       echo "<script type='text/javascript'> document.location = 'success.php'; </script>";
      }
      else{
          $errorMessage = mysqli_error($conn);
          echo "<script>alert('Unable to register!')</script>";
      }
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
        <form method="post"><br>
            <div class="submit-info-container">
              <label>Username: </label><input type="text" name="username"><br>
              <label>First name: </label><input type="text" name="firstName"><br>
              <label>Last name: </label><input type="text" name="lastName"><br>
              <label>Email: </label><input type="text" name="email"><br>
              <label>Age: </label><input type="text" name="age"><br>
              <label>Password: </label><input type="password" name="password"><br>
            </div>
          <div class = "submit-button-container">
            <input name = "submit-button" class ="submit-button" type="submit">
          </div>

        </form>
      </body>
    </div>
  </div>
</html>
