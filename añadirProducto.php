<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilo general */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1c1c1c; /* Fondo negro */
            color: #f5f5f5; /* Texto claro */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            text-align: center;
            color: #d32f2f; /* Rojo elegante */
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 20px;
            border-bottom: 2px solid #d4af37; /* Línea dorada */
            padding-bottom: 10px;
        }
        form {
            background: #2e2e2e; /* Fondo gris oscuro */
            padding: 20px;
            border: 1px solid #d32f2f; /* Borde rojo */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Sombra elegante */
            width: 300px;
        }
        label {
            font-size: 1em;
            color: #d4af37; /* Dorado */
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #d32f2f; /* Borde rojo */
            border-radius: 4px; /* Bordes redondeados */
            background-color: #1c1c1c; /* Fondo negro */
            color: #f5f5f5; /* Texto claro */
        }
        input[type="submit"] {
            background-color: #d32f2f; /* Rojo elegante */
            color: #f5f5f5;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #d4af37; /* Dorado */
        }
        .link-button {
            display: inline-block;
            text-align: center;
            background-color: #d32f2f; /* Rojo elegante */
            color: #f5f5f5; /* Texto claro */
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            padding: 10px 20px;
            margin-top: 15px;
            cursor: pointer;
        }
        .link-button:hover {
            background-color: #d4af37; /* Dorado */
        }
        .mensaje {
            text-align: center;
            color: #d32f2f; /* Rojo elegante */
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
    <title>Añadir producto </title>
    
</head>
<body>
    <?php
    include("pagPrincipal.php");
    ?>
        <form action= "addProducto.php" method="POST">
        <h1>Añadir producto</h1>
            <label for="username">Nombre del producto</label>
            <input type="text" id="username" name="nombre" required><br><br>

            <label for="precio">Precio:</label>
            <input type="text" id="`precio`" name="precio" step="1" required><br><br>

            <label for="username">Descripción</label>
            <input type="text" id="descripcion" name="descripcion"><br><br>
            <input type="submit" value="Enviar">
        </form>

</body>
</html>
