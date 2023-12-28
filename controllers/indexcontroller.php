<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$Lista = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon/?limit=20'), true);
