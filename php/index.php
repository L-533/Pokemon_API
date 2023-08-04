<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pokémon API</title>
	<link rel="stylesheet"  href="../css/index_php.css">
</head>
<body>
<ul class="navbar">
  <li><a href="https://www.pokemon.com/us/pokemon-news"  target="_blank">News</a></li>
  <li><a class="no-hover"  target="_blank">Hola <?php echo $_SESSION["username"];
		?> </a></li>
  <li ><a href="logout.php" >cerrar sesión</a></li>
</ul>
	<br>
	<h1>Listado de Pokémon</h1>
	<div class="container"> 

	<main>
		
	</main>
	</div>
	<script src="index_php.js"></script>
	
</body>
</html>
</html>