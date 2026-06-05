<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Música</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilomusica.css">

    <style>
        /* ==========================================================================
           ESTILOS EXCLUSIVOS PARA LA NAVBAR DE MÚSICA (INTERFAZ DE AUDIO)
           ========================================================================== */
        .navbar-musica {
            background-color: #0b0f19 !important; /* Negro azulado de interfaz de DJ */
            border-bottom: 3px solid #4361ee; /* Línea de neón azul */
            padding: 0.6rem 0;
            box-shadow: 0 4px 20px rgba(67, 97, 238, 0.3);
            position: relative;
            z-index: 99999 !important;
            width: 100%;
        }

        .navbar-musica .navbar-brand {
            font-weight: bold;
            font-size: 1.25rem;
            color: #ffffff !important;
            letter-spacing: 1px;
            text-shadow: 0 0 8px rgba(67, 97, 238, 0.6);
            transition: all 0.3s ease;
        }

        .navbar-musica .navbar-brand:hover {
            color: #4cc9f0 !important;
            text-shadow: 0 0 15px #4cc9f0;
        }

        .navbar-musica .nav-link {
            color: #d1d5db !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            padding: 0.5rem 1.2rem !important;
            transition: all 0.3s ease;
            border-radius: 6px;
        }

        .navbar-musica .nav-link:hover,
        .navbar-musica .nav-link:focus {
            color: #4cc9f0 !important;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .navbar-musica .navbar-toggler {
            border-color: #4361ee;
            background-color: rgba(255, 255, 255, 0.02);
        }

        .navbar-musica .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%234361ee' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar-musica .dropdown-menu {
            background-color: #0f1422;
            border: 2px solid #4361ee;
            border-radius: 8px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            margin-top: 8px;
            padding: 0;
            overflow: hidden;
            z-index: 100000 !important;
        }

        .navbar-musica .dropdown-item {
            color: #ffffff !important;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.7rem 1.5rem;
            transition: all 0.2s ease;
        }

        .navbar-musica .dropdown-item:hover {
            background: linear-gradient(90deg, #4361ee 0%, #4cc9f0 100%);
            color: #ffffff !important;
            padding-left: 1.8rem;
        }

        /* ==========================================================================
           TUS ESTILOS PERSONALIZADOS (CONSERVADOS Y ADAPTADOS A B5)
           ========================================================================== */
        body {
            background: linear-gradient(135deg, #4cc9f0, #4361ee);
            color: #0d1b2a;
            font-family: 'Lobster Two', cursive;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Estilo para tu tarjeta de formulario */
        .music-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
            max-width: 600px;
            margin: 50px auto; /* Centra el formulario perfectamente en la pantalla */
        }

        h1 {
            text-align: center;
            color: #1d3557;
        }

        label {
            color: #1d3557;
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #90e0ef;
            color: #000;
        }

        .form-control:focus {
            border-color: #4361ee;
            box-shadow: 0 0 5px #4361ee;
            outline: none;
        }

        .btn-success {
            background: #4895ef;
            border: none;
            border-radius: 10px;
            color: white;
            width: 100%; /* Hace que el botón abarque el ancho para verse más moderno */
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            transition: background 0.3s;
        }

        .btn-success:hover {
            background: #4361ee;
        }

        .alert {
            border-radius: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-musica">
        <div class="container-fluid px-4">
            <a class="navbar-brand text-white" href="index.html">🎵 Música Inicio</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Unidad 1
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="meterdatos01.php">Meter Datos</a></li>
                            <li><a class="dropdown-item" href="mostrar.php">Mostrar Datos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Unidad 2
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="relacionales1.php">Relacionales 1</a></li>
                            <li><a class="dropdown-item" href="relacionales2.php">Relacionales 2</a></li>
                            <li><a class="dropdown-item" href="capturadebasededatos.php">Captura de Base de Datos</a></li>
                            <li><a class="dropdown-item" href="musica.php">Música</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Unidad 3
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="peliculas.html">Buscador de películas</a></li>
                            <li><a class="dropdown-item" href="pokedex.html">POKEDEX</a></li>
                            <li><a class="dropdown-item" href="oceano.html">Vida Marina</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="music-card">
        <h1 style="margin-bottom: 30px;">Registro de Canciones</h1>

        <form action="proceso.php" method="post">
            
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="number" class="form-control" id="id" name="id" required>
            </div>

            <div class="form-group">
                <label for="titulo">Título de la canción:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>

            <div class="form-group">
                <label for="artista">Artista:</label>
                <input type="text" class="form-control" id="artista" name="artista" required>
            </div>

            <div class="form-group">
                <label for="album">Álbum:</label>
                <input type="text" class="form-control" id="album" name="album">
            </div>

            <div class="form-group">
                <label for="genero">Género:</label>
                <input type="text" class="form-control" id="genero" name="genero" required>
            </div>

            <div class="form-group">
                <label for="duracion">Duración (minutos):</label>
                <input type="text" class="form-control" id="duracion" name="duracion">
            </div>

            <button type="submit" name="submit" class="btn btn-success">Guardar Canción</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>