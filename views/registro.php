<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro</div>

                    <div class="card-body">
                        <form action="../controllers/registrocontroller.php" method="post">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" required pattern="[A-Za-z\s]{1,}">
                                </div>
                            </div>

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

                            <div class="form-group row">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="confirm_password" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="register">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                        <div class="text-center mb-3">
                            ¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
