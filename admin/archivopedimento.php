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
        $tasas[] = $row; // Almacena cada fila en el array $tasas
    }
    // Si necesitas almacenar una fila específica en $datos, puedes hacerlo aquí
    $datos = $tasas[0]; // Almacena la primera fila en $datos
} else {
    echo '<p>No se encontraron datos para este pedimento o no has terminado de capturar tu pedimento.</p>';
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
    </section>

    <footer class="mt-5">
        <?php include '../public/footer.php'; ?>
    </footer>  
</body>

</html>