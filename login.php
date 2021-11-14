<?php
    include_once("user.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_POST['login_submit'])){

        if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
            header("Location: dashboard.php");
        }

        if(isset($_POST["login_nick"]) && isset($_POST["login_password"])){
            $result = User::login($_POST["login_nick"], $_POST["login_password"]);
            if($result == FALSE){
                echo "Nieprawidłowe dane logowania";
            }
            header("Location: dashboard.php");
        }
    }

    if(isset($_POST['reg_submit'])){
        if(isset($_POST['reg_nick']) && isset($_POST['reg_phone']) && isset($_POST['reg_email']) && isset($_POST['reg_password'])){
            User::addUser($_POST['reg_nick'],$_POST['reg_password'],$_POST['reg_email'],$_POST['reg_phone']);
            header("Location: dashboard.php");
        }
    }
?>