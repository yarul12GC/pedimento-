<?php
$querypermisos =  "SELECT permisos.*, apendice1.idapendice1, apendice1.clave AS claveapn1, apendice1.seccion
                FROM permisos
                INNER JOIN apendice1 ON permisos.idapendice1 = apendice1.idapendice1
                WHERE idpedimentoc = ?";

$stmtpermisos = $conexion->prepare($querypermisos);
$stmtpermisos->bind_param("i", $pedimento_id);
$stmtpermisos->execute();
$resultpermisos = $stmtpermisos->get_result();

if ($resultpermisos->num_rows > 0) {
    $datosperm = $resultpermisos->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <tbody>

            <tr>
                <th scope="row">ACUSE ELECTRONICO DE VALIDACION</th>
                <td><?php echo htmlspecialchars($datosperm['aviso_electronico']); ?></td>
                <th scope="row">CLAVE DE LA SECCION ADUANERA DE DESPACHO</th>
                <td><?php echo htmlspecialchars($datosperm['claveapn1'] . $datosperm['seccion']); ?></td>
            </tr>
            <tr>
                <tH scope="row">MARCAS, NUMERO Y TOTAL DE BULTOS:</tH>
                <td colspan="3"><?php echo htmlspecialchars($datosperm['marca'] . ' ' . $datosperm['modelo'] . ' ' . $datosperm['nBultos']); ?></td>

            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque8_<?php echo $pedimento_id; ?>">
        Editar Bloque 8
    </button>
<?php
} else {
?>
    <table class="table table-bordered table-hover">

        <tbody>
            <tr>
                <th scope="row">ACUSE ELECTRONICO DE VALIDACION</th>
                <td></td>
                <th scope="row">CLAVE DE LA SECCION ADUANERA DE DESPACHO</th>
                <td></td>
            </tr>
            <tr>
                <tH scope="row">MARCAS, NUMERO Y TOTAL DE BULTOS:</tH>
                <td colspan="3"></td>

            </tr>
        </tbody>
    </table>


    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque8">
        <i class="fas fa-database"></i>
    </button>

<?php
}
?>