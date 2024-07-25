<body>
    <div class="modal fade" id="bloque16" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 16</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../admin/bloque16/insertardatosb16.php" method="post">
                       <div class="row">
                       <div class="col-md-4">
                            <div class="form-group">
                                    <label for="fecha">NUMERO (GUIA/ORDEN EMBARQUE)/ID:</label>
                                    <input type="TEX" class="form-control" id="" name="numeroembarque">
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="fecha">M</label>
                                    <input type="TEX" class="form-control" id="" name="nconocimiento">
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    <label for="fecha">H</label>
                                    <input type="TEX" class="form-control" id="" name="nhouse">
                                </div>
                        </div>
                       </div>

                        <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 16</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    
</body>

</html>