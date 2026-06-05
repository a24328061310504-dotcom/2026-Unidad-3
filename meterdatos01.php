<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro de Superhéroes</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sonsie+One&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root {
    --color-principal: #53131E;
    --color-secundario: #55202A;
}

body {
    font-family: "Sonsie One", system-ui;
    background-color: var(--color-principal);
    color: white;
}

h1 {
    text-align: center;
    color: #FFD6E0;
    font-family: "Sonsie One", system-ui;
}

form {
    width: 50%;
    margin: auto;
}

label {
    display: block;
    margin-top: 10px;
}

input, textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 6px;
    border: none;
    font-family: "Sonsie One", system-ui;
}

input[type="submit"] {
    background-color: var(--color-secundario);
    color: white;
    border: none;
    cursor: pointer;
    margin-top: 10px;
}

input[type="submit"]:hover{
    background-color: #6b2a36;
}

table{
    width: 95%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: var(--color-secundario);
    color: white;
    font-size: 12px;
    font-family: "Sonsie One", system-ui;
}

th{
    background-color: var(--color-principal);
    color: #FFD6E0;
    padding: 10px;
}

td{
    padding: 8px;
    text-align: center;
}

tr:nth-child(even){
    background-color: #6b2a36;
}

tr:hover{
    background-color: #7a3442;
}

.dropdown-menu{
    background-color:#F8EDEB;
}

.dropdown-menu > li > a{
    color:#a92e2e;
    font-family:'Lora', serif;
}

.dropdown-menu > li > a:hover{
    background-color:#b96262;
}
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg" style="background-color:# a14949;">
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
        <li><a class="dropdown-item" href="musica.php"> Musica</a></li>
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

<h1>Registro de Superhéroes</h1>

<form method="post">

<label>Nombre Real:</label>
<input type="text" name="nombre" required>

<label>Nombre del Personaje:</label>
<input type="text" name="personaje" required>

<label>Altura:</label>
<input type="text" name="altura" required>

<label>Peso:</label>
<input type="text" name="peso" required>

<label>Poderes:</label>
<input type="text" name="poderes" required>

<label>Sexo:</label>
<input type="text" name="sexo" required>

<label>Debilidad:</label>
<input type="text" name="debilidad" required>

<label>Fecha de Creación:</label>
<input type="date" name="fecha_creacion" required>

<label>Biografía:</label>
<textarea name="descripcion" required></textarea>

<input type="submit" value="Guardar Datos">
</form>

<?php

$conexion = new mysqli("localhost", "root", "", "duki");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);

   $personaje = mysqli_real_escape_string($conexion,$_POST['personaje']);

   $altura = mysqli_real_escape_string($conexion,$_POST['altura']);

   $peso = mysqli_real_escape_string($conexion,$_POST['peso']);

   $poderes = mysqli_real_escape_string($conexion,$_POST['poderes']);

   $sexo = mysqli_real_escape_string($conexion,$_POST['sexo']);

   $debilidad = mysqli_real_escape_string($conexion,$_POST['debilidad']);

   $creacion = mysqli_real_escape_string($conexion,$_POST['fecha_creacion']);

   $biografia = mysqli_real_escape_string($conexion,$_POST['descripcion']);

    $sql = "INSERT INTO superheroes
    (nombrereal, personaje, altura, peso, poderes, sexo, debilidad, creacion, biografia)
    VALUES
    ('$nombre','$personaje','$altura','$peso','$poderes','$sexo','$debilidad','$creacion','$biografia')";

    if ($conexion->query($sql) === TRUE) {
    header("Location: meterdatos01.php");
    exit();
} else {
        echo "<p style='color:red;'>Error: " . $conexion->error . "</p>";
    }
}

$sql = "SELECT * FROM superheroes";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

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
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p style='text-align:center;'>No hay datos</p>";
}

$conexion->close();
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>