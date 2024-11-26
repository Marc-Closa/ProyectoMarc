<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Chino</title>
    <style>
        /* Estilo general: elegante con colores rojo, negro y dorado */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1c1c1c; /* Fondo negro */
            color: #f5f5f5; /* Texto claro */
        }
        h1 {
            text-align: center;
            color: #d32f2f; /* Rojo elegante */
            font-weight: bold;
            margin-top: 20px;
            border-bottom: 2px solid #d4af37; /* Línea dorada */
            padding-bottom: 10px;
        }
        h2 {
            text-align: left;
            color: #d32f2f; /* Rojo elegante */
            font-weight: bold;
            margin-top: 20px;
            margin-left: 20px;
            padding-bottom: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left; /* Alineado a la izquierda */
            background-color: #d32f2f; /* Fondo rojo para la barra */
            padding: 10px 20px;
        }
        ul li {
            display: inline;
            margin: 0 10px;
        }
        ul li a {
            text-decoration: none;
            color: #fff; /* Blanco */
            font-weight: bold;
        }
        ul li a:hover {
            color: #d4af37; /* Dorado */
        }
        .productos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .producto {
            background: #2e2e2e; /* Fondo gris oscuro */
            border: 1px solid #d32f2f; /* Borde rojo */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 15px;
            width: 300px;
            text-align: center;
            color: #f5f5f5;
        }
        .producto img {
            max-width: 100%;
            border-radius: 8px;
            border: 1px solid #d4af37; /* Borde dorado */
        }
        .producto h3 {
            margin: 10px 0;
            font-size: 1.2em;
            color: #d32f2f; /* Rojo elegante */
        }
        .producto p {
            font-size: 0.9em;
            color: #cccccc; /* Gris claro */
        }
        .producto .precio {
            font-weight: bold;
            color: #d4af37; /* Dorado */
        }
        footer {
            text-align: center;
            background-color: #1c1c1c;
            color: #d4af37; /* Dorado */
            padding: 10px 0;
            margin-top: 20px;
            font-size: 0.9em;
        }
    </style>
    <?php
    
    // Mensaje de inicio de sesión
    include("mensajeSession.php");
    ?>

</head>
<body>



    <h1>Nuestra carta</h1>

    <div class="productos">
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
                echo "<div class='producto'>";
                echo "<h3>" . htmlspecialchars($row['nombre']) . "</h3>";
                echo "<p>" . htmlspecialchars($row['descripcion']) . "</p>";
                echo "<img src='imagenes/" . htmlspecialchars($row['imagen']) . "' alt='" . htmlspecialchars($row['nombre']) . "'>";
                echo "<p class='precio'>Precio: $" . htmlspecialchars($row['precio']) . "</p>";
                echo "</div>";
            }
            // Cerramos la conexión
            $conn->close(); 

            include("footer.php");
        ?>

    </div>
    
</body>
</html>
