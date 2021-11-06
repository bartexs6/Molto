<?php

if(isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])){
    $id = $_GET['id'];
    echo '<title>Zgłoszenie</title><style>@import url("https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap"); body {background-color: #B1DCD3; font-family: "Lato", sans-serif; color: white} h1{font-size: 10em} h3{font-size: 2em} #error{margin: auto; display: flex; flex-direction: column; align-items: center;}</style><div id="error"><h1>Zgłoszenie</h1>';
    echo "<h3>Dziękujemy za zgłosznie ogłosznia o numerze: $id</h3>";
    echo '<h3 onclick="back()" style="cursor: pointer">Wróć</h3></div>';
    echo '<script>function back(){location.assign("index.php")}</script>';
}

?>