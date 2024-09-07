<?php
$querydembar = "SELECT * FROM dembarque WHERE idpedimentoc = ?";

$stmtdembar = $conexion->prepare($querydembar);
$stmtdembar->bind_param("i", $pedimento_id);
$stmtdembar->execute();
$resultdembar = $stmtdembar->get_result();

if ($resultdembar->num_rows > 0) {
    $rowemb = $resultdembar->fetch_assoc();
?><table class="table table-bordered table-hover">

        <tbody>
            <tr>
                <th>NUMERO (GUIA/ORDEN EMBARQUE)/ID:</th>
                <td><?php echo htmlspecialchars($rowemb['numeroembarque']); ?></td>

                <th>M</th>
                <td><?php echo htmlspecialchars($rowemb['nconocimiento']); ?></td>

                <th>H</th>
                <td><?php echo htmlspecialchars($rowemb['nhouse']); ?></td>

            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque16_<?php echo $pedimento_id; ?>">
        Editar Bloque 16
    </button>
<?php
} else {
?>
    <table class="table table-bordered table-hover">

        <tbody>
            <tr>
                <th>NUMERO (GUIA/ORDEN EMBARQUE)/ID:</th>
                <td></td>

                <th>M</th>
                <td></td>

                <th>H</th>
                <td></td>

            </tr>
        </tbody>

    </table>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque16">
        <i class="fas fa-database"></i>
    </button>


<?php
}
?>