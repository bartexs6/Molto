<?php

    include_once("page.php");
    Page::generateHeader();

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<link rel="stylesheet" href="style/category.css">
<link rel="stylesheet" href="style/main.css">
<?php
    
    include_once("connect.php");
    include_once("announcement.php");

    echo '<div class="mainCat" style="min-height: calc(100% - 20vh);">';
    if(isset($_POST['submit_search'])){
        $conn = DatabaseConnect::connect();
        $search = mysqli_real_escape_string($conn, $_POST['search_field']);
        $cmd = "SELECT * FROM `announcement` WHERE `category` LIKE '%$search%' OR `title` LIKE '%$search%' OR `description` LIKE '%$search%'";

        $result = mysqli_query($conn, $cmd);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            while($row = mysqli_fetch_assoc($result)){
                echo '<div class="randomAnnCategory">';
                echo '<img src="ann_img/'.$row['img_link'].'" onclick="openAnn('.$row['id'].')">';
                echo '<h3 onclick="openAnn('.$row['id'].')">'.$row['title'].'</h3>';
                echo '<p>'.$row['date'].'</p>';
                echo '<p>'.$row['value'].' zł</p>';
                echo '<p><button class="heart_btn" onclick="addToFav(this)"><span id="icon"><i class="far fa-heart"></i></span></button></p>';
                echo '</div>';
            }
        } else {
            echo 'Przepraszamay ale szukana przez ciebie fraza nie wskazuje na żadne ogłoszenie z bazy.';
        }
    }
    echo '</div>';
    
    Page::generateFooter();


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

function openAnn(id){
        location.assign("ann.php?id=" + id);
    }

</script>