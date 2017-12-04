<!doctype html>
  <link rel="stylesheet" href="./css/header.css">

<nav class="header">
    <ul>
        <li class="header-title"><a href="index.php">340 SPORTS</a></li>
        <li class="header-button" id="h-btn1">
            <img src="img/account-icon.png" style="width:40px; height:40px;" alt="account" id="accountID">
            <div class ="dropdown-content">
                <?php 
                
                // include global connection variables
                include 'connectvarsEECS.php';
                $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                if(!$conn){
                    die('Could not connect: ' . mysql_error());
                }
                $accounts_sql = "SELECT currencyAmount FROM accounts WHERE userID = '$userID'";
    
                $res = mysqli_query($conn, $accounts_sql);
                if (!$res) {
                    die("Fetching currencyAmount failed");
                }
                $currentAmount = mysqli_fetch_row($res);
                
                echo "<div class ='current-money'>Current score: $currentAmount[0] coins</div>";    
                ?>
                <div class ="account-settings"><a href="settings.php">Account Settings</a></div>
                <div class="sign-out"><a href="signout.php">Sign out</a></div>
            </div>
        </li>
    </ul>
</nav>
</html>