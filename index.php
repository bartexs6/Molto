<!--<div id="a">
<div class="randomAnn">
    <img src="ann_img/brak.jpg">
    <h3>Opel Corsa C - 2003 rocznik</h3>
    <p>2021-10-28</p>
    <p>12 zł</p>
</div>
<div class="randomAnn">
    <img src="ann_img/brak.jpg">
    <h3>Title</h3>
    <p>2021-09-09</p>
    <p>12 zł</p>
</div>
</div>-->
<div id="a">
<?php
include("connect.php");
include("user.php");
include("announcement.php");

echo '<link href="styl.css" rel="stylesheet">';

User::login("ada", "test");
if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
    echo "Witaj " . $_SESSION['username'];

}


//$conn = databaseConnect::connect();

//$cmd = "SELECT * FROM user";
//$result = mysqli_query($conn, $cmd);

//Announcement::addAnnouncement("motoryzacja","asdsad","csotam",122,"/brak.png", "asfdfds", "vbvbvb", date("Y-m-d H:i:s"), 1);

for ($i=1; $i < 6; $i++) { 
    $a = Announcement::getRandom();
    echo '<div class="randomAnn">';
    echo '<img src="ann_img/'.$a->img_link.'">';
    echo '<h3>'.$a->title.'</h3>';
    echo '<p>'.$a->date.'</p>';
    echo '<p>'.$a->value.' zł</p>';
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
</div>