<?php 

include "connection.php";
error_reporting(0);
session_start();

if(isset($_SESSION["username"])){
    header("Location: index.php");
}

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Obtener nombre de usuario de la base de datos
    $sql_get_username = "SELECT username FROM usuarios WHERE email = ?";
    $stmt_username = mysqli_prepare($conn, $sql_get_username);
    mysqli_stmt_bind_param($stmt_username, "s", $email);
    mysqli_stmt_execute($stmt_username);
    mysqli_stmt_bind_result($stmt_username, $username);
    mysqli_stmt_fetch($stmt_username);
    mysqli_stmt_close($stmt_username);

    
    // Obtener nombre de contraseña de la base de datos
    $sql_check_password = "SELECT password FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql_check_password);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $storedHash);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if (password_verify($password, $storedHash)) {
        // Contraseña correcta
        $_SESSION["username"] = $username; 
        header("Location: index.php"); 
        exit();
    } else {
        // Contraseña incorrecta
        echo "<script>alert('Credenciales incorrectas')</script>";
    }    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet"  href="../css/login.css">
</head>
<body>
	<ul class="navbar">
		<li><a href="../index.html" >Home</a></li>
	</ul>
	<div class="container">
		<div class="pokemon-card">
		<h2>Login</h2>
		<br>
	    <form action="" method="post">

		    <label for="email">Correo Electrónico:</label>
		    <input type="email" id="email" name="email" required><br><br>

		    <label for="password">Contraseña:</label>
		    <input type="password" id="password" name="password" required><br><br>

		    <button type="submit" name="login">Acceder</button>
	    </form>
		</div>
	</div>
</body>
</html>
