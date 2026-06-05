<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Tabla</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root{
    --color-principal: #541A24;
    --color-secundario: #562730;
}

body{
    background-color: var(--color-principal);
    color: white;
   font-family: "Playpen Sans", cursive;
}

h1{
    color: white;
    text-align: center;
     font-family: "Dancing Script", cursive;
}

table{
    margin: auto;
    border-collapse: collapse;
    width: 90%;
    font-family: "Lora", serif;
}

th, td{
    border: 1px solid white;
    padding: 8px;
    text-align: center;
    vertical-align: middle;
}

th{
    background-color: var(--color-secundario);
}

img{
    max-width: 120px;
    height: auto;
    border-radius: 8px;
}

img{
    border-radius: 8px;
}
</style>

</head>
<body>

<h1>Aquí se muestra mi tabla de personajes</h1>

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

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = "root";
$password = "";
$server = "localhost";
$database = "duki";

$conexion = new mysqli($server, $username, $password, $database);

if ($conexion->connect_error){
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql ="SELECT * FROM superheroes";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0){

    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre Real</th>
            <th>Personaje</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Poderes</th>
            <th>Sexo</th>
            <th>Debilidad</th>
            <th>Creación</th>
            <th>Biografía</th>
            <th>Imagen</th>
          </tr>";

    while($row = $resultado->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["nombrereal"]."</td>";
    echo "<td>".$row["personaje"]."</td>";
    echo "<td>".$row["altura"]."</td>";
    echo "<td>".$row["peso"]."</td>";
    echo "<td>".$row["poderes"]."</td>";
    echo "<td>".$row["sexo"]."</td>";
    echo "<td>".$row["debilidad"]."</td>";
    echo "<td>".$row["creacion"]."</td>";
    echo "<td>".$row["biografia"]."</td>";
    echo "<td>";

    if($row['Imagen'] != NULL){
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Imagen']).'" width="100">';
    }else{
        echo "Sin Imagen";
    }

    echo "</td>";
    echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p style='text-align:center; font-size:20px;'>No hay datos</p>";
}

$conexion->close();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
