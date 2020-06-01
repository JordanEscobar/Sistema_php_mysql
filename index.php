<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lgoin Mantenedor</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="theme-color" content="#563d7c">
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <form class="form-signin" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" class="form-control" name="usuario" placeholder="nombre del usuario" required>
        <input type="text" class="form-control" name="usuario" placeholder="Contraseña del usuario" required><br>
        <input type="submit" class="btn btn-lg btn-primary btn-block" name="ingresar" value="ingresar">
        <br><a href="registrousuario.php">Crear cuenta</a>
    </form>
</body>
</html>