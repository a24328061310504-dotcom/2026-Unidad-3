<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relacionales</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Freckle+Face&display=swap" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fuente -->
    <link href="https://fonts.cdnfonts.com/css/zachary" rel="stylesheet">

<style>
body{
    background-color:#902923;
    color:#F5F5F5; 
    font-family: 'Freckle Face', cursive;
}

h1{
    font-family:'Freckle Face', cursive;
    color:#F8EDEB; 
    text-align:center;
    font-size: 50px;
}

.navbar{
    background-color:#800E13;
    border:none;
}

.navbar-brand,
.navbar-nav > li > a{
    color:#FFFFFF !important;
    font-family:'Freckle Face', cursive;
}

.navbar-nav > li > a:hover{
    color:#FFB3B3 !important; 
}

.dropdown-menu{
    background-color:#F8EDEB;
}

.dropdown-menu > li > a{
    color:#4A3F45;
    font-family:'Freckle Face', cursive;
}

.dropdown-menu > li > a:hover{
    background-color:#951D21;
    color:#FFFFFF;
}

.jumbotron{
    background-color:#951D21;
    color:#FFFFFF;
    padding:40px;
    border-radius:10px;
}

.btn-primary{
    background-color:#800E13;
    border:none;
    font-family:'Freckle Face', cursive;
}

.btn-primary:hover{
    background-color:#902923;
}

table{
    margin: auto;
    border-collapse: collapse;
    width: 90%;
    font-family: 'Freckle Face', cursive;
    background-color:#6E1B1F;
}

th, td{
    border: 1px solid #FFFFFF;
    padding: 8px;
    text-align: center;
    vertical-align: middle;
}

th{
    background-color:#951D21;
    color:#FFFFFF;
}
</style>
</head>

<body>
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

  <center> <h1>Cine</h1></center>
   
    <h2>Peliculas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Año</th>
            <th>Director</th>
            <th>Actores</th>
            <th>Personajes</th>
        </tr>
    <?php
    $username ="root";
    $password ="";
    $server ="localhost";
    $database ="peliculas"; 
    
    $conexion = new mysqli($server, $username, $password, $database);

    if($conexion->connect_error){
        die("<div style='color:red;'>Conexión fallida: " . $conexion->connect_error . "</div>");
    }

   $sql ="SELECT 
    p.PeliculaID,
    p.Titulo,
    p.AnioLanzamiento,
    d.Nombre AS Director,
    GROUP_CONCAT(DISTINCT a.Nombre SEPARATOR ', ') AS Actores,
    GROUP_CONCAT(DISTINCT pa.Personaje SEPARATOR ', ') AS Personajes

FROM Peliculas p
LEFT JOIN Directores d ON p.DirectorID = d.DirectorID
LEFT JOIN PeliculaActor pa ON p.PeliculaID = pa.PeliculaID
LEFT JOIN Actores a ON pa.ActorID = a.ActorID
GROUP BY p.PeliculaID";

    $result = $conexion->query($sql);

    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
echo "<td>" . $row['PeliculaID'] . "</td>";
echo "<td>" . $row['Titulo'] . "</td>";
echo "<td>" . $row['AnioLanzamiento'] . "</td>";
echo "<td>" . $row['Director'] . "</td>";
echo "<td>" . $row['Actores']  . "</td>";
echo "<td>" . $row['Personajes'] . "</td>";
echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No se encontraron personajes</td></tr>";
    }

    $conexion->close();
    ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>