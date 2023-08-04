// Obtener la URL del pokemon 
const urlParams = new URLSearchParams(window.location.search);
const pokemonUrl = urlParams.get('url');


// Función para mostrar todos los detalles del pokemon
function showPokemonDetails(pokemonData) {
    // Lista de habilidades
    const abilitiesList = pokemonData.abilities.map(ability => ability.ability.name).join(', ');

    // Lista de tipos
    const typesList = pokemonData.types.map(type => type.type.name).join(', ');

    // Lista de movimientos
    const movesList = pokemonData.moves.slice(0, 10).map(move => move.move.name).join(', ');

    // Conversion del nombre del pokemon para que empiece en Mayuscula
    const convertedName = pokemonData.name.charAt(0).toUpperCase() + pokemonData.name.slice(1);
      
    const pokemonDetails = document.getElementById('pokemonDetails');
    pokemonDetails.innerHTML = `
        <div class="pokemon-card">
            <h2>${convertedName}</h2>
            
            <div class="image-container">
            <img class="pokemon-image"src="${pokemonData.sprites.other["official-artwork"].front_default}" alt="${name}">
            </div>
            <div class="data-card">
              <div class="left-column">
                
                <p class="horizontal-line"><b>Altura:</b></p>
                <p><b>Peso:</b></p>
                <p><b>Habilidades:</b></p>
                <p><b>Tipo:</b></p>
                <p class="disable-style"><b>Movimientos:</b></p>
              </div>
              <div class="right-column">                
                <p>${pokemonData.height/10} m</p>
                <p>${pokemonData.weight/10} kg</p>
                <p>${abilitiesList}</p>
                <p>${typesList}</p>
                <p class="disable-style">${movesList}</p>
              </div>    
            </div>
            <br>

        </div>

    `;
}


// Solicitud a la URL del pokémon para obtener sus detalles
fetch(pokemonUrl)
    .then(response => response.json())
    .then(pokemonData => {        
        showPokemonDetails(pokemonData);
    })