<?php 
    session_start();
    include "log.php";
    include "config.php";
    include "inc/funciones.php";
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Panel de control</title>
        <meta charset="utf">
        <link rel="stylesheet" href="css/panel.css">
    </head>
    <body>
        <?php comprobarAcceso(); ?>
        <header>
            <h1>Panel de control</h1>
        </header>
        <main>
            <nav>
                <ul>
                    <?php menuNavegacion($conexion) ?>
                </ul>
            </nav>
            <section>
                <a href="?operacion=nuevo&tabla=<?php echo $_GET['tabla'] ?>" class="botonnuevo">+</a>
                <h3>Editando la tabla: <?php echo $_GET['tabla'] ?></h3>
                
                <div id="contenedor">
                    <?php
                        if(!isset($_GET['operacion'])){
                    ?>
                        <table>
                            <thead>
                                <tr>
                                    <?php mostrarColumnas($conexion) ?>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php mostrarDatos($conexion) ?>
                            </tbody>
                        </table>
                    <?php
                        }else{
                            switch($_GET['operacion']){
                                case "nuevo":
                                    echo "<h4>Nuevo elemento para la tabla: ".$_GET['tabla']."</h4>";
                            }
                        }
                    ?>
                </div>
            </section>
        </main>
    </body>
</html>