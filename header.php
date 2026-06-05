<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Proyecto Música</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- Bootstrap 3 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Fuente -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">

<!-- Cambia el CSS -->
<link rel="stylesheet" href="estilomusica.css">

</head>

<body>

<nav class="navbar navbar-default">
<div class="container">

<div class="navbar-header">
<a class="navbar-brand" href="index.php">Inicio</a>
</div>

<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="nav navbar-nav">

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
Unidad 1 <span class="caret"></span>
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="mostrar.php">Mostrar Datos</a></li>
<li><a class="dropdown-item" href="musica.php">Registrar Música</a></li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
Unidad 2 <span class="caret"></span>
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="relaciones1.php">Relaciones</a></li>
<li><a class="dropdown-item" href="tarjetas.php">Galería de Música</a></li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
Unidad 3 <span class="caret"></span>
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="#">Perfil</a></li>
<li><a class="dropdown-item" href="#">Calculadora</a></li>
</ul>
</li>

</ul>
</div>

</div>
</nav>

<script>
setTimeout(function() {
    $(".alert").fadeOut(500);
}, 3000);
</script>