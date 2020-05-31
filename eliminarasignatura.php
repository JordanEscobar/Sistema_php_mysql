<?php

include("conexion/conexionbd.php");
$ID=$_GET['id'];
$eliminarasignatura="DELETE FROM asignaturas 
                    WHERE idasignaturas='$ID'";
$resultado=$conexion->query($eliminarasignatura);
echo "<script>alert('Eliminado exitosamente');
        window.location='index.php';</script>";
$conexion->close();        


?>