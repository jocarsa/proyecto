<?php 
    session_start();
    include "log.php";
    include "config.php";
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
            <nav>
                <ul>
                    <?php
                        $peticion = "SHOW TABLES;";
                        $resultado = mysqli_query($conexion,$peticion);
                        while($fila = mysqli_fetch_assoc($resultado)){
                            echo "
                                <li>
                                    <a href='?tabla=".$fila['Tables_in_proyecto']."'>
                                        ".$fila['Tables_in_proyecto']."
                                    </a>
                                </li>
                            ";
                        }
                    ?>
                </ul>
            </nav>
            <section>
                <div id="contenedor">
                    <table>
                        <thead>
                            <tr>
                                <th>Uno</th>
                                <th>Dos</th>
                                <th>Tres</th>
                                <th>Cuatro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Uno</td>
                                <td>Dos</td>
                                <td>Tres</td>
                                <td>Cuatro</td>
                            </tr>
                            <tr>
                                <td>Uno</td>
                                <td>Dos</td>
                                <td>Tres</td>
                                <td>Cuatro</td>
                            </tr>
                            <tr>
                                <td>Uno</td>
                                <td>Dos</td>
                                <td>Tres</td>
                                <td>Cuatro</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </body>
</html>