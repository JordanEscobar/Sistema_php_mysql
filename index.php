<?php
include("conexion/conexionbd.php");

if (!empty($_POST)) {
   $codigo = mysqli_real_escape_string($conexion,$_POST['cod']);
   $asignatura = mysqli_real_escape_string($conexion,$_POST['nom']);
   $nota = mysqli_real_escape_string($conexion,$_POST['nota']);

    $vermaterias = "SELECT idasignaturas,codigoasignaturas,nombreasignatura,nota 
                    FROM asignaturas 
                    WHERE codigoasignaturas = '$codigo' OR nombreasignatura = '$asignatura' ";
    $existemateria = $conexion->query($vermaterias);
    $filas = $existemateria->num_rows;
    if ($filas > 0) {
        echo "<script> alert('Asignatura existe'); 
        window.location='index.php'; </script>";
    }
    else{
        $sqlmateria="INSERT INTO asignaturas(
            codigoasignaturas,nombreasignatura,nota)
            VALUES ('$codigo','$asignatura',$nota)";
            $resultadomateria=$conexion->query($sqlmateria);
            if ($resultadomateria>0) {
                echo "<script> alert('Registro exitoso');
                window.location='index.php';</script>";
            }
            else{
                echo "<script> alert('Error al registrar'); 
                window.location='index.php'; </script>";
            }
    }

}

$materias = "SELECT idasignaturas,codigoasignaturas,nombreasignatura,nota 
             FROM asignaturas";
             $resultadomaterias=$conexion->query($materias);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 align="center">Registro de asignatura</h3>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
    Codigo: <input type="text" name="cod" placeholder="ingrese un codigo" required>
    Asignatura: <input type="text" name="nom" placeholder="Programacion" required>
    Nota: <input type="number" name="nota" placeholder="99" required>
     <input type="submit" name="guardar" value="guardar">

    </form>
    <hr>
    <h4 align="center">****Mis Asignaturas****</h4>
    <table border="2">
        <thead >
            <tr>
                <th>Asignatura</th>
                <th>Codigo</th>
                <th>Nota</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
           <tr>
                <?php
                while ($regmaterias = $resultadomaterias->fetch_array(MYSQLI_BOTH)) {
                    echo 
                    "<tr>
                    <td>".$regmaterias['codigoasignaturas']."</td>
                    <td>".$regmaterias['nombreasignatura']."</td>
                    <td>".$regmaterias['nota']."</td>
                    <td><a href='editarasignaturas.php?id=".$regmaterias['idasignaturas']." '>Editar</a></td>
                    <td><a href='eliminarasignatura.php?id=".$regmaterias['idasignaturas']." '>Eliminar</a></td>
                    </tr>";                }
                ?>
           </tr>
        </tbody>
    </table>
</body>
</html>