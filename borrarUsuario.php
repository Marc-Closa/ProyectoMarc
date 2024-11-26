<?php

// Recoger el id
$id = $_REQUEST["id"];

 
// conexión con la base de datos
include("conBaseDatos.php");

// realizar la consulta
$sql = "DELETE from usuarios where id = '$id'";

// ejecutarla
$result = $conn->query($sql);

//cerrar la conexión
$conn->close();

// Mensaje de usuario eliminado
include("mensajeSession.php");
$_SESSION["mensaje"] = "<h2>El usuario con el id $id eliminado</h2>";
Header("Location: secreto.php");

?>