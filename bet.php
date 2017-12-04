<?php
  include 'connectvarsEECS.php';

session_start();
 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      if(!$conn){
        die('Could not connect: ' . mysql_error());
      }
$userID = $_SESSION['userID'];
$gameID = $_POST['gameid'];
$teamname = $_POST['teamname'];
$betAmount = $_POST['betinput'];

    $accounts_sql = "SELECT currencyAmount FROM accounts WHERE userID = '$userID'";
    
    $res = mysqli_query($conn, $accounts_sql);
    if (!$res) {
            die("Fetching currencyAmount failed");
    }
    $currentAmount = mysqli_fetch_row($res);
    
if ($betAmount > 0 && $betAmount <= $currentAmount[0]) {
    echo 1;
    //select teamid
    $sql = "SELECT teamID FROM team WHERE teamName = '$teamname'";
    
    $newAmount = $currentAmount[0]-$betAmount;
    
    echo $newAmount;
    
    $sql_insert = "UPDATE accounts SET currencyAmount = '$newAmount' WHERE userID = '$userID'";
    $res = mysqli_query($conn, $sql_insert);
    if (!$res) {
        die("currencyAmount INSERTION failed");
    }
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
            die("Fetching teamID failed");
    }
    $teamID = mysqli_fetch_row($result);
    //insert
    $query = "INSERT INTO gameBets (gameID, userID, teamID, betAmount) VALUES ($gameID, $userID, $teamID[0], $betAmount)";
    $res = mysqli_query($conn, $query);
    if (!$res) {
            die("INSERTION failed");
    }
}
else {   
    echo 0;
}
mysqli_close($conn);
?>
