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
    $img_link = $_FILES['img_link']['name'];

    $img_link = substr($_FILES['img_link']['name'], 10);

    $destdir = 'ann_img/';
    $img=file_get_contents($_FILES['img_link']['name']);
    file_put_contents($destdir.substr($img_link, strrpos($img_link,'/')), $img);

    $contact = $_POST['phone'];
    $location = $_POST['location'];
    $date = date("Y-m-d H:i:s");


    $user_owner = $_SESSION['id'];

    Announcement::addAnnouncement($category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner);

}

?>