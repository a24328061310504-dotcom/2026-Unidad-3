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
<link href="https://fonts.googleapis.com/css2?family=Underdog&display=swap" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fuente -->
    <link href="https://fonts.cdnfonts.com/css/zachary" rel="stylesheet">

<style>
body{ 
    background-color:#2B0F13; /* fondo oscuro */
    color:#F5F5F5; 
    font-family: 'Underdog', cursive;
}

.jumbotron{
    background-color:#4A1C24; /* contenedor principal */
    color:#FFFFFF;
    padding:40px;
    border-radius:15px;
}

h1{
    color:#FF8FA3; 
    text-align:center;
}

table{
    margin: auto;
    border-collapse: collapse;
    width: 90%;
    background-color:#3A151B; /* fondo de tabla */
    border-radius:15px;
    overflow:hidden;
    font-family: 'Underdog', cursive;
}

th{
    background-color:#6A1E2D;
    color:#FFFFFF;
}

td{
    color:#F1DADA;
}

tr:nth-child(even){
    background-color:#331217; /* filas alternadas */
}

tr:hover{
    background-color:#5A1E28; /* efecto hover */
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
  < <li><a class="dropdown-item" href="peliculas.html">Buscador de peliculas</a></li>
    <li><a class="dropdown-item" href="pokedex.html">POKEDEX</a></li>
    <li><a class="dropdown-item" href="oceano.html">Vida Marina</a></li>
  </ul>
</li>
    </div>

  </div>
</nav>
    <div class="container" style="margin-top: 100px;">
        <div class="jumbotron">
            <h1 class="text-center" style="margin-bottom: 30px;">Aqui se vera mi tabla</h1>
            <div class="table-responsive">
                <table class="table table-hu" style="background: rgba(0,0,0,0.6); color: #ddd; border-radius: 12px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
                    <thead style="background: #F2C94C; color: #000; font-family: 'Oswald', sans-serif;">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Alias</th>
                            <th>Fecha de Creación</th>
                            <th>Descripción</th>
                            <th>Título de Cómic</th>
                            <th>Superpoder</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $username ="root";
                            $password ="";
                            $server ="127.0.0.1";
                            $database ="rockstar"; 
                            
                            mysqli_report(MYSQLI_REPORT_OFF);
                            $conexion = new mysqli();
                            $conexion->options(MYSQLI_OPT_CONNECT_TIMEOUT, 2);
                            @$conexion->real_connect($server, $username, $password, $database);

                            if($conexion->connect_error){
                                die("<tr><td colspan='7' style='color:#e55; text-align:center;'>Conexión fallida: " . $conexion->connect_error . "</td></tr>");
                            }

                            $sql ="SELECT 
                            p.personajeID AS personajeID,
                            p.nombre AS personaje_nombre,
                            p.alias AS alias,
                            p.FechaCreacion AS fechacreacion,
                            p.descripcion AS descripcion,
                            c.titulo AS titulo,
                            s.nombre AS nombre_superpoder
                            FROM personajes p
                            LEFT JOIN personajecomic pc ON p.personajeID = pc.personajeID
                            LEFT JOIN comics c ON pc.comicID = c.comicID
                            LEFT JOIN personajesuperpoder ps ON p.personajeID = ps.personajeID
                            LEFT JOIN superpoderes s ON ps.superpoderID = s.superpoderID";
                           
                            $result = $conexion->query($sql);

                            if($result && $result->num_rows >0){
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td>" . $row["personajeID"] . "</td>";
                                    echo "<td>" . $row["personaje_nombre"] . "</td>";
                                    echo "<td>" . $row["alias"] . "</td>";
                                    echo "<td>" . $row["fechacreacion"] . "</td>";
                                    echo "<td>" . (isset($row["descripcion"]) ? $row["descripcion"] : "") . "</td>";
                                    echo "<td>" . (isset($row["titulo"]) ? $row["titulo"] : "") . "</td>";
                                    echo "<td>" . (isset($row["nombre_superpoder"]) ? $row["nombre_superpoder"] : "") . "</td>";
                                    echo "</tr>";
                                }
                            } elseif ($conexion->error) {
                                echo "<tr><td colspan='7' style='color:red; text-align:center;'>Error SQL: " . $conexion->error . "</td></tr>";
                            } else {
                                echo "<tr><td colspan='7' style='text-align:center;'>No hay datos para mostrar</td></tr>";
                            }
                            $conexion->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>           