<table class="table table-bordered table-hover">
    <thead class="text-center">
        <tr>
            <th class="text-center table-dark">OBSERVACIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Consulta para obtener las observaciones
        $queryObservaciones = "SELECT * FROM observaciones WHERE idpedimentoc = ?";
        $stmtObservaciones = $conexion->prepare($queryObservaciones);

        if ($stmtObservaciones) {
            $stmtObservaciones->bind_param("i", $pedimento_id);
            $stmtObservaciones->execute();
            $resultObservaciones = $stmtObservaciones->get_result();

            $cuadroObservaciones = [];
            if ($resultObservaciones->num_rows > 0) {
                while ($row = $resultObservaciones->fetch_assoc()) {
                    $cuadroObservaciones[] = $row;
                }
            }

            // Mostrar las observaciones
            if (!empty($cuadroObservaciones)) {
                foreach ($cuadroObservaciones as $row) {
        ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td>No hay observaciones registradas.</td>
                </tr>
        <?php
            }

            $stmtObservaciones->close();
        } else {
            echo "<tr><td>Error en la consulta: " . htmlspecialchars($conexion->error) . "</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php if (!empty($cuadroObservaciones)) { ?>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque18_<?php echo htmlspecialchars($pedimento_id); ?>">
        Editar Bloque 18
    </button>
<?php } else { ?>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque18">
        <i class="fas fa-database"></i>
    </button>
<?php } ?>