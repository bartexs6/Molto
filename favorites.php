<?php
    include_once("user.php");
    include_once("connect.php");
    include_once("announcement.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }


    if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
        $conn = DatabaseConnect::connect();
        $userId = User::userId($_SESSION['username']);
        $cmd =  mysqli_prepare($conn,"SELECT favorites FROM user WHERE id=?");

        mysqli_stmt_bind_param($cmd, "i", $userId);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);

        if($row[0] == NULL ){
            echo '<p><b>Brak danych do wyświetlenia</b></p>';
        }

        echo $row[0];

        $ids = explode(",",$row[0]);
        foreach($ids as $id){
            if($id != NULL){
                $announcement = Announcement::getById($id);
	            echo $announcement->title."\n";
                echo '<div class="dashboardEditAnn">';
                echo '<form action="editAnn.php" method="POST">';
                    echo '<img src=ann_img/'.$announcement->img_link.'>';
                    echo '<input type="text" name="titleEdit" value="'.$announcement->title.'" required>';
                    echo '<input type="text" name="categoryEdit" value="'.$announcement->category.'" required>';
                    echo '<button type="submit" name="delete">Usuń z ulubionych</button>';
                    echo '</form>';
                echo '</div>';
            }
        }

        mysqli_close($conn);
        echo '<div class="editContent">'; 

        echo '</div>';
        
    }else{
         echo "<p><b>Aby mieć dostęp do tej skecji należy się zalogowwać</b></p>";
    }
?>