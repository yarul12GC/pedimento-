<div class="form-section">
    <table class="table table-bordered table-hover">
        <thead class="text-center">
            <tr>
                <th colspan="3" class="text-center table-dark">TASA NIVEL PEDIMENTO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>CONTRIB</th>
                <th>CVE.T.TASA</th>
                <th>TASA</th>
            </tr>
            <?php
            // Preparar la consulta SQL
            $querytasasp = "
                SELECT 
                    tasapedimento.*, 
                    apendice18.idapendice18, 
                    apendice18.clave AS clavea18,
                    apendice12.idapendice12, 
                    apendice12.clave AS clavea12,
                    apendice12.descripcion AS descripcionAP
                FROM 
                    tasapedimento
                INNER JOIN 
                    apendice18 ON tasapedimento.idapendice18 = apendice18.idapendice18
                INNER JOIN 
                    apendice12 ON tasapedimento.idapendice12 = apendice12.idapendice12
                WHERE 
                    tasapedimento.idpedimentoc = ?
            ";

            // Ejecutar la consulta y obtener los resultados
            $stmttasasp = $conexion->prepare($querytasasp);
            $stmttasasp->bind_param("i", $pedimento_id);
            $stmttasasp->execute();
            $resulttasasp = $stmttasasp->get_result();

            $cuadrotasasp = [];
            if ($resulttasasp->num_rows > 0) {
                while ($rowtsp = $resulttasasp->fetch_assoc()) {
                    $cuadrotasasp[] = $rowtsp;
                }
            }

            // Mostrar los registros si hay datos
            if (!empty($cuadrotasasp)) {
                foreach ($cuadrotasasp as $rowtsp) {
            ?>
                    <tr>
                        <td><?php echo htmlspecialchars($rowtsp['clavea12'] . $rowtsp['descripcionAP']); ?></td>
                        <td><?php echo htmlspecialchars($rowtsp['clavea18']); ?></td>
                        <td><?php echo htmlspecialchars($rowtsp['tasa']); ?></td>
                    </tr>
                <?php
                }
                ?>
                <!-- Botón fuera del ciclo -->
                <tr>
                    <td colspan="3">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque10_<?php echo $pedimento_id; ?>">
                            Editar Bloque 10
                        </button>
                    </td>
                </tr>
            <?php
            } else {
                // Si no hay datos, mostrar un mensaje
            ?>
                <tr>
                    <td colspan="3" class="text-center">No hay datos disponibles</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque10">
                            <i class="fas fa-database"></i>
                        </button>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</div>