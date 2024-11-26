<?php

// Recoger el id
$id_pe = $_POST["id_pedido"];
 

// conexión con la base de datos
include("conBaseDatos.php");

// realizar la consulta
$sql = "DELETE from pedidos where id_pedido = '$id_pe'";

// ejecutarla
$result = $conn->query($sql);

//cerrar la conexión
$conn->close();

// Mensaje de usuario eliminado
include("mensajeSession.php");
$_SESSION["mensaje"] = "<h2>El pedido con el id $id_pe eliminado</h2>";
Header("Location: secreto.php");

?>