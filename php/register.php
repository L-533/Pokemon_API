<?php 

include "connection.php";
error_reporting(0);
session_start();

if(isset($_SESSION["username"])){
    header("Location: index.php");
}

if(isset($_POST["register"])){
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];

	if($password == $cpassword){
		// Encriptar contraseña
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		// Comprobar si el correo ya está registrado
		$sql_check_email = "SELECT * FROM usuarios WHERE email='$email'";
		$result_check_email = mysqli_query($conn, $sql_check_email);

		if($result_check_email->num_rows == 0){
			
			//Creación de usuario
			$sql_insert = "INSERT INTO usuarios(username, email, password) VALUES('$username', '$email', '$hashedPassword')";
			$result_insert_user = mysqli_query($conn, $sql_insert);

			if($result_insert_user){
				echo "<script>alert('Usuario registrado con éxito'); window.location= 'index.php'; </script>";
				$_SESSION["username"] = $username; 
				$username = "";
				$email = "";
				$_POST["password"] = "";
				$_POST["cpassword"] = "";
			}else{
				echo "<script>alert('Hay un error')</script>";
			}
		}else{
			echo "<script>alert('El correo ya existe')</script>";
		}
	}else{
		echo "<script>alert('Las contraseñas no coinciden')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet"  href="../css/register.css">
</head>
<body>
	<ul class="navbar">
		<li><a href="../index.html">Home</a></li>
	</ul>
	<div class="container">
		<div class="pokemon-card">
		<h2>Registro</h2>
	    <form action="" method="post">
		    <label for="username">Usuario:</label>
		    <input type="text" id="username" name="username" required><br><br>

		    <label for="email">Correo Electrónico:</label>
		    <input type="email" id="email" name="email" required><br><br>

		    <label for="password">Contraseña:</label>
		    <input type="password" id="password" name="password" required><br><br>

		    <label for="password">Confirmar contraseña:</label>
		    <input type="password" id="cpassword" name="cpassword" required><br><br>

		    <button type="submit" name="register">Registrarse</button>
	    </form>
		</div>
	</div>
</body>
</html>
