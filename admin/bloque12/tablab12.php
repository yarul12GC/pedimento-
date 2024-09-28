<body>
    <?php
    include_once '../conexion.php';
    include_once 'sesion.php';

    if (isset($_SESSION['bloques']['bloque12']) && is_array($_SESSION['bloques']['bloque12']) && count($_SESSION['bloques']['bloque12']) > 0) {
        $last_idb12 = intval(end($_SESSION['bloques']['bloque12']));

        $querybloque12 = "SELECT * FROM total WHERE idtotales = $last_idb12";
        $resultbloque12 = $conexion->query($querybloque12);

        if ($resultbloque12 && $resultbloque12->num_rows > 0) {
            $datosb12 = $resultbloque12->fetch_assoc();
    ?>

            <table class="table table-bordered table-hover">
                <thead class="text-center table-dark">
                    <tr>
                        <th colspan="8" class="text-center">TOTALES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>EFECTIVO</th>
                        <td><?php echo htmlspecialchars($datosb12['efectivo']); ?></td>
                    </tr>
                    <tr>
                        <th>OTROS</th>
                        <td><?php echo htmlspecialchars($datosb12['otros']); ?></td>
                    </tr>
                    <tr>
                        <th>TOTAL</th>
                        <td><?php echo htmlspecialchars($datosb12['total']); ?></td>
                    </tr>
                </tbody>
            </table>

        <?php
        } else {
        ?>
            <table class="table table-bordered table-hover">
                <thead class="text-center table-dark">
                    <tr>
                        <th colspan="8" class="text-center">TOTALES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>EFECTIVO</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>OTROS</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>TOTAL</th>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        <?php
        }
    } else {
        ?>

        <table class="table table-bordered table-hover">
            <thead class="text-center table-dark">
                <tr>
                    <th colspan="8" class="text-center">TOTALES</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>EFECTIVO</th>
                    <td></td>
                </tr>
                <tr>
                    <th>OTROS</th>
                    <td></td>
                </tr>
                <tr>
                    <th>TOTAL</th>
                    <td></td>
                </tr>
            </tbody>
        </table>
    <?php
    }
    ?>
</body>