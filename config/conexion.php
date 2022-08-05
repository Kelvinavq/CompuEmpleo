<?php

include("config.php");

$server = ("mysql:dbname=" . DB . ";host=" . SERVER);

try {
    
    $connection = new PDO($server, USER, PASS);

} catch (PDOException $e) {
    echo '
    <script>
    alert("Error en la conexion");
    </script>
    ';

    echo $e;
}

?>