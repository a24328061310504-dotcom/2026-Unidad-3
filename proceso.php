<?php
require_once 'conexion.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_POST){

    $titulo = $_POST['titulo'] ?? '';
    $duracion = $_POST['duracion'] ?? '';
    $album = $_POST['album'] ?? '';

    try {

        $stmt = $pdo->prepare("SELECT id_album FROM albumes WHERE titulo = :nombre");
        $stmt->execute([':nombre' => $album]);
        $id_album = $stmt->fetchColumn();

        if(!$id_album){
            $stmt = $pdo->prepare("INSERT INTO albumes (titulo) VALUES (:nombre)");
            $stmt->execute([':nombre' => $album]);
            $id_album = $pdo->lastInsertId();
        }

        $stmt = $pdo->prepare("INSERT INTO canciones (titulo, duracion, id_album) 
                               VALUES (:titulo, :duracion, :id_album)");

        $stmt->execute([
            ':titulo' => $titulo,
            ':duracion' => $duracion,
            ':id_album' => $id_album
        ]);

        echo "SI se guardó";

    } catch (PDOException $e) {
      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert' style='margin:20px;'>
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<strong>Error:</strong> ".$e->getMessage()."
</div>";
    }
}
?>