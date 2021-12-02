<?php

class Page{

    public static function generateHeader(){
        echo '<link rel="stylesheet" href="style/page.css">';
        echo '<nav>
        <div class="logo">
            <a href="index.php">
                <img src="style/LOGO.png" alt="logo" width="160" >
            </a>
        </div>
        
        <div class="navigation">
            <ul>
                <li><a href="index.php">Główna</a></li>
                <li><a href="dashboard.php">Dodaj ogłoszenie</a></li>
                <li><a href="dashboard.php">Konto</a></li> 
            </ul>
        </div>
    
    </nav>';
    }

    public static function generateFooter(){
        echo '<footer>
            <div class="socials">      
                <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/molto_industries"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><i class="fab fa-youtube"></i></a>  
            </div>
        </footer>';
    }
}

?>