<!doctype html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="./css/index.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<?php include("header.html"); ?>

<div class="content-container">
<div class="bg-image-container">
    <h1 class="page-title">HOME</h1>
</div>
<nav class="game-tabs">
    <ul>
        <li id="live-button" style="cursor:pointer;   background: linear-gradient(135deg, rgb(245, 117, 159) 0%, rgb(255, 155, 62) 100%);"><a onclick="loadGames(1)" style="color:white;">Live Games</a></li>
        <li id="prev-button" style="cursor:pointer;"><a onclick="loadGames(0)" >Previous Games</a></li>
        <li class="top-scorers-title">Top scorers</li>
    </ul>
</nav>

<div class="body-container">
    <div class="game-container" style="display: inline-block;">

        <div class="live-games" id="live">
            <?php include("live.php"); ?>
        </div>
        <div class="previous-games" id="prev" style="display:none;">
            <?php include("previous.php"); ?>
        </div>
    </div>
        <div class="top-scorers-container">
    <?php

    session_start();

    $userID = $_SESSION['userID'];

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
        echo "            <th>Coins</th>";
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
<script>
    function loadGames(state) {

        var prefixes = ['-o-', '-ms-', '-moz-', '-webkit-'];

        var liveBut=document.getElementById('live-button');
        var prevBut=document.getElementById('prev-button');

        var liveText = document.getElementById('live-button').getElementsByTagName("a")[0];
        var prevText = document.getElementById('prev-button').getElementsByTagName("a")[0];
        var live = document.getElementById('live');
        var prev = document.getElementById('prev');
        if (state == 1) {
            for (var i = 0; i < prefixes.length; i++)
            {
                liveBut.style.background= prefixes[i] + 'linear-gradient(135deg, #FF9B3E, #F5759F)';
            }
            liveText.style.color = 'white';
            prevText.style.color = 'black';
            prevBut.style.background='white';
            live.style.display='block';
            prev.style.display='none';
        }
        else {
            for (var i = 0; i < prefixes.length; i++)
            {
                prevBut.style.background= prefixes[i] + 'linear-gradient(135deg, #FF9B3E, #F5759F)';
            }
            prevText.style.color = 'white';
            liveText.style.color = 'black';
            liveBut.style.background='white';
            live.style.display='none';
            prev.style.display='block';
        }
    }
    $('#bet-form').on('submit', function(e) {
    // Prevent form submission by the browser

    e.preventDefault();


        var betForm = document.getElementById('bet-form');
        var $form = $(this);

        var $inputs = $form.find("input, select, button, textarea");

        var serializedData = $form.serialize();


     $inputs.prop("disabled", true);
     request = $.ajax({
      type: "POST",
      url: "bet.php",
      data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        if(response[0] == 1) {
            var betResult = document.getElementById('bet-success');
            betResult.style.display='block';
            betForm.style.display='none';
        }
        else {
            alert("Invalid input!");
        }
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        alert("There was an error while submitting!");
    });

         // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });
});

  </script>
</div>
    </div>

<?php include("footer.html"); ?>

</html>
