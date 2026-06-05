//alexia kassandra nava sanchez 
document.getElementById('search-btn').addEventListener('click', buscarAnimalAmpliado);
document.getElementById('search-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        buscarAnimalAmpliado();
    }
});

async function buscarAnimalAmpliado() {
    const query = document.getElementById('search-input').value.trim();
    const resultsContainer = document.getElementById('results-container');
    const loading = document.getElementById('loading');

    if (query === '') {
        alert('Por favor, escribe el nombre de algún animal marino.');
        return;
    }

    loading.classList.remove('hidden');
    resultsContainer.innerHTML = '';

    const queryLimpio = query.toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .trim(); 

    let terminoBusqueda = query;
    if (queryLimpio === 'tiburon' || queryLimpio === 'tiburones') {
        terminoBusqueda = "Selachimorpha"; 
    } else if (queryLimpio === 'megalodon' || queryLimpio === 'megalodones') {
        terminoBusqueda = "Carcharocles megalodon"; 
    } else if (queryLimpio === 'cetaceo' || queryLimpio === 'cetaceos' || queryLimpio === 'ballena' || queryLimpio === 'ballenas') {
        terminoBusqueda = "Cetacea"; 
    } else if (queryLimpio === 'reptil' || queryLimpio === 'reptiles') {
        terminoBusqueda = "Reptiles marinos"; 
    } else if (queryLimpio === 'arrecife' || queryLimpio === 'arrecifes' || queryLimpio === 'arrecife de coral') {
        terminoBusqueda = "Arrecife de coral";
    } else if (queryLimpio.includes('prehistorica') || queryLimpio.includes('extinto')) {
        terminoBusqueda = "Mosasaurus"; 
    }

    const openSearchUrl = `https://es.wikipedia.org/w/api.php?action=opensearch&search=${encodeURIComponent(terminoBusqueda)}&limit=8&namespace=0&format=json&origin=*`;

    try {
        const searchResponse = await fetch(openSearchUrl);
        const searchData = await searchResponse.json();

        const titulosSugeridos = searchData[1] || [];
        const descripcionesSugeridas = searchData[2] || [];

        if (titulosSugeridos.length === 0) {
            mostrarError(query, resultsContainer, loading);
            return;
        }

        const listaNegra = [
            'película', 'filme', 'serie de televisión', 'telenovela', 'banda de', 'grupo musical', 
            'cantante', 'actor', 'actriz', 'videojuego', 'personaje de', 'historiador', 'biografía',
            'caricatura', 'anime', 'manga', 'álbum', 'sencillo', 'canción', 'parque nacional', 
            'fútbol', 'futbolista', 'celebridad', 'mascota', 'atleta', 'entrenador', 'baloncesto',
            'equipo de', 'boy band', 'pop coreano', 'k-pop', 'discografía'
        ];

        let mejorTitulo = null;

        for (let i = 0; i < titulosSugeridos.length; i++) {
            const titulo = titulosSugeridos[i];
            const tituloLower = titulo.toLowerCase();
            const descLower = (descripcionesSugeridas[i] || "").toLowerCase();

            if (descLower.includes('página de desambiguación') || descLower.includes('desambiguación')) {
                continue;
            }

            const esCulturaPop = listaNegra.some(palabra => 
                tituloLower.includes(palabra) || descLower.includes(palabra)
            );

            if (esCulturaPop) continue;

            if (tituloLower === 'biologia marina' && queryLimpio !== 'biologia marina') {
                continue;
            }

            mejorTitulo = titulo;
            break;
        }

        if (!mejorTitulo) mejorTitulo = titulosSugeridos[0];

        // 3. Pedimos el resumen oficial
        const summaryUrl = `https://es.wikipedia.org/api/rest_v1/page/summary/${encodeURIComponent(mejorTitulo)}`;
        const summaryResponse = await fetch(summaryUrl);
        const data = await summaryResponse.json();

        const extractoLower = (data.extract || "").toLowerCase();
        const tituloFinalLower = (data.title || "").toLowerCase();

        const esInfiltradoCulturaPop = listaNegra.some(palabra => 
            extractoLower.includes(palabra) || tituloFinalLower.includes(palabra)
        );

        if (esInfiltradoCulturaPop && queryLimpio !== 'tiburon' && queryLimpio !== 'megalodon') {
            mostrarError(query, resultsContainer, loading);
            return;
        }

        loading.classList.add('hidden');

        resultsContainer.innerHTML = `
            <div class="card">
                <small style="background-color: #03045e; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: bold; text-transform: uppercase;">Vida Marina Verificada</small>
                <h2 style="margin-top: 10px;">${data.title}</h2>
                ${data.thumbnail ? `<img src="${data.thumbnail.source}" alt="${data.title}">` : ''}
                <p>${data.extract}</p>
                <a href="${data.content_urls.desktop.page}" target="_blank" class="wiki-link">Leer artículo completo →</a>
            </div>
        `;

    } catch (error) {
        mostrarError(query, resultsContainer, loading);
    }
}

function mostrarError(query, container, loading) {
    loading.classList.add('hidden');
    container.innerHTML = `
        <div class="welcome-message" style="border-color: #e63946;">
            <h2 style="color: #e63946;">Contenido no permitido o no encontrado 🛑</h2>
            <p>El término "<strong>${query}</strong>" fue bloqueado o no se encuentra en nuestros registros marinos.</p>
            <p style="font-size: 0.95rem; color: #666;">Recuerda que nuestro sistema filtra estrictamente música (como BTS), películas, series, actores y deportes.</p>
        </div>
    `;
}

function buscarPorTag(nombre) {
    document.getElementById('search-input').value = nombre;
    buscarAnimalAmpliado();
}