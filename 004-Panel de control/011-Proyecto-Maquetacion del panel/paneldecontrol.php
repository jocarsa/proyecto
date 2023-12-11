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
                die("<aside><div class='incorrecto'>X</div>Intento incorrecto</aside>");
            }
        ?>
        <header>
            <h1>Panel de control</h1>
        </header>
        <main>
            <nav>.</nav>
            <section>.</section>
        </main>
    </body>
</html>