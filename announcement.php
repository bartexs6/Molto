<?php
class Announcement{

    private $id;
    public $category;
    public $title;
    public $description;
    public $value;
    public $img_link;
    public $contact;
    public $location;
    public $date;
    public $user_owner;

    function __construct($id, $category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner) {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->description = $description;
        $this->value = $value;
        $this->img_link = $img_link;
        $this->contact = $contact;
        $this->location = $location;
        $this->date = $date;
        $this->user_owner = $user_owner;
      }

    public static function getById(int $id){
        $conn = databaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT * FROM announcement WHERE id=?");

        mysqli_stmt_bind_param($cmd, "i", $id);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);

        mysqli_close($conn);

        return new Announcement($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);

    }

}
?>