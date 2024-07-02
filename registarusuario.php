<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENCA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="media/locenca.png" type="image/x-icon" />

</head>

<body>

    <section class="vh-00 zona1">
        <div class="container">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-sm p-4">
                        <h2 class="text-center mb-4">Registro de Usuario al Sistema de Pedimento</h2>
                        <form action="registrousu.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="contrasena" name="contrasena"
                                        required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <img src="media/ver.png" alt="Mostrar/Ocultar contraseña" id="eyeIcon"
                                            style="width: 20px; height: 20px;">
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="verificarContrasena" class="form-label">Verificar contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="verificarContrasena"
                                        name="verificarContrasena" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleVerifyPassword">
                                        <img src="media/ver.png" alt="Mostrar/Ocultar contraseña" id="verifyEyeIcon"
                                            style="width: 20px; height: 20px;">
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="tipoUsuarioID" value="4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">Registrar</button>
                            </div>
                            <p class="text-center mt-3 mb-0">¿Ya tienes una cuenta? <a href="index.php">Inicia sesión
                                    aquí</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var eyeIcon = document.getElementById('eyeIcon');
        var passwordInput = document.getElementById('contrasena');
        var isPasswordVisible = false;

        document.getElementById('togglePassword').addEventListener('click', function () {
            if (isPasswordVisible) {
                passwordInput.type = 'password';
                eyeIcon.src = 'media/ver.png'; // Cambia la ruta de la imagen al ojo oculto
                isPasswordVisible = false;
            } else {
                passwordInput.type = 'text';
                eyeIcon.src = 'media/noVer.png'; // Cambia la ruta de la imagen al ojo visible
                isPasswordVisible = true;
            }
        });

        var verifyEyeIcon = document.getElementById('verifyEyeIcon');
        var verifyPasswordInput = document.getElementById('verificarContrasena');
        var isVerifyPasswordVisible = false;

        document.getElementById('toggleVerifyPassword').addEventListener('click', function () {
            if (isVerifyPasswordVisible) {
                verifyPasswordInput.type = 'password';
                verifyEyeIcon.src = 'media/ver.png'; // Cambia la ruta de la imagen al ojo oculto
                isVerifyPasswordVisible = false;
            } else {
                verifyPasswordInput.type = 'text';
                verifyEyeIcon.src = 'media/noVer.png'; // Cambia la ruta de la imagen al ojo visible
                isVerifyPasswordVisible = true;
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>