<!doctype html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="./css/index.css">
</head>

<nav class="header">
    <ul>
    <li class="header-title">340 SPORTS</li>
    <li class="header-button"><a href="#">Account</a></li>
    <li class="header-button"><a href="#">Settings</a></li>
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
                    <div class="bet-amount">$92,293</div>
                    <button class="bet-button" style="display: none;">Bet</button>
                </span>
            </div>
        </div>
        <button class="more-games-button">View more...</button>

        <div class="other-games-container">
        <div class="main-games-text">OTHER GAMES</div>
            <div class="game" id="game-3">
                <div class="team-1-container"><div class="team-1-name">Team 1</div></div>
                <div class="team-2-container"><div class="team-2-name">Team 2</div></div>
                <button class="bet-button">Bet</button>
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
        $result = mysqli_query($conn, "SELECT username, currencyAmount FROM topScorers ORDER BY currencyAmount DESC");
        if (!$result) {
            die("Query to show fields from table failed");
        }
        $num_row = mysqli_num_rows($result);

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
</html>

	
