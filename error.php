<?php
set_exception_handler(function ( $ex) {
    error_log($ex, 0);

	show_error("Nieznany błąd");
});

if(isset($_GET["error"])){
    echo '<title>Ups...</title><style>@import url("https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap"); body {background-image: url("vizualization/4.png"); background-repeat:no-repeat; object-fit: cover; background-size: 100vw 100vh; font-family: "Lato", sans-serif; color: white} h1{font-size: 20vh} h3{font-size: 4vh} #error{margin: auto; display: flex; flex-direction: column; align-items: center;}</style><div id="error"><h1>UPS... :(</h1>';
    echo "<h3>Coś poszło nie tak: ".$_GET["error"]."</h3>";
    echo "<h3>Spróbuj ponownie później</h3></div>";

}

function show_error($text){
    header("Location: error.php?error=" . $text);
}

function unknown_error($exception){
    show_error("Nieznany błąd");
}
?>