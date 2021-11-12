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
    $img_link = pathinfo($_FILES['img_link']['name'][$i]);

    $newname = $_FILES['img_link']['name'][$i]; 
    
    $target = 'ann_img/'.$newname;
    move_uploaded_file( $_FILES['img_link']['tmp_name'][$i], $target);

    array_push($img_list, $_FILES['img_link']['name'][$i]);
}
    

    $contact = $_POST['phone'];
    $location = $_POST['location'];
    $date = date("Y-m-d H:i:s");


    $user_owner = $_SESSION['id'];

    Announcement::addAnnouncement($category, $title, $description, $value, $img_list[0], $contact, $location, $date, $user_owner, $img_list);

    header("Location: index.php");

}

?>