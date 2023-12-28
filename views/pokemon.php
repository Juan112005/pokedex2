<?php include '../controllers/pokemoncontroller.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pokémon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">

        <a href="index.php" style="margin-left: 924px" class="btn btn-primary mb-4">Ver todos los Pokémon</a>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= ucfirst($info['name']) ?></h1>
                <p class="card-subtitle mb-2 text-muted">ID: <?= $info['id'] ?></p>
            </div>
            <div class="card-body">
                <img src="<?= $info['sprites']['front_default'] ?>" alt="<?= $info['name'] ?>" class="img-fluid mb-3">

                <h2>Detalles del Pokémon</h2>
                <ul class="list-group">
                    <li class="list-group-item">ltura: <?= $info['height'] ?></li>
                    <li class="list-group-item">Peso: <?= $info['weight'] ?></li>
                    <li class="list-group-item">Tipo(s):
                        <?php foreach ($info['types'] as $type): ?>
                            <?= ucfirst($type['type']['name']) ?> 
                        <?php endforeach; ?>
                    </li>
                    <li class="list-group-item">Estadísticas:</>
                        <ul>
                            <?php foreach ($info['stats'] as $stat): ?>
                                <li><?= ucfirst($stat['stat']['name']) ?>: <?= $stat['base_stat'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>

                <h2 class="mt-3">Habilidades</h2>
                <ul class="list-group">
                    <?php foreach ($info['abilities'] as $ability): ?>
                        <li class="list-group-item"><?= ucfirst($ability['ability']['name']) ?></li>
                    <?php endforeach; ?>
                </ul>

                <h2 class="mt-3">Movimientos</h2>
                <ul class="list-group">
                    <?php foreach ($info['moves'] as $move): ?>
                        <li class="list-group-item"><?= ucfirst($move['move']['name']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>
