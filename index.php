<?php
    session_start();
    if(!isset($_SESSION["user_login"])){
        header("Location: login.php");
    }
?>
<script>
    // Check if the user is logged in and display their username
    window.onload = function() {
        const welcomeContainer = document.querySelector(".welcome-container");
        const username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>";
        if (username) {
            welcomeContainer.innerHTML = "Welcome, " + username + "!";
        }
    };
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    
    <audio id="gameSound" src="cartoon-jump-6462.mp3" preload="auto"></audio>

    <title>Tic-Tac-Toe</title>
    <video autoplay="" loop="" muted="">
    <source src="tiktoktaklogo1.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
</head>
<header style="color: white;">
        <section class="title-header">
            <h1 style="font-family: ;color: white;font-size: 40px;height: 74px;"><img src="tiktoktaklogo.jpg" style="height: 43px;margin-top: 7px;width: 70px;margin-left: 37px;">Tik<span style="color:black;font-style: italic;">Tok</span>Tak</h1>
        </section>
        <div class="welcome-container" style="">Welcome, julianne!</div>
        <div></div>
        <div style="text-align: end;margin-right: 25px;margin-top: -3px;">
                <a href="logout.php" class="logout">Logout</a>
            </div>
</header> 
<body>



<!-- Page 1: Start or Exit -->
<div class="homepage" id="page1" style="display: block;"> 
  
  <div class="title">
    <h1 style="
    color: dimgray;
    font-size: 67px;
">Tik<span style="
    font-style: italic;
    color: black;
">Tok</span>Tak</h1>
<img src="tiktoktaklogo.jpg" style="height: 194px;">
</div>
  
  <div class="homepage-buttons">
        <button onclick="mode()" id="start">Start Game</button></div>
            <button id="instructionsButton">Instructions</button>
            <button id="LeaderboardButton" onclick="goToLeaderboard()">Leaderboard</button>
        </div>

  
  <div id="instructions-container">
            <h2>Instructions</h2>
            <div id="instruction-content">
                <p>Objective: Achieve a sequence of five 'X' or 'O' symbols in a row, column, or diagonal on the 5x6 board.</p>
                <p>Gameplay: Choose difficulty and players. Players take turns placing their symbols. First to 5 wins.</p>
                <p>Scoring: Win a round: +1 point. First to 5 points wins.</p>
                <p>Reset: "Clear" button resets the game. "Start Game" resets scores.</p>
                <p>NOTE: AI player makes automatic moves in AI vs Human mode. Enjoy the game!</p>
            </div>
            <div id="instruction-buttons">
                <button id="prevInstruction" onclick="prevInstruction()">Previous</button>
                <button id="nextInstruction" onclick="nextInstruction()">Next</button>
                <button id="closeInstructions" onclick="closeInstructions()">Close</button>
            </div>
        </div>
        <div id="footer"> Catu, Andrei - Constantino, Luis Emmanuel - Genato, Michael - Guinto, Julianne - Lavenco, Marcus </div>

</div>


<script src="hometictactoe.js"></script>

</body>
</html>
