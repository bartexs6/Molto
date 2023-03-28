<?php
include_once("announcement.php");
include_once("connect.php");

if(isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])){
    $id = $_GET['id'];
    echo '<title>Zgłoszenie</title><style>@import url("https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap"); body {background-color: #282828; font-family: "Lato", sans-serif; color: white} h1{font-size: 10em} h3{font-size: 2em} #error{margin: auto; display: flex; flex-direction: column; align-items: center;}</style><div id="error"><h1>Zgłoszenie</h1>';
    echo "<h3>Dziękujemy za zgłosznie ogłosznia o numerze: $id</h3>";
    echo '<h3 onclick="back()" style="cursor: pointer">Wróć</h3></div>';
    echo '<script>function back(){location.assign("index.php")}</script>';
}

if(isset($_GET["id_favorite"]) && !empty($_GET["id_favorite"]) && is_numeric($_GET["id_favorite"]) && isset($_GET["id_user"])){
    $id = $_GET['id_favorite'];

    if(empty($_GET["id_user"]) || !is_numeric($_GET["id_user"])){
        echo '<title>Ulubione</title><style>@import url("https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap"); body {background-color: #282828; font-family: "Lato", sans-serif; color: white} h1{font-size: 10em} h3{font-size: 2em} #error{margin: auto; display: flex; flex-direction: column; align-items: center;}</style><div id="error"><h1>Ups...</h1>';
        echo "<h3>Aby dodać ogłoszenie do ulubionych musisz być zalogowany</h3>";
        echo '<h3 onclick="back()" style="cursor: pointer">Wróć</h3></div>';
        echo '<script>function back(){location.assign("index.php")}</script>';

        return 0;
    }

    $userId = $_GET['id_user'];

    Announcement::addToFavorites($id, $userId);

    echo '<title>Ulubione</title><style>@import url("https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap"); body {background-color: #282828; font-family: "Lato", sans-serif; color: white} h1{font-size: 10em} h3{font-size: 2em} #error{margin: auto; display: flex; flex-direction: column; align-items: center;}</style><div id="error"><h1>Ulubione</h1>';
    echo "<h3>Dodałeś ogłoszenie numer: $id do ulubionych</h3>";
    echo '<h3 onclick="back()" style="cursor: pointer">Wróć</h3></div>';
    echo '<script>function back(){location.assign("index.php")}</script>';
}

?>