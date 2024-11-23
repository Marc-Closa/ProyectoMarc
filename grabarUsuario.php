<?php
    // Llegamos a esta pagina cuando un usuario quiere registrarse


    // Comprobamos que nos vienen los 2 parámetros
    if (isset($_REQUEST['nombre']) && isset($_REQUEST['pass'])){
   
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

    $_SESSION["mensaje"] = "User creado";
    Header("Location: registro.php");

    }
    else {
        $_SESSION["mensaje"] = "Falta algún parámetro";
        header("Location: registro.php");
    }

    // Mandar a pagina principal y mensaje 

    

?>