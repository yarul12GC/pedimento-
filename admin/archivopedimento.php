<?php
include_once '../conexion.php';
include_once '../sesion.php';

$idPedimento = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta combinada para obtener datos de los bloques 1, 2, 3 ,4 ,5 
$query = "
    SELECT dp.*, 
           a2.clave AS clave_apendice2,
           a16.clave AS clave_apendice16,
           ts.tipoCambio,
           ts.peso_bruto,
           a15.clave AS clavea15,
           a1_2.clave AS clavea1,
           t.*,
           a3_ent.clave AS clave_entrtadaSalida, 
           a3_arr.clave AS clave_arribo, 
           a3_sal.clave AS clave_salida,
           v.valorDolares,
           v.valorAduna,
           v.precioPagado,
           i.nombreE,
           i.rfc,
           i.curp,
           i.Calle,
           i.numeroInterior,
           i.numeroExterior,
           i.codigoPostal,
           i.municipio,
           i.entidadfederativa,
           i.pais
    FROM dpedimento dp
    INNER JOIN apendice2 a2 ON dp.idapendice2 = a2.idapendice2
    INNER JOIN apendice16 a16 ON dp.idapendice16 = a16.idapendice16
    INNER JOIN transacciones ts ON dp.idpedimento = ts.idpedimentoc
    INNER JOIN apendice15 a15 ON ts.idapendice15 = a15.idapendice15
    INNER JOIN apendice1 a1_2 ON ts.idapendice1 = a1_2.idapendice1
    INNER JOIN transporte t ON dp.idpedimento = t.idtransporte
    INNER JOIN apendice3 a3_ent ON t.idapendice3entrtadaSalida = a3_ent.idapendice3
    INNER JOIN apendice3 a3_arr ON t.idapendice3arribo = a3_arr.idapendice3
    INNER JOIN apendice3 a3_sal ON t.idapendice3salida = a3_sal.idapendice3
    INNER JOIN valoresp v ON dp.idpedimento = v.idpedimentoc
    INNER JOIN importadorexportador i ON dp.idpedimento = i.idpedimentoc
    WHERE dp.idpedimento = ?
";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $idPedimento);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $datos = $result->fetch_assoc();
} else {
    echo '<p>No se encontraron datos para este pedimento.</p>';
    exit();
}

$stmt->close();
$conexion->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivo Pedimento</title>
</head>

<body>
    <header>
        <?php include '../public/cabeza.php'; ?>
    </header>

    <section class="zona1">
        <table class="table table-bordered table-hover">
            <tr>
                <th>NUM.PEDIMENTO</th>
                <td><?php echo htmlspecialchars($datos['Nopedimento']); ?></td>
                <th>T.OPER</th>
                <td><?php echo htmlspecialchars($datos['Toper']); ?></td>
                <th>CVE PEDIMENTO</th>
                <td><?php echo htmlspecialchars($datos['clave_apendice2']); ?></td>
                <th>REGIMEN</th>
                <td><?php echo htmlspecialchars($datos['clave_apendice16']); ?></td>
            </tr>
        </table>
        <table class="table table-bordered table-hover">
            <tr>
                <th>DESTINO/ORIGEN</th>
                <td><?php echo htmlspecialchars($datos['clavea15']); ?></td>
                <th>TIPO DE CAMBIO</th>
                <td><?php echo htmlspecialchars($datos['tipoCambio']); ?></td>
                <th>PESO BRUTO</th>
                <td><?php echo htmlspecialchars($datos['peso_bruto']); ?></td>
                <th>ADUANA</th>
                <td><?php echo htmlspecialchars($datos['clavea1']); ?></td>
            </tr>
        </table>
        <div class="row">
            <div class="col-md-6">
                <div class="form-section">

                    <table class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th colspan="3" class="text-center bg-secondary text-light">MEDIOS DE TRANSPORTE</th>
                            </tr>
                            <tr>
                                <th>ENTRADA SALIDA</th>
                                <th>ARRIBO</th>
                                <th>SALIDA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo htmlspecialchars($datos['clave_entrtadaSalida']); ?></td>
                                <td><?php echo htmlspecialchars($datos['clave_arribo']); ?></td>
                                <td><?php echo htmlspecialchars($datos['clave_salida']); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-section">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>VALOR EN DOLARES</th>
                                <td>$<?php echo htmlspecialchars($datos['valorDolares']); ?></td>
                            </tr>
                            <tr>
                                <th>VALOR ADUANA</th>
                                <td>$<?php echo htmlspecialchars($datos['valorAduna']); ?></td>
                            </tr>
                            <tr>
                                <th>PRECIO PAGADO/VALOR COMERCIAL</th>
                                <td>$<?php echo htmlspecialchars($datos['precioPagado']); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="text-center ">
                <tr >
                    <th colspan="14" class=" bg-secondary text-light" >DATOS DEL IMPORTADOR/EXPORTADOR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="7" scope="row">NOMBRE, DENOMINACION O RAZON SOCIAL</th>
                    <td colspan="7"><?php echo htmlspecialchars($datos['nombreE']); ?></td>
                </tr>
                <tr>
                    <th scope="row">RFC</th>
                    <td colspan="13"><?php echo htmlspecialchars($datos['rfc']); ?></td>
                </tr>
                <tr>
                    <th scope="row">CURP</th>
                    <td colspan="13"><?php echo htmlspecialchars($datos['curp']); ?></td>
                </tr>
                <tr>
                    <th scope="row" colspan="14" class="text-center bg-secondary text-light">DOMICILIO</th>
                </tr>
                <tr>
                    <th scope="row">CALLE</th>
                    <td><?php echo htmlspecialchars($datos['Calle']); ?></td>
                    <th scope="row">NUMERO INTERIOR</th>
                    <td><?php echo htmlspecialchars($datos['numeroInterior']); ?></td>
                    <th scope="row">NUMERO EXTERIOR</th>
                    <td><?php echo htmlspecialchars($datos['numeroExterior']); ?></td>
                    <th scope="row">CODIGO POSTAL</th>
                    <td><?php echo htmlspecialchars($datos['codigoPostal']); ?></td>
                    <th scope="row">MUNICIPIO</th>
                    <td><?php echo htmlspecialchars($datos['municipio']); ?></td>
                    <th scope="row">ENTIDAD FEDERATIVA</th>
                    <td><?php echo htmlspecialchars($datos['entidadfederativa']); ?></td>
                    <th scope="row">PAIS</th>
                    <td><?php echo htmlspecialchars($datos['pais']); ?></td>
                </tr>
            </tbody>
        </table>
    </section>

    <footer class="mt-5">
        <?php include '../public/footer.php'; ?>
    </footer>

    <!-- Agrega Bootstrap JS y dependencias si es necesario -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>