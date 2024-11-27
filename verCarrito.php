<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <h1>Carrito</h1>
</head>
<body>
<?php

include('conBaseDatos.php');

$idp = $_REQUEST["id_producto"];

// construyo la consulta
$sql = "SELECT * FROM productos where id_producto = '$idp'";

// ejecuto la consulta
$result = $conn->query($sql);

// si quiero saber el numero de registros encontrados
$row_count = $result->num_rows;

// Si quiero mostrarlos o recorrerlos
while($row = $result->fetch_assoc()) {
    echo $row['nombre']; // en 'nombre' es el nombre de la columna de la BBDD
}



// Cierro la conexión
$conn->close();

?>
</body>
</head>
