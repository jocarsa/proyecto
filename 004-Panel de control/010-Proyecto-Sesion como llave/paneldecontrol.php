<?php 
    session_start();
    include "log.php";
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Panel de control</title>
        <meta charset="utf">
        <link rel="stylesheet" href="css/panel.css">
    </head>
    <body>
        <?php
            if(!isset($_SESSION['usuario'])){
                die("<main><div class='incorrecto'>X</div>Intento incorrecto</main>");
            }
        ?>
        Panel de control
    </body>
</html>