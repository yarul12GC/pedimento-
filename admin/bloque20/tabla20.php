<?php
include_once '../conexion.php';
include_once '../sesion.php';

$bloques = isset($_SESSION['bloques']) ? $_SESSION['bloques'] : [];

foreach ($bloques as $last_idb20) {
    $querybloque20 = "SELECT * FROM partida1 WHERE idpartida1 = $last_idb20";
    $resultbloque20 = $conexion->query($querybloque20);
    if ($resultbloque20 && $resultbloque20->num_rows > 0) {
        $datosb20 = $resultbloque20->fetch_assoc();
?>

        <tr>
            <td><?php echo htmlspecialchars($datosb20['fraccionA']); ?></td>
            <td><?php echo htmlspecialchars($datosb20['nico']); ?></td>
            <td><?php echo htmlspecialchars($datosb20['vinc']); ?></td>
            <td><?php echo htmlspecialchars($datosb20['metval']); ?></td>
            <td><?php echo htmlspecialchars($datosb20['umc']); ?></td>
            <td><?php echo htmlspecialchars($datosb20['cantumc']); ?></td>
            <td><?php echo htmlspecialchars($datosb20['umt']); ?></td>
            <td><?php echo htmlspecialchars($datosb20['cant']); ?></td>
            <td><?php echo htmlspecialchars($datosb20['idapendice4']); ?></td>
            <td colspan="2"><?php echo htmlspecialchars($datosb20['pod']); ?></td>
        </tr>

<?php
    } else {
?>

        <tr>
            <td colspan="11">No data found</td>
        </tr>

<?php
    }
}
?>
