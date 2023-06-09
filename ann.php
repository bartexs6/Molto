<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molto</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/annstyle.css" MEDIA="(min-width: 1250px)">
    <link rel="stylesheet" href="style/annstylephone.css" MEDIA="(max-width: 1249px)">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    
<?php
        include_once("page.php");
        Page::generateHeader();
    ?>
    <main>
<?php
include_once("connect.php");
include_once("announcement.php");
include_once("user.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();

    if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
        $userId = User::userId($_SESSION['username']);
    }else{
        $userId = NULL;
    }
}

if(!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] <= 0){
    show_error("Nie można znaleźć ogłoszenia");
}else{
    $id = $_GET["id"];

    try {
        $announcement = Announcement::getById($_GET["id"]);

        echo '<div class="annNavBack">
                <p><a href="index.php">&lt; Wroc</a></p>
                    <p><a href="index.php">Strona główna</a> / <a href="category.php?category='.$announcement->category.'">'.$announcement->category.'</a> / '.htmlspecialchars($announcement->title).'</p>
                </div>
            <div class="middleContent">
            <div class="leftBlock">
                <div class="annInfo">
                    <h2>'.htmlspecialchars($announcement->title).'</h2>
                    <p>'.htmlspecialchars($announcement->location)." ".$announcement->date.'</p>
                    <h2><i class="fas fa-shopping-cart"></i> '.$announcement->value.' zł</h2>
                </div>
                <div class="annButtons">
                    <p><a href="action.php?id_favorite='.$announcement->id.'&id_user='.$userId.'"><i class="far fa-plus-square"></i> Dodaj do ulubionych</a></p>
                    <p><a href="action.php?id='.$announcement->id.'"><i class="far fa-flag"></i> Zgłoś</a></p>
                </div>
            <div class="annContact">
                <div class="userProfil">
                    <h2><i class="far fa-user-circle"></i></h2><div><h2>'.Announcement::getUserById($announcement->user_owner).'</h2><p style="cursor: pointer" onclick="show_phone_number()">Pokaż numer telefonu</p></div>
                </div>
                <div class="phone">
                    <div><h2 id="phone_number">+48 XXX XXX XXX</h2></div>
                </div>
                </div>
            </div>
            <div class="rightBlock">
            <div class="imgColumn">';
        for ($i=0; $i < 3; $i++) { 
            if(Announcement::getImgById($announcement->img_id)[$i] != "NULL"){
                echo '<img src="ann_img/'.Announcement::getImgById($announcement->img_id)[$i].'" alt="Announcement image">';
            }
        }?>

    <script>

        function show_phone_number(){
            document.getElementById("phone_number").innerHTML = "+48 <?php echo User::takePhoneNumber(Announcement::getUserById($announcement->user_owner)) ?>"; 
        }

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
        if(current_img < max_img_id - 1){
            document.getElementById("main_img").src = "ann_img/" + img_list[++current_img] + ""; 
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
        echo '</div>
                <div class="mainImg">
                <i class="fas fa-chevron-left" onclick="previous_img()"></i>
                <img src="ann_img/'.$announcement->img_link.'" id="main_img" alt="Announcement image">
                <i class="fas fa-chevron-right" onclick="next_img()"></i>
                </div>
            </div>
        </div>';

    } catch (Exception $e) {
       show_error("Wystąpił błąd podczas ładowania ogłoszenia");
    }
}

?>
</main>
<section>
    <div id="description">
        <h2>Opis</h2>
        <p> <?php echo htmlspecialchars("$announcement->description") ?></p>
    </div>
</section>

<?php
Page::generateFooter();
?>

</body>
</html>