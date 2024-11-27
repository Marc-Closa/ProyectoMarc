<?php

session_start();

$carrito = $_SESSION["carrito"] 

if(isset($_SESSION["carrito"])){
    include("conBaseDatos.php");

    $sql = "select * from usuarios";

    $result = $conn->query($sql);

    $row_count = $result->num_rows;

    while($row = $result->fetch_assoc()) {
        echo $row['nombre']; 

}
}
?>