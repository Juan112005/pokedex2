<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$info = null;
$apiRequestLogs = [];

if (isset($_GET['url'])) {
    require_once __DIR__ . '/../helpers/api_helper.php';
    $pokemonUrl = $_GET['url'];
    $respuesta = fetchPokeApi($pokemonUrl, 'Detalle Pokémon');
    $apiRequestLogs[] = $respuesta['log'];
    if ($respuesta['data']) {
        $info = $respuesta['data'];
    }
}
