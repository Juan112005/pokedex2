<?php include('../controllers/indexcontroller.php');?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pokémon</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .container {
            max-width: 800px;
            margin: 50px auto;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card:hover, .logout-link:hover {
            transform: scale(1.05);
        }

        h1 {
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        a {
            color: black;
        }

        .logout-link {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #eee;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">

<div class="container">
    <h1>Lista de Pokémon</h1>

    <div class="row">
        <?php foreach ($Lista['results'] as $pokemon): ?>
            <div class="col-md-4">
                <div class="card">
                    <a href="pokemon.php?url=<?= $pokemon['url'] ?>" class="card-body text-center">
                        <h5 class="card-title"><?= ucfirst($pokemon['name']) ?></h5>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<a href="../controllers/logout.php" class="logout-link">Cerrar Sesión</a>

</body>
</html>

