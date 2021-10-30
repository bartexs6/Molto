<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molto</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    
    <nav>
        <div class="logo">
            <img src="" alt="logo">
        </div>
        
        <div class="navigation">
            <ul>
                <li><a href="#main">Główna</a></li>
                <li><a href="addAnn.html">Dodaj ogłoszenie</a></li>
                <li><a href="#account">Konto</a></li> 
            </ul>
        </div>

    </nav>

    <main>
        
        <!--SEKCJA WYSZUKIWANIA PRZEDMIOTU--> 
        <section class="searching_section">
            
            <div class="search_field">
                <form action="search_handling.php">
                    <input type="text" name="search_value" placeholder="podaj nazwe przedmiotu">         
            </div>

            <div class="button_field">
                <input type="button" name="szukaj" value="Szukaj!">
                </form>
            </div>

        </section>

        <!--SEKCJA KATEGORII-->
        <section class="categories">

            
        </section>

    </main>


    <footer>
        <div class="socials">      
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>  
        </div>
    </footer>



</body>
</html>
