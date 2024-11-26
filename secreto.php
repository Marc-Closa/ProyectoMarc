<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
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

        table {
            width: 90%;
            margin: 20px auto;
            background-color: #2e2e2e; /* Fondo gris oscuro */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            color: #f5f5f5;
            border: 1px solid #d32f2f;
        }

        /* Estilos para los encabezados de las tablas (th) */
        th {
            background-color: #d32f2f; /* Rojo para los encabezados */
            font-size: 1.35em; /* Aumentar el tamaño de la fuente */
            font-weight: bold; /* Asegurar que el texto sea negrita */
            padding: 15px; /* Aumentar el padding */
        }

        tr:nth-child(even) {
            background-color: #333; /* Fila par con fondo más oscuro */
        }

        tr:nth-child(odd) {
            background-color: #444; /* Fila impar con fondo más claro */
        }

        a {
            color: #d32f2f; /* Rojo para los enlaces */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #b71c1c; /* Rojo más oscuro al pasar el ratón */
        }

        .precio {
            font-size: 1.2em;
            font-weight: bold;
        }

        .mensaje {
            text-align: center;
            color: #d32f2f; /* Rojo elegante */
            background-color: rgba(255, 255, 255, 0.1); /* Fondo semitransparente */
            border: 1px solid #d32f2f; /* Borde rojo */
            border-radius: 8px; /* Bordes redondeados */
            padding: 10px;
            margin: 20px auto; /* Separación de otros elementos */
            width: 80%; /* Adaptable al ancho de la página */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Sombra */
            font-weight: bold;
        }
    </style>
    <h1><b><u>Administrador</u></b></h1>
</head>
<body>
    <?php
    include("pagPrincipal.php");
    ?>
    <?php
        // Me conecto a la BBDD
        include("conBaseDatos.php");

        // Hago una consulta a todos los productos
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        // Mostrar el resultado
        echo "<h1>Productos</h1>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Precio</th>";
        echo "<th>Descripción</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><h3>" . htmlspecialchars($row['nombre']) . "</h3></td>";
            echo "<td><p class='precio'>" . htmlspecialchars($row['precio']) . "</p></td>";
            echo "<td><p>" . htmlspecialchars($row['descripcion']) . "</p></td>";
            echo "<td><p><a href='borrar.php?id=" . $row['id_producto'] . "'>Eliminar</a></p></td>";
            echo "</tr>";
        }

        echo "</table>";

        // Hago una consulta a todos los usuarios
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);

        // Mostrar el resultado
        echo "<h1>Usuarios</h1>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Contraseña</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><h3>" . htmlspecialchars($row['nombre']) . "</h3></td>";
            echo "<td><p>" . htmlspecialchars($row['pass']) . "</p></td>";
            echo "<td><p><a href='borrar.php?id=" . $row['id'] . "'>Eliminar</a></p></td>";
            echo "</tr>";
        }

        echo "</table>";

        // Hago una consulta a todos los pedidos
        $sql = "SELECT * FROM pedidos";
        $result = $conn->query($sql);

        // Mostrar el resultado
        echo "<h1>Pedidos</h1>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Precio</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><h3>" . htmlspecialchars($row['nombre']) . "</h3></td>";
            echo "<td><p>" . htmlspecialchars($row['cantidad']) . "</p></td>";
            echo "<td><p>" . htmlspecialchars($row['precio']) . "</p></td>";
            echo "<td><p><a href='borrar.php?id=" . $row['id_pedido'] . "'>Eliminar</a></p></td>";
            echo "</tr>";
        }

        echo "</table>";

        // cerrar conexión bbdd
        $conn->close();


    ?>

</body>
</html>
