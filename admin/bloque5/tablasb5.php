<body>
    <?php
    include_once '../conexion.php';
    include_once 'sesion.php';

    $last_idb5 = isset($_SESSION['bloques']['bloque5']) ? $_SESSION['bloques']['bloque5'] : null;

    if ($last_idb5 !== null) {
        $querybloque5 = "
        SELECT * FROM importadorexportador WHERE idExportador =$last_idb5";
        $resultbloque5 = $conexion->query($querybloque5);
        if ($resultbloque5 && $resultbloque5->num_rows > 0) {
            $datosb5 = $resultbloque5->fetch_assoc();
    ?>

            <table class="table table-bordered table-hover">
                <thead class="text-center table-dark">
                    <tr>
                        <th colspan="14" class="text-center">DATOS DEL IMPORTADOR/EXPORTADOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="7" scope="row">NOMBRE, DENOMINACION O RAZON SOCIAL</th>
                        <td colspan="7"><?php echo htmlspecialchars($datosb5['nombreE']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">RFC</th>
                        <td colspan="13"><?php echo htmlspecialchars($datosb5['rfc']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">CURP</th>
                        <td colspan="13"><?php echo htmlspecialchars($datosb5['curp']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="14" class="text-center table-dark">DOMICILIO</th>
                    </tr>
                    <tr>
                        <th scope="row">CALLE</th>
                        <td><?php echo htmlspecialchars($datosb5['Calle']); ?></td>

                        <th scope="row">NUMERO INTERIOR</th>
                        <td>
                            <?php
                            $numeroInterior = $datosb5['numeroInterior'];
                            if ($numeroInterior !== '0' && strtolower($numeroInterior) !== 'sn' && strtolower($numeroInterior) !== 's/n' && strtolower($numeroInterior) !== 's.n.') {
                                echo htmlspecialchars($numeroInterior);
                            }
                            ?>
                        </td>

                        <th scope="row">NUMERO EXTERIOR</th>
                        <td><?php echo htmlspecialchars($datosb5['numeroExterior']); ?></td>

                        <th scope="row">CODIGO POSTAL</th>
                        <td><?php echo htmlspecialchars($datosb5['codigoPostal']); ?></td>

                        <th scope="row">MUNICIPIO</th>
                        <td><?php echo htmlspecialchars($datosb5['municipio']); ?></td>

                        <th scope="row">ENTIDAD FEDERATIVA</th>
                        <td><?php echo htmlspecialchars($datosb5['entidadfederativa']); ?></td>

                        <th scope="row">PAIS</th>
                        <td><?php echo htmlspecialchars($datosb5['pais']); ?></td>
                    </tr>

                </tbody>
            </table>

        <?php

        } else {
        ?>



            <table class="table table-bordered table-hover">
                <thead class="text-center table-dark">
                    <tr>
                        <th colspan="14" class="text-center">DATOS DEL IMPORTADOR/EXPORTADOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">NOMBRE, DENOMINACION O RAZON SOCIAL</th>
                        <td colspan="13"></td>
                    </tr>
                    <tr>
                        <th scope="row">RFC</th>
                        <td colspan="13"></td>
                    </tr>
                    <tr>
                        <th scope="row">CURP</th>
                        <td colspan="13"></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="14" class="text-center table-dark">DOMICILIO</th>
                    </tr>
                    <tr>
                        <th scope="row">CALLE</th>
                        <td></td>
                        <th scope="row">NUMERO INTERIOR</th>
                        <td></td>
                        <th scope="row">NUMERO EXTERIOR</th>
                        <td></td>
                        <th scope="row">CODIGO POSTAL</th>
                        <td></td>
                        <th scope="row">MUNICIPIO</th>
                        <td></td>
                        <th scope="row">ENTIDAD FEDERATIVA</th>
                        <td></td>
                        <th scope="row">PAIS</th>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add"
                    viewBox="0 0 16 16">
                    <path
                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                    <path
                        d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                </svg> </button>


        <?php
        }
    } else {
        ?>


        <table class="table table-bordered table-hover">
            <thead class="text-center table-dark">
                <tr>
                    <th colspan="14" class="text-center">DATOS DEL IMPORTADOR/EXPORTADOR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">NOMBRE, DENOMINACION O RAZON SOCIAL</th>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <th scope="row">RFC</th>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <th scope="row">CURP</th>
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <th scope="row" colspan="14" class="text-center table-dark">DOMICILIO</th>
                </tr>
                <tr>
                    <th scope="row">CALLE</th>
                    <td></td>
                    <th scope="row">NUMERO INTERIOR</th>
                    <td></td>
                    <th scope="row">NUMERO EXTERIOR</th>
                    <td></td>
                    <th scope="row">CODIGO POSTAL</th>
                    <td></td>
                    <th scope="row">MUNICIPIO</th>
                    <td></td>
                    <th scope="row">ENTIDAD FEDERATIVA</th>
                    <td></td>
                    <th scope="row">PAIS</th>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add"
                viewBox="0 0 16 16">
                <path
                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                <path
                    d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
            </svg> </button>


    <?php
    }


    ?>
</body>