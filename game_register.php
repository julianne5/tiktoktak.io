
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>
<body data-new-gr-c-s-check-loaded="14.1154.0" data-gr-ext-installed="">



<div class="container">
<div class="registration-fillup">        
    <div>
    <?php
    session_start();
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $errors = array();

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        if (empty($username) || empty($password)) {
            array_push($errors, "All fields are required");
        }
        if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
            array_push($errors, "Username is not valid. It should be 3-20 characters long and can only contain letters, numbers, and underscores.");
        }
        if (strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 characters long");
        }

        require_once "database.php";

        $check_sql = "SELECT * FROM user_login WHERE username = ?";
        $check_stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($check_stmt, $check_sql)) {
            mysqli_stmt_bind_param($check_stmt, "s", $username);
            mysqli_stmt_execute($check_stmt);
            $result = mysqli_stmt_get_result($check_stmt);
            $existing_user = mysqli_fetch_assoc($result);

            if ($existing_user) {
                array_push($errors, "Username already exists. Please choose a different one.");
            }
        } else {
            die("Something went wrong");
        }

        if (count($errors) === 0) {
    $insert_sql = "INSERT INTO user_login (username, password) VALUES (?, ?)";
    $insert_stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($insert_stmt, $insert_sql)) {
        mysqli_stmt_bind_param($insert_stmt, "ss", $username, $passwordHash);
        mysqli_stmt_execute($insert_stmt);
        echo "<div class='alert alert-success'>Registered Successfully!</div>";
        $_SESSION["username"] = $username;
        $_SESSION["user_login"] = true;

        // Set success message


    } else {
        die("Something went wrong");
    }
}

        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
    ?>
    <h1 style="
    color: dimgray;">Tik<span style="font-style: italic;color: black;">Tok</span>Tak</h1>
    </div>

    <p> Register Here!</p>
    <div style="text-align: center;">
</div>
    
    <form action="game_login.php" method="post" style="margin-top: 12px;text-align-last: center;">
        <div class="username">
            <div class="form-group">
                <p>Username:</p>
                <div style="text-align: -webkit-center;">
                <input type="text" class="form-control" name="username" placeholder="Name">
            </div>
        </div>
        <div class="form-group">
            <div style="text-align: -webkit-center;">
            <p>Input Password:</p>
            <input type="password" class="form-control" name="password" placeholder="*******"></div>
            </div>
        </div>
        <div class="form-btn" style="margin: 10px auto;">
            <input type="submit" class="btn btn-primary" name="submit" value="Register" style="
            background: linear-gradient(138deg, #a16e90, #645766);
            border-radius: 20px;">
        </div>
    </form>
<p>Already registered? <a href="login.php">Login Here</a></p>
</div>

<grammarly-desktop-integration data-grammarly-shadow-root="true">

</grammarly-desktop-integration><div id="smartyContainer" style="position: absolute; top: 0px; right: 0px; line-height: initial; z-index: 2147483647; width: auto; font-size: initial;">
</div>
</div>
</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true">

</grammarly-desktop-integration><div id="smartyContainer" style="position: absolute; top: 0px; right: 0px; line-height: initial; z-index: 2147483647; width: auto; font-size: initial;">
</div>
</html>