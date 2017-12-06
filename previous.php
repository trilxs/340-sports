 <?php
        // include global connection variables
        include 'connectvarsEECS.php'; 
    // establish connection	
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$conn) {
            die('Could not connect: ' . mysqli_error());
        }

    // Query the database for names of all tables
        $sql_var = "SELECT game.isLive, game.teamAScore, game.teamBScore, a.teamName, b.teamName, gameBets.userID, gameBets.betAmount, game.gameID, gameBets.gameID, gameBets.teamID, game.teamAID, game.teamBID FROM gameBets, game, team a, team b WHERE game.teamAID = a.teamID AND game.teamBID = b.teamID AND game.gameID = gameBets.gameID";
        $result = mysqli_query($conn, $sql_var);
        if (!$result) {
            die("Query to show fields from table failed");
        }
        $num = 0;
        while($row = mysqli_fetch_row($result)) {
                //team A
            if ($row[0] == 0 && $row[5] == $userID) { // if it's not live
                echo "<div class='game' id='game-1'>";
                echo "<table class='game-table'>";
                echo "  <tr class='team-1-container'>";
                if ($row[9] == $row[10]) { 
                    echo "      <td class='team-1-name' style='color:#8F9AFF;'>$row[3]</td>"; 
                } else {
                    echo "      <td class='team-1-name'>$row[3]</td>"; 
                }
                echo "      <td class='team-1-score'>$row[1]</td></tr>";
                
                //team B
                echo "  <tr class='team-2-container'>";
                if ($row[9] == $row[11]) {
                    echo "      <td class='team-2-name' style='color:#FF7A7A;'>$row[4]</td>";
                } else {
                    echo "      <td class='team-2-name'>$row[4]</td>"; 
                }
                echo "      <td class='team-2-score'>$row[2]</td></tr></table>";
                
                //bet container success             
                echo "<span class='bet-container' id='bet-success' style='display:none;'>";
                echo "    <div class='bet-s-text'>Your bet was<br>processed!</div>";
                echo "</span>";
                    //bet container
                echo "<span class='bet-container'>";
                if ($row[9] == $row[10] && $row[1] > $row[2]) { //if user picked team a and team a won
                    echo "  <div class='bet-text'>You won</div>";
                    echo "  <div class='bet-amount'>$row[6] coins</div>";
                }                
                else if ($row[9] == $row[10] && $row[1] < $row[2]) { //if user picked team a and team a lost
                    echo "  <div class='bet-text'>You lost</div>";
                    echo "  <div class='bet-amount'>$row[6] coins</div>";
                }
                else if ($row[9] == $row[11] && $row[2] > $row[1]) { //if user picked team a and team a won
                    echo "  <div class='bet-text'>You won</div>";
                    echo "  <div class='bet-amount'>$row[6] coins</div>";
                }                
                else if ($row[9] == $row[11] && $row[2] < $row[1]) { //if user picked team a and team a lost
                    echo "  <div class='bet-text'>You lost</div>";
                    echo "  <div class='bet-amount'>$row[6] coins</div>";
                }
                echo "</span></div>";
                $num++;
            }
        }
        if ($num == 0) {
            echo "<div class='no-prev-games'>There are currently no game bets in your history.</div>";
                                echo "<div class='game' id='game-1'>";
              
                echo "</div>";
        }
        
        mysqli_free_result($result);
        mysqli_close($conn);
    ?>