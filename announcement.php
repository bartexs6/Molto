<?php
class Announcement{

    const MAX_TITLE_LENGTH = 26;
    const MAX_DESCRIPTION_LENGTH = 1025;
    const MAX_IMGLINK_LENGTH = 65;
    const MAX_CONTACT_LENGTH = 65;
    const MAX_LOCATION_LENGTH = 65;

    public $id;
    public $category;
    public $title;
    public $description;
    public $value;
    public $img_link;
    public $contact;
    public $location;
    public $date;
    public $user_owner;
    public $img_id;

    // NIE UZYWAC KONSTRUKTORA (Od tego jest addAnnouncement)
    function __construct($id, $category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner, $img_id) {
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
        $this->img_id = $img_id;
      }


    // Dodawanie ogloszen do bazy
    public static function addAnnouncement($category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner, $img_list){
        if(empty($category) || empty($title) || empty($description) || empty($value) || empty($img_link) || empty($contact) || empty($location) || empty($date) || empty($user_owner) || empty($img_list)){
            show_error("Problem z dodaniem ogłoszenia");
            throw new Exception("Empty variable(s)", 1);
        }

        if(!Announcement::validateDate($date)){
            show_error("Problem z datą ogłoszenia");
            throw new Exception("Date error", 1);
        }

        if($value < 0 || $value > 9999999){
            show_error("Błąd z wartością wystawianego ogłoszenia");
            throw new Exception("Value error", 1);
        }

        

        if(strlen($title) < Announcement::MAX_TITLE_LENGTH && strlen($description) < Announcement::MAX_DESCRIPTION_LENGTH && strlen($img_link) < Announcement::MAX_IMGLINK_LENGTH && strlen($contact) < Announcement::MAX_CONTACT_LENGTH && strlen($location) < Announcement::MAX_LOCATION_LENGTH){
            $conn = DatabaseConnect::connect();

            $cmd = mysqli_prepare($conn, "INSERT INTO `imgdata`(`first_img_link`, `second_img_link`, `third_img_link`) VALUES (?,?,?)");
    
            $first_img = $img_link;
            $second_img = $img_list[1] ?? "NULL";
            $third_img = $img_list[2] ?? "NULL";

            mysqli_stmt_bind_param($cmd, "sss", $first_img, $second_img, $third_img);
            mysqli_stmt_execute($cmd);

            
            $cmd = mysqli_prepare($conn, "INSERT INTO `announcement`(`category`, `title`, `description`, `value`, `img_link`, `contact`, `location`, `date`, `user_owner`, `img_id`) VALUES (?,?,?,?,?,?,?,?,?,?)");
            
            $last_id = mysqli_insert_id($conn);

            mysqli_stmt_bind_param($cmd, "sssissssii", $category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner, $last_id);
            mysqli_stmt_execute($cmd);
    
            $getResult = mysqli_stmt_get_result($cmd);
    
            mysqli_close($conn);
    
            //return new Announcement($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
        }else{
            show_error("Problem z dodaniem ogłoszenia");
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
            return new Announcement($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10]);
        }else{
            throw new Exception("Cannot find announcement", 1);
        }
    }

    // Pobieranie losowego ogloszenia (Przykladowe uzycie: Strona glowna)
    public static function getRandom(int $amount = 1){
        $conn = DatabaseConnect::connect();

        $limit = mysqli_query($conn, "SELECT COUNT(*) FROM announcement");
        $limit = mysqli_fetch_row($limit)[0];

        mysqli_close($conn);

        $list = array();
        $usedId = array();

        for ($i=0; $i < $amount; $i++) { 

            if($amount > $limit){
                echo "Wystąpił błąd. Nie można pobrać ogłoszeń.";
                exit();
            }

            $randomId = rand(1, $limit);

            if(in_array($randomId, $usedId)){
                $i--;
                continue;
            }

            array_push($usedId, $randomId);
            try {
                array_push($list, Announcement::getById($randomId));
            } catch (Exception $e) {
                echo "Wystąpił błąd. Nie można pobrać ogłoszeń.";
                exit();
            }
        }
        
        if(count($list) == 1){
            return $list[0];
        }else{
            return $list;
        }
    }

        // Pobieranie ogloszen poprzez kategorie
        public static function getByCategory(string $category){
            $conn = DatabaseConnect::connect();

            $limit = mysqli_prepare($conn, "SELECT COUNT(*) FROM announcement WHERE category=?");
            mysqli_stmt_bind_param($limit, "s", $category);
            mysqli_stmt_execute($limit);

            $getResult = mysqli_stmt_get_result($limit);

            $limit = mysqli_fetch_row($getResult)[0];

            $cmd = mysqli_prepare($conn, "SELECT id FROM announcement WHERE category=?");
    
            mysqli_stmt_bind_param($cmd, "s", $category);
            mysqli_stmt_execute($cmd);
    
            $getResult = mysqli_stmt_get_result($cmd);

            $annId = array();
            while($row = mysqli_fetch_row($getResult))
            {
                array_push($annId, $row[0]);
            }
    
            mysqli_close($conn);
            $list = array();
    
            foreach ($annId as $ann) {
                $announcement = Announcement::getById($ann);
                array_push($list, $announcement);
            }

            if(isset($list) && isset($list) != 0){
                return $list;
            }else{
                throw new Exception("Cannot find announcement", 1);
            }
        }

    // Pobieranie nazwy uzytkownika po id ogloszenia
    public static function getUserById(int $id){
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT username FROM user WHERE id=?");

        mysqli_stmt_bind_param($cmd, "i", $id);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);

        mysqli_close($conn);

        if(isset($row)){
            return $row[0];
        }else{
            throw new Exception("Cannot find announcement", 1);
        }
    }
   
    // Pobieranie zdjec oglosznia
    public static function getImgById(int $id){
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT first_img_link,second_img_link,third_img_link FROM imgdata WHERE id=?");

        mysqli_stmt_bind_param($cmd, "i", $id);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);

        mysqli_close($conn);

        if(isset($row)){
            return $row;
        }else{
            throw new Exception("Cannot find announcement", 1);
        }
    }
    
    public static function getAnnId(int $user_owner, string $title){
        $conn = DatabaseConnect::connect();
        $cmd = mysqli_prepare($conn, "SELECT id FROM announcement WHERE user_owner=? and title=?");

        mysqli_stmt_bind_param($cmd, "is", $user_owner, $title);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);

        mysqli_close($conn);

        if(isset($row)){
            return $row[0];
        }else{
            throw new Exception("Cannot find announcement", 1);
        }
    }
}
?>
