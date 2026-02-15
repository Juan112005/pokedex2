<?php include '../controllers/pokemoncontroller.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($info) ? 'Detalles de ' . ucfirst($info['name']) : 'Error' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { padding-bottom: 2rem; }
        .container { max-width: 900px; padding: 0 15px; margin-top: 1rem; }
        @media (min-width: 576px) { .container { margin-top: 1.5rem; } }
        .btn-back { margin-bottom: 1rem; }
        .card img.img-fluid { max-height: 200px; width: auto; object-fit: contain; }
        @media (min-width: 576px) { .card img.img-fluid { max-height: 240px; } }
        .list-group-item ul { margin-bottom: 0; padding-left: 1.25rem; }
    </style>
</head>
<body>

    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center btn-back">
            <a href="index.php" class="btn btn-primary mb-2">← Ver todos los Pokémon</a>
        </div>

        <?php if (isset($info)): ?>
        <div class="card">
            <div class="card-header">
                <h1 class="card-title h4 mb-0"><?= ucfirst($info['name']) ?></h1>
                <p class="card-subtitle mb-0 mt-1 text-muted small">ID: <?= $info['id'] ?></p>
            </div>
            <div class="card-body">
                <img src="<?= htmlspecialchars($info['sprites']['front_default'] ?? '') ?>" alt="<?= htmlspecialchars($info['name']) ?>" class="img-fluid mb-3 d-block mx-auto">

                <h2 class="h5 mt-3">Detalles del Pokémon</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Altura: <?= $info['height'] ?></li>
                    <li class="list-group-item">Peso: <?= $info['weight'] ?></li>
                    <li class="list-group-item">Tipo(s):
                        <?php foreach ($info['types'] as $type): ?>
                            <?= ucfirst($type['type']['name']) ?>
                        <?php endforeach; ?>
                    </li>
                    <li class="list-group-item">Estadísticas:
                        <ul>
                            <?php foreach ($info['stats'] as $stat): ?>
                                <li><?= ucfirst($stat['stat']['name']) ?>: <?= $stat['base_stat'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>

                <h2 class="h5 mt-3">Habilidades</h2>
                <ul class="list-group list-group-flush">
                    <?php foreach ($info['abilities'] as $ability): ?>
                        <li class="list-group-item"><?= ucfirst($ability['ability']['name']) ?></li>
                    <?php endforeach; ?>
                </ul>

                <h2 class="h5 mt-3">Movimientos</h2>
                <ul class="list-group list-group-flush">
                    <?php foreach ($info['moves'] as $move): ?>
                        <li class="list-group-item"><?= ucfirst($move['move']['name']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php else: ?>
        <div class="alert alert-danger">
            No se pudo cargar el Pokémon. Revisa la consola del navegador para más detalles.
        </div>
        <?php endif; ?>
    </div>

    <script>
    (function() {
        var logs = <?= json_encode(isset($apiRequestLogs) ? $apiRequestLogs : []) ?>;
        logs.forEach(function(log) {
            var msg = log.label + ' → ' + log.status + ' ' + (log.message || '');
            if (log.status >= 400 || log.error) {
                console.error('[PokeAPI]', msg, log.url || '', log.error || '');
            } else {
                console.log('[PokeAPI]', msg, log.url || '');
            }
        });
    })();
    </script>
</body>
</html>
