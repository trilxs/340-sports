<!doctype html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="./css/index.css">
</head>

<nav class="header">
    <ul>
    <li class="header-title">340 SPORTS</li>
    <li class="header-button" id="h-btn1"><a href="#">Account</a></li>
    <li class="header-button" id="h-btn2"><a href="#">Settings</a></li>
    </ul>
</nav>
<div class="content-container">
<div class="bg-image-container">
    <h1 class="page-title">HOME</h1>
</div>
<nav class="game-tabs">
    <ul>
        <li><a href="#">Live Games</a></li>
        <li><a href="#">Previous Games</a></li>
        <li class="top-scorers-title">Top scorers</li>
    </ul>
</nav>
    
<div class="body-container">
    <div class="game-container" style="width:845px; display: inline-block;">
        <div class="your-games-container">
        <div class="main-games-text">YOUR GAMES</div>
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

        <div class="other-games-container">
        <div class="main-games-text">OTHER GAMES</div>
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
                    <div class="bet-text" style="display:none;">Your bet was </div>
                    <div class="bet-amount" style="display:none;">342 coins</div>
                    <button class="bet-button" style="">Bet</button>
                </span>
            </div>
        </div>
        </div>
        <div class="top-scorers-container">
    <?php
    // include global connection variables
        include 'connectvarsEECS.php'; 

    // establish connection	
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$conn) {
            die('Could not connect: ' . mysqli_error());
        }

    // Query the database for names of all tables	
        $result = mysqli_query($conn, "SELECT username, currencyAmount FROM accounts ORDER BY currencyAmount DESC");
        if (!$result) {
            die("Query to show fields from table failed");
        }

        echo "<table class='top-scorers-table'>";
        echo "        <tr>";
        echo "           <th>Username</th>";
        echo "            <th>Score</th>";
        echo "        </tr>";
        echo "<tbody class='table-hover'>";
        while($row = mysqli_fetch_row($result)) {	
            echo "<tr>";		
            foreach($row as $cell)		
                echo "<td class='text-left'>$cell</td>";	
            echo "</tr>\n";
        }
        echo '</tbody></table>';

        mysqli_free_result($result);
        mysqli_close($conn);
    ?>
    </div>
  <script src="js/scripts.js"></script>
</div>
    </div>

</div>   
</html>

	
