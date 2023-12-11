<?php include "log.php" ?>
<!doctype html>
<html lang="es">
    <head>
        <title>Panel de control</title>
        <meta charset="utf">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <main>
            <?php
                include "config.php";


                $peticion = "
                    SELECT * 
                    FROM administradores
                    WHERE 
                    usuario = '".$_POST['usuario']."'
                    AND
                    contrasena = '".$_POST['contrasena']."'
                    ;";

                $resultado = mysqli_query($conexion,$peticion);
                if($fila = mysqli_fetch_assoc($resultado)){
                    echo "
                        <div class='correcto'>V</div>
                        <p>Usuario correcto. Registrando acceso en el sistema. Redirigiendo en 5 segundos...</p>
                        
                    ";
                    echo '<meta http-equiv="refresh" content="5;url=paneldecontrol.php">';
                }else{
                    echo "
                        <div class='incorrecto'>X</div>
                        <p>Usuario incorrecto. Registrando acceso incorrecto en el sistema. Redirigiendo en 5 segundos...</p>
                    ";
                    echo '<meta http-equiv="refresh" content="5;url=index.php">';
                    
                }
            ?>
        </main>
    </body>
</html>
