<?php
include("conexion/conexionbd.php");
$sql="SELECT idTipoAlumno,TipoUsuario FROM tipo_usuario";
$resultado=$conexion->query($sql);
if (!empty($_POST)) {
	$nombre=mysqli_real_escape_string($conexion,$_POST['nombrealumno']);
	$genero=$_POST['genero'];
	$usuario=mysqli_real_escape_string($conexion,$_POST['user']);
	$tipouser=$_POST['tipo_user'];
	$tel=mysqli_real_escape_string($conexion,$_POST['telefono']);
	$correo=mysqli_real_escape_string($conexion,$_POST['email']);
	$password=mysqli_real_escape_string($conexion,$_POST['pass']);
	$password_encriptada=sha1($password);
	$sqluser="SELECT idUsuario FROM usuarios WHERE NombreU='$usuario'";
	$resultadouser=$conexion->query($sqluser);
	$filas=$resultadouser->num_rows;
	if ($filas>0) {
		echo "<script>alert('El usuario ya existe');
		window.location='registrousuario.php';</script>";
	}
	else{
		$sqlalumno="INSERT INTO alumno(nombreA,telefonoA,generoA,correoA)
					VALUES ('$nombre','$tel','$genero','$correo')";
		$resultadoAlumno=$conexion->query($sqlalumno);
		$idalumno=$conexion->insert_id;
		$sqlusuario="INSERT INTO usuarios(nombreU,passwordU,idalumno,idTipoUsuario)
					VALUES ('$nombre','$password_encriptada','$idalumno','$tipouser')";
		$resultadousuario=$conexion->query($sqlusuario);
		if ($resultadousuario>0) {
			echo "<script>alert('Registro exitoso');
				window.location='index.php';</script>";
		}
		else{
				echo "<script>alert('ERROR al registrarse');
				window.location='registrousuario.php';</script>";
		}		
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registro de usuarios</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-3">Crear Cuenta</h1>
			<form action=" <?php $_SERVER["PHP_SELF"]; ?> " method="POST">
				<div class="form-row">
						<div class="form-group col-md-6">
						<label for="inputNombreA" class="col-form-label">Nombre del Alumno</label>
						<input type="text" class="form-control" id="inputNombreA" placeholder="Nombre Completo" name="nombrealumno">
						</div>
						<div class="form-group col-md-6">
						<label for="inputUser" class="col-form-label">Usuario</label>
						<input type="text" class="form-control" id="inputUser" placeholder="Nombre de Usuario" name="user">
						</div>
				</div>
				<div class="form-row">
						<label for="tipouser">Tipo de usuario</label>
							<select class="form-control" id="tipouser" name="tipo_user">
								<?php
								while ($fila=$resultado->fetch_assoc()) {?>
								<option value="<?php echo $fila['idTipoAlumno']?>"><?php echo $fila['TipoUsuario']?></option>	
								<?php }
								?>
							</select>
				</div>
				<div class="form-row">
						<div class="form-group col-md-6">
						<label for="inputTelefono" class="col-form-label">Telefono</label>
						<input type="tel" class="form-control" id="inputTelefono" placeholder="Numero de Telefono" name="telefono">
						</div>
						<div class="form-group col-md-6">
						<label for="exampleFormControlSelect1">Genero</label>
							<select class="form-control" id="exampleFormControlSelect1" name="genero">
								<option>Femenino</option>
								<option>Masculino</option>
							</select>
						</div>
				</div>
				<div class="form-row">
						<div class="form-group col-md-6">
						<label for="inputEmail4" class="col-form-label">Email</label>
						<input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
						</div>
						<div class="form-group col-md-6">
						<label for="inputPassword4" class="col-form-label">Password</label>
						<input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="pass">
						</div>
				</div>
				<button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
				</form>
		</div>
	</div>
	<hr>
	</div> 
</body>
</html>