<?php
include_once("connect.php");

class User{

    const MAX_USERNAME_LENGTH = 21;
    const MAX_PASSWORD_LENGTH = 33;
    const MAX_EMAIL_LENGTH = 65;

    private $id;
    private $password;
    private $phone_number;
    public $username;
    public $email;

    // Dodawanie uzytkownika
    public static function addUser($username, $password, $email,$phone_number){
        if(empty($username) || empty($password) || empty($email) || empty($phone_number)){
            throw new Exception("Empty username, password or email", 1);
        }

        if(User::checkData($username, $email)){
            throw new Exception("Username or email exists", 1);
        }

        if(strlen($username) < User::MAX_USERNAME_LENGTH && strlen($password) < User::MAX_PASSWORD_LENGTH && strlen($email) < User::MAX_EMAIL_LENGTH ){
            if(ctype_alnum($username) && filter_var($email, FILTER_VALIDATE_EMAIL)){
                $conn = DatabaseConnect::connect();
                $cmd = mysqli_prepare($conn, "INSERT INTO `user`(`username`, `password`, `email`, `phone_number`) VALUES (?,?,?,?)");
        
                $password = md5($password);
        
                mysqli_stmt_bind_param($cmd, "ssss", $username, $password, $email, $phone_number);
                mysqli_stmt_execute($cmd);
        
                $getResult = mysqli_stmt_get_result($cmd);
        
                mysqli_close($conn);

            }else{
                throw new Exception("Incorrect email or username", 1);
            }
        }else{
            throw new Exception("Too long username, password or email", 1);
        }
    }

    // Sprawdzanie poprawnosci danych
    public static function loginValidate($username, $password) : bool{
        if(empty($username) || empty($password)){
            return false;
        }

        if(strlen($username) > User::MAX_USERNAME_LENGTH && strlen($password) > User::MAX_PASSWORD_LENGTH){
            return false;
        }

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
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
                session_regenerate_id();
            }
            $_SESSION['logged'] = TRUE;
            $_SESSION['username'] = $username;
            $_SESSION['id'] = User::takeUserId($username);
            return true;
        }else{
            return false;
        }
    }

    // Pobiera id uzytkownika
    private static function takeUserId($username){
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT id FROM user WHERE username=?");

        mysqli_stmt_bind_param($cmd, "s", $username);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);
        mysqli_close($conn);

        if(isset($row[0])){
            return $row[0];
        }else{
            return 1;
        }
    }

    public static function takePhoneNumber($username){
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT phone_number FROM user WHERE username=?");

        mysqli_stmt_bind_param($cmd, "s", $username);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);
        mysqli_close($conn);

        if(isset($row[0])){
            return $row[0];
        }else{
            return "Brak";
        }
    }

    // Sprawdzanie czy dane istnieja juz w bazie
    private static function checkData($username, $email){
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT username,email FROM user WHERE username=? or email=?");

        mysqli_stmt_bind_param($cmd, "ss", $username, $email);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);
        mysqli_close($conn);

        if(isset($row[0])){
            return true;
        }else{
            return false;
        }
    }

    public static function logout(){
        session_destroy();
    }

    
    public static function userId($username){
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT id FROM user WHERE username=?");

        mysqli_stmt_bind_param($cmd, "s", $username);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);
        mysqli_close($conn);

        if(isset($row[0])){
            return $row[0];
        }else{
            return 1;
        }
    }
}
?>