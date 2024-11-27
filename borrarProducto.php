<?php

// Recoger el parámetro
 $idpr = $_REQUEST['id_producto'];

// conexión con la base de datos
include("conBaseDatos.php");

// realizar la consulta
$sql = "DELETE from productos where id_producto = '$idpr'";

// ejecutarla
$result = $conn->query($sql);

//cerrar la conexión
$conn->close();

// Mensaje de usuario eliminado
include("mensajeSession.php");
$_SESSION["mensaje"] = "<h2>El producto con el id $idpr eliminado</h2>";
Header("Location: secreto.php");

?>