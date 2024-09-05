<table class="table table-bordered table-hover">
    <thead class="text-center">
        <tr>
            <th colspan="8" class="text-center table-dark">CUADRO DE LIQUIDACION</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>CONCEPTO</th>
            <th>F.P.</th>
            <th>IMPORTE</th>
        </tr>

        <?php
        $queryLiquidacion = "
                                SELECT cl.*, 
                                    a12_cl.idapendice12 AS id_apendice12_cl, 
                                    a12_cl.clave AS clavetpa12_cl,
                                    a13_cl.idapendice13 AS id_apendice13_cl, 
                                    a13_cl.clave AS clavetpa13_cl
                                FROM cuadrodeliquidacion cl
                                INNER JOIN apendice12 a12_cl ON cl.idapendice12 = a12_cl.idapendice12
                                INNER JOIN apendice13 a13_cl ON cl.idapendice13 = a13_cl.idapendice13
                                WHERE cl.idpedimentoc = ?
                            ";

        $stmtLiquidacion = $conexion->prepare($queryLiquidacion);
        $stmtLiquidacion->bind_param("i", $pedimento_id);
        $stmtLiquidacion->execute();
        $resultLiquidacion = $stmtLiquidacion->get_result();

        $cuadroLiquidacion = [];
        if ($resultLiquidacion->num_rows > 0) {
            while ($row = $resultLiquidacion->fetch_assoc()) {
                $cuadroLiquidacion[] = $row;
            }
        }

        if (!empty($cuadroLiquidacion)) {
            foreach ($cuadroLiquidacion as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['clavetpa12_cl']) . "</td>";
                echo "<td>" . htmlspecialchars($row['clavetpa13_cl']) . "</td>";
                echo "<td>" . htmlspecialchars($row['importe']) . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<!-- Botón fuera del ciclo -->
<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque11_<?php echo $pedimento_id; ?>">
    Editar Bloque 11
</button>
<?php
        } else {
?>
    <tr>
        <td colspan="3" class="text-center">No hay datos disponibles</td>
    </tr>
    </tbody>
    </table>

    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque11">
        <i class="fas fa-database"></i>
    </button>

<?php
        }
?>