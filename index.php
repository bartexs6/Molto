<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molto</title>
    <link rel="stylesheet" href="style/main.css" MEDIA="(min-width: 1450px)">
    <link rel="stylesheet" href="style/indexphone.css" MEDIA="(max-width: 1449px)">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <?php
        include_once("page.php");
        Page::generateHeader();
    ?>
    <script>
    function openAnn(id){
        location.assign("ann.php?id=" + id);
    }
</script>
    <main>
        
        <!--SEKCJA WYSZUKIWANIA PRZEDMIOTU--> 
        <div class="search">
            <form action="search.php" method="POST">

                <div class="input">
                    <input type="text" placeholder="Szukaj" id="input_search" name="search_field">
                </div>
                
                <div class="logo_search">
                    <button type="submit" name="submit_search"><i class="fa fa-search"></i></button>
                </div>
                
            </form>
        </div>

            
        <!--SEKCJA KATEGORII-->
        <section class="categories">
            <div class="topic">Kategorie</div>
            <div class="ctg">
                <div class="c1">
                    <a href="category.php?category=motoryzacja">
                        <img src="vizualization/moto.png" alt="moto" width="100" height="100">
                        <p>Motoryzacja</p>
                    </a>
                </div>
                
                <div class="c2">
                    <a href="category.php?category=nieruchomosci">
                        <img src="vizualization/nieruchmosc.png" alt="nieruchmosc" width="100" height="100">
                        <p>Nieruchomosci</p>
                    </a>
                </div>

                <div class="c3">
                    <a href="category.php?category=elektronika">
                        <img src="vizualization/phone.png" alt="phone" width="100" height="100">
                        <p>Elektronika</p>
                    </a>
                </div>

                <div class="c4">
                <a href="category.php?category=rozrywka">
                        <img src="vizualization/piła.png" alt="pila" width="100" height="100">
                        <p>Rozrywka</p>
                    </a>
                </div>

                <div class="c5">
                <a href="category.php?category=dom">
                        <img src="vizualization/domogrod.png" alt="domogrod" width="100" height="100">
                        <p>Dom i ogród</p>
                    </a>
                </div>

                <div class="c6">
                <a href="category.php?category=ubrania">
                        <img src="vizualization/ubrania.png" alt="ubrania" width="100" height="100">
                        <p>Ubrania</p>
                    </a>
                </div>
            </div>
        </section>
    
    
        <!--SEKCJA LOSOWYCH OGŁOSSZEŃ-->
        <section class="random">

        <?php
include_once("connect.php");
include_once("user.php");
include_once("announcement.php");
include_once("error.php");

echo '<link href="style/styl.css" rel="stylesheet">';

/*if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
    echo "Witaj " . $_SESSION['username'];

}*/


//$conn = databaseConnect::connect();

//$cmd = "SELECT * FROM user";
//$result = mysqli_query($conn, $cmd);

//Announcement::addAnnouncement("motoryzacja","asdsad","csotam",122,"/brak.png", "asfdfds", "vbvbvb", date("Y-m-d H:i:s"), 1);


    $a = Announcement::getRandom(8);
for ($i=0; $i < count($a); $i++) { 
    echo '<div class="randomAnn" onclick="openAnn('.$a[$i]->id.')">
    <div class="annImg">
    <div class="leftBorder"></div>';
    echo '<img src="ann_img/'.$a[$i]->img_link.'">
    <div class="bottomBorder"></div>
    </div>';
    echo '<h3  onclick="openAnn('.$a[$i]->id.')">'.$a[$i]->title.'</h3>
    <div class="annImgInfo">';
    echo '<p>'.$a[$i]->date.'</p>';
    echo '<p>'.$a[$i]->value.' zł</p>
    </div>';
    //echo '<button class="heart_btn" onclick="addToFav(this)"><span id="icon"><i class="far fa-heart"></i></span></button>';
    echo '</div>';
}

/*
$a = Announcement::getById(1);
echo $a->category . "|||" . $a->title . "|||" . $a->description . "|||" .$a->date . "<img src=ann_img/".$a->img_link.">";
echo "<br><br>";
$a = Announcement::getById(2);
echo $a->category . "|||" . $a->title . "|||" . $a->description . "|||" .$a->date;
echo "<br><br>";
$a = Announcement::getById(3);
echo $a->category . "|||" . $a->title . "|||" . $a->description . "|||" .$a->date;
echo "<br><br>";
$a = Announcement::getById(4);
echo $a->category . "|||" . $a->title . "|||" . $a->description . "|||" .$a->date;
echo "<br><br>";
$a = Announcement::getById(5);
echo $a->category . "|||" . $a->title . "|||" . $a->description . "|||" .$a->date;
echo "<br><br>";
$a = Announcement::getById(6);
echo $a->category . "|||" . $a->title . "|||" . $a->description . "|||" .$a->date;
*/


?>
            
        </section>

    </main>

<?php
Page::generateFooter();
?>


</body>


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

</html>
