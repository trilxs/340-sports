<!doctype html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="./css/index.css">
</head>

<header>340 SPORTS</header>
    
<nav>
    <ul>
        <li><a href="#">Live Games</a></li>
        <li><a href="#">Previous Games</a></li>
    </ul>
</nav>
    
<body>
    <div class="your-games-container">
    <div class="your-games-text">YOUR GAMES</div>
        <div class="game" id="game-1">
            <div class="team-1-name">Team 1</div>
            <div class="team-2-name">Team 2</div>
            <button class="bet-button">Bet</button>
        </div>
    </div>
    <button class="more-games-button">View more...</button>
    
    <div class="other-games-container">
    <div class="other-games-text">OTHER GAMES</div>
        <div class="game" id="game-3">
            <div class="team-1-name">Team 1</div>
            <div class="team-2-name">Team 2</div>
            <button class="bet-button">Bet</button>
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
        $result = mysqli_query($conn, "SELECT username, currencyAmount FROM topScorers ORDER BY DESC");
        if (!$result) {
            die("Query to show fields from table failed");
        }
        $num_row = mysqli_num_rows($result);

        echo "<h1>Top Scorers</h1>";
        echo "<table border='1'>";

        echo "        <tr>";
        echo "           <th>Username</th>";
        echo "            <th>Score</th>";
        echo "        </tr>";

        while($row = mysqli_fetch_row($result)) {	
            echo "<tr>";		
            foreach($row as $cell)		
                echo "<td>$cell</td>";	
            echo "</tr>\n";
        }

        mysqli_free_result($result);
        mysqli_close($conn);
    ?>
    </div>
  <script src="js/scripts.js"></script>
</body>
</html>

	
