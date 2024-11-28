<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrito de Compras</title>
    <a href="userLogueado.php" 
       style="display: inline-block; padding: 10px 20px; background-color: #d32f2f; color: white; text-align: center; font-weight: bold; text-decoration: none; border-radius: 5px; margin-top: 10px; transition: background-color 0.3s;">
       Sigue comprando
    </a><br>
</head>
<body>
    <h1>Mi Carrito</h1>

    <?php
    session_start();

    // Me conecto a la BBDD
    include("conBaseDatos.php");

    // Si no existe el carrito, lo inicializamos
    if (!isset($_SESSION['carro'])) {
        $_SESSION['carro'] = [];
    }

    // Añadimos producto al carrito
    if (isset($_POST['id_producto'])) {
        $id_producto = $_POST['id_producto'];

        // Si ya existe en el carrito, incrementamos la cantidad
        if (isset($_SESSION['carro'][$id_producto])) {
            $_SESSION['carro'][$id_producto]['cantidad']++;
        } else {
            // Obtenemos información del producto desde la base de datos
            $sql = "SELECT nombre, precio FROM productos WHERE id_producto = '$id_producto'";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                $producto = $resultado->fetch_assoc();
                $_SESSION['carro'][$id_producto] = [
                    'nombre' => $producto['nombre'],
                    'precio' => $producto['precio'],
                    'cantidad' => 1
                ];
            } else {
                echo "Producto no encontrado.";
            }
        }
    }

    // Eliminamos producto individual del carrito
    if (isset($_GET['eliminar'])) {
        $id_producto = $_GET['eliminar'];
        unset($_SESSION['carro'][$id_producto]);
    }

    // Vaciamos carrito
    if (isset($_GET['vaciar'])) {
        unset($_SESSION['carro']);
    }

    // Mostramos carrito
    if (!empty($_SESSION['carro'])) {
        echo "<table style='width: 100%; border-collapse: collapse; background-color: #2e2e2e; border-radius: 8px;'>
                <tr style='background-color: #d32f2f; color: white;'>
                    <th style='padding: 12px; text-align: center;'>Producto</th>
                    <th style='padding: 12px; text-align: center;'>Precio</th>
                    <th style='padding: 12px; text-align: center;'>Cantidad</th>
                    <th style='padding: 12px; text-align: center;'>Total</th>
                    <th style='padding: 12px; text-align: center;'>Acciones</th>
                </tr>";

        $importe_total = 0;
        foreach ($_SESSION['carro'] as $id => $producto) {
            $subtotal = $producto['precio'] * $producto['cantidad'];
            $importe_total += $subtotal;
            echo "<tr style='background-color: #333; color: #f5f5f5;'>
                    <td style='padding: 10px; text-align: center;'>{$producto['nombre']}</td>
                    <td style='padding: 10px; text-align: center;'>{$producto['precio']} &euro;</td>
                    <td style='padding: 10px; text-align: center;'>{$producto['cantidad']}</td>
                    <td style='padding: 10px; text-align: center;'>{$subtotal} &euro;</td>
                    <td style='padding: 10px; text-align: center;'>
                        <a href='?eliminar=$id' style='background-color: #e74c3c; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px;'>Eliminar</a>
                    </td>
                </tr>";
        }
        echo "<tr style='background-color: #2e2e2e; color: white;'>
                <td colspan='3' style='text-align: right; padding: 10px;'><strong>Importe Total</strong></td>
                <td colspan='2' style='padding: 10px;'><strong>{$importe_total} &euro;</strong></td>
              </tr>";
        echo "</table>";

        // Opciones de vaciar carrito y comprar
        echo "<br>
              <a href='?vaciar=1' style='padding: 10px 20px; background-color: #d32f2f; color: white; text-align: center; font-weight: bold; text-decoration: none; border-radius: 5px;'>Vaciar Carrito</a>
              |
              <a href='?comprar=1' style='padding: 10px 20px; background-color: #2ecc71; color: white; text-align: center; font-weight: bold; text-decoration: none; border-radius: 5px;'>Realizar Compra</a>";
    } else {
        echo "<p style='color: #d41c1c;'>El carrito está vacío.</p>";
    }

    // Procesamos la compra
    if (isset($_GET['comprar']) && !empty($_SESSION['carro'])) {
    $cliente_id = $_SESSION['id'];

    // Recorremos los productos en el carrito
    foreach ($_SESSION['carro'] as $id_producto => $producto) {
        $cantidad = $producto['cantidad'];
        $precio_total = $producto['precio'] * $cantidad;
        $nombre = $producto['nombre'];

        // Insertamos el pedido en la base de datos
        $sql = "INSERT INTO pedidos (id_cliente, id_producto, cantidad, precio_total) 
                VALUES ('$cliente_id', '$id_producto', '$cantidad', '$precio_total')";
                
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: #2ecc71;'>Pedido de '{$producto['nombre']}' realizado con éxito.</p>";
        } else {
            echo "<p style='color: #e74c3c;'>Error al realizar el pedido: " . $conn->error . "</p>";
        }
    }

    // Vaciar el carrito después de realizar la compra
    unset($_SESSION['carro']);
}

    ?>
</body>
</html>
