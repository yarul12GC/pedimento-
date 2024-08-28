<?php
 foreach ($cuadropart1 as $sectionData) {
    $html .= '<tr>
                <td style="border: 1px solid black;text-align: center;">' . htmlspecialchars($sectionData['fraccionA']) . '</td>
                <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['nico']) . '</td>
                <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['vinc']) . '</td>
                <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['claveapp11']) . '</td>
                <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['umc']) . '</td>
                <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['cantumc']) . '</td>
                <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['umt']) . '</td>
                <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['cant']) . '</td>
                <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['claveapp4']) . '</td>
                <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['pod']) . '</td>
              </tr>';
}
