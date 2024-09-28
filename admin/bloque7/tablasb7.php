<body>
    <?php
    include_once '../conexion.php';
    include_once 'sesion.php';

    $last_idb7 = isset($_SESSION['bloques']['bloque7']) ? $_SESSION['bloques']['bloque7'] : null;

    if ($last_idb7 !== null) {
        $querybloque7 = "
        SELECT * FROM valordecrementable WHERE iddecrement =$last_idb7";
        $resultbloque7 = $conexion->query($querybloque7);
        if ($resultbloque7 && $resultbloque7->num_rows > 0) {
            $datosb7 = $resultbloque7->fetch_assoc();
            ?>
            <table class="table table-bordered table-hover">
                <thead class="text-center table-dark">
                    <tr>
                        <th colspan="14" class="text-center">VALOR DECREMENTABLES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">TRANSPORTE DECREMENTABLE</th>
                        <th scope="row">SEGURO DECREMENTABLE</th>
                        <th scope="row">CARGA</th>
                        <th scope="row">DESCARGA</th>
                        <th scope="row">OTROS DECREMENTABLES</th>
                    </tr>
                    <tr>
                        <td><?php echo htmlspecialchars($datosb7['VsegurosD']); ?></td>
                        <td><?php echo htmlspecialchars($datosb7['segurosD']); ?></td>
                        <td><?php echo htmlspecialchars($datosb7['fletesD']); ?></td>
                        <td><?php echo htmlspecialchars($datosb7['embalajesD']); ?></td>
                        <td><?php echo htmlspecialchars($datosb7['otrosDecrement']); ?></td>
                    </tr>
                </tbody>
            </table>

            <?php

        } else {
            ?>


            <table class="table table-bordered table-hover">
                <thead class="text-center table-dark">
                    <tr>
                        <th colspan="14" class="text-center">VALOR DECREMENTABLES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">TRANSPORTE DECREMENTABLE</th>
                        <th scope="row">SEGURO DECREMENTABLE</th>
                        <th scope="row">CARGA</th>
                        <th scope="row">DESCARGA</th>
                        <th scope="row">OTROS DECREMENTABLES</th>
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

    } else {
        ?>

        <table class="table table-bordered table-hover">
            <thead class="text-center table-dark">
                <tr>
                    <th colspan="14" class="text-center">VALOR DECREMENTABLES</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">TRANSPORTE DECREMENTABLE</th>
                    <th scope="row">SEGURO DECREMENTABLE</th>
                    <th scope="row">CARGA</th>
                    <th scope="row">DESCARGA</th>
                    <th scope="row">OTROS DECREMENTABLES</th>
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
</body>