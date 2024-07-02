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

    <title>MODAL B1</title>
</head>

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 1 </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-a-form" action="../admin/bloque1/insertar_datos.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bloque-a-campo1">NUM. PEDIMENTO</label>
                                    <input type="text" class="form-control" id="bloque-a-campo1" name="Nopedimento"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-a-campo2">T.OPER</label>
                                    <input type="text" class="form-control" id="bloque-a-campo2" name="Toper" required>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');

                                    $apendice2Result = $conexion->query("SELECT idapendice2, clave FROM apendice2");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">CVE PEDIMENTO (APENDICE2)
                                    </label><br>
                                    <select class="form-control" name="idapendice2">
                                        <?php while ($apendice2 = $apendice2Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice2['idapendice2'] ?>"><?= $apendice2['clave'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');

                                    $apendice16Result = $conexion->query("SELECT idapendice16, clave as clave16 FROM apendice16");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">REGIMEN (APENDICE16)
                                    </label><br>
                                    <select class="form-control" name="idapendice16">
                                        <?php while ($apendice16 = $apendice16Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice16['idapendice16'] ?>"><?= $apendice16['clave16'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bloque-a-campo5">ID PEDIMENTO C</label>
                            <input type="number" class="form-control" id="bloque-a-campo5" name="idpedimentoc">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 1</button>
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