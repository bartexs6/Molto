<!doctype html>
<html lane="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/dashboard.css">
</head>

<body>
    <div class="container">
        <div class="navigation">  
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="menu-outline"></ion-icon></span>
                        <span class="title">Menu</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Konto</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Ustawienia</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                        <span class="title">Ogłoszenia</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                        <span class="title">Pomoc</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Wyloguj się</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="dasOption">
            <!--KOTNO-->

            <!--USTAWIENIA-->

            <!--OGŁOSZENIA-->
                <div class="announcements">
                    <?php
                        include "addAnnForm.php";
                    ?>
                </div>
            <!--POMOC-->
        </div>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>