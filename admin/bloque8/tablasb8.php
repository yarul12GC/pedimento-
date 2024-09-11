<body>
    <?php
    include_once '../conexion.php';
    include_once '../sesion.php';

    $last_idb8 = isset($_SESSION['bloques']['bloque8']) ? $_SESSION['bloques']['bloque8'] : null;

    if ($last_idb8 !== null) {
        $querybloque8 = "
       SELECT permisos.*, apendice1.idapendice1, apendice1.clave AS clavea1, apendice1.seccion
FROM permisos
INNER JOIN apendice1 ON permisos.idapendice1 = apendice1.idapendice1
WHERE permisos.idpermisos
=$last_idb8";
        $resultbloque8 = $conexion->query($querybloque8);
        if ($resultbloque8 && $resultbloque8->num_rows > 0) {
            $datosb8 = $resultbloque8->fetch_assoc();
    ?>

            <table class="table table-bordered table-hover">

                <tbody>
                    <tr>
                        <th scope="row">ACUSE ELECTRONICO DE VALIDACION</th>
                        <td><?php echo htmlspecialchars($datosb8['aviso_electronico']); ?></td>
                        <th scope="row">CLAVE DE LA SECCION ADUANERA DE DESPACHO</th>
                        <td><?php echo htmlspecialchars($datosb8['clavea1'] . $datosb8['seccion']); ?></td>
                    </tr>
                    <tr>
                        <tH scope="row">MARCAS, NUMERO Y TOTAL DE BULTOS:</tH>
                        <td colspan="3"><?php echo htmlspecialchars($datosb8['marca'] . ' ' . $datosb8['modelo'] . ' ' . $datosb8['nBultos']); ?></td>

                    </tr>
                </tbody>
            </table>




        <?php

        } else {
        ?>



            <table class="table table-bordered table-hover">

                <tbody>
                    <tr>
                        <th scope="row">ACUSE ELECTRONICO DE VALIDACION</th>
                        <td></td>
                        <th scope="row">CLAVE DE LA SECCION ADUANERA DE DESPACHO</th>
                        <td></td>
                    </tr>
                    <tr>
                        <tH scope="row">MARCAS, NUMERO Y TOTAL DE BULTOS:</tH>
                        <td colspan="3"></td>

                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque8">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                    <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                </svg> </button>


        <?php
        }
    } else {
        ?>

        <table class="table table-bordered table-hover">

            <tbody>
                <tr>
                    <th scope="row">ACUSE ELECTRONICO DE VALIDACION</th>
                    <td></td>
                    <th scope="row">CLAVE DE LA SECCION ADUANERA DE DESPACHO</th>
                    <td></td>
                </tr>
                <tr>
                    <tH scope="row">MARCAS, NUMERO Y TOTAL DE BULTOS:</tH>
                    <td colspan="3"></td>

                </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque8">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
            </svg> </button>

    <?php
    }


    ?>
</body>