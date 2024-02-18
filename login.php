<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">

</head>
<body>
<div class="container">
<h1 style="
    color: dimgray;">Tik<span style="font-style: italic;color: black;">Tok</span>Tak</h1>
        <?php
        if(isset($_POST["login"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM user_login WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if(password_verify($password, $user["password"])){
                    $_SESSION["user_login"] = true;
                    $_SESSION["username"] = $username;
                    header("Location: index.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Username does not match</div>";
            }
        }
        
    ?>
    
        <form action="login.php" method="post"> <!-- Fixed form action -->
            <div class="form-group" style="text-align: -webkit-center;">
                <label for="username">Username:</label>
                <input type="username" name="username" class="form-control" required="" style="">
            </div>
 
            <div class="form-group" style="text-align: -webkit-center;">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required="">
            </div>
 
<div class="form-btn" style="margin: 10px auto;">
            <input type="submit" value="Play" name="login" class="btn btn-primary" style="
            background: linear-gradient(138deg, #a16e90, #645766);
            border-radius: 20px;">
        </div>

            <div><p>Not Register yet? <a href="game_login.php"> Register Here</a></div>
            
    </form>
</div>
</body>
</html>