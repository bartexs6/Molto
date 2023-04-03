
<?php
set_exception_handler(function ($ex) {
    error_log($ex, 0);

	show_error("Nieznany błąd");
});

if(isset($_GET["error"])){
    echo '<!DOCTYPE html>
    <html lang="pl">
    <head>
        <title>Ups...</title>
        <style>@import url("https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap"); body {background-color: #282828; background-repeat:no-repeat; object-fit: cover; background-size: 100vw 100vh; font-family: "Lato", sans-serif; color: white} h1{font-size: 20vh} h3{font-size: 4vh} #error{margin: auto; display: flex; flex-direction: column; align-items: center;}
        </style>
    </head>
    <body>
        <canvas style="position: fixed">
        </canvas>
        <script>
            var mousePosition = {
                x: 0,
                y: 0
            }

            window.addEventListener("mousemove", function(event){
                mousePosition.x = event.x;
                mousePosition.y = event.y;
            });

            function Sad(x,y,dx,dy){
                this.x = x;
                this.y = y;
                this.dx = dx;
                this.dy = dy;

                    this.create = function(){
                        canvasContent.beginPath();
                        canvasContent.font = "48px Lato";
                        canvasContent.fillText(":(", this.x, this.y);
                        canvasContent.fillStyle = "white";
                        canvasContent.stroke();
                    }

                this.update = function(){
                    if(this.x + 80 > window.innerWidth || this.x - 80 < 0){
                        this.dx = -this.dx;
                    }
                    if(this.y + 80 > window.innerHeight || this.y - 80 < 0){
                        this.dy = -this.dy;
                    }
    
                    this.x += this.dx;
                    this.y += this.dy;
    
                    if(mousePosition.x - this.x < 50 && mousePosition.x - this.x > -50 && mousePosition.y - this.y < 50 && mousePosition.y - this.y > -50)
                    {
                        if((Math.random() * 10) >= 5 ){
                            this.dx += 1;
                        }else{
                            this.dy += 1;
                        }
                    }
                        else if(this.dx > 2){
                            this.dx -= 1;
                    }else if(this.dy > 2){
                        this.dy -= 1;
                }
                        
                    this.create();

                }
            }

            var sadArray = [];

            for (let index = 0; index < 4; index++) {
                sadArray.push(new Sad(Math.random()*window.innerWidth, Math.random()*window.innerHeight, 2, 2));
            }

            var canvas = document.querySelector("canvas");
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            var canvasContent = canvas.getContext("2d");

            function bounce(){
                requestAnimationFrame(bounce);
                canvasContent.clearRect(0,0, window.innerWidth, window.innerHeight);
                
                for (let index = 0; index < sadArray.length; index++) {
                    sadArray[index].update();
                }
            }

            bounce();
        </script>
        <div id="error">
            <h1>UPS... :(</h1>
            <h3>Coś poszło nie tak: '.$_GET["error"].'</h3>
            <h3>Spróbuj ponownie później</h3>
        </div>
    </body>
    </html>';
}

function show_error($text){
    header("Location: error.php?error=" . $text);
}

function unknown_error($exception){
    show_error("Nieznany błąd");
}
?>
