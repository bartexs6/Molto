<?php
session_start();
include "connect.php";
include "announcement.php";

if (isset($_POST['submit']))
{
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $value = $_POST['value'];
    $img_list = array();

for ($i=0; $i < count($_FILES['img_link']['name']); $i++) { 
  
    $img_link = $_FILES['img_link']['name'][$i];
    $img_link = substr($_FILES['img_link']['name'][$i], 10);

    $destdir = 'ann_img/';
    $img=file_get_contents($_FILES['img_link']['tmp_name'][$i]);
    file_put_contents($destdir.substr($img_link, strrpos($img_link,'/')), $img);

    array_push($img_list, $img_link);
}
    

    $contact = $_POST['phone'];
    $location = $_POST['location'];
    $date = date("Y-m-d H:i:s");


    $user_owner = $_SESSION['id'];

    print_r($img_list);

    Announcement::addAnnouncement($category, $title, $description, $value, $img_list[0], $contact, $location, $date, $user_owner, $img_list);

}

?>