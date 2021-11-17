<?php
include_once("error.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['logged']) || $_SESSION['logged'] == FALSE){
    show_error("Nie jesteś zalogowany");
    exit;
}else{
    session_destroy();
    header("Location: index.php");
}

?>