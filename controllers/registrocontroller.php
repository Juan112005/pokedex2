<?php
include '../models/conexion.php';

session_start();

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    $verificar_email = "SELECT * FROM users WHERE email = '$email'";
    $resultado_email = $conexion->query($verificar_email);

    if ($resultado_email->num_rows > 0) {
        echo "El correo electrónico ya está registrado.";
        exit();
    }

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conexion->query($sql) === TRUE) {
        $_SESSION['registration_success'] = true;

        header("Location: ../views/login.php");
        exit();
    }

    $conexion->close();
}
