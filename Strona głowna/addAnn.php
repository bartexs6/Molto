<?php
include "molto/announcement.php";

if (isset($_POST['submit']))
{
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $value = $_POST['value'];
    $img_link = $_FILES['img_link']['name'];
    $contact = $_POST['phone'];
    $location = $_POST['location'];
    $date = date("Y-m-d H:i:s");
    $user_owner = 1;

    Announcement::addAnnouncement($category, $title, $description, $value, $img_link, $contact, $location, $date, $user_owner);

}

?>