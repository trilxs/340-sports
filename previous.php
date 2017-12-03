<!doctype html>
<div class="your-games-container">
        <?php
        // include global connection variables
        include 'connectvarsEECS.php'; 

    // establish connection	
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$conn) {
            die('Could not connect: ' . mysqli_error());
        }

    // Query the database for names of all tables
        $sql_var = "SELECT game.isLive, game.teamAScore, game.teamBScore, a.teamName, a.betMultiplier, b.teamName, b.betMultiplier FROM game, team a, team b WHERE game.teamAID = a.teamID AND game.teamBID = b.teamID";
        $result = mysqli_query($conn, $sql_var);
        if (!$result) {
            die("Query to show fields from table failed");
        }
        while($row = mysqli_fetch_row($result)) {
                //team A
            if ($row[0] == 1 ) { // if is live
                echo "<div class='game' id='game-1'>";
                echo "<table class='game-table'>";
                echo "  <tr class='team-1-container'>";
                echo "      <th class='team-1-image'>IMAGE</th>";
                echo "      <td class='team-1-name'>$row[3]</td>"; 
                echo "      <td class='team-1-score'>$row[1]</td></tr>";
                
                //team B
                echo "  <tr class='team-2-container'>";
                echo "      <th class='team-2-image'>IMAGE</th>";
                echo "      <td class='team-2-name'>$row[5]</td>";
                echo "      <td class='team-2-score'>$row[2]</td></tr></table>";
                //bet container
                echo "<span class='bet-container'>";
                echo "  <div class='bet-text'>Your bet was </div>";
                echo "  <div class='bet-amount'>23 coins</div>";
                echo "<button class='bet-button' style='display: none;'>Bet</button>";
                echo "</span></div>";
            }
        }
        
        mysqli_free_result($result);
        mysqli_close($conn);
    ?>
            <div class="game" id="game-1">
                <table class="game-table">
                    <tr class="team-1-container">
                        <th class="team-1-image">IMAGE</th>
                        <td class="team-1-name">Team 1</td>
                        <td class="team-1-score">3</td>
                    </tr>
                    <tr class="team-2-container">
                        <th class="team-2-image">IMAGE</th>
                        <td class="team-2-name">Team 2</td>
                        <td class="team-2-score">4</td>
                    </tr>
                </table>
                <span class="bet-container">
                    <div class="bet-text">Your bet was </div>
                    <div class="bet-amount">342 coins</div>
                    <button class="bet-button" style="display: none;">Bet</button>
                </span>
            </div>
        </div>
<!--        <button class="more-games-button">View more...</button>-->
</html>