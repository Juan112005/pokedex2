<?php
session_start();

if (isset($_SESSION['registration_success']) && $_SESSION['registration_success'] === true) {
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "USUARIO REGISTRADO",
                    text: "Usuario registrado con éxito. Ahora puedes iniciar sesión.",
                    icon: "success"
                });
            });
        </script>';
    unset($_SESSION['registration_success']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { min-height: 100vh; padding: 1rem 0; }
        .container { max-width: 540px; padding: 0 15px; }
        .card { box-shadow: 0 0 12px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="d-flex align-items-center">

    <div class="container mt-4 mt-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card">
                    <div class="card-header">Iniciar Sesión</div>
                    <div class="card-body">
                        <form action="../controllers/logincontroller.php" method="post">
                            <div class="form-group row">
                                <label for="email" class="col-12 col-md-4 col-form-label">Correo Electrónico</label>
                                <div class="col-12 col-md-8">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-12 col-md-4 col-form-label">Contraseña</label>
                                <div class="col-12 col-md-8">
                                    <input type="password" class="form-control" name="password" required minlength="8">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-12 col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-md-down-inline" name="login">Iniciar Sesión</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            ¿No tienes una cuenta? <a href="registro.php">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
