function getCharacters(done) {
    fetch("https://pokeapi.co/api/v2/pokemon/?offset=0")
        .then(response => response.json())
        .then(data => {
            done(data);
    });
}

// Función para obtener la imagen del pokemon
function getPokemonImage(pokemonURL) {
    return fetch(pokemonURL)
        .then(response => response.json())
        .then(data => data.sprites.front_default);
    }

// Se crea una lista de todos los pokemones de la API
getCharacters(data => {
    const main = document.querySelector("main");

    // Array con las imagenes de los pokemones para mostrarlos de manera ordenada
    const imagePromises = data.results.map(pokemon => getPokemonImage(pokemon.url));

    Promise.all(imagePromises)
        .then(images => {
            data.results.forEach((pokemon, index) => {
                // Conversion del nombre del pokemon para que empiece en Mayuscula
                const convertedName = pokemon.name.charAt(0).toUpperCase() + pokemon.name.slice(1);

                const article = document.createRange().createContextualFragment(/*html*/`
                    <a href="pokemon_Details.php?url=${encodeURIComponent(pokemon.url)}">

				    <div class="pokemon-card">
					   <img class="pokemon-image" src="${images[index]}" alt="${pokemon.name}">
				
				    <h2>${convertedName}</h2>
				    </div>
                    </a>
								
				    `);

                main.append(article);
            });
        });
});

