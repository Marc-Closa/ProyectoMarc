<?php


// 1. Validar datos con isset
if (isset($_REQUEST['nombre']) && isset ($_REQUEST['descripcion']) && isset ($_REQUEST['precio']) ) {
    
    $nombre = $_REQUEST['nombre'];
    $desc = $_REQUEST['descripcion'];
    $precio = $_REQUEST['precio'];
    
    echo "$nombre, $desc, $precio";
    // 2. Conectamos a la BBDD
    include("conBaseDatos.php");
    
var_dump($_REQUEST);
// 3. Construimos la consulta

     $sql = "INSERT INTO productos (nombre, descripcion, precio)  
     VALUES ('$nombre', '$desc', '$precio')";
     
    // 4. Ejecutamos la consulta
    $conn->query($sql);

    // Cerrar conexión
    $conn->close();

}else{
echo "no se ha podido completar la consulta,datos incompletos";
    //5. Mensaje de error porque no me han llegado los parametros
}

session_start();
$_SESSION["mensaje"] = "<h2>Producto añadido</h2>";
header("location:secreto.php");

?>