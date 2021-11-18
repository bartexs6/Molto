<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="style/category.css">
<link rel="stylesheet" href="style/main.css">


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

echo '<div class="mainCat" style="min-height: 90vh;">';

if(isset($_GET["category"]) && !empty($_GET["category"])){

    $category = $_GET["category"];
    if($category == "motoryzacja" || $category == "elektronika" || $category == "ubrania" || $category == "dom" || $category == "nieruchomosci" || $category == "rozrywka"){

        $a = Announcement::getByCategory($category);

        for ($i=0; $i < count($a); $i++) { 
            echo '<div class="randomAnnCategory">';
            echo '<img src="ann_img/'.$a[$i]->img_link.'" onclick="openAnn('.$a[$i]->id.')">';
            echo '<h3 onclick="openAnn('.$a[$i]->id.')" onclick="openAnn('.$a[$i]->id.')">'.$a[$i]->title.'</h3>';
            echo '<p>'.$a[$i]->date.'</p>';
            echo '<p>'.$a[$i]->value.' PLN</p>';
            echo '<p>'.$a[$i]->location.'</p>';
            echo '<p><button class="heart_btn" onclick="addToFav(this)"><span id="icon"><i class="far fa-heart"></i></span></button></p>';
            echo '</div>';
        }
        
    }
}

echo '</div>';

?>


<script>

let clicked = false;
function addToFav(heartIcon){
    if (!clicked) {
        clicked = true;
        heartIcon.innerHTML = `<i class="fas fa-heart"></i>`;
    } else {
        clicked = false;
        heartIcon.innerHTML = `<i class="far fa-heart"></i>`;
    }
}

</script>

<?php
        Page::generateFooter();
?>
