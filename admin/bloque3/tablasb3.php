<body>
<?php
include_once '../conexion.php';
include_once '../sesion.php';



$last_idb3 = isset($_SESSION['bloques']['bloque3']) ? $_SESSION['bloques']['bloque3'] : null;


if ($last_idb3 !== null) {

    $querybloque3 = "
    SELECT 
    t.*,
    a1.clave AS clave_entrtadaSalida, 
    a2.clave AS clave_arribo, 
    a3.clave AS clave_salida
    FROM 
    transporte t
    INNER JOIN 
    apendice3 a1 ON t.idapendice3entrtadaSalida = a1.idapendice3
    INNER JOIN 
    apendice3 a2 ON t.idapendice3arribo = a2.idapendice3
    INNER JOIN 
    apendice3 a3 ON t.idapendice3salida = a3.idapendice3
    WHERE 
    t.idtransporte =$last_idb3
    ";

    $resultbloque3 = $conexion->query($querybloque3);
    if ($resultbloque3 && $resultbloque3->num_rows > 0) {
        $datosb3 = $resultbloque3->fetch_assoc();
        ?>
        <table class="table table-bordered table-hover">
            <thead class="text-center table-dark">
                <tr>
                    <th colspan="8" class="text-center">MEDIOS DE TRANSPORTE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>ENTRADA SALIDA</th>
                    <th>ARRIBO</th>
                    <th>SALIDA</th>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($datosb3['clave_entrtadaSalida']); ?></td>
                    <td><?php echo htmlspecialchars($datosb3['clave_arribo']); ?></td>
                    <td><?php echo htmlspecialchars($datosb3['clave_salida']); ?></td>
                </tr>
            </tbody>
        </table>
        <?php

    } else {
        ?>
        <table class="table table-bordered table-hover">
            <thead class="text-center table-dark">
                <tr>
                    <th colspan="8" class="text-center">MEDIOS DE TRANSPORTE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>ENTRADA SALIDA</th>
                    <th>ARRIBO</th>
                    <th>SALIDA</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add"
                viewBox="0 0 16 16">
                <path
                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                <path
                    d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
            </svg>
        </button>
        <?php
    }

} else {
    ?>
    <table class="table table-bordered table-hover">
        <thead class="text-center table-dark">
            <tr>
                <th colspan="8" class="text-center">MEDIOS DE TRANSPORTE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>ENTRADA SALIDA</th>
                <th>ARRIBO</th>
                <th>SALIDA</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>

            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add"
            viewBox="0 0 16 16">
            <path
                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
            <path
                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
        </svg>
    </button>
<?php
}
?>
</body>