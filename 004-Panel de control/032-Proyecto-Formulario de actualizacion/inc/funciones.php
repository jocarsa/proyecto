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
        echo "
                <th>
                    Operaciones
                </th>
            ";
    }
    function mostrarDatos($conexion){
        $peticion = "SELECT * FROM ".$_GET['tabla'].";";
        $resultado = mysqli_query($conexion,$peticion);
        while($fila = mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            foreach($fila as $columna=>$campo){
                if($columna == "Identificador"){
                    $id=$campo;
                }
                echo "
                    <td>
                        ".$campo."
                    </td>
                ";
            }
            echo "
                
                    <td class='operaciones'>
                    <a href='?accion=eliminar&id=".$id."&tabla=".$_GET['tabla']."' class='boton eliminar'>X</a>
                    <a href='?operacion=actualizar&id=".$id."&tabla=".$_GET['tabla']."' class='boton actualizar'>?</a>
                    </td>
                
            ";
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
    function eliminarRegistro($conexion){
        $consulta = "DELETE FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'].";";
        mysqli_query($conexion,$consulta);
    }
    function formularioActualizar($conexion){
         echo "<h4>Nuevo elemento para la tabla: ".$_GET['tabla']."</h4>";
        echo "<form action='?accion=insertar&tabla=".$_GET['tabla']."'  method='POST'>";
        $peticion = " SELECT * FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'].";";
        $resultado = mysqli_query($conexion,$peticion);
        while($fila = mysqli_fetch_assoc($resultado)){
            foreach($fila as $columna=>$campo){
                echo "
                    <input type='text' name='".$columna."' value='".$campo."' placeholder='".$columna."'>


                ";
            }
        }
        echo "<input type='submit'>";
        echo "</form>";    
    }
?>