<?php
  session_start();
    //1. Me aseguro que viene el dato
    if(!empty($_REQUEST["nombre"]) && !empty($_REQUEST["contraseña"]) ){
    // CORRECTO: Me vienen los dos parametros

    //2. Recojo el dato
    $nomb = $_REQUEST["nombre"]; 
    $cont = $_REQUEST["contraseña"]; 

    //3. me conecto a la BBDD
    include("conBaseDatos.php");
    
    //4. Construyo la consulta
    $sql = "SELECT * FROM usuarios";
    // where nombre=$nomb and contraseña=$cont";
    echo "$sql";

    //5. Ejecuto la consulta y recojo el resultado
    $result = $conn->query($sql);
    

    // Quiero saber el numero de lineas encontrados
    $row_count = $result->num_rows;

    
    if($row_count >= 1){
        //Todo bien
    }else{
        //Credenciales incorrectas
    }



    }
    // Aqui me falta uno o dos parametros
  
    else {
        $_SESSION["mensaje"] = "Faltan parametros por enviar";
        Header("Location:login.php");
    } 


?>
