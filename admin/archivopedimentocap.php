<?php
include_once '../conexion.php';
include_once '../sesion.php';
include_once '../public/mensaje.php';

$pedimento_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

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
            <?php
            $querydpm =  " SELECT dp.*, 
        a2.clave AS clave_apendice2,
        a16.clave AS clave_apendice16
        FROM dpedimento dp
        INNER JOIN apendice2 a2 ON dp.idapendice2 = a2.idapendice2
        INNER JOIN apendice16 a16 ON dp.idapendice16 = a16.idapendice16
        WHERE idpedimentoc = ?";
            $stmtdpm = $conexion->prepare($querydpm);
            $stmtdpm->bind_param("i", $pedimento_id);
            $stmtdpm->execute();
            $resultdpm = $stmtdpm->get_result();

            if ($resultdpm->num_rows > 0) {
                $datodpm = $resultdpm->fetch_assoc();
            ?>
                <tr>
                    <th>NUM.PEDIMENTO</th>
                    <td><?php echo htmlspecialchars($datodpm['Nopedimento']); ?></td>
                    <th>T.OPER</th>
                    <td><?php echo htmlspecialchars($datodpm['Toper']); ?></td>
                    <th>CVE PEDIMENTO</th>
                    <td><?php echo htmlspecialchars($datodpm['clave_apendice2']); ?></td>
                    <th>REGIMEN</th>
                    <td><?php echo htmlspecialchars($datodpm['clave_apendice16']); ?></td>
                </tr>
            <?php
            } else {
            ?>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>NUM.PEDIMENTO</th>
                        <td></td>
                        <th>T.OPER</th>
                        <td></td>
                        <th>CVE PEDIMENTO</th>
                        <td></td>
                        <th>REGIMEN</th>
                        <td></td>
                    </tr>
                </table>
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
        </table>


        <table class="table table-bordered table-hover">
            <?php
            $querytransac =  "SELECT ts.*, a15.clave AS clavea15, a1.clave AS clavea1
            FROM transacciones ts
            INNER JOIN apendice15 a15 ON ts.idapendice15 = a15.idapendice15
            INNER JOIN apendice1 a1 ON ts.idapendice1 = a1.idapendice1
            WHERE idpedimentoc = ?";
            $stmttransac = $conexion->prepare($querytransac);
            $stmttransac->bind_param("i", $pedimento_id);
            $stmttransac->execute();
            $resulttransac = $stmttransac->get_result();

            if ($resulttransac->num_rows > 0) {
                $datotransac = $resulttransac->fetch_assoc();
            ?>
                <tr>
                    <th>DESTINO/ORIGEN</th>
                    <td><?php echo htmlspecialchars($datotransac['clavea15']); ?></td>
                    <th>TIPO DE CAMBIO</th>
                    <td><?php echo htmlspecialchars($datotransac['tipoCambio']); ?></td>
                    <th>PESO BRUTO</th>
                    <td><?php echo htmlspecialchars($datotransac['peso_bruto']); ?></td>
                    <th>ADUANA</th>
                    <td><?php echo htmlspecialchars($datotransac['clavea1']); ?></td>
                </tr>
            <?php
            } else {
            ?>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>DESTINO/ORIGEN</th>
                        <td></td>
                        <th>TIPO DE CAMBIO</th>
                        <td></td>
                        <th>PESO BRUTO</th>
                        <td></td>
                        <th>ADUANA</th>
                        <td></td>
                    </tr>
                </table>
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
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
                            <?php
                            $querytransp =  "SELECT 
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
                                WHERE idpedimentoc = ?";

                            $stmttransp = $conexion->prepare($querytransp);
                            $stmttransp->bind_param("i", $idPedimento);
                            $stmttransp->execute();
                            $resulttransp = $stmttransp->get_result();

                            if ($resulttransp->num_rows > 0) {
                                $datostrnsp = $resulttransp->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($datostrnsp['clave_entrtadaSalida']); ?></td>
                                    <td><?php echo htmlspecialchars($datostrnsp['clave_arribo']); ?></td>
                                    <td><?php echo htmlspecialchars($datostrnsp['clave_salida']); ?></td>
                                </tr>
                            <?php
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de valores.</td></tr>";
                            }

                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-section">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <?php
                            $queryvaloresp =  " SELECT * FROM valoresp WHERE idpedimentoc = ?";

                            $stmtvaloresp = $conexion->prepare($queryvaloresp);
                            $stmtvaloresp->bind_param("i", $idPedimento);
                            $stmtvaloresp->execute();
                            $resultvaloresp = $stmtvaloresp->get_result();

                            if ($resultvaloresp->num_rows > 0) {
                                $datosvp = $resultvaloresp->fetch_assoc();
                            ?>
                                <tr>
                                    <th>VALOR EN DOLARES</th>
                                    <td>$<?php echo htmlspecialchars($datosvp['valorDolares']); ?></td>
                                </tr>
                                <tr>
                                    <th>VALOR ADUANA</th>
                                    <td>$<?php echo htmlspecialchars($datosvp['valorAduna']); ?></td>
                                </tr>
                                <tr>
                                    <th>PRECIO PAGADO/VALOR COMERCIAL</th>
                                    <td>$<?php echo htmlspecialchars($datosvp['precioPagado']); ?></td>
                                </tr>
                        </tbody>
                    <?php
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de valores.</td></tr>";
                            }

                    ?>
                    </table>

                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover">
            <?php
            $queryimpoex =  " SELECT * FROM importadorexportador WHERE idpedimentoc = ?";

            $stmtimpoex = $conexion->prepare($queryimpoex);
            $stmtimpoex->bind_param("i", $idPedimento);
            $stmtimpoex->execute();
            $resultimpoex = $stmtimpoex->get_result();

            if ($resultimpoex->num_rows > 0) {
                $datosimport = $resultimpoex->fetch_assoc();
            ?>
                <thead class="text-center ">
                    <tr>
                        <th colspan="14" class=" bg-secondary text-light">DATOS DEL IMPORTADOR/EXPORTADOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="7" scope="row">NOMBRE, DENOMINACION O RAZON SOCIAL</th>
                        <td colspan="7"><?php echo htmlspecialchars($datosimport['nombreE']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">RFC</th>
                        <td colspan="13"><?php echo htmlspecialchars($datosimport['rfc']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">CURP</th>
                        <td colspan="13"><?php echo htmlspecialchars($datosimport['curp']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="14" class="text-center bg-secondary text-light">DOMICILIO</th>
                    </tr>
                    <tr>
                        <th scope="row">CALLE</th>
                        <td><?php echo htmlspecialchars($datosimport['Calle']); ?></td>
                        <th scope="row">NUMERO INTERIOR</th>
                        <td><?php echo htmlspecialchars($datosimport['numeroInterior']); ?></td>
                        <th scope="row">NUMERO EXTERIOR</th>
                        <td><?php echo htmlspecialchars($datosimport['numeroExterior']); ?></td>
                        <th scope="row">CODIGO POSTAL</th>
                        <td><?php echo htmlspecialchars($datosimport['codigoPostal']); ?></td>
                        <th scope="row">MUNICIPIO</th>
                        <td><?php echo htmlspecialchars($datosimport['municipio']); ?></td>
                        <th scope="row">ENTIDAD FEDERATIVA</th>
                        <td><?php echo htmlspecialchars($datosimport['entidadfederativa']); ?></td>
                        <th scope="row">PAIS</th>
                        <td><?php echo htmlspecialchars($datosimport['pais']); ?></td>
                    </tr>
                </tbody>
            <?php
            } else {
                echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de importador o exportador.</td></tr>";
            }

            ?>
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
                <?php
                $queryvaloresin =  " SELECT * FROM valorincrementable WHERE idpedimentoc = ?";

                $stmtvaloresin = $conexion->prepare($queryvaloresin);
                $stmtvaloresin->bind_param("i", $idPedimento);
                $stmtvaloresin->execute();
                $resultvaloresin = $stmtvaloresin->get_result();

                if ($resultvaloresin->num_rows > 0) {
                    $datosincr = $resultvaloresin->fetch_assoc();
                ?>
                    <tr>
                        <td>$<?php echo htmlspecialchars($datosincr['Vseguros']); ?></td>
                        <td>$<?php echo htmlspecialchars($datosincr['seguros']); ?></td>
                        <td>$<?php echo htmlspecialchars($datosincr['fletes']); ?></td>
                        <td>$<?php echo htmlspecialchars($datosincr['embalajes']); ?></td>
                        <td>$<?php echo htmlspecialchars($datosincr['otrosincrement']); ?></td>
                    </tr>
                <?php
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de valores incrementable.</td></tr>";
                }

                ?>
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
                    <?php
                    $queryvaloresd =  " SELECT * FROM valordecrementable WHERE idpedimentoc = ?";

                    $stmtvaloresd = $conexion->prepare($queryvaloresd);
                    $stmtvaloresd->bind_param("i", $idPedimento);
                    $stmtvaloresd->execute();
                    $resultvaloresd = $stmtvaloresd->get_result();

                    if ($resultvaloresd->num_rows > 0) {
                        $datosdcre = $resultvaloresd->fetch_assoc();
                    ?>
                        <td>$<?php echo htmlspecialchars($datosdcre['VsegurosD']); ?></td>
                        <td>$<?php echo htmlspecialchars($datosdcre['segurosD']); ?></td>
                        <td>$<?php echo htmlspecialchars($datosdcre['fletesD']); ?></td>
                        <td>$<?php echo htmlspecialchars($datosdcre['embalajesD']); ?></td>
                        <td>$<?php echo htmlspecialchars($datosdcre['otrosDecrement']); ?></td>
                </tr>
            <?php
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de valores decrementables.</td></tr>";
                    }

            ?>
            </tbody>
        </table>

        <table class="table table-bordered table-hover">

            <tbody>
                <?php
                $querypermisos =  "SELECT permisos.*, apendice1.idapendice1, apendice1.clave AS claveapn1
                FROM permisos
                INNER JOIN apendice1 ON permisos.idapendice1 = apendice1.idapendice1
                WHERE idpedimentoc = ?";

                $stmtpermisos = $conexion->prepare($querypermisos);
                $stmtpermisos->bind_param("i", $idPedimento);
                $stmtpermisos->execute();
                $resultpermisos = $stmtpermisos->get_result();

                if ($resultpermisos->num_rows > 0) {
                    $datosperm = $resultpermisos->fetch_assoc();
                ?>

                    <tr>
                        <th scope="row">ACUSE ELECTRONICO DE VALIDACION</th>
                        <td><?php echo htmlspecialchars($datosperm['aviso_electronico']); ?></td>
                        <th scope="row">CLAVE DE LA SECCION ADUANERA DE DESPACHO</th>
                        <td><?php echo htmlspecialchars($datosperm['claveapn1']); ?></td>
                    </tr>
                    <tr>
                        <tH scope="row">MARCAS, NUMERO Y TOTAL DE BULTOS:</tH>
                        <td colspan="3"><?php echo htmlspecialchars($datosperm['marca'] . ' ' . $datosperm['modelo'] . ' ' . $datosperm['nBultos']); ?></td>

                    </tr>
                <?php
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de permisos.</td></tr>";
                }

                ?>
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
                            <?php
                            $queryfechas = "SELECT * FROM fechas WHERE idpedimentoc = ?";

                            $stmtfechas = $conexion->prepare($queryfechas);
                            $stmtfechas->bind_param("i", $idPedimento);
                            $stmtfechas->execute();
                            $resultfechas = $stmtfechas->get_result();

                            if ($resultfechas->num_rows > 0) {
                                $rowfech = $resultfechas->fetch_assoc();
                            ?>

                                <tr>
                                    <th>ENTRADAS</th>
                                    <td><?php echo htmlspecialchars($rowfech['entrada']); ?></td>
                                </tr>
                                <tr>
                                    <th>PAGO</th>
                                    <td><?php echo htmlspecialchars($rowfech['pago']); ?></td>

                                </tr>
                            <?php
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de fechas.</td></tr>";
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
                            $querytasasp = "
                                    SELECT 
                                tasapedimento.*, 
                                apendice18.idapendice18, 
                                apendice18.clave AS clavea18,
                                apendice12.idapendice12, 
                                apendice12.clave AS clavea12
                            FROM 
                                tasapedimento
                            INNER JOIN 
                                apendice18 ON tasapedimento.idapendice18 = apendice18.idapendice18
                            INNER JOIN 
                                apendice12 ON tasapedimento.idapendice12 = apendice12.idapendice12
                            WHERE tasapedimento.idpedimentoc = ?
                                                                ";

                            $stmttasasp = $conexion->prepare($querytasasp);
                            $stmttasasp->bind_param("i", $idPedimento);
                            $stmttasasp->execute();
                            $resulttasasp = $stmttasasp->get_result();

                            $cuadrotasasp = [];
                            if ($resulttasasp->num_rows > 0) {
                                while ($rowtsp = $resulttasasp->fetch_assoc()) {
                                    $cuadrotasasp[] = $rowtsp;
                                }
                            } else {
                                echo '<p>No se encontraron contribuciones.</p>';
                            }

                            if (!empty($cuadrotasasp)) {
                                foreach ($cuadrotasasp as $rowtsp) {
                            ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($rowtsp['clavea12']); ?></td>
                                        <td><?php echo htmlspecialchars($rowtsp['clavea18']); ?></td>
                                        <td>$<?php echo htmlspecialchars($rowtsp['tasa']); ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de contribuciones.</td></tr>";
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
                                    echo "<td>$" . htmlspecialchars($row['importe']) . "</td>";
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
                                    <td>$<?php echo htmlspecialchars($rowt['efectivo']); ?></td>
                                </tr>
                                <tr>
                                    <th>OTROS</th>
                                    <td>$<?php echo htmlspecialchars($rowt['otros']); ?></td>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <td>$<?php echo htmlspecialchars($rowt['total']); ?></td>
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
                        <td>$<?php echo htmlspecialchars($rowpe['importePago']); ?></td>
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
                                <img src="../admin/bloque13/barcodes/<?php echo htmlspecialchars($rowpe['barcode_image']); ?>" alt="Código de Barras" width="400" height="80">
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
        function fetchData($conexion, $query, $idPedimento, $sectionKey, &$secciones)
        {
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("i", $idPedimento);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $secciones[$row['section_id']][$sectionKey][] = $row;
                }
            }
        }

        $secciones = [];

        $queries = [
            'partida1' => "SELECT p.*, 
                              a11.clave AS claveapp11, 
                              a4.clave AS claveapp4 
                          FROM partida1 p
                          INNER JOIN apendice11 a11 ON p.idapendice11 = a11.idapendice11
                          INNER JOIN apendice4 a4 ON p.idapendice4 = a4.idapendice4
                          WHERE p.idpedimentoc = ? ORDER BY section_id",

            'partida2' => "SELECT descripcion, section_id FROM partida2 WHERE idpedimentoc = ? ORDER BY section_id",
            'partida3' => "SELECT * FROM partida3 WHERE idpedimentoc = ? ORDER BY section_id",
            'permisos' => "SELECT * FROM permisop WHERE idpedimentoc = ? ORDER BY section_id",
            'complementos' => "SELECT compl.*,
               ap8.clave AS claveapendice8p 
                FROM complementosp compl
                INNER JOIN apendice8 ap8 ON compl.idapendice8 = ap8.idapendice8 
                 WHERE compl.idpedimentoc = ? 
                 ORDER BY compl.section_id",
            'observaciones' => "SELECT * FROM observacionesnp WHERE idpedimentoc = ? ORDER BY section_id",
            'contribuciones' => "SELECT * FROM contribuciones WHERE idpedimentoc = ? ORDER BY section_id"
        ];

        // Ejecutar las consultas
        foreach ($queries as $key => $query) {
            fetchData($conexion, $query, $idPedimento, $key, $secciones);
        }


        foreach ($secciones as $idSeccion => $data) {
            $cuadropart1 = $data['partida1'] ?? [];
            $cuadropart2 = $data['partida2'] ?? [];
            $cuadropart3 = $data['partida3'] ?? [];
            $cuadropermisop4 = $data['permisos'] ?? [];
            $cuadrocomplementos = $data['complementos'] ?? [];
            $cuadroobservaciones = $data['observaciones'] ?? [];
            $cuadrocontribuciones = $data['contribuciones'] ?? [];
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
                                            <td colspan="2" class="text-center"><?php echo htmlspecialchars($rowcomplementos['claveapendice8p']); ?></td>
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
                                            <td>$<?php echo htmlspecialchars($rowocontribuciones['importe']); ?></td>
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

        <p style=" text-align: center; font-size: 15px;"><strong>******************* FIN DEL PEDIMENTO *******************</strong></p>
        <div class="form-section">
            <div class="row">
                <?php
                $queryagente = "SELECT 
            p.*, 
            a.nombreagente, 
            a.apellidoP, 
            a.apellidoM, 
            a.curp, 
            a.rfc, 
            a.nacionalidad, 
            a.tipo_domicilio, 
            a.estado, 
            a.localidad, 
            a.codigo_postal, 
            a.patente
        FROM 
            pedimentocompleto p
        INNER JOIN 
            agenteaduanal a 
        ON 
            p.idagente = a.idagente
        WHERE 
            p.idpedimentoc = ?;";

                $stmtagente = $conexion->prepare($queryagente);
                $stmtagente->bind_param("i", $idPedimento);
                $stmtagente->execute();
                $resultagente = $stmtagente->get_result();

                if ($resultagente->num_rows > 0) {
                    while ($rowagente = $resultagente->fetch_assoc()) {
                ?>
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="10" class="text-center bg-secondary text-light">
                                            AGENTE ADUANAL, APODERADO ADUANAL O EL ALMACÉN
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="5">NOMBRE O RAZ. SOC.</th>
                                        <td colspan="5"><?php echo htmlspecialchars($rowagente['nombreagente']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>RFC</th>
                                        <td><?php echo htmlspecialchars($rowagente['rfc']); ?></td>
                                        <th>P. Moral</th>
                                        <th>RFC</th>
                                        <td><?php echo htmlspecialchars($rowagente['rfc']); ?></td>
                                        <th>P. Física</th>
                                        <th>CURP</th>
                                        <td><?php echo htmlspecialchars($rowagente['curp']); ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="10" class="text-center bg-secondary text-light">
                                            MANDATARIO / PERSONA AUTORIZADA
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">NOMBRE</th>
                                        <td colspan="8"><?php echo htmlspecialchars($rowagente['nombreagente']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>RFC</th>
                                        <td colspan="4"><?php echo htmlspecialchars($rowagente['rfc']); ?></td>
                                        <th>CURP</th>
                                        <td colspan="4"><?php echo htmlspecialchars($rowagente['curp']); ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center bg-secondary text-light">
                                            DECLARO BAJO PROTESTA DE DECIR VERDAD, EN LOS TÉRMINOS DE LO DISPUESTO POR EL ARTÍCULO 81 DE LA LEY ADUANERA
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="3" class="text-center">PATENTE O AUTORIZACIÓN:</th>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <?php echo htmlspecialchars($rowagente['patente']); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='text-center'>No se encontraron registros del agente aduanal.</p>";
                }
                ?>
            </div>
        </div>

        <div class="form-section">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td>

                            <p>El pago de las contribuciones puede realizarse mediante el servicio de “Pago
                                Electrónico Centralizado Aduanero” (PECA), conforme a lo establecido en la Regla
                                1.6.2. de las Reglas Generales de Comercio Exterior
                                , con la posibilidad de que la cuenta bancaria del Importador-Exportador sea
                                afectada directamente por el Banco. El agente o apoderado aduanal que utilice el
                                servicio de PECA, deberá imprimir la
                                certificación bancaria en el campo correspondiente del pedimento o en el
                                documento oficial, conforme al Apéndice 20 “Certificación de Pago Electrónico
                                Centralizado” del Anexo 22 de las RCGMCE.
                            </p>
                            <p>
                                El Importador-Exportador podrá solicitar la certificación de la información
                                contenida en este pedimento en: Administración General de Aduanas,
                                Administración de Operación Aduanera “7”, Av. Hidalgo Núm. 77,
                                Módulo IV, P.B., Col. Guerrero, C.P. 06300., México, D.F.
                            </p>

                        </td>
                    </tr>
                </tbody>

            </table>
        </div>


    </section>

    <footer class="mt-5">
        <?php include '../public/footer.php'; ?>
    </footer>

    <?php
    include 'bloque1/modalb1.php';
    include 'bloque2/modalb2.php';
    /*include 'bloque3/modalb3.php';
    include 'bloque4/modalb4.php';
    include 'bloque5/modalb5.php';
    include 'bloque6/modalb6.php';
    include 'bloque7/modalb7.php';
    include 'bloque8/modalb8.php';
    include 'bloque9/modalb9.php';
    include 'bloque10/modalb10.php';
    include 'bloque11/modalb11.php';
    include 'bloque12/modalb12.php';
    include 'bloque13/modalb13.php';
    include 'bloque14/modalb14.php';
    include 'bloque15/modalb15.php';
    include 'bloque16/modalb16.php';
    include 'bloque17/modalb17.php';
    include 'bloque18/modalb18.php';
    include 'bloque20/modalb20.php';
    include 'bloque28/modalb28.php';
    */
    ?>

</body>

</html>