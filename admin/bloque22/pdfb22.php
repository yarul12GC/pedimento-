<?php
if (!empty($cuadropart3)) {
    foreach ($cuadropart3 as $rowPart3) {
        $html .= '
        <tr>
            <td colspan="3" style="border: 1px solid black; text-align: center;">' . htmlspecialchars($rowPart3['valaduusd']) . '</td>
            <td colspan="2" style="border: 1px solid black; text-align: center;">' . htmlspecialchars($rowPart3['imppreciopag']) . '</td>
            <td colspan="2" style="border: 1px solid black; text-align: center;">' . htmlspecialchars($rowPart3['preciounitario']) . '</td>
            <td colspan="3" style="border: 1px solid black; text-align: center;">' . htmlspecialchars($rowPart3['valoragregado']) . '</td>
        </tr>';
    }
} else {
    $html .= '
    <tr>
        <td colspan="10" style="border: 1px solid black; text-align: center;">No se encontraron descripciones en partida3.</td>
    </tr>';
}