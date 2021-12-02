<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
    include_once("user.php");
    include_once("connect.php");

    $userId = User::userId($_SESSION['username']);
    //EDYTOWANIE KONTA

    if(isset($_POST['editAccount'])){

        $conn = DatabaseConnect::connect();
        $nick = htmlspecialchars($_POST['nick']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $password = md5($_POST['password']);

        $cmd = "UPDATE user SET `username`='".$nick."', `password`='".$password."', `email`='".$email."', `phone_number`='".$phone."' WHERE id=$userId";

        $result = mysqli_query($conn,$cmd);

        mysqli_close($conn);

        header("Location: dashboard.php");
    }

    //USUWANIE KONTA
    /*if(isset($_POST['deleteAccount'])){
        $conn = DatabaseConnect::connect();
        $cmd_user = "DELETE FROM user WHERE id=$userId";
        $cmd_userAnn = "DELETE FROM announcement WHERE user_owner=$userId";

        $result_user = mysqli_query($conn,$cmd_user);
        $result_userAnn = mysqli_query($conn,$cmd_userAnn);

        mysqli_close($conn);

        //header("Location: index.php");
    }*/
}
?>