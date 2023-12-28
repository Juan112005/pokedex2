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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Iniciar Sesión</div>

                    <div class="card-body">
                        <form action="../controllers/logincontroller.php" method="post">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" required minlength="8">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="login">Iniciar Sesión</button>
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
