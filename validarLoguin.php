<?php
// iniciar sesion?
session_start();
//1. Me aseguro que viene el dato
if(isset($_REQUEST["nombre"]) && isset($_REQUEST["contraseña"]) ){
    // CORRECTO: Me vienen los dos parametros

    //2. Recojo el dato
    $nombre = $_REQUEST["nombre"]; 
    $password = $_REQUEST["contraseña"]; 

    //3. me conecto a la BBDD
    include("conBaseDatos.php");
    //4. Construyo la consulta
    $sql = "SELECT * FROM usuarios";

    //5. Ejecuto la consulta y RECOJO el resultado
    $result = $conn->query($sql);
    

    // Quiero saber el numero de lineas encontrados
    $row_count = $result->num_rows;


        //Todo bien

        //Credenciales incorrectas
  




    // Aqui me falta uno o dos parametros
    else {
    header("Location:login.php");
    } 
}

?>
