<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Base de Datos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fuente -->
    <link href="https://fonts.cdnfonts.com/css/zachary" rel="stylesheet">

<style>
body{
    background-color:#640d14;
    color:#FFFFFF; 
}

h1{
    font-family:'Dancing Script', cursive;
    color:#FFFFFF; 
    text-align:center;
}

.navbar{
    background-color:#800e13;
    border:none;
}

.navbar-brand,
.navbar-nav > li > a{
    color:#FFFFFF !important;
    font-family:'Lora', serif;
}

.navbar-nav > li > a:hover{
    color:#000000 !important; 
}

.dropdown-menu{
    background-color:#8d0801;
}

.dropdown-menu > li > a{
    color:#FFFFFF;
    font-family:'Lora', serif;
}

.dropdown-menu > li > a:hover{
    background-color:#640d14;
}

.jumbotron{
    background-color:#800e13;
    color:#FFFFFF;
    padding:40px;
    border-radius:10px;
}

.btn-primary{
    background-color:#8d0801;
    color:#FFFFFF;
    border:none;
}

.btn-primary:hover{
    background-color:#640d14;
}

form {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #FFFFFF;
    text-align: center;
}

input[type="text"],
input[type="date"],
textarea {
    width: 80%;
    padding: 10px;
    margin-bottom: 15px;
    border: 2px solid #800e13;
    border-radius: 5px;
    background-color: #FFFFFF;
    color: #000000;
    text-align: center;
}

input[type="submit"] {
    background-color: #8d0801;
    color: #FFFFFF;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: #640d14;
}

input[type="hidden"] {
    display: none;
}

#mensaje {
    margin-top: 15px;
    color: #FFFFFF;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #b23a48;
    color: #FFFFFF;
}

th {
    background-color: #8d0801;
    color: #FFFFFF;
    padding: 10px;
}

td {
    background-color: #b23a48;
    color: #FFFFFF;
    padding: 10px;
    text-align: center;
}

tr:nth-child(even) td {
    background-color: #800e13;
}
</style>
</head>

<body>

  <center><h1>Personajes Marvel</h1></center>

  <nav class="navbar navbar-expand-lg" style="background-color:#a14949;">
  <div class="container">

    <a class="navbar-brand text-white" href="index.html">Inicio</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav">
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
        <li><a class="dropdown-item" href="musica.php">Musica</a></li>
  </ul>
</li>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
    Unidad 3
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="peliculas.html">Buscador de peliculas</a></li>
    <li><a class="dropdown-item" href="pokedex.html">POKEDEX</a></li>
    <li><a class="dropdown-item" href="oceano.html">Vida Marina</a></li>
  </ul>
</li>
    </div>

  </div>
</nav>

<nav class="navbar navbar-expand-lg" style="background-color: #9a5757;">

        <form action="insertar_datos.php" method="POST">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="alias">Alias:</label>
            <input type="text" id="alias" name="alias" required>

            <label for="fecha_creacion">Fecha de Creación:</label>
            <input type="date" id="fecha_creacion" name="fecha_creacion" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="comics">Cómics (separados por comas):</label>
            <input type="text" id="comics" name="comics" placeholder="Ejemplo: Spiderman, Ironman" required>

            <label for="superpoderes">Superpoderes (separados por comas):</label>
            <input type="text" id="superpoderes" name="superpoderes" placeholder="Ejemplo: Fuerza, Velocidad" required>

            <input type="submit" value="Guardar Personaje">

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>