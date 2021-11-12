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
            <button class="tab-btn" data-for-tab="1">
                <span class="icon"><ion-icon name="menu-outline"></ion-icon></span>
                <span class="title">Menu</span>
            </button>
                
            <button class="tab-btn" data-for-tab="2">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class="title">Konto</span>
            </button>
                
            <button class="tab-btn" data-for-tab="3">
                <span class="icon"><ion-icon name="heart-outline"></ion-icon></span>
                <span class="title">Ulubione</span>
            </button>
                
            <button class="tab-btn tab-btn-active" data-for-tab="4">
                <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                <span class="title">Ogłoszenia</span>
            </button>
              
            <button class="tab-btn" data-for-tab="5">
                <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                <span class="title">Pomoc</span>
            </button>
               
            <button class="tab-btn" data-for-tab="6">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="title">Wyloguj się</span>
            </button>
             
        </div>

        <div class="content">
            <!--MENU-->
            <div class="tab-content" data-tab="1">1
            </div>
            <!--KOTNO-->
            <div class="tab-content" data-tab="2">2
            </div>

            <!--ULUBIONE-->
            <div class="tab-content" data-tab="3">3
            </div>
    
            <!--OGŁOSZENIA-->
                <div class="tab-content tab-content-active" data-tab="4">
                    <?php
                        include "addAnnForm.php";
                    ?>
                </div>
            <!--POMOC-->
            <div class="tab-content" data-tab="5">5
            </div>
    
            <!--wYLOGUJ SIĘ-->
            <div class="tab-content" data-tab="6">6
            </div>

        </div>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        //AKTYWNE OKNA DASHBOARD'U
            function changeTabs (){
                document.querySelectorAll('.tab-btn').forEach(button=>{
                    button.addEventListener('click',()=>{  
                        
                    const navigation = button.parentElement;
                    const container = navigation.parentElement;
                    const tabNumber = button.dataset.forTab;
                    const tabActivate = container.querySelector(`.tab-content[data-tab="${tabNumber}"]`)
                        
                    navigation.querySelectorAll('.tab-btn').forEach(button=>{
                        button.classList.remove('tab-btn-active')
                    })
                    container.querySelectorAll('.tab-content').forEach(tab=>{
                        tab.classList.remove('tab-content-active')
                    })
                    button.classList.add('tab-btn-active')
                        tabActivate.classList.add('tab-content-active')
                    })
                })
            }

        document.addEventListener('DOMContentLoaded',()=>{
        changeTabs();
        })
    </script>

</body>

</html>