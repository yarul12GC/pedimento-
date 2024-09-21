<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>CLAVE/COMPL. IDENTIFICADOR</th>
            <th>COMPLEMENTO 1</th>
            <th>COMPLEMENTO 2</th>
            <th>COMPLEMENTO 3</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $querycomplemento = "
                 SELECT c.*, a.clave AS claveap8
                    FROM complementos c
                    INNER JOIN apendice8 a ON c.idapendice8 = a.idapendice8
                    WHERE c.idpedimentoc = ?
        ";

        $stmtcomplemento = $conexion->prepare($querycomplemento);
        $stmtcomplemento->bind_param("i", $pedimento_id);
        $stmtcomplemento->execute();
        $resultcomplemento = $stmtcomplemento->get_result();

        if ($resultcomplemento->num_rows > 0) {
            while ($rowcomp = $resultcomplemento->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($rowcomp['claveap8']); ?></td>
                    <td><?php echo htmlspecialchars($rowcomp['complemento']); ?></td>
                    <td><?php echo htmlspecialchars($rowcomp['Complemento2']); ?></td>
                    <td><?php echo htmlspecialchars($rowcomp['Complemento3']); ?></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="4" class="text-center">No se encontraron complementos</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php if ($resultcomplemento->num_rows > 0) { ?>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque17_<?php echo $pedimento_id; ?>">
        Editar Bloque 17
    </button>
<?php } else { ?>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque17">
        <i class="fas fa-database"></i>
    </button>
<?php } ?>

<?php
// Cierra la declaración y la conexión si es necesario
$stmtcomplemento->close();
?>