<?php
   
    function comprobarAcceso(){
        if(!isset($_SESSION['usuario'])){
            die("<aside><div class='incorrecto'>X</div>Intento incorrecto</aside>");
        }
    }
    function menuNavegacion($conexion){
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
    }
    function mostrarColumnas($conexion){
        $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
        $resultado = mysqli_query($conexion,$peticion);
        while($fila = mysqli_fetch_assoc($resultado)){
            echo "
                <th>
                    ".$fila['Field']."
                </th>
            ";
        }
    }
    function mostrarDatos($conexion){
        $peticion = "SELECT * FROM ".$_GET['tabla'].";";
        $resultado = mysqli_query($conexion,$peticion);
        while($fila = mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            foreach($fila as $campo){
                echo "
                    <td>
                        ".$campo."
                    </td>
                ";
            }
            echo "</tr>";
        }
    }
    function insertarRegistro($conexion){
        $consulta = "INSERT INTO ".$_GET['tabla']." VALUES (NULL,";
        foreach($_POST as $columna=>$campo){
            if($columna != "Identificador"){
                $consulta .= "'".$campo."',";
            }
        }
        $consulta = substr($consulta,0,-1);
        $consulta .= ")";
        mysqli_query($conexion,$consulta);
    }
    function formularioInsertar($conexion){
         echo "<h4>Nuevo elemento para la tabla: ".$_GET['tabla']."</h4>";
        echo "<form action='?accion=insertar&tabla=".$_GET['tabla']."'  method='POST'>";
        $peticion = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
        $resultado = mysqli_query($conexion,$peticion);
        while($fila = mysqli_fetch_assoc($resultado)){
            echo "
                <input type='text' name='".$fila['Field']."' placeholder='".$fila['Field']."'>


            ";
        }
        echo "<input type='submit'>";
        echo "</form>";    
    }
?>