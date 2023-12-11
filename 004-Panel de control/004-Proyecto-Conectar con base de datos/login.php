<?php
    include "config.php";

    echo "usuario: ".$_POST['usuario'];
    echo "<br>";
    echo "contraseña: ".$_POST['contrasena'];

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
        echo "El usuario es correcto";
    }else{
        echo "El usuario no es correcto";
    }
?>
