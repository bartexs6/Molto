<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molto - dodaj ogłoszenie</title>
</head>

<body>

<?php

if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
    echo "Dodajesz ogloszenie jako: " . $_SESSION['username'];

}

?>

    <form action="addAnn.php" method="POST" enctype="multipart/form-data">        
        <!-- LISTA KATEGORII-->
        <select name="category">
            <option value="Motoryzacja">Motoryzacja</option>
            <option value="Elektronika">Elektronika</option>
            <option value="Ubrania">Ubrania</option>
            <option value="Dom">Dom</option>
            <option value="Nieruchomości">Nieruchomości</option>
            <option value="Rozrywka">Rozrywka</option>
        </select><br>

        <input type="text" name="title" placeholder="tytuł" required><br>
        <textarea name="description" placeholder="opis" rows="5" cols="40"></textarea><br>
        <input type="number" name="value" placeholder="cena" required><br>
        <input type="file" name="img_link" accept=".jpg, .jpeg, .png" multiple><br>
        <input type="tel" name="phone" placeholder="numer tel." pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" required><br>
        <input type="text" name="location" placeholder="lokacja" required><br>
        <input type="submit" name="submit" value="Dodaj!">
    </form>

</body>
</html>
