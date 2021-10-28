<?php
include("connect.php");
include("announcement.php");

//$conn = databaseConnect::connect();

//$cmd = "SELECT * FROM user";
//$result = mysqli_query($conn, $cmd);

$a = Announcement::getRandom();

echo $a->title;
?>