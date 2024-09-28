<?php
$queryimpoex =  " SELECT * FROM importadorexportador WHERE idpedimentoc = ?";

$stmtimpoex = $conexion->prepare($queryimpoex);
$stmtimpoex->bind_param("i", $pedimento_id);
$stmtimpoex->execute();
$resultimpoex = $stmtimpoex->get_result();

if ($resultimpoex->num_rows > 0) {
    $datosimport = $resultimpoex->fetch_assoc();
?>
    <table class="table table-bordered table-hover">

        <thead class="text-center ">
            <tr>
                <th colspan="14" class="text-center table-dark">DATOS DEL IMPORTADOR/EXPORTADOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="7" scope="row">NOMBRE, DENOMINACION O RAZON SOCIAL</th>
                <td colspan="7"><?php echo htmlspecialchars($datosimport['nombreE']); ?></td>
            </tr>
            <tr>
                <th scope="row">RFC</th>
                <td colspan="13"><?php echo htmlspecialchars($datosimport['rfc']); ?></td>
            </tr>
            <tr>
                <th scope="row">CURP</th>
                <td colspan="13"><?php echo htmlspecialchars($datosimport['curp']); ?></td>
            </tr>
            <tr>
                <th scope="row" colspan="14" class="text-center table-dark">DOMICILIO</th>
            </tr>
            <tr>
                <th scope="row">CALLE</th>
                <td><?php echo htmlspecialchars($datosimport['Calle']); ?></td>

                <!-- Verificar si el número interior es válido -->
                <th scope="row">NUMERO INTERIOR</th>
                <td>
                    <?php
                    $numeroInterior = $datosimport['numeroInterior'];
                    if ($numeroInterior !== '0' && strtolower($numeroInterior) !== 'sn' && strtolower($numeroInterior) !== 's/n' && strtolower($numeroInterior) !== 's.n.') {
                        echo htmlspecialchars($numeroInterior);
                    }
                    ?>
                </td>

                <th scope="row">NUMERO EXTERIOR</th>
                <td><?php echo htmlspecialchars($datosimport['numeroExterior']); ?></td>

                <th scope="row">CODIGO POSTAL</th>
                <td><?php echo htmlspecialchars($datosimport['codigoPostal']); ?></td>

                <th scope="row">MUNICIPIO</th>
                <td><?php echo htmlspecialchars($datosimport['municipio']); ?></td>

                <th scope="row">ENTIDAD FEDERATIVA</th>
                <td><?php echo htmlspecialchars($datosimport['entidadfederativa']); ?></td>

                <th scope="row">PAIS</th>
                <td><?php echo htmlspecialchars($datosimport['pais']); ?></td>
            </tr>

        </tbody>
    </table>

    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque5_<?php echo $pedimento_id; ?>">
        Editar Bloque 5
    </button>
<?php
} else {
?>

    <table class="table table-bordered table-hover">
        <thead class="text-center table-dark">
            <tr>
                <th colspan="14" class="text-center table-dark">DATOS DEL IMPORTADOR/EXPORTADOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">NOMBRE, DENOMINACION O RAZON SOCIAL</th>
                <td colspan="13"></td>
            </tr>
            <tr>
                <th scope="row">RFC</th>
                <td colspan="13"></td>
            </tr>
            <tr>
                <th scope="row">CURP</th>
                <td colspan="13"></td>
            </tr>
            <tr>
                <th scope="row" colspan="14" class="text-center table-dark">DOMICILIO</th>
            </tr>
            <tr>
                <th scope="row">CALLE</th>
                <td></td>
                <th scope="row">NUMERO INTERIOR</th>
                <td></td>
                <th scope="row">NUMERO EXTERIOR</th>
                <td></td>
                <th scope="row">CODIGO POSTAL</th>
                <td></td>
                <th scope="row">MUNICIPIO</th>
                <td></td>
                <th scope="row">ENTIDAD FEDERATIVA</th>
                <td></td>
                <th scope="row">PAIS</th>
                <td></td>
            </tr>
        </tbody>
    </table>

    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque5">
        <i class="fas fa-database"></i>
    </button>
<?php
}
?>