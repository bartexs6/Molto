<?php
    include_once("error.php");

        // Zmiana ostrzezen na bledy
        function exception_error_handler($severity, $message, $file, $line) {
            if (!(error_reporting() & $severity)) {
                return;
            }
            throw new ErrorException($message, 0, $severity, $file, $line);
        }
        set_error_handler("exception_error_handler");

class DatabaseConnect{
    const SERVERNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = ""; 
    const DATABASE = "molto"; 

    // Polaczenie z baza danych (Nie zapominac na koncu o zamknieciu polaczenia)
    public static function connect(){
        try
        {
            $db = mysqli_connect(DatabaseConnect::SERVERNAME, DatabaseConnect::USERNAME, DatabaseConnect::PASSWORD, DatabaseConnect::DATABASE);
            if(mysqli_connect_errno()){
                throw new exception("Database connect error");
            }
            mysqli_query($db, "SET NAMES 'utf8'");
            return $db;
        }
        catch(Exception $e)
        {
            show_error("Nie można połączyć się z bazą danych");
            //echo $e->getMessage();
            exit();
        }
    }
}


?>