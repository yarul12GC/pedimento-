<?php
include_once '../conexion.php';
include_once '../sesion.php';

$idPedimento = isset($_GET['id']) ? intval($_GET['id']) : 0;

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
           i.pais,
           vi.Vseguros,
           vi.seguros,
           vi.fletes,
           vi.embalajes,
           vi.otrosincrement,
           vd.VsegurosD,
           vd.segurosD,
           vd.fletesD,
           vd.embalajesD,
           vd.otrosDecrement,
           p.aviso_electronico,
           p.marca,
           p.modelo,
           p.nBultos,
           ap1.clave AS claveapn1,
           f.entrada,
           f.pago,
           tp.*, 
           a18.idapendice18, 
           a18.clave AS clavea18,
           a12.idapendice12, 
           a12.clave AS clavea12
          
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
    INNER JOIN valorincrementable vi ON dp.idpedimento = vi.idpedimentoc
    INNER JOIN valordecrementable vd ON dp.idpedimento = vd.idpedimentoc
    INNER JOIN permisos p ON dp.idpedimento = p.idpedimentoc
    INNER JOIN apendice1 ap1 ON p.idapendice1 = ap1.idapendice1
    INNER JOIN fechas f ON dp.idpedimento = f.idpedimentoc
    INNER JOIN tasapedimento tp ON dp.idpedimento = tp.idpedimentoc
    INNER JOIN apendice18 a18 ON tp.idapendice18 = a18.idapendice18
    INNER JOIN apendice12 a12 ON tp.idapendice12 = a12.idapendice12
    WHERE dp.idpedimento = ?
";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $idPedimento);
$stmt->execute();
$result = $stmt->get_result();

$tasas = [];
$datos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Almacena los datos de cada fila en los arrays correspondientes
        $tasas[] = $row;
    }

    // Almacena la primera fila en los arrays de datos si es necesario
    $datos = $tasas[0];
} else {
    echo '<p>No se encontraron datos para este pedimento o no has terminado de capturar tu pedimento.</p>';
    exit();
}

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
                <tr>
                    <th colspan="14" class=" bg-secondary text-light">DATOS DEL IMPORTADOR/EXPORTADOR</th>
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
        <table class="table table-bordered table-hover">
            <thead class="text-center">
                <tr>
                    <th colspan="14" class="text-center bg-secondary text-light">VALOR INCREMENTABLES</th>
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
                    <td><?php echo htmlspecialchars($datos['Vseguros']); ?></td>
                    <td><?php echo htmlspecialchars($datos['seguros']); ?></td>
                    <td><?php echo htmlspecialchars($datos['fletes']); ?></td>
                    <td><?php echo htmlspecialchars($datos['embalajes']); ?></td>
                    <td><?php echo htmlspecialchars($datos['otrosincrement']); ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-hover">
            <thead class="text-center">
                <tr>
                    <th colspan="14" class="text-center bg-secondary text-light">VALOR DECREMENTABLES</th>
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
                    <td><?php echo htmlspecialchars($datos['VsegurosD']); ?></td>
                    <td><?php echo htmlspecialchars($datos['segurosD']); ?></td>
                    <td><?php echo htmlspecialchars($datos['fletesD']); ?></td>
                    <td><?php echo htmlspecialchars($datos['embalajesD']); ?></td>
                    <td><?php echo htmlspecialchars($datos['otrosDecrement']); ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-hover">

            <tbody>
                <tr>
                    <th scope="row">ACUSE ELECTRONICO DE VALIDACION</th>
                    <td><?php echo htmlspecialchars($datos['aviso_electronico']); ?></td>
                    <th scope="row">CLAVE DE LA SECCION ADUANERA DE DESPACHO</th>
                    <td><?php echo htmlspecialchars($datos['claveapn1']); ?></td>
                </tr>
                <tr>
                    <tH scope="row">MARCAS, NUMERO Y TOTAL DE BULTOS:</tH>
                    <td colspan="3"><?php echo htmlspecialchars($datos['marca'] . ' ' . $datos['modelo'] . ' ' . $datos['nBultos']); ?></td>

                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-6">
                <div class="form-section">

                    <table class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th colspan="8" class="text-center bg-secondary text-light">FECHAS</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th>ENTRADAS</th>
                                <td><?php echo htmlspecialchars($datos['entrada']); ?></td>
                            </tr>
                            <tr>
                                <th>PAGO</th>
                                <td><?php echo htmlspecialchars($datos['pago']); ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-section">

                    <table class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th colspan="8" class="text-center bg-secondary text-light">TASA NIVEL PEDIMENTO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>CONTRIB</th>
                                <th>CVE.T.TASA</th>
                                <th>TASA</th>
                            </tr>
                            <?php
                            if (!empty($tasas)) {
                                foreach ($tasas as $row) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['clavea12']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['clavea18']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['tasa']) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No se encontraron registros.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-section">


                    <table class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th colspan="8" class="text-center  bg-secondary text-light">CUADRO DE LIQUIDACION</th>
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
                            $stmtLiquidacion->bind_param("i", $idPedimento);
                            $stmtLiquidacion->execute();
                            $resultLiquidacion = $stmtLiquidacion->get_result();

                            $cuadroLiquidacion = [];
                            if ($resultLiquidacion->num_rows > 0) {
                                while ($row = $resultLiquidacion->fetch_assoc()) {
                                    $cuadroLiquidacion[] = $row;
                                }
                            } else {
                                echo '<p>No se encontraron datos para el cuadro de liquidación de este pedimento.</p>';
                            }

                            if (!empty($cuadroLiquidacion)) {
                                foreach ($cuadroLiquidacion as $row) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['clavetpa12_cl']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['clavetpa13_cl']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['importe']) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de liquidación.</td></tr>";
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-section">

                    <table class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th colspan="8" class="text-center bg-secondary text-light">TOTALES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $querytotales = "SELECT * FROM total WHERE idpedimentoc = ?";

                            $stmttotales = $conexion->prepare($querytotales);
                            $stmttotales->bind_param("i", $idPedimento);
                            $stmttotales->execute();
                            $resulttotales = $stmttotales->get_result();

                            if ($resulttotales->num_rows > 0) {
                                $rowt = $resulttotales->fetch_assoc();
                            ?>
                                <tr>
                                    <th>EFECTIVO</th>
                                    <td><?php echo htmlspecialchars($rowt['efectivo']); ?></td>
                                </tr>
                                <tr>
                                    <th>OTROS</th>
                                    <td><?php echo htmlspecialchars($rowt['otros']); ?></td>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <td><?php echo htmlspecialchars($rowt['total']); ?></td>
                                </tr>
                            <?php
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de liquidación.</td></tr>";
                            }

                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="text-center">
                <tr>
                    <th colspan="6" class="text-center  bg-secondary text-light">DEPOSITO REFERENCIADO - LINEA DE CAPTURA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $querypagoe = "SELECT * FROM pagoelectronico WHERE idpedimentoc = ?";

                $stmtpagoe = $conexion->prepare($querypagoe);
                $stmtpagoe->bind_param("i", $idPedimento);
                $stmtpagoe->execute();
                $resultpagoe = $stmtpagoe->get_result();

                if ($resultpagoe->num_rows > 0) {
                    $rowpe = $resultpagoe->fetch_assoc();
                ?>
                    <tr>
                        <th colspan="6" class="text-center">***DEPOSITO ELECTRONICO***</th>
                    </tr>
                    <tr>
                        <th>PATENTE</th>
                        <td><?php echo htmlspecialchars($rowpe['patente']); ?></td>
                        <th>PEDIMENTO</th>
                        <td><?php echo htmlspecialchars($rowpe['pedimento']); ?></td>
                        <th>ADUANA</th>
                        <td><?php echo htmlspecialchars($rowpe['aduana']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="2" class="text-center">BANCO</th>
                        <td colspan="4" class="text-center"><?php echo htmlspecialchars($rowpe['banco']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2" scope="row" class="text-center">LINEA DE CAPTURA</th>
                        <td colspan="4" class="text-center"><?php echo htmlspecialchars($rowpe['lineaC']); ?></td>
                    </tr>
                    <tr>
                        <th>IMPORTE PAGADO</th>
                        <td><?php echo htmlspecialchars($rowpe['importePago']); ?></td>
                        <th>FECHA PAGADA</th>
                        <td colspan="3"><?php echo htmlspecialchars($rowpe['fechapago']); ?></td>
                    </tr>
                    <tr>
                        <th class="text-center" colspan="2" scope="row">NUMERO DE OPERACIÓN BANCARIA</th>
                        <td class="text-center" colspan="4"><?php echo htmlspecialchars($rowpe['noperacionbancar']); ?></td>
                    </tr>
                    <tr>
                        <th class="text-center" colspan="2" scope="row">NUMERO DE TRANSACCION SAT</th>
                        <td class="text-center" colspan="4"><?php echo htmlspecialchars($rowpe['ntransaccionS']); ?></td>
                    </tr>
                    <tr>
                        <th class="text-center" colspan="2" scope="row">MEDIO DE PRESENTACION</th>
                        <td class="text-center" colspan="4"><?php echo htmlspecialchars($rowpe['mPresentacion']); ?></td>
                    </tr>
                    <tr>
                        <th class="text-center" colspan="2" scope="row">MEDIO DE RECEPCION/COBRO</th>
                        <td class="text-center" colspan="4"><?php echo htmlspecialchars($rowpe['MedioRecepcion']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="6" class="text-center">
                            <?php if (!empty($rowpe['barcode_image'])) : ?>
                                <img src="data:image/png;base64,<?php echo base64_encode($rowpe['barcode_image']); ?>" alt="Código de Barras" width="400" height="80">
                            <?php else : ?>
                                No se encontró el código de barras.
                            <?php endif; ?>
                        </th>
                    </tr>

                <?php
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de liquidación.</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="14" class="text-center  bg-secondary text-light">DATOS DEL PROVEEDOR O COMPRADOR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $queryprovocom = "SELECT * FROM provedorocomprador WHERE idpedimentoc = ?";

                $stmtprovocom = $conexion->prepare($queryprovocom);
                $stmtprovocom->bind_param("i", $idPedimento);
                $stmtprovocom->execute();
                $resultprovocom = $stmtprovocom->get_result();

                if ($resultprovocom->num_rows > 0) {
                    $rowpro = $resultprovocom->fetch_assoc();
                ?>
                    <tr>
                        <th>ID.FISCAL</th>
                        <th>NOMBRE,DENOMINACION O RAZON SOCIAL</th>
                        <th>DOMICILIO</th>
                        <th>VINCULACION</th>
                    </tr>
                    <tr>
                        <td><?php echo htmlspecialchars($rowpro['idfiscal']); ?></td>
                        <td><?php echo htmlspecialchars($rowpro['nombreDORS']); ?></td>
                        <td><?php echo htmlspecialchars('CALLE: ' . $rowpro['calle'] . ' NO. E ' . $rowpro['noexterior'] . ' NO. I ' . $rowpro['nointerior'] . ' C.P. ' . $rowpro['codigo_postal'] . ' CIUDAD: ' . $rowpro['localidad'] . ' ESTADO ' . $rowpro['entidadF'] . ' PAIS: ' . $rowpro['pais']); ?></td>
                        <td><?php echo htmlspecialchars($rowpro['vinculacion']); ?></td>
                    </tr>
                <?php
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en los datos del comprador.</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <table class="table table-bordered table-hover">

            <tbody>
                <?php
                $querydmonetarios = " SELECT dmonetarios.numfactura, 
                dmonetarios.fecha, 
                a14.clave AS claveapn14, 
                a5.clave AS claveapn5, 
                dmonetarios.valmonfact, 
                dmonetarios.factormonfact, 
                dmonetarios.valdolares
                FROM dmonetarios 
                INNER JOIN apendice14 a14 ON dmonetarios.idapendice14 = a14.idapendice14
                INNER JOIN apendice5 a5 ON dmonetarios.idapendice5 = a5.idapendice5
                WHERE idpedimentoc = ?";

                $stmtdmonetarios = $conexion->prepare($querydmonetarios);
                $stmtdmonetarios->bind_param("i", $idPedimento);
                $stmtdmonetarios->execute();
                $resultdmonetarios = $stmtdmonetarios->get_result();

                if ($resultdmonetarios->num_rows > 0) {
                    $rowdm = $resultdmonetarios->fetch_assoc();
                ?>
                    <tr>
                        <th>NUM.FACTURA</th>
                        <th>FECHA</th>
                        <th>INCOTERM</th>
                        <th>MONEDA</th>
                        <th>VAL.MON.FACT</th>
                        <th>FACTOR MON. FACT</th>
                        <th>VAL. DOLARES</th>

                    </tr>
                    <tr>
                        <td><?php echo htmlspecialchars($rowdm['numfactura']); ?></td>
                        <td><?php echo htmlspecialchars($rowdm['fecha']); ?></td>
                        <td><?php echo htmlspecialchars($rowdm['claveapn14']); ?></td>
                        <td><?php echo htmlspecialchars($rowdm['claveapn5']); ?></td>
                        <td><?php echo htmlspecialchars($rowdm['valmonfact']); ?></td>
                        <td><?php echo htmlspecialchars($rowdm['factormonfact']); ?></td>
                        <td><?php echo htmlspecialchars($rowdm['valdolares']); ?></td>
                    </tr>
                <?php
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en los datos monetarios</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <table class="table table-bordered table-hover">

            <tbody>
                <?php
                $querydembar = "SELECT * FROM dembarque WHERE idpedimentoc = ?";

                $stmtdembar = $conexion->prepare($querydembar);
                $stmtdembar->bind_param("i", $idPedimento);
                $stmtdembar->execute();
                $resultdembar = $stmtdembar->get_result();

                if ($resultdembar->num_rows > 0) {
                    $rowemb = $resultdembar->fetch_assoc();
                ?>
                    <tr>
                        <th>NUMERO (GUIA/ORDEN EMBARQUE)/ID:</th>
                        <td><?php echo htmlspecialchars($rowemb['numeroembarque']); ?></td>

                        <th>M</th>
                        <td><?php echo htmlspecialchars($rowemb['nconocimiento']); ?></td>

                        <th>H</th>
                        <td><?php echo htmlspecialchars($rowemb['nhouse']); ?></td>

                    </tr>
                <?php
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en los datos monetarios</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>CLAVE/COMPL. IDENTIFICADOR</th>
                    <th>COMPLEMENTO 1</th>
                    <th>COMPLEMENTO 2</th>
                    <th>COMPLEMENTO 3</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $querycomplemento = "
                 SELECT c.*, a.clave AS claveap8
                    FROM complementos c
                    INNER JOIN apendice8 a ON c.idapendice8 = a.idapendice8
                    WHERE c.idpedimentoc = ?
                                            ";

                $stmtcomplemento = $conexion->prepare($querycomplemento);
                $stmtcomplemento->bind_param("i", $idPedimento);
                $stmtcomplemento->execute();
                $resultcomplemento = $stmtcomplemento->get_result();

                $cuadrocomplemento = [];
                if ($resultcomplemento->num_rows > 0) {
                    while ($rowcomp = $resultcomplemento->fetch_assoc()) {
                        $cuadrocomplemento[] = $rowcomp;
                    }
                } else {
                    echo '<p>No se encontraron complementos.</p>';
                }

                if (!empty($cuadrocomplemento)) {
                    foreach ($cuadrocomplemento as $rowcomp) {
                ?>
                        <tr>
                            <td><?php echo htmlspecialchars($rowcomp['claveap8']); ?></td>
                            <td><?php echo htmlspecialchars($rowcomp['complemento']); ?></td>
                            <td><?php echo htmlspecialchars($rowcomp['Complemento2']); ?></td>
                            <td><?php echo htmlspecialchars($rowcomp['Complemento3']); ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de complementos.</td></tr>";
                }
                ?>
            </tbody>

        </table>


        <table class="table table-bordered table-hover">
            <thead class="text-center">
                <tr>
                    <th class="text-center bg-secondary text-light">OBSERVACIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $querycomplemento = "SELECT * FROM observaciones WHERE idpedimentoc = ?";

                $stmtcomplemento = $conexion->prepare($querycomplemento);
                $stmtcomplemento->bind_param("i", $idPedimento);
                $stmtcomplemento->execute();
                $resultcomplemento = $stmtcomplemento->get_result();

                $cuadrocomplemento = [];
                if ($resultcomplemento->num_rows > 0) {
                    while ($rowcomp = $resultcomplemento->fetch_assoc()) {
                        $cuadrocomplemento[] = $rowcomp;
                    }
                } else {
                    echo '<p>No se encontraron OBSERVACIONES.</p>';
                }

                if (!empty($cuadrocomplemento)) {
                    foreach ($cuadrocomplemento as $rowcomp) {
                ?>
                        <tr>
                            <td><?php echo htmlspecialchars($rowcomp['descripcion']); ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de OBSERVACIONES.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="form-section">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center  bg-secondary text-light">PATIDAS</th>
                    </tr>
                </thead>


            </table>
        </div>
        <?php
        $secciones = [];

        $querypart1 = "SELECT p.*, 
                a11.clave AS claveapp11, 
                a4.clave AS claveapp4 
             FROM partida1 p
             INNER JOIN apendice11 a11 ON p.idapendice11 = a11.idapendice11
             INNER JOIN apendice4 a4 ON p.idapendice4 = a4.idapendice4
             WHERE p.idpedimentoc = ? ORDER BY section_id";

        $stmtpart1 = $conexion->prepare($querypart1);
        $stmtpart1->bind_param("i", $idPedimento);
        $stmtpart1->execute();
        $resultpart1 = $stmtpart1->get_result();

        if ($resultpart1->num_rows > 0) {
            while ($sectionData = $resultpart1->fetch_assoc()) {
                $secciones[$sectionData['section_id']]['partida1'][] = $sectionData;
            }
        }

        // Ejecuta la consulta para partida2
        $querypart2 = "SELECT descripcion, section_id FROM partida2 WHERE idpedimentoc = ? ORDER BY section_id";
        $stmtpart2 = $conexion->prepare($querypart2);
        $stmtpart2->bind_param("i", $idPedimento);
        $stmtpart2->execute();
        $resultpart2 = $stmtpart2->get_result();

        if ($resultpart2->num_rows > 0) {
            while ($rowPart2 = $resultpart2->fetch_assoc()) {
                $secciones[$rowPart2['section_id']]['partida2'][] = $rowPart2;
            }
        }
        // Ejecuta la consulta para partida3

        $querypart3 = "SELECT * FROM partida3 WHERE idpedimentoc = ? ORDER BY section_id";
        $stmtpart3 = $conexion->prepare($querypart3);
        $stmtpart3->bind_param("i", $idPedimento);
        $stmtpart3->execute();
        $resultpart3 = $stmtpart3->get_result();

        if ($resultpart3->num_rows > 0) {
            while ($rowPart3 = $resultpart3->fetch_assoc()) {
                $secciones[$rowPart3['section_id']]['partida3'][] = $rowPart3;
            }
        }
        // Ejecuta la consulta para permisos

        $querypermip4 = "SELECT * FROM permisop WHERE idpedimentoc = ? ORDER BY section_id";
        $stmtpermip4 = $conexion->prepare($querypermip4);
        $stmtpermip4->bind_param("i", $idPedimento);
        $stmtpermip4->execute();
        $resultpermip4 = $stmtpermip4->get_result();

        if ($resultpermip4->num_rows > 0) {
            while ($rowpermip4 = $resultpermip4->fetch_assoc()) {
                $secciones[$rowpermip4['section_id']]['permisos'][] = $rowpermip4;
            }
        }


        $querycomplement = "SELECT * FROM complementosp WHERE idpedimentoc = ? ORDER BY section_id";
        $stmtcomplement = $conexion->prepare($querycomplement);
        $stmtcomplement->bind_param("i", $idPedimento);
        $stmtcomplement->execute();
        $resultcomplement = $stmtcomplement->get_result();

        if ($resultcomplement->num_rows > 0) {
            while ($rowcomplement = $resultcomplement->fetch_assoc()) {
                $secciones[$rowcomplement['section_id']]['complementos'][] = $rowcomplement;
            }
        }

        $queryobsernp = "SELECT * FROM observacionesnp WHERE idpedimentoc = ? ORDER BY section_id";
        $stmtobsernp = $conexion->prepare($queryobsernp);
        $stmtobsernp->bind_param("i", $idPedimento);
        $stmtobsernp->execute();
        $resultobsernp = $stmtobsernp->get_result();

        if ($resultobsernp->num_rows > 0) {
            while ($rowobsernp = $resultobsernp->fetch_assoc()) {
                $secciones[$rowobsernp['section_id']]['observaciones'][] = $rowobsernp;
            }
        }

        $querycontribuciobes = "SELECT * FROM contribuciones WHERE idpedimentoc = ? ORDER BY section_id";
        $stmtcontribuciobes = $conexion->prepare($querycontribuciobes);
        $stmtcontribuciobes->bind_param("i", $idPedimento);
        $stmtcontribuciobes->execute();
        $resultcontribuciobes = $stmtcontribuciobes->get_result();

        if ($resultcontribuciobes->num_rows > 0) {
            while ($rowcontribuciobes = $resultcontribuciobes->fetch_assoc()) {
                $secciones[$rowcontribuciobes['section_id']]['contribuciones'][] = $rowcontribuciobes;
            }
        }


        foreach ($secciones as $idSeccion => $data) {
            $cuadropart1 = isset($data['partida1']) ? $data['partida1'] : [];
            $cuadropart2 = isset($data['partida2']) ? $data['partida2'] : [];
            $cuadropart3 = isset($data['partida3']) ? $data['partida3'] : [];
            $cuadropermisop4 = isset($data['permisos']) ? $data['permisos'] : [];
            $cuadrocomplementos = isset($data['complementos']) ? $data['complementos'] : [];
            $cuadroobservaciones = isset($data['observaciones']) ? $data['observaciones'] : [];
            $cuadrocontribuciones = isset($data['contribuciones']) ? $data['contribuciones'] : [];





        ?>
            <div class="duplicate-container">
                <div class="row row-cols-auto table-section">
                    <div class="col-md-1">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SECCION.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="15" class="text-center">1</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8">
                        <!-- Tabla para partida1 -->
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>FRACCION</th>
                                    <th>SUBD./NICO</th>
                                    <th>VINC</th>
                                    <th>MET VAL</th>
                                    <th>UMC</th>
                                    <th>CANT UMC</th>
                                    <th>UMT</th>
                                    <th>CANT UMT</th>
                                    <th>P.V/C</th>
                                    <th>P.O/D</th>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="10">IDENTIF</th>
                                </tr>
                                <tr>
                                    <th colspan="3">VAL.ADU./USD</th>
                                    <th colspan="2">IMP.PRECIO PAG.</th>
                                    <th colspan="2">PRECIO UNIT.</th>
                                    <th colspan="3">VAL. AGREG.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cuadropart1 as $sectionData) {
                                ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($sectionData['fraccionA']); ?></td>
                                        <td><?php echo htmlspecialchars($sectionData['nico']); ?></td>
                                        <td><?php echo htmlspecialchars($sectionData['vinc']); ?></td>
                                        <td><?php echo htmlspecialchars($sectionData['claveapp11']); ?></td>
                                        <td><?php echo htmlspecialchars($sectionData['umc']); ?></td>
                                        <td><?php echo htmlspecialchars($sectionData['cantumc']); ?></td>
                                        <td><?php echo htmlspecialchars($sectionData['umt']); ?></td>
                                        <td><?php echo htmlspecialchars($sectionData['cant']); ?></td>
                                        <td><?php echo htmlspecialchars($sectionData['claveapp4']); ?></td>
                                        <td><?php echo htmlspecialchars($sectionData['pod']); ?></td>
                                    </tr>
                                <?php
                                }
                                ?>


                                <?php
                                if (!empty($cuadropart2)) {
                                    foreach ($cuadropart2 as $rowPart2) {
                                ?>
                                        <tr>
                                            <td colspan="10" class="text-center"><?php echo htmlspecialchars($rowPart2['descripcion']); ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10">No se encontraron descripciones en partida2.</td>
                                    </tr>
                                <?php
                                }
                                ?>


                                <?php
                                if (!empty($cuadropart3)) {
                                    foreach ($cuadropart3 as $rowPart3) {
                                ?>
                                        <tr>
                                            <td colspan="3"><?php echo htmlspecialchars($rowPart3['valaduusd']); ?></td>
                                            <td colspan="2"><?php echo htmlspecialchars($rowPart3['imppreciopag']); ?></td>
                                            <td colspan="2"><?php echo htmlspecialchars($rowPart3['preciounitario']); ?></td>
                                            <td colspan="3"><?php echo htmlspecialchars($rowPart3['valoragregado']); ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10">No se encontraron descripciones en partida3.</td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <th colspan="1">PERMISO</th>
                                    <th colspan="3">NUMERO DE PERMISO</th>
                                    <th colspan="2">FIRMA DE PERMISO</th>
                                    <th colspan="2">VAL. COM. DLS</th>
                                    <th colspan="2">CANTIDAD UMT</th>
                                </tr>
                                <?php
                                if (!empty($cuadropermisop4)) {
                                    foreach ($cuadropermisop4 as $rowPermisos) {
                                ?>
                                        <tr>
                                            <td colspan="1"><?php echo htmlspecialchars($rowPermisos['idapendice9']); ?></td>
                                            <td colspan="3"><?php echo htmlspecialchars($rowPermisos['numpermiso']); ?></td>
                                            <td colspan="2"><?php echo htmlspecialchars($rowPermisos['firmapermiso']); ?></td>
                                            <td colspan="2"><?php echo htmlspecialchars($rowPermisos['valcomdls']); ?></td>
                                            <td colspan="2"><?php echo htmlspecialchars($rowPermisos['cantidadumt']); ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10">No se encontraron permisos</td>
                                    </tr>
                                <?php
                                }
                                ?>

                                <tr>
                                    <th colspan="2" class="text-center">IDENTIF</th>
                                    <th colspan="3" class="text-center">COMPLEMENTO 1</th>
                                    <th colspan="2" class="text-center">COMPLEMENTO 2</th>
                                    <th colspan="3" class="text-center">COMPLEMENTO 3</th>

                                </tr>
                                <?php
                                if (!empty($cuadrocomplementos)) {
                                    foreach ($cuadrocomplementos as $rowcomplementos) {
                                ?>
                                        <tr>
                                            <td colspan="2" class="text-center"><?php echo htmlspecialchars($rowcomplementos['idapendice8']); ?></td>
                                            <td colspan="3" class="text-center"><?php echo htmlspecialchars($rowcomplementos['complemento1']); ?></td>
                                            <td colspan="2" class="text-center"><?php echo htmlspecialchars($rowcomplementos['complemento2']); ?></td>
                                            <td colspan="3" class="text-center"><?php echo htmlspecialchars($rowcomplementos['complemento3']); ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10">No se encontraron complementos</td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <th colspan="10" class="text-center  bg-secondary text-light">OBSERVACIONES A NIVEL PARTIDA
                                    </th>
                                </tr>

                                <?php
                                if (!empty($cuadroobservaciones)) {
                                    foreach ($cuadroobservaciones as $rowobservacionesnp) {
                                ?>
                                        <tr>
                                            <td colspan="10" class="text-center"><?php echo htmlspecialchars($rowobservacionesnp['descripcionnp']); ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10">No se encontraron complementos</td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>




                    </div>
                    <div class="col-md-1">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>CON</th>
                                    <th>TASA</th>
                                    <th>T.T.</th>
                                    <th>F.P.</th>
                                    <th>IMPORTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    if (!empty($cuadrocontribuciones)) {
                                        foreach ($cuadrocontribuciones as $rowocontribuciones) {
                                    ?>
                                            <td><?php echo htmlspecialchars($rowocontribuciones['idapendice12']); ?></td>
                                            <td><?php echo htmlspecialchars($rowocontribuciones['tasa']); ?></td>
                                            <td><?php echo htmlspecialchars($rowocontribuciones['idapendice18']); ?></td>
                                            <td><?php echo htmlspecialchars($rowocontribuciones['idapendice13']); ?></td>
                                            <td><?php echo htmlspecialchars($rowocontribuciones['importe']); ?></td>
                                </tr>

                            <?php
                                        }
                                    } else {
                            ?>
                            <tr>
                                <td colspan="10">No se encontraron complementos</td>
                            </tr>
                        <?php
                                    }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>



    </section>

    <footer class="mt-5">
        <?php include '../public/footer.php'; ?>
    </footer>
</body>

</html>