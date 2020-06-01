<?php
include("configuracion.php");
$conexion = new mysqli($server,$usuario,$pass,$bd);
if (mysqli_connect_errno()) {
    echo "No conectado", mysqli_connect_error();
    exit();
}
/*else{
    echo "conectado";
}*/
?>