<?php
if (!empty($cuadropart2)) {
    foreach ($cuadropart2 as $rowPart2) {
        $html .= '
        <tr>
            <td colspan="10" style="border: 1px solid black;">' . htmlspecialchars($rowPart2['descripcion']) . '</td>
        </tr>';
    }
} else {
    $html .= '
    <tr>
        <td colspan="10" style="text-align: center; border: 1px solid black;">No hay datos disponibles</td>
    </tr>';
}