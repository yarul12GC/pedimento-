<body>
    <div class="modal fade" id="bloque8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 8</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../admin/bloque8/insertardatosb8.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">ACUSE ELECTRONICO DE VALIDACION</label>
                                    <input type="text" class="form-control" id="bloque-b-campo1"
                                        name="aviso_electronico" required>
                                </div>
                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');
                                    $apendice1Result = $conexion->query("SELECT idapendice1, clave FROM apendice1");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">CLAVE DE LA SECCION ADUANERA DE DESPACHO</label><br>
                                    <select class="form-control" name="idapendice1">
                                        <?php while ($apendice1 = $apendice1Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice1['idapendice1'] ?>"><?= $apendice1['clave'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">MARCA</label>
                                    <input type="text" class="form-control" id="bloque-b-campo1" name="marca" required>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">MODELO</label>
                                    <input type="text" class="form-control" id="bloque-b-campo1" name="modelo" required>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo2">NUMERODE BULTOS</label>
                                    <input type="text" class="form-control" id="bloque-b-campo2" name="nBultos"
                                        required>
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 5</button>
                        </div>


                    </form>

                </div>

            </div>
        </div>
    </div>
</body>