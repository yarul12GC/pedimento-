<?php
 $html .= '
 <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; text-align: center;">
 <thead>
     <tr>
         <th colspan="1" style="border-left: 1px solid black; text-align: center; font-weight: bold;">PERMISO</th>
         <th colspan="3" style="border-left: 1px solid black; text-align: center; font-weight: bold;">NUMERO DE PERMISO</th>
         <th colspan="2" style="border-left: 1px solid black; text-align: center; font-weight: bold;">FIRMA DE PERMISO</th>
         <th colspan="2" style="border-left: 1px solid black; text-align: center; font-weight: bold;">VAL. COM. DLS</th>
         <th colspan="2" style="border-left: 1px solid black; text-align: center; border-right: 1px solid black;  font-weight: bold;">CANTIDAD UMT</th>
     </tr>
 </thead>
 <tbody>';

 if (!empty($cuadropermisop4)) {
     foreach ($cuadropermisop4 as $rowPermisos) {
         $html .= '
     <tr>
         <td colspan="1" style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowPermisos['idapendice9']) . '</td>
         <td colspan="3" style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowPermisos['numpermiso']) . '</td>
         <td colspan="2" style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowPermisos['firmapermiso']) . '</td>
         <td colspan="2" style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowPermisos['valcomdls']) . '</td>
         <td colspan="2" style="border-left: 1px solid black; text-align: center; border-right: 1px solid black; ">' . htmlspecialchars($rowPermisos['cantidadumt']) . '</td>
     </tr>';
     }
 } else {
     $html .= '
 <tr>
     <td colspan="10" style="border: 1px solid black; text-align: center;">No se encontraron permisos</td>
 </tr>';
 }

 $html .= '
 </tbody>
</table>';
