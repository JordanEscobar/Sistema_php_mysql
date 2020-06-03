<?php
include("conexion/conexionbd.php");
session_start();
if(isset($_SESSION['id_usuario'])){
    header("Location.admin.php");
}
if (!empty($_POST)) {
    $usuario=mysqli_real_escape_string($conexion,$_POST['user']);
    $password=mysqli_real_escape_string($conexion,$_POST['pass']);
    $password_encriptada=sha1($password);
    $sql="SELECT idUsuario,idTipoUsuario 
    FROM usuarios WHERE nombreU='$usuario' 
    AND passwordU='$password_encriptada'";
    $resultado=$conexion->query($sql);
    $filas=$resultado->num_rows;
    if ($filas>0) {
        $fila=$resultado->fetch_assoc();
        $_SESSION['id_usuario']=$fila['idUsuario'];
        $_SESSION['tipo_usuario']=$fila['idTipoUsuario'];
        header("Location:admin.php");

    }else{
        echo "<script>alert('Usuario o Pass incorrecto');
               window.location='index.php'; </script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lgoin Mantenedor</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="theme-color" content="#563d7c">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <form class="form-signin" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" class="form-control" name="user" placeholder="nombre del usuario" required>
        <input type="password" class="form-control" name="pass" placeholder="Contraseña del usuario" required><br>
        <input type="submit" class="btn btn-lg btn-primary btn-block" name="ingresar" value="ingresar">
        <br><a href="registrousuario.php">Crear cuenta</a>
    </form>
</body>
</html>