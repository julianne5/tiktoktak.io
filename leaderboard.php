<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-Tac-Toe Match History</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<video autoplay="" loop="" muted="">
    <source src="tiktoktaklogo1.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
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
<div class="scoreboard">
    <h1>Scoreboard</h1>
</div>
<table style="margin-bottom: 35px;">
    <thead>
        <tr>
            <th>Player</th>
            <th>Mode</th>
            <th>Result</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Replace this with actual database connection and query
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "game_login";
        
        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $user_id = 1; // Replace with the actual user ID
        
        // Fetch match history data from the database
        $query = "SELECT match_id, player, opponent, result FROM scoreboard WHERE user_id = $user_id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='details'>";
                echo "<td>" . $row['player'] . "</td>";
                echo "<td>" . $row['opponent'] . "</td>";

                // Check the result and display a more human-readable outcome
                $resultText = "";
                switch ($row['result']) {
                    case 'win':
                        $resultText = "Win";
                        break;
                    case 'loss':
                        $resultText = "Loss";
                        break;
                    case 'draw':
                        $resultText = "Draw";
                        break;
                    default:
                        $resultText = "Unknown";
                        break;
                }

                echo "<td>" . $resultText . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr class='details'><td colspan='3' style='font-size: small;'>No match history available</td></tr>";

        }    
        $conn->close();
        ?>
    </tbody>
</table>
<button class="button back-button" onclick="goHome()">Home</button>

<script> function goHome() {
    window.location.href = "index.php";
  }</script>
</body>
</html>