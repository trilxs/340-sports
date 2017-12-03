 <?php
        // include global connection variables
        include 'connectvarsEECS.php'; 
    // establish connection	
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$conn) {
            die('Could not connect: ' . mysqli_error());
        }

    session_start();
    $userID = $_SESSION['userID'];
    // Query the database for names of all tables
        $sql_var = "SELECT game.isLive, game.teamAScore, game.teamBScore, a.teamName, b.teamName, gameBets.userID, gameBets.betAmount, game.gameID FROM gameBets, game, team a, team b WHERE game.teamAID = a.teamID AND game.teamBID = b.teamID";
        $result = mysqli_query($conn, $sql_var);
        if (!$result) {
            die("Query to show fields from table failed");
        }


        $num = 0;
        while($row = mysqli_fetch_row($result)) {
            $sql_var = "SELECT gameBets.gameID from gameBets WHERE userID = '$userID'";

            $user_games = mysqli_query($conn, $sql_var);
            if (!$user_games) {
                die("Query to show fields from table failed");
            }
                //team A
            $has_game = 0;
            while ($game_row = mysqli_fetch_row($user_games)) { //check all the user's betted games
                if ($game_row[0] == $row[7]) { // check to see if gameBetsID matches any of these games
                    $has_game = 1;
                }
            }
            if ($row[0] == 1 && $row[5] != $userID && $has_game == 0) { // if it's live and user hasn't betted yet...
                echo "<div class='game' id='game-1'>";
                echo "<table class='game-table'>";
                echo "  <tr class='team-1-container'>";
                echo "      <th class='team-1-image'>IMAGE</th>";
                echo "      <td class='team-1-name'>$row[3]</td>"; 
                echo "      <td class='team-1-score'>$row[1]</td></tr>";

                //team B
                echo "  <tr class='team-2-container'>";
                echo "      <th class='team-2-image'>IMAGE</th>";
                echo "      <td class='team-2-name'>$row[4]</td>";
                echo "      <td class='team-2-score'>$row[2]</td></tr></table>";
                //bet container success     
                echo "<span class='bet-container' id='bet-success' style='display:none;'>";
                echo "    <div class='bet-s-text'>Your bet was<br>processed!</div>";
                echo "</span>";
                //bet container form
                echo "<form class='bet-container-form' id='bet-form'>";
                echo "    <input type='hidden' name='gameid' value='$row[7]'>";
                echo "    <select name='teamname'>";
                echo "      <option value='$row[3]'>$row[3]</option>";
                echo "      <option value='$row[4]'>$row[4]</option>";
                echo "    </select>";
                echo "    <input type='number' step='1' name='betinput' class='bet-input'><br>";
                echo "    <input type='submit' name='submit' class='bet-button' value='Bet'/>";
                echo "</form></div>";
                $num++;
            }
        }

        if ($num == 0) {
            echo "<div class='no-games'>There are currently no live games.</div>";
        }
        
        mysqli_free_result($result);
        mysqli_close($conn);
    ?>