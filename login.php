<?php
    include_once("user.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
        header("Location: index.php");
    }

    if(isset($_POST["name"]) && isset($_POST["password"])){
        $result = User::login($_POST["name"], $_POST["password"]);
        if($result == FALSE){
            echo "Nieprawidłowe dane logowania";
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molto - konto</title>
    <link rel="stylesheet" href="style/login.css">
</head>

<body>

    <div class="popup_form">
        <div class="forms">
            <button type="button" class="button">LOGIN</button>
            <button type="button" class="button">SIGN UP</button>
        </div>

        <div class="login_section">
            <form action="login.php" method="POST">
                <label for="name">Login</label><br>
                    <input type="text" name="name" required><br>
                <label for="password">Hasło</label><br>
                    <input type="password" name="password" required><br>
                <button type="submit">Zaloguj</button>
            </form>
        </div>

    </div>

</body>
</html>