<?php
include("connect.php");
include("announcement.php");

//$conn = databaseConnect::connect();

//$cmd = "SELECT * FROM user";
//$result = mysqli_query($conn, $cmd);

//Announcement::addAnnouncement("motoryzacja","asdsad","csotam",122,"/brak.png", "asfdfds", "vbvbvb", date("Y-m-d H:i:s"), 1);

$a = Announcement::getById(1);
echo $a->category . "|||" . $a->title . "|||" . $a->description . "|||" .$a->date;
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

?>