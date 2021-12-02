<?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

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
    include_once("user.php");
}else{
    echo "Aby dodać ogłoszenia musisz się zalogować";
    return;
}

?>

    <form action="addAnn.php" method="POST" enctype="multipart/form-data">        
        <!-- LISTA KATEGORII-->
        <select id="category" name="category" required>
            <option selected disabled>Wybierz kategorie</option>
            <option value="Motoryzacja">Motoryzacja</option>
            <option value="Elektronika">Elektronika</option>
            <option value="Ubrania">Ubrania</option>
            <option value="Dom">Dom i ogród</option>
            <option value="Nieruchomosci">Nieruchomości</option>
            <option value="Rozrywka">Rozrywka</option>
        </select><br>

        <input type="text" name="title" placeholder="tytuł" maxlength="25" required><br>
        <textarea name="description" placeholder="opis" rows="5" cols="40" maxlength="512"></textarea><br>
        <input type="number" name="value" placeholder="cena" min=0 max=9999999 required><br>
        <label for="file">Wybierz zdjęcia (maks 3)</label>
        <input type="file" id="file" name="img_link[]" accept=".jpg, .jpeg, .png" multiple hidden><br>
        <input type="tel" name="phone" placeholder="numer tel. (xxx-xxx-xxx)" value="<?php echo User::takePhoneNumber($_SESSION['username']); ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" readonly required><br>
        <input type="text" name="location" placeholder="lokacja" maxlength="64" required><br>
        <input type="submit" name="submit" onClick="checkCategory()" value="Dodaj">
    </form>

    <script>
    function checkCategory() {
        if (document.getElementById('category').value == "Wybierz kategorie") {
            alert("Nie wybrano wszystkich opcji");
            document.getElementById('category').style = "background-color: red";
        }
    }
    </script>
</body>
</html>
