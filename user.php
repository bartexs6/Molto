<?php
class User{

    private $id;
    private $password;
    public $username;
    public $email;

    // Dodawanie uzytkownika
    public static function addUser($username, $password, $email){
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "INSERT INTO `user`(`username`, `password`, `email`) VALUES (?,?,?)");

        $password = md5($password);

        mysqli_stmt_bind_param($cmd, "sss", $username, $password, $email);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);

        mysqli_close($conn);
    }

    // Sprawdzanie poprawnosci danych
    public static function loginValidate($username, $password) : bool{
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT password FROM user WHERE username=?");

        mysqli_stmt_bind_param($cmd, "s", $username);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);
        mysqli_close($conn);

        if(isset($row[0])){
            if($row[0] == md5($password)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    // Logowanie
    public static function login($username, $password) : bool{
        if(User::loginValidate($username, $password)){
            session_start();
            session_regenerate_id();
            $_SESSION['logged'] = TRUE;
            $_SESSION['username'] = $username;
            return true;
        }else{
            return false;
        }
    }
}
?>