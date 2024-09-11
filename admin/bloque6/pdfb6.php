<?php


$html .= '
    <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 6px;">
    <thead>
        <tr style="text-align: center;">
            <th style="font-weight:bold;">VAL. SEGUROS</th>
            <th style="font-weight:bold;">SEGUROS</th>
            <th style="font-weight:bold;">FLETES</th>
            <th style="font-weight:bold;">EMBALAJES</th>
            <th style="font-weight:bold;">OTROS INCREMENTABLES</th>
        </tr>
    </thead>
    <tbody>';

// Consulta SQL para obtener los valores incrementables
$queryvaloresin = "SELECT * FROM valorincrementable WHERE idpedimentoc = ?";
$stmtvaloresin = $conexion->prepare($queryvaloresin);
$stmtvaloresin->bind_param("i", $idPedimento);
$stmtvaloresin->execute();
$resultvaloresin = $stmtvaloresin->get_result();

if ($resultvaloresin->num_rows > 0) {
    // Obtener los datos de la consulta
    while ($datosincr = $resultvaloresin->fetch_assoc()) {
        $html .= '
        <tr style="text-align: center;">
            <td>' . htmlspecialchars($datosincr['Vseguros']) . '</td>
            <td>' . htmlspecialchars($datosincr['seguros']) . '</td>
            <td>' . htmlspecialchars($datosincr['fletes']) . '</td>
            <td>' . htmlspecialchars($datosincr['embalajes']) . '</td>
            <td>' . htmlspecialchars($datosincr['otrosincrement']) . '</td>
        </tr>';
    }
} else {
    // Mensaje si no hay registros
    $html .= '<tr><td colspan="5" style="text-align:center;">No se encontraron registros en el cuadro de valores incrementables.</td></tr>';
}
