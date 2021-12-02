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
            <button class="tab-btn" data-for-tab="1" onclick="goHome()">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Powrót</span>
            </button>

            <button class="tab-btn" data-for-tab="2">
                <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                </span>
                <span class="title">Konto</span>
            </button>

            <button class="tab-btn tab-btn-active" data-for-tab="3">
                <span class="icon">
                    <ion-icon name="search-outline"></ion-icon>
                </span>
                <span class="title">Dodaj</span>
            </button>

            <button class="tab-btn" data-for-tab="4">
                <span class="icon">
                    <ion-icon name="cart-outline"></ion-icon>
                </span>
                <span class="title">Twoje</span>
            </button>

            <button class="tab-btn" data-for-tab="5" onclick="logout()">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Wyloguj się</span>
            </button>

        </div>

        <div class="content">
            <!--MENU-->
            <div class="tab-content" data-tab="1">
                <p>Przechodzenie do menu<p>
            </div>

            <!--KONTO-->
            <div class="tab-content tab-content-active" data-tab="2">
            <div class="logo">
                    <img src="style/LOGO.png" alt="logo" height="200" width="auto">
                </div>
                <div class="logreg">
            <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){
                    include_once("user.php");
                    include_once("connect.php");

                    $conn = DatabaseConnect::connect();
                    $userId = User::userId($_SESSION['username']);
                    $cmd = "SELECT * FROM user WHERE id=$userId";
                    $result = mysqli_query($conn,$cmd);
                    $row = mysqli_fetch_row($result);

                    echo '<div class="accountContent">';
                        //Lewy blok sekcji KONTO
                        echo '<div class="leftContent">';
                        echo '<span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>';
                        echo '<span>'.$_SESSION['username'].'</span>';
                        echo '</div>';
                        //Prawy blok sekcji konto
                        echo '<div class="rightContent">';
                        echo '<form action="accountEdit.php" method="POST">';

                            echo '<div class="accountInf">';
                                echo '<label for="nick">nick:</label>';
                                echo '<input type="text" name="nick" value="'.$_SESSION['username'].'" required>';
                            echo '</div>';

                            echo '<div class="accountInf">';
                                echo '<label for="email">e-mail:</label>';
                                echo '<input type="email" name="email" value="'.$row[3].'" required>';
                            echo '</div>';

                            echo '<div class="accountInf">';
                                echo '<label for="phone">nr. telefonu:</label>';
                                echo '<input type="tel" name="phone" value="'.User::takePhoneNumber($_SESSION['username']).'" required>';
                            echo '</div>';

                            echo '<div class="accountInf">';
                                echo '<label for="password">hasło:</label>';
                                echo '<input type="password" name="password" value="'.$row[2].'" required>';
                            echo '</div>';

                        echo '<div class="interractionAcc">';
                            echo '<button type="submit" name="editAccount">Edytuj konto</button>';
                            #echo '<button type="submit" name="deleteAccount">Usuń konto</button>';
                        echo '</div>';
                        
                        echo '</form>';
                        echo '</div>';
                    echo '</div>';
                    mysqli_close($conn);
                }else{
                    echo '                    <div class="login">
                    <form action="login.php" method="POST">
                        <input type="text" name="login_nick" placeholder="nick" required>
                        <input type="password" name="login_password" placeholder="hasło" required>
                        <button type="submit" name="login_submit">Zaloguj się</button>
                    </form>
                </div>
                <div class="line"></div>
                <div class="register">
                    <form action="login.php" method="POST">
                        <input type="text" name="reg_nick" pattern="[A-Za-z]{2,}" placeholder="nick" required>
                        <input type="tel" name="reg_phone" placeholder="numer tel.(xxx-xxx-xxx)"
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" required>
                        <input type="email" name="reg_email" placeholder="email" required>
                        <input type="password" name="reg_password" placeholder="hasło" required>
                        <button type="submit" name="reg_submit">Zarejestruj się</button>
                    </form>
                </div>';
                }
            ?>
                </div>
            </div>

            <!--OGŁOSZENIA-->
            <div class="tab-content" data-tab="3">
                <?php
                    include "addAnnForm.php";
                ?>
            </div>

            <!--TWOJE-->
            <div class="tab-content" data-tab="4">
                <?php
                include_once 'editAnn.php';
                ?>
            </div>

            <!--WYLOGUJ SIĘ-->
            <div class="tab-content" data-tab="5">
                <p><b>Wylogowywanie powiodło się</b></p>
            </div>

        </div>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        //AKTYWNE OKNA DASHBOARD'U
        function changeTabs() {
            document.querySelectorAll('.tab-btn').forEach(button => {
                button.addEventListener('click', () => {

                    const navigation = button.parentElement;
                    const container = navigation.parentElement;
                    const tabNumber = button.dataset.forTab;
                    const tabActivate = container.querySelector(`.tab-content[data-tab="${tabNumber}"]`)

                    if(tabNumber == 5){
                        location.assign("logout.php");
                    }

                    navigation.querySelectorAll('.tab-btn').forEach(button => {
                        button.classList.remove('tab-btn-active')
                    })
                    container.querySelectorAll('.tab-content').forEach(tab => {
                        tab.classList.remove('tab-content-active')
                    })
                    button.classList.add('tab-btn-active')
                    tabActivate.classList.add('tab-content-active')
                })
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            changeTabs();
        })
    </script>

    <script>
        function goHome(){
            location.assign('index.php');
        }
    </script>
</body>

</html>