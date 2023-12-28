<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['url'])) {
    $pokemonUrl = $_GET['url'];
    $info = json_decode(file_get_contents($pokemonUrl), true);
} 

