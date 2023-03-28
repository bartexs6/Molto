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

        if(isset($_POST["id"])){
            $cmd =  mysqli_prepare($conn,"SELECT favorites FROM user WHERE id=?");

            mysqli_stmt_bind_param($cmd, "i", $userId);
            mysqli_stmt_execute($cmd);

            $getResult = mysqli_stmt_get_result($cmd);

            $row = mysqli_fetch_row($getResult);
            $ids = explode(",",$row[0]);
            $id = $_POST["id"];

            foreach($ids as $index=>$idAnn){
                if($idAnn != NULL && $idAnn == $id){
                    unset($ids[$index]);
                }
            }

            $ids = implode(",", $ids);

            $cmd =  mysqli_prepare($conn,"UPDATE user SET favorites = ? WHERE id = ?");

            mysqli_stmt_bind_param($cmd, "si", $ids, $userId);
            mysqli_stmt_execute($cmd);
            header("Location: dashboard.php");
        }

        $cmd =  mysqli_prepare($conn,"SELECT favorites FROM user WHERE id=?");

        mysqli_stmt_bind_param($cmd, "i", $userId);
        mysqli_stmt_execute($cmd);

        $getResult = mysqli_stmt_get_result($cmd);
 
        $row = mysqli_fetch_row($getResult);

        if($row[0] == NULL ){
            echo '<p><b>Brak danych do wyświetlenia</b></p>';
        }

        echo '<div class="editContent">';
        $ids = explode(",",$row[0]);
        foreach($ids as $id){
            if($id != NULL){
                $announcement = Announcement::getById($id);
	            echo $announcement->title."\n";
                echo '<div class="dashboardEditAnn">';
                echo '<form action="favorites.php" method="POST">';
                    echo '<img src=ann_img/'.$announcement->img_link.'>';
                    echo '<p>'.$announcement->title.'</p>';
                    echo '<p>'.$announcement->category.'</p>';
                    echo '<input type="text" name="id" value='.$id.' hidden>';
                    echo '<button type="submit" name="delete">Usuń z ulubionych</button>';
                    echo '</form>';
                echo '</div>';
            }
        }
        echo '</div>';
        mysqli_close($conn);
        
    }else{
         echo "<p><b>Aby mieć dostęp do tej skecji należy się zalogować</b></p>";
    }
?>