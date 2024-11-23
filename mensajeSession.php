<?php
    session_start();
    if(isset($_SESSION["mensaje"])){
        echo "<p>".$_SESSION["mensaje"]."</p>";
        unset($_SESSION["mensaje"]);
    }
?>