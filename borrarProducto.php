<?php

// Recoger el parámetro
$nom = $_REQUEST["nombre"];
 
// conexión con la base de datos
include("conBaseDatos.php");

// realizar la consulta
$sql = "DELETE from productos where nombre = '$nom'";

// ejecutarla
$result = $conn->query($sql);

//cerrar la conexión
$conn->close();

// Mensaje de usuario eliminado
include("mensajeSession.php");
$_SESSION["mensaje"] = "<h2>El producto con el id $nom eliminado</h2>";
Header("Location: secreto.php");

?>