<?php

// conexión con la base de datos
include("conBaseDatos.php");

// realizar la consulta
$sql = "DELETE from usuarios where nombre = 'marc'";

// ejecutarla
$result = $conn->query($sql);

//cerrar la conexión
$conn->close();



?>