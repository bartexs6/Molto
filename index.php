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
if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
    echo "Witaj " . $_SESSION['username'];

}


//$conn = databaseConnect::connect();

//$cmd = "SELECT * FROM user";
//$result = mysqli_query($conn, $cmd);

//Announcement::addAnnouncement("motoryzacja","asdsad","csotam",122,"/brak.png", "asfdfds", "vbvbvb", date("Y-m-d H:i:s"), 1);


    $a = Announcement::getRandom(6);
for ($i=0; $i < 6; $i++) { 
    echo '<div class="randomAnn">';
    echo '<img src="ann_img/'.$a[$i]->img_link.'">';
    echo '<h3>'.$a[$i]->title.'</h3>';
    echo '<p>'.$a[$i]->date.'</p>';
    echo '<p>'.$a[$i]->value.' zł</p>';
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


    <footer>
        <div class="socials">      
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>  
        </div>
    </footer>



</body>
</html>
