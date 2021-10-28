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


    // Dodawwanie ogloszen do bazy
    public static function addAnnouncement($category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner){

        $conn = databaseConnect::connect();
        $cmd = mysqli_prepare($conn, "INSERT INTO `announcement`(`category`, `title`, `description`, `value`, `img_link`, `contact`, `location`, `date`, `user_owner`) VALUES (?,?,?,?,?,?,?,?,?)");

        mysqli_stmt_bind_param($cmd, "sssissssi", $category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);

        mysqli_close($conn);

        //return new Announcement($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
    }

    // Pobieranie ogloszenia poprzez id
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

    // Pobieranie losowego ogloszenia (Przykladowe uzycie: Strona glowna)
    public static function getRandom(){
        $conn = databaseConnect::connect();

        $limit = mysqli_query($conn, "SELECT COUNT(*) FROM announcement");
        $limit = mysqli_fetch_row($limit)[0];

        $randomId = rand(1, $limit);

        mysqli_close($conn);

        return Announcement::getById($randomId);
    }

    // INSERT INTO `announcement`(`id`, `category`, `title`, `description`, `value`, `img_link`, `contact`, `location`, `date`, `user_owner`) VALUES (null,"elektronika","asda","dgfdsgd",13,"/brak.png","asdsadad","dsfdsfdsf","2021-10-10",1)
}
?>