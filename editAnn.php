<?php
    ob_start();
    include_once("user.php");
    include_once("connect.php");
    include_once("announcement.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }


    if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
        $conn = DatabaseConnect::connect();
        $userId = User::userId($_SESSION['username']);
        $cmd = "SELECT * FROM announcement WHERE user_owner=$userId";
        $result = mysqli_query($conn,$cmd);

        if(mysqli_num_rows($result) == 0 ){
            echo '<p><b>Brak danych do wyświetlenia</b></p>';
        }

        
        echo '<div class="editContent">';        
        while($row = mysqli_fetch_row($result)){
                echo '<div class="dashboardEditAnn">';
                echo '<form action="editAnn.php" method="POST">';
                echo '<img src=ann_img/'.$row[5].'>';
                echo '<input type="text" name="titleEdit" value="'.$row[2].'" required>';
                echo '<input type="text" name="titleBeforeEdit" value="'.$row[2].'" hidden>';
                echo '<input type="text" name="categoryEdit" value="'.$row[1].'" required>';
                echo '<textarea name="descriptionEdit" required>'.$row[3].'</textarea>';
                echo '<input type="number" name="valueEdit" value="'.$row[4].'" required>';
                echo '<input type="tel" name="phoneEdit" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" value="'.$row[6].'" required>';
                echo '<button type="submit" name="edit">Edytuj</button>';
                echo '<button type="submit" name="delete">Usuń</button>';
                echo '</form>';
                echo '</div>';
            }
        echo '</div>';

        mysqli_close($conn);
            
    }else{
         echo "<p><b>Aby mieć dostęp do tej skecji należy się zalogowwać</b></p>";
    }

    if(isset($_POST['edit'])){
        $conn = DatabaseConnect::connect();
        $userId = User::userId($_SESSION['username']);
        $titleBeforeEdit = $_POST['titleBeforeEdit'];

        $title = $_POST['titleEdit'];
        $category = $_POST['categoryEdit'];
        $description = $_POST['descriptionEdit'];
        $value = $_POST['valueEdit'];
        $phone = $_POST['phoneEdit'];

        $id = Announcement::getAnnId($userId, $titleBeforeEdit);

        $cmd = "UPDATE `announcement` SET `category` = '$category',`title` = '$title',`description` = '$description',`value` = $value,`contact` = '$phone' WHERE `id`=$id";
        mysqli_query($conn,$cmd);

        mysqli_close($conn);
        header("Location: dashboard.php");

    } elseif(isset($_POST['delete'])){
        $conn = DatabaseConnect::connect();
        $userId = User::userId($_SESSION['username']);
        $titleBeforeEdit = $_POST['titleBeforeEdit'];
        $id = Announcement::getAnnId($userId, $titleBeforeEdit);
        $userId = User::userId($_SESSION['username']);

        $cmd = "DELETE FROM announcement WHERE id=$id";
        mysqli_query($conn,$cmd);
        
        mysqli_close($conn);
        header("Location: dashboard.php");
    }
?>