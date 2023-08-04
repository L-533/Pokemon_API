<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detalles del Pokémon</title>
	<link rel="stylesheet"  href="../css/pokemon_Details.css">
</head>
<body>
 <ul class="navbar">
 	    <li><a href="index.php" >Home</a></li>
		<li><a href="https://www.pokemon.com/us/pokemon-news"  target="_blank">News</a></li>
		  <li><a class="no-hover"  target="_blank">Hola <?php echo $_SESSION["username"];
		?> </a></li>
		<li><a href="logout.php">cerrar sesión</a></li>
	</ul>

	<div class="container" id="pokemonDetails">
        <!-- Detalles del pokemon seleccionado -->
    </div>


    <script src="pokemon_Details.js"></script>
	
</body>
</html>