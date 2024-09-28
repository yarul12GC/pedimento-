<body>
    <?php
    include_once '../conexion.php';
    include_once 'sesion.php';

    $last_idb6 = isset($_SESSION['bloques']['bloque6']) ? $_SESSION['bloques']['bloque6'] : null;

    if ($last_idb6 !== null) {
        $querybloque6 = "
        SELECT * FROM valorincrementable WHERE idincrementable =$last_idb6";
        $resultbloque6 = $conexion->query($querybloque6);
        if ($resultbloque6 && $resultbloque6->num_rows > 0) {
            $datosb6 = $resultbloque6->fetch_assoc();
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
                        <td><?php echo htmlspecialchars($datosb6['Vseguros']); ?></td>
                        <td><?php echo htmlspecialchars($datosb6['seguros']); ?></td>
                        <td><?php echo htmlspecialchars($datosb6['fletes']); ?></td>
                        <td><?php echo htmlspecialchars($datosb6['embalajes']); ?></td>
                        <td><?php echo htmlspecialchars($datosb6['otrosincrement']); ?></td>
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
</body>