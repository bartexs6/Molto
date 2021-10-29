<?php
class Announcement{

    const MAX_TITLE_LENGTH = 21;
    const MAX_DESCRIPTION_LENGTH = 33;
    const MAX_IMGLINK_LENGTH = 65;
    const MAX_CONTACT_LENGTH = 65;
    const MAX_LOCATION_LENGTH = 65;

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

    // NIE UZYWAC KONSTRUKTORA (Od tego jest addAnnouncement)
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


    // Dodawanie ogloszen do bazy
    public static function addAnnouncement($category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner){
        if(empty($category) || empty($title) || empty($description) || empty($value) || empty($img_link) || empty($contact) || empty($location) || empty($date) || empty($user_owner)){
            throw new Exception("Empty variable(s)", 1);
        }

        if(!Announcement::validateDate($date)){
            throw new Exception("Date error", 1);
        }

        if(strlen($title) < Announcement::MAX_TITLE_LENGTH && strlen($description) < Announcement::MAX_DESCRIPTION_LENGTH && strlen($img_link) < Announcement::MAX_IMGLINK_LENGTH && strlen($contact) < Announcement::MAX_CONTACT_LENGTH && strlen($location) < Announcement::MAX_LOCATION_LENGTH){
            $conn = DatabaseConnect::connect();
            $cmd = mysqli_prepare($conn, "INSERT INTO `announcement`(`category`, `title`, `description`, `value`, `img_link`, `contact`, `location`, `date`, `user_owner`) VALUES (?,?,?,?,?,?,?,?,?)");
    
            mysqli_stmt_bind_param($cmd, "sssissssi", $category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner);
            mysqli_stmt_execute($cmd);
    
            $getResult = mysqli_stmt_get_result($cmd);
    
            mysqli_close($conn);
    
            //return new Announcement($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
        }else{
            throw new Exception("Too long variable(s)", 1);
        }
    }

    // Sprawdzanie daty
    static function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    // Pobieranie ogloszenia poprzez id
    public static function getById(int $id){
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT * FROM announcement WHERE id=?");

        mysqli_stmt_bind_param($cmd, "i", $id);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);

        mysqli_close($conn);

        if(isset($row)){
            return new Announcement($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
        }else{
            throw new Exception("Cannot find announcement", 1);
        }
    }

    // Pobieranie losowego ogloszenia (Przykladowe uzycie: Strona glowna)
    public static function getRandom(){
        $conn = DatabaseConnect::connect();

        $limit = mysqli_query($conn, "SELECT COUNT(*) FROM announcement");
        $limit = mysqli_fetch_row($limit)[0];

        $randomId = rand(1, $limit);

        mysqli_close($conn);

        return Announcement::getById($randomId);
    }
    // INSERT INTO `announcement`(`id`, `category`, `title`, `description`, `value`, `img_link`, `contact`, `location`, `date`, `user_owner`) VALUES (null,"elektronika","asda","dgfdsgd",13,"/brak.png","asdsadad","dsfdsfdsf","2021-10-10",1)
}
?>