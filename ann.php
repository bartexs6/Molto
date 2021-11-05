<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molto</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/annstyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    
    <nav>
        <div class="logo">
            <img src="" alt="logo">
        </div>
        
        <div class="navigation">
            <ul>
                <li><a href="#main">Główna</a></li>
                <li><a href="addAnnForm.php">Dodaj ogłoszenie</a></li>
                <li><a href="login.php">Konto</a></li> 
            </ul>
        </div>

    </nav>
    <main>
<?php
include_once("connect.php");
include_once("announcement.php");

if(!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] <= 0){
    show_error("Nie można znaleźć ogłoszenia");
}else{
    $id = $_GET["id"];

    try {
        $announcement = Announcement::getById($_GET["id"]);

        echo '<div class="annNavBack">';
        echo '<p>< Wroc</p>';
        echo '<p><a href="index.php">Strona główna</a> / '.$announcement->category.' / '.$announcement->title.'</p>';
        echo '</div>';
        echo '<div class="middleContent">';
        echo '<div class="leftBlock">';
        echo '<div class="annInfo">';
        echo '<h2>'.$announcement->title.'</h2>';
        echo '<p>'.$announcement->location." ".$announcement->date.'</p>';
        echo '<h2><i class="fas fa-shopping-cart"></i> '.$announcement->value.' zł</h2>';
        echo '</div>';
        echo '<div class="annContact">';
        echo '<div class="userProfil">';
        echo '<h2><i class="far fa-user-circle"></i></h2><div><h2>'.Announcement::getUserById($announcement->user_owner).'</h2><p>Pokaż numer telefonu</p></div>';
        echo '</div>';
        echo '<div class="phone">';
        echo '<div><h2>+48 XXX XXX XXX</h2></div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="rightBlock">';
        echo '<div class="imgColumn">';
        for ($i=0; $i < 3; $i++) { 
            if(Announcement::getImgById($announcement->img_id)[$i] != "NULL"){
                echo '<img src="ann_img/'.Announcement::getImgById($announcement->img_id)[$i].'">';
            }
        }?>

    <script>

    var img_list = [];
    var max_img_id = 0;
    <?php
    for ($i=0; $i < 3; $i++) { 
        if(Announcement::getImgById($announcement->img_id)[$i] != "NULL"){
            echo "max_img_id++;";
            echo 'img_list.push("'.Announcement::getImgById($announcement->img_id)[$i].'");'; 
        }
    }
    ?>
    
    var current_img = 0; 
    function next_img(){ 
        if(current_img < max_img_id){
            document.getElementById("main_img").src = "ann_img/" + img_list[current_img++] + ""; 
        }
    }
    function previous_img(){ 
        if(current_img >= img_list.Lenght){
            current_img=2;
        }
        if(current_img <= 1){
            current_img=1;
        }
        if(current_img <= max_img_id || current_img >= 0){
            document.getElementById("main_img").src = "ann_img/" + img_list[--current_img] + ""; 
        }
    }
    </script>


        <?php
        echo '</div>';
        echo '<div class="mainImg">';
        echo '<i class="fas fa-chevron-left" onclick="previous_img()"></i>';
        echo '<img src="ann_img/'.$announcement->img_link.'" id="main_img">';
        echo '<i class="fas fa-chevron-right" onclick="next_img()"></i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

    } catch (Exception $e) {
        echo $e;
       //show_error("Wystąpił błąd podczas ładowania ogłoszenia");
    }
}

?>
</main>
</body>
</html>