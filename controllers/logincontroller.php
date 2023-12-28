<?php
include '../models/conexion.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['password']) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: ../views/index.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    }

    $conexion->close();
}
