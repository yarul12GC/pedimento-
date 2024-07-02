<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <div class="modal fade" id="bloque3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 3 </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../admin/bloque3/insertardatosb3.php " method="post">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');

                                    $apendice3Result = $conexion->query("SELECT idapendice3, clave as clave3 FROM apendice3");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">ENTRADA/SALIDA (APENDICE 3)
                                    </label><br>
                                    <select class="form-control" name="idapendice3entrtadaSalida">
                                        <?php while ($apendice3 = $apendice3Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice3['idapendice3'] ?>"><?= $apendice3['clave3'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');

                                    $apendice3Result = $conexion->query("SELECT idapendice3, clave as clave3 FROM apendice3");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">ARRIBO(APENDICE 3)
                                    </label><br>
                                    <select class="form-control" name="idapendice3arribo">
                                        <?php while ($apendice3 = $apendice3Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice3['idapendice3'] ?>"><?= $apendice3['clave3'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');

                                    $apendice3Result = $conexion->query("SELECT idapendice3, clave as clave3 FROM apendice3");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">SALIDA (APENDICE 3)
                                    </label><br>
                                    <select class="form-control" name="idapendice3salida">
                                        <?php while ($apendice3 = $apendice3Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice3['idapendice3'] ?>"><?= $apendice3['clave3'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bloque-b-campo4">REFERENCIA DEL PEDIEMNTO COMPLETO</label>
                            <input type="text" class="form-control" id="bloque-b-campo2" name="idpedimentoc" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 2</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>