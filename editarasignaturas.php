<?php
include("conexion/conexionbd.php");
$ID=$_GET['id'];
$materias = "SELECT idasignaturas,codigoasignaturas,nombreasignatura,nota 
             FROM asignaturas WHERE idasignaturas='$ID'";
$resultadomaterias=$conexion->query($materias);
$filas=$resultadomaterias->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 align="center">Modificar asignatura</h3>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
    Codigo: <input type="text" name="cod" value="<?php echo $filas['codigoasignaturas'];?>"  required>
    Asignatura: <input type="text" name="nom" value="<?php echo $filas['nombreasignatura'];?>"  required>
    Nota: <input type="number" name="nota" value="<?php echo $filas['nota'];?>"  required>
    <input type="hidden" name="ID" value="<?php echo $ID;?>"  required>
     <input type="submit" name="editar" value="modificar">
    </form>

    <?php
    if (isset($_POST['editar'])) {
        $cod=$_POST['cod'];
        $materia=$_POST['nom'];
        $nota=$_POST['nota'];
        $id=$_POST['ID'];
        $sqlModificar= "UPDATE asignaturas SET 
                        codigoasignaturas='$cod',
                        nombreasignatura='$materia',
                        nota='$nota'
                        WHERE idasignaturas='$id'";
        $modificado=$conexion->query($sqlModificar);
        if ($modificado>0) {
            echo "<script>alert('Registro exitoso');
            window.location='index.php';</script>";
        }else{
            echo "<script>alert('Error al modificar');
            window.location='editarasignaturas.php';</script>";
      
        }                
    }
    ?>
   
</body>
</html>