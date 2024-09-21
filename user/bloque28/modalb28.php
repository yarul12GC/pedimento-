<body>
    <div class="modal fade" id="bloque28" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                      AGENTE ADUANAL</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Detalles del Agente Aduanal</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Nombre del Agente Aduanal:</strong> <?php echo htmlspecialchars($agenteNombre); ?></p>
                                        <p><strong>Apellido Paterno:</strong> <?php echo htmlspecialchars($agenteApellidoP); ?></p>
                                        <p><strong>Apellido Materno:</strong> <?php echo htmlspecialchars($agenteApellidoM); ?></p>
                                        <p><strong>CURP:</strong> <?php echo htmlspecialchars($agenteCurp); ?></p>
                                        <p><strong>RFC:</strong> <?php echo htmlspecialchars($agenteRfc); ?></p>
                                        <p><strong>Nacionalidad:</strong> <?php echo htmlspecialchars($agenteNacionalidad); ?></p>
                                        <p><strong>Tipo de Domicilio:</strong> <?php echo htmlspecialchars($agenteTipoDomicilio); ?></p>
                                        <p><strong>Estado:</strong> <?php echo htmlspecialchars($agenteEstado); ?></p>
                                        <p><strong>Localidad:</strong> <?php echo htmlspecialchars($agenteLocalidad); ?></p>
                                        <p><strong>Código Postal:</strong> <?php echo htmlspecialchars($agenteCodigoPostal); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>