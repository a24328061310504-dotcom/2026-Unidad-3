<?php
require_once 'conexion.php'; 
include 'header.php';

try {
    $sql = "SELECT * FROM musica ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    $canciones = $stmt->fetchAll();
} catch (PDOException $e) {
    $canciones = [];
}
?>

<div class="container-fluid">
    <h1 class="text-center" style="color: purple;">Galería de Música</h1>
    <p style="text-align: center;">Consulta de canciones registradas</p>

    <div class="cards-grid">
        <?php foreach ($canciones as $c): ?>
            <div class="x-card">

                <div class="card-header">
                    <?php echo htmlspecialchars($c['titulo'] ?? 'Sin título'); ?>
                </div>

                <div class="card-body">
                    <p><strong>ID:</strong> <?php echo htmlspecialchars($c['id']); ?></p>

                    <p><strong>Artista:</strong> 
                        <?php echo htmlspecialchars($c['artista'] ?? 'Desconocido'); ?>
                    </p>

                    <p><strong>Álbum:</strong> 
                        <?php echo htmlspecialchars($c['album'] ?? 'No definido'); ?>
                    </p>

                    <p><strong>Género:</strong> 
                        <?php echo htmlspecialchars($c['genero'] ?? 'No definido'); ?>
                    </p>

                    <p><strong>Duración:</strong> 
                        <?php echo htmlspecialchars($c['duracion'] ?? 'No definida'); ?>
                    </p>

                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>