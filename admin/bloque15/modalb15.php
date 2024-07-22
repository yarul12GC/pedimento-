<body>
    <div class="modal fade" id="bloque15" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 15</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../admin/bloque15/insetardatosb15.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numfactura">NUM.FACTURA</label>
                                    <input type="text" class="form-control" id="" name="numfactura">
                                </div>
                                <div class="form-group">
                                    <label for="fecha">FECHA</label>
                                    <input type="date" class="form-control" id="" name="fecha">
                                </div>

                                <div class="form-group">
                                    <?php
                                    include('../conexion.php');
                                    $apendice14Result = $conexion->query("SELECT idapendice14, clave AS clavea14, descripcion FROM apendice14");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">INCOTERM</label><br>
                                    <select class="form-control" name="idapendice14">
                                        <option> --SELECCIONA INCOTERM-- </option>

                                        <?php while ($apendice14 = $apendice14Result->fetch_assoc()) : ?>
                                            <option value="<?= $apendice14['idapendice14'] ?>"><?= $apendice14['clavea14'] . ' - ' . $apendice14['descripcion'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                    include('../conexion.php');
                                    $apendice5Result = $conexion->query("SELECT idapendice5, clave AS clavea5 , pais FROM apendice5");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">MONEDA</label><br>
                                    <select class="form-control" name="idapendice5">
                                        <option> --SELECCIONA UNA MONEDA-- </option>
                                        <?php while ($apendice5 = $apendice5Result->fetch_assoc()) : ?>
                                            <option value="<?= $apendice5['idapendice5'] ?>"><?= $apendice5['clavea5'] . ' - ' . $apendice5['pais'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="valmonfact">VAL.MON.FACT</label>
                                    <input type="text" class="form-control" id="valmonfact" name="valmonfact">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                    include('../conexion.php');
                                    $apendice23Result = $conexion->query("SELECT * FROM apendice23");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">FACTOR MON. FACT</label><br>
                                    <select class="form-control" id="factormonfact" name="factormonfact">
                                        <option> --SELECCIONA LA EQUIVALENCIA-- </option>
                                        <?php while ($apendice23 = $apendice23Result->fetch_assoc()) : ?>
                                            <option value="<?= $apendice23['equivalencias'] ?>"><?= $apendice23['pais'] . ' - ' . $apendice23['equivalencias'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="valdolares">VAL. DOLARES</label>
                                    <input type="text" class="form-control" id="valdolares" name="valdolares" readonly>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 15</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var valmonfactInput = document.getElementById('valmonfact');
            var factormonfactSelect = document.getElementById('factormonfact');
            var valdolaresInput = document.getElementById('valdolares');

            function calculateDollars() {
                var valmonfact = parseFloat(valmonfactInput.value);
                var factormonfact = parseFloat(factormonfactSelect.value);
                if (!isNaN(valmonfact) && !isNaN(factormonfact) && factormonfact !== 0) {
                    var valdolares = valmonfact / factormonfact;
                    valdolaresInput.value = valdolares.toFixed(2);
                } else {
                    valdolaresInput.value = '';
                }
            }

            valmonfactInput.addEventListener('input', calculateDollars);
            factormonfactSelect.addEventListener('change', calculateDollars);
        });
    </script>
</body>

</html>