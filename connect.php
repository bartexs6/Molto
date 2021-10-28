<?php
class DatabaseConnect{

    const SERVERNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = ""; 
    const DATABASE = "molto"; 

    public static function connect(){
        try
        {
            if ($db = mysqli_connect(DatabaseConnect::SERVERNAME, DatabaseConnect::USERNAME, DatabaseConnect::PASSWORD, DatabaseConnect::DATABASE))
            {
                return $db;
            }
            else
            {
                throw new Exception('Unable to connect');
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
}


?>