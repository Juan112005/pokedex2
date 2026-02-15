<?php include('../controllers/indexcontroller.php');?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pokémon</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .container { max-width: 960px; margin: 20px auto; padding: 0 15px; }
        @media (min-width: 576px) { .container { margin: 30px auto; } }
        @media (min-width: 768px) { .container { margin: 50px auto; } }

        .card {
            margin-bottom: 15px;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
            height: 93%;
            min-height: 140px;
        }
        .card .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 140px;
        }
        .card:hover, .logout-link:hover { transform: scale(1.03); }
        @media (min-width: 768px) { .card:hover, .logout-link:hover { transform: scale(1.05); } }

        .card img.pokemon-sprite {
            height: 72px;
            width: auto;
            max-width: 96px;
            object-fit: contain;
            flex-shrink: 0;
        }
        @media (min-width: 576px) { .card img.pokemon-sprite { height: 84px; } }
        @media (min-width: 768px) { .card img.pokemon-sprite { height: 96px; } }
        .card .card-title { font-size: 0.95rem; word-break: break-word; line-height: 1.2; }

        h1 {
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            font-size: 1.75rem;
        }
        @media (min-width: 576px) { h1 { font-size: 2rem; margin-bottom: 30px; } }

        a { color: black; }

        .logout-link {
            position: fixed;
            top: 10px;
            right: 10px;
            left: auto;
            background-color: #007bff;
            color: #fff !important;
            padding: 8px 14px;
            border-radius: 5px;
            font-size: 0.9rem;
            z-index: 1000;
        }
        .logout-link:hover { color: #fff !important; opacity: 0.9; }
        @media (max-width: 400px) { .logout-link { padding: 6px 10px; font-size: 0.85rem; } }

        .pagination { flex-wrap: wrap; }
        .page-item .page-link { padding: 0.4rem 0.6rem; font-size: 0.9rem; }
    </style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">

<div class="container">
    <h1>Lista de Pokémon</h1>

    <div class="row">
        <?php foreach ($pokemonesPagina as $pokemon):
            $id = basename(rtrim($pokemon['url'], '/'));
            $imgUrl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$id}.png";
        ?>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                <div class="card">
                    <a href="pokemon.php?url=<?= urlencode($pokemon['url']) ?>" class="card-body text-center text-decoration-none">
                        <img src="<?= htmlspecialchars($imgUrl) ?>" alt="<?= htmlspecialchars($pokemon['name']) ?>" class="pokemon-sprite d-block mx-auto mb-2">
                        <h5 class="card-title mb-0"><?= ucfirst($pokemon['name']) ?></h5>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($totalPaginas > 1): ?>
    <nav aria-label="Paginación de Pokémon" class="mt-4">
        <ul class="pagination justify-content-center flex-wrap">
            <li class="page-item <?= $paginaActual <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $paginaActual - 1 ?>">Anterior</a>
            </li>
            <?php
            $rango = 5;
            $desde = max(1, $paginaActual - $rango);
            $hasta = min($totalPaginas, $paginaActual + $rango);
            if ($desde > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                <?php if ($desde > 2): ?><li class="page-item disabled"><span class="page-link">…</span></li><?php endif;
            endif;
            for ($i = $desde; $i <= $hasta; $i++): ?>
                <li class="page-item <?= $i === $paginaActual ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor;
            if ($hasta < $totalPaginas): ?>
                <?php if ($hasta < $totalPaginas - 1): ?><li class="page-item disabled"><span class="page-link">…</span></li><?php endif; ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $totalPaginas ?>"><?= $totalPaginas ?></a></li>
            <?php endif; ?>
            <li class="page-item <?= $paginaActual >= $totalPaginas ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $paginaActual + 1 ?>">Siguiente</a>
            </li>
        </ul>
    </nav>
    <?php endif; ?>

    <p class="text-muted text-center mt-3 mb-0">Mostrando <?= count($pokemonesPagina) ?> de <?= $totalPokemon ?> Pokémon (página <?= $paginaActual ?> de <?= $totalPaginas ?>)</p>
</div>

<a href="../controllers/logout.php" class="logout-link">Cerrar Sesión</a>

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

