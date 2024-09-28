<?php
$queryprovocom = "SELECT * FROM provedorocomprador WHERE idpedimentoc = ?";

$stmtprovocom = $conexion->prepare($queryprovocom);
$stmtprovocom->bind_param("i", $pedimento_id);
$stmtprovocom->execute();
$resultprovocom = $stmtprovocom->get_result();

if ($resultprovocom->num_rows > 0) {
    $rowpro = $resultprovocom->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th colspan="14" class="text-center table-dark">DATOS DEL PROVEEDOR O COMPRADOR</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tr>
            <th>ID.FISCAL</th>
            <th>NOMBRE,DENOMINACION O RAZON SOCIAL</th>
            <th>DOMICILIO</th>
            <th>VINCULACION</th>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($rowpro['idfiscal']); ?></td>
            <td><?php echo htmlspecialchars($rowpro['nombreDORS']); ?></td>
            <td>
                <?php
                echo htmlspecialchars('CALLE: ' . $rowpro['calle'] . ' NO. E ' . $rowpro['noexterior']);

                // Verificar si el nointerior es diferente de 0, sn, SN, o S/N
                $nointerior = $rowpro['nointerior'];
                if ($nointerior !== '0' && strtolower($nointerior) !== 'sn' && strtolower($nointerior) !== 's/n') {
                    echo htmlspecialchars(' NO. I ' . $rowpro['nointerior']);
                }

                // Continuar con el resto de los datos
                echo htmlspecialchars(' C.P. ' . $rowpro['codigo_postal'] . ' CIUDAD: ' . $rowpro['localidad'] . ' ESTADO: ' . $rowpro['entidadF'] . ' PAIS: ' . $rowpro['pais']);
                ?>
            </td>
            <td><?php echo htmlspecialchars($rowpro['vinculacion']); ?></td>
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque14_<?php echo $pedimento_id; ?>">
        Editar Bloque 14
    </button>
<?php
} else {
?>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th colspan="14" class="text-center">DATOS DEL PROVEEDOR O COMPRADOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>ID.FISCAL</th>
                <th>NOMBRE,DENOMINACION O RAZON SOCIAL</th>
                <th>DOMICILIO</th>
                <th>VINCULACION</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>

    </table>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque14">
        <i class="fas fa-database"></i>
    </button>
<?php
}
?>