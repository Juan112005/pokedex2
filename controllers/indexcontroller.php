<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/../helpers/api_helper.php';

$urlLista = 'https://pokeapi.co/api/v2/pokemon/?limit=2000';
$respuesta = fetchPokeApi($urlLista, 'Lista Pokémon');
$apiRequestLogs = [$respuesta['log']];

$Lista = $respuesta['data'];
if (!$Lista || !isset($Lista['results'])) {
    $Lista = ['results' => []];
}

$porPagina = 12;
$maxPaginas = 100;
$maxPokemon = $porPagina * $maxPaginas; // 1200
$Lista['results'] = array_slice($Lista['results'], 0, $maxPokemon);

$paginaActual = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$totalPokemon = count($Lista['results']);
$totalPaginas = (int) max(1, ceil($totalPokemon / $porPagina));
$paginaActual = min($paginaActual, $totalPaginas);
$offset = ($paginaActual - 1) * $porPagina;
$pokemonesPagina = array_slice($Lista['results'], $offset, $porPagina);
