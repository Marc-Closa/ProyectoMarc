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
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 15px;
            border: 1px solid #d32f2f;
            text-align: center;
        }
        table th {
            background-color: #d32f2f;
            color: #fff;
        }
        table td {
            background-color: #2e2e2e;
            color: #f5f5f5;
        }
        table td img {
            max-width: 250px;
            height: auto;
            border: 1px solid #d4af37;
            border-radius: 8px;
        }
        button {
            background-color: #de1818;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #d4af37;
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
    include("pagPrincipal.php");
    ?>
    <a href="Carrito.php" class="link-button">Ver carrito</a><br>
</head>
<body>
    <h1>Nuestra carta</h1>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>

        <?php
            // Me conecto a la BBDD
            include("conBaseDatos.php");
            // Hago una consulta a todos los productos
            $sql = "SELECT * FROM productos";
            // Muestro de cada producto: Nombre, Descripcion, Imagen, Precio
            $result = $conn->query($sql);
            // Mostrar el resultado
            while ($row = $result->fetch_assoc()) {
                $imagen = "imagenes/" . $row['imagen'];
        ?>
        <tr>
            <td><?=$row['nombre']?></td>
            <td><img src="<?=$imagen?>" alt="Imagen del producto"></td>
            <td><?=$row['precio']?> &euro;</td>
            <td>
                <form method="POST" action="carrito.php">
                    <input type="hidden" name="id_producto" value="<?=$row['id_producto'];?>">
                    <button type="submit">Añadir al carrito</button>
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

    <footer>
        © 2024 Restaurante Chino. Todos los derechos reservados.
    </footer>
</body>
</html>
