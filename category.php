<?php
        include_once("page.php");
        Page::generateHeader();
    ?>
        <script>
    function openAnn(id){
        location.assign("ann.php?id=" + id);
    }
</script>
<?php

include_once("connect.php");
include_once("announcement.php");


if(isset($_GET["category"]) && !empty($_GET["category"])){

    $category = $_GET["category"];
    if($category == "motoryzacja" || $category == "elektronika" || $category == "ubrania" || $category == "dom" || $category == "nieruchomosci" || $category == "rozrywka"){

        $a = Announcement::getByCategory($category);

        for ($i=0; $i < count($a); $i++) { 
            echo '<div class="randomAnn" onclick="openAnn('.$a[$i]->id.')">';
            echo '<img src="ann_img/'.$a[$i]->img_link.'">';
            echo '<h3>'.$a[$i]->title.'</h3>';
            echo '<p>'.$a[$i]->date.'</p>';
            echo '<p>'.$a[$i]->value.' zł</p>';
            echo '<p><ion-icon name="heart-outline"></ion-icon></p>';
            echo '</div>';
        }
    }
}

?>