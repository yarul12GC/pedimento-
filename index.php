<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG CENCACOMEX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="media/locenca.png" type="image/x-icon" />
    <style>
        .placeholder-styled {
            font-size: 16px;
            opacity: 0.8;
        }
    </style>

</head>

<body>
    <section class="vh-100">
        <div class="card" style="background-image: url('media/fondo2.webp'); background-size: cover;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="media/fondo01.webp" alt="formulario de inicio de sesión" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="inicio_sesion.php" method="POST">
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <img src="media/locenca.png" alt="Logo" class="me-3" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                                                <span class="h1 fw-bold mb-0">CENCACOMEX <br></span>
                                                
                                                <span class="h3 fw-bold mb-0">(Pedimento)</span>

                                                
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Acceda a su cuenta</h5>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="correo">Correo electrónico</label>
                                                <input type="email" id="correo" name="email" placeholder="Ingrese su correo" class="form-control form-control-lg placeholder-styled" />
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <label class="form-label" for="contrasena">Contraseña</label>
                                                <div class="input-group">
                                                    <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" class="form-control form-control-lg placeholder-styled" />
                                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                        <img src="media/ver.png" alt="Mostrar/Ocultar contraseña" id="eyeIcon" style="width: 20px; height: 20px;">
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Iniciar sesión</button>
                                            </div>

                                            <p class="mb-5 pb-lg-2" style="color: #393f81;">¿No tienes una cuenta? <a href="registarusuario.php" style="color: #393f81;">Regístrate aquí</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
        var eyeIcon = document.getElementById('eyeIcon');
        var passwordInput = document.getElementById('contrasena');
        var isPasswordVisible = false;

        document.getElementById('togglePassword').addEventListener('click', function() {
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>