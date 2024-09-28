<?php
$queryvaloresin =  " SELECT * FROM valorincrementable WHERE idpedimentoc = ?";

$stmtvaloresin = $conexion->prepare($queryvaloresin);
$stmtvaloresin->bind_param("i", $pedimento_id);
$stmtvaloresin->execute();
$resultvaloresin = $stmtvaloresin->get_result();

if ($resultvaloresin->num_rows > 0) {
    $datosincr = $resultvaloresin->fetch_assoc();
?>
    <table class="table table-bordered table-hover">

        <thead class="text-center">
            <tr>
                <th colspan="14" class="text-center table-dark">VALOR INCREMENTABLES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">VAL.SEGUROS</th>
                <th scope="row">SEGUROS</th>
                <th scope="row">FLETES</th>
                <th scope="row">EMBALAJES</th>
                <th scope="row">OTROS INCREMENTABLES</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($datosincr['Vseguros']); ?></td>
                <td><?php echo htmlspecialchars($datosincr['seguros']); ?></td>
                <td><?php echo htmlspecialchars($datosincr['fletes']); ?></td>
                <td><?php echo htmlspecialchars($datosincr['embalajes']); ?></td>
                <td><?php echo htmlspecialchars($datosincr['otrosincrement']); ?></td>
            </tr>
        </tbody>
    </table>
<?php

} else {
?>
    <table class="table table-bordered table-hover">
        <thead class="text-center table-dark">
            <tr>
                <th colspan="14" class="text-center">VALOR INCREMENTABLES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">VAL.SEGUROS</th>
                <th scope="row">SEGUROS</th>
                <th scope="row">FLETES</th>
                <th scope="row">EMBALAJES</th>
                <th scope="row">OTROS INCREMENTABLES</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
<?php
}
?>