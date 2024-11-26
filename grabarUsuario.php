<?php
    // Llegamos a esta pagina cuando un usuario quiere registrarse


    // Comprobamos que nos vienen los 2 parámetros
    if (!empty($_REQUEST['nombre']) && !empty($_REQUEST['pass'])){
        
    // Recojo los datos
    $nombre = $_REQUEST["nombre"];
    $contra = $_REQUEST["pass"];


   
    // 1. Me conecto a la BBDD
    include("conBaseDatos.php");

    // 3. Escribo la consulta INSERT
    $sql = "insert into usuarios (nombre, pass) 
            values ('$nombre', '$contra')";

    // 4. Ejecuto la consulta
    $conn->query($sql);

    // 5. cierro la conexión
    $conn->close();
    
    
    // inluimos la página de mensaje
    include("mensajeSession.php");
    $_SESSION["mensaje"] = "<p>Usuario creado, inicia sesión</p>";
    Header("Location: index.php");
    }
    
    else {
        include("mensajeSession.php");
        $_SESSION["mensaje"] = "Falta algún parámetro";
        Header("Location: registro.php");
    }

    // Mandar a pagina principal y mensaje 

    

?>