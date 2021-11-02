<?php
set_exception_handler(function (Exception $ex) {
$time = date('F j, Y, g:i a e O');

	//$message = "[{$time}] {$ex->getMessage()}\n";

	//error_log($message, 3, 'logs/errors.log');

	show_error("Nieznany błąd");
});

if(isset($_GET["error"])){
    echo '<title>Ups...</title><style>@import url("https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap"); body {background-color: #B1DCD3; font-family: "Lato", sans-serif; color: white} h1{font-size: 20vh} h3{font-size: 4vh} #error{margin: auto; display: flex; flex-direction: column; align-items: center;}</style><div id="error"><h1>UPS... :(</h1>';
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