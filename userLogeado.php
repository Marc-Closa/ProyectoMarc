<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Comida china</h1>

    <?php
            // Me conecto a la BBDD
           include("conBaseDatos.php");
            // Hago una consulta a todos los productos
            $sql = "SELECT * FROM productos";
            // Muestro de cada producto: Nombre, Descripcion, Imagen, Precio
            $result = $conn->query($sql);
            // Mostrar el resultado
            $row_count = $result->num_rows;
            // Recoger los datos
            while($row = $result->fetch_assoc()) {
                echo "<p>";
                echo $row ['nombre']. " = ";
                echo $row ['descripcion']. "</p>"; 
                echo $row ['imagen']. "</p>"; 
                echo $row ['precio']. "</br>";
                echo "</p>";
            }
             
            // Cerramos la conexión
            $conn->close(); 
    ?>
    
</body>
</html>