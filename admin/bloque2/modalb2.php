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
    <div class="modal fade" id="bloque2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 2 </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../admin/bloque2/insertardatosb2.php" method="post" >
                        <div class="row">
                            <div class="col-md-6">

                                
                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');

                                    $apendice15Result = $conexion->query("SELECT idapendice15, clave as clave15 FROM apendice15");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">DESTINO O ORIGEN (APENDICE15)
                                    </label><br>
                                    <select class="form-control" name="idapendice15">
                                        <?php while ($apendice15 = $apendice15Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice15['idapendice15'] ?>"><?= $apendice15['clave15'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo2">TIPO DE CAMBIO</label>
                                    <input type="text" class="form-control" id="bloque-b-campo2" name="tipoCambio"
                                        required>
                                </div>
                            </div>


                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="bloque-b-campo3">PESO BRUTO</label>
                                    <input type="text" class="form-control" id="bloque-b-campo3" name="peso_bruto"
                                        required>
                                </div>
                               

                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');

                                    $apendice1Result = $conexion->query("SELECT idapendice1, clave as clave1 FROM apendice1");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">ADUNA (APENDICE1)
                                    </label><br>
                                    <select class="form-control" name="idapendice1">
                                        <?php while ($apendice1 = $apendice1Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice1['idapendice1'] ?>"><?= $apendice1['clave1'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bloque-b-campo5">ID PEDIEMNTO</label>
                                <input type="int" class="form-control" id="bloque-b-campo5" name="idpedimentoc"
                                    required>
                            </div>
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