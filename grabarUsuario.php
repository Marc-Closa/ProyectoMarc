<?php
    // Llegamos a esta pagina cuando un usuario quiere registrarse

    // Recojo los datos

    $nombre = $_REQUEST["nombre"];
    $contra = $_REQUEST["pass"];


    // 1. Me conecto a la BBDD
    include("conBaseDatos.php");

    // 3. Escribo la consulta INSERT
    $sql = "insert into usuarios (nombre, pass) 
            values ('$nombre', '$contra')";
    echo "$sql";
    // 4. Ejecuto la consulta
    $conn->query($sql);

    // 5. cierro la conexión
    $conn->close();

?>