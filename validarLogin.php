<?php
  session_start();
  var_dump($_REQUEST);
    //1. Me aseguro que viene el dato
    if(!empty($_REQUEST["nombre"]) && !empty($_REQUEST["contraseña"]) ){
    // CORRECTO: Me vienen los dos parametros

    //2. Recojo el dato
    $nomb = $_REQUEST["nombre"]; 
    $cont = $_REQUEST["contraseña"]; 

    //3. me conecto a la BBDD
    include("conBaseDatos.php");
    
    //4. Construyo la consulta
    $sql = "SELECT * FROM usuarios WHERE nombre = '$nomb' and pass = '$cont'";

    //5. Ejecuto la consulta y recojo el resultado
    $result = $conn->query($sql);    

    // Quiero saber el numero de lineas encontrados
    $row_count = $result->num_rows;

    
    if($row_count >= 1){
        $_SESSION["mensaje"] = "<h2>Has iniciado sesión correctamente con el usuario '$nomb'</h2>";
        Header("Location:userlogueado.php");;
        //Todo bien
    }else{
        echo "datos mal";
        //Credenciales incorrectas
    }


    }
    // Aqui me falta uno o dos parametros
  
    else {
        $_SESSION["mensaje"] = "Faltan parametros por enviar";
        Header("Location:login.php");
    } 


?>