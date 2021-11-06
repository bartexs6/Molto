<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molto</title>
    <link rel="stylesheet" href="style/main.css">
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
            <form action="search.php"></form>

                <div class="input">
                    <input type="text" placeholder="Szukaj" id="input_search">
                </div>
                
                <div class="logo_search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
                
            </form>
        </div>
            
        <!--SEKCJA KATEGORII-->
        <section class="categories">
            <div class="topic">Kategorie</div>
            <div class="ctg">
                <div class="c1">
                    <a href="#">
                        <img src="vizualization/moto.png" alt="moto" width="100" height="100">
                        <p>Motoryzacja</p>
                    </a>
                </div>
                
                <div class="c2">
                    <a href="#">
                        <img src="vizualization/nieruchmosc.png" alt="nieruchmosc" width="100" height="100">
                        <p>Motoryzacja</p>
                    </a>
                </div>

                <div class="c3">
                    <a href="#">
                        <img src="vizualization/phone.png" alt="phone" width="100" height="100">
                        <p>Elektronika</p>
                    </a>
                </div>

                <div class="c4">
                <a href="#">
                        <img src="vizualization/piła.png" alt="pila" width="100" height="100">
                        <p>Hobby</p>
                    </a>
                </div>

                <div class="c5">
                <a href="#">
                        <img src="vizualization/domogrod.png" alt="domogrod" width="100" height="100">
                        <p>Dom i ogród</p>
                    </a>
                </div>

                <div class="c6">
                <a href="#">
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

User::login("ada", "test");
/*if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
    echo "Witaj " . $_SESSION['username'];

}*/


//$conn = databaseConnect::connect();

//$cmd = "SELECT * FROM user";
//$result = mysqli_query($conn, $cmd);

//Announcement::addAnnouncement("motoryzacja","asdsad","csotam",122,"/brak.png", "asfdfds", "vbvbvb", date("Y-m-d H:i:s"), 1);


    $a = Announcement::getRandom(8);
for ($i=0; $i < count($a); $i++) { 
    echo '<div class="randomAnn" onclick="openAnn('.$a[$i]->id.')">';
    echo '<img src="ann_img/'.$a[$i]->img_link.'">';
    echo '<h3>'.$a[$i]->title.'</h3>';
    echo '<p>'.$a[$i]->date.'</p>';
    echo '<p>'.$a[$i]->value.' zł</p>';
    echo '<p><ion-icon name="heart-outline"></ion-icon></p>';
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

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>
