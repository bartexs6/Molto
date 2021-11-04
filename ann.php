<?php
include_once("connect.php");
include_once("announcement.php");

if(!isset($_GET["id"]) || !is_numeric($_GET["id"]) || $_GET["id"] <= 0){
    show_error("Nie można znaleźć ogłoszenia");
}else{
    $id = $_GET["id"];

    try {
        $announcement = Announcement::getById($_GET["id"]);

        echo '<style>img{height: 200px; width: 200px;}</style>';

        echo '<div class="randomAnn">';
        echo '<img src="ann_img/'.$announcement->img_link.'">';
        echo '<h3>'.$announcement->title.'</h3>';
        echo '<p>'.$announcement->date.'</p>';
        echo '<p>'.$announcement->value.' zł</p>';
        echo '</div>';

    } catch (Exception $e) {
        show_error("Wystąpił błąd podczas ładowania ogłoszenia");
    }
}

?>