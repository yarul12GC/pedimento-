<?php
require_once 'vendor/autoload.php';
include_once '../../conexion.php';
include_once '../sesion.php';

$idPedimento = isset($_GET['id']) ? intval($_GET['id']) : 0;

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Configuración del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Archivo Pedimento');
$pdf->SetSubject('Detalles del Pedimento');
$pdf->SetKeywords('TCPDF, PDF, pedimento, export');

// Establecer márgenes
$pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(5);

// Configuración de preferencias de visualización
$pdf->setViewerPreferences(array(
    'Zoom' => '100'  // Establece el nivel de zoom a 100%
));

$pdf->AddPage();  // Agrega una página al documento

$html = '';

$html .= '
<table border="1" cellpadding="0" cellspacing="0" style="width: 100%; font-size: 6px;  margin: 0; padding: 0;">
    <tr>
        <!-- Columna del 80% -->
        <td style="width: 75%; vertical-align: top; margin: 0; padding: 0;">';
$querydpm =  " SELECT dp.*, a2.clave AS clave_apendice2, a16.clave AS clave_apendice16
               FROM dpedimento dp
               INNER JOIN apendice2 a2 ON dp.idapendice2 = a2.idapendice2
               INNER JOIN apendice16 a16 ON dp.idapendice16 = a16.idapendice16
               WHERE idpedimentoc = ?";
$stmtdpm = $conexion->prepare($querydpm);
$stmtdpm->bind_param("i", $idPedimento);
$stmtdpm->execute();
$resultdpm = $stmtdpm->get_result();

if ($resultdpm->num_rows > 0) {
    $datodpm = $resultdpm->fetch_assoc();
    $html .= '
<table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
        <tr>
            <th style="font-weight: bold; width: 14%;">NUM.PEDIMENTO</th>
            <td style="width: 14%;">' . htmlspecialchars($datodpm['Nopedimento']) . '</td>
            <th style="font-weight: bold; width: 7%;">T.OPER</th>
            <td style="width: 6%;">' . htmlspecialchars($datodpm['Toper']) . '</td>
            <th style="font-weight: bold; width: 14%;">CVE PEDIMENTO</th>
            <td style="width: 17%;">' . htmlspecialchars($datodpm['clave_apendice2']) . '</td>
            <th style="font-weight: bold; width: 10%;">REGIMEN</th>
            <td style="width: 18%;">' . htmlspecialchars($datodpm['clave_apendice16']) . '</td>
        </tr>
    </table>';
} else {
    $html .= '<p>No se encontraron registros en el cuadro de datos del pedimento.</p>';
}

$querytransac =  "SELECT ts.*, a15.clave AS clavea15, a1.clave AS clavea1
                 FROM transacciones ts
                 INNER JOIN apendice15 a15 ON ts.idapendice15 = a15.idapendice15
                 INNER JOIN apendice1 a1 ON ts.idapendice1 = a1.idapendice1
                 WHERE idpedimentoc = ?";
$stmttransac = $conexion->prepare($querytransac);
$stmttransac->bind_param("i", $idPedimento);
$stmttransac->execute();
$resulttransac = $stmttransac->get_result();

if ($resulttransac->num_rows > 0) {
    $datotransac = $resulttransac->fetch_assoc();
    $html .= '
<table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
        <tr>
            <th style="font-weight: bold;">DESTINO/ORIGEN</th>
            <td>' . htmlspecialchars($datotransac['clavea15']) . '</td>
            <th style="font-weight: bold;">TIPO DE CAMBIO</th>
            <td>' . htmlspecialchars($datotransac['tipoCambio']) . '</td>
            <th style="font-weight: bold;">PESO BRUTO</th>
            <td>' . htmlspecialchars($datotransac['peso_bruto']) . '</td>
            <th style="font-weight: bold;">ADUANA</th>
            <td>' . htmlspecialchars($datotransac['clavea1']) . '</td>
        </tr>
    </table>';
} else {
    $html .= '<p>No se encontraron registros en el cuadro de transacciones.</p>';
}

$html .= '
<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 6px; width: 100%; margin: 0;">
    <tr>
        <td style="width: 45%; margin: 0;">
            <table>
                <tbody>
                    <tr style="text-align: center;">
                        <th colspan="3" style="font-weight:bold;">MEDIOS DE TRANSPORTE</th>
                    </tr>
                    <tr>
                        <th style="font-weight:bold;">ENTRADA SALIDA</th>
                        <th style="font-weight:bold;">ARRIBO</th>
                        <th style="font-weight:bold;">SALIDA</th>
                    </tr>';

$querytransp = "SELECT t.*, a1.clave AS clave_entrtadaSalida, a2.clave AS clave_arribo, a3.clave AS clave_salida
                FROM transporte t
                INNER JOIN apendice3 a1 ON t.idapendice3entrtadaSalida = a1.idapendice3
                INNER JOIN apendice3 a2 ON t.idapendice3arribo = a2.idapendice3
                INNER JOIN apendice3 a3 ON t.idapendice3salida = a3.idapendice3
                WHERE idpedimentoc = ?";
$stmttransp = $conexion->prepare($querytransp);
$stmttransp->bind_param("i", $idPedimento);
$stmttransp->execute();
$resulttransp = $stmttransp->get_result();

if ($resulttransp->num_rows > 0) {
    $datostrnsp = $resulttransp->fetch_assoc();
    $html .= '
                    <tr>
                        <td>' . htmlspecialchars($datostrnsp['clave_entrtadaSalida']) . '</td>
                        <td>' . htmlspecialchars($datostrnsp['clave_arribo']) . '</td>
                        <td>' . htmlspecialchars($datostrnsp['clave_salida']) . '</td>
                    </tr>';
} else {
    $html .= '<tr><td colspan="3" style="text-align:center;">No se encontraron registros en el cuadro de medios de transporte.</td></tr>';
}

$html .= '
                </tbody>
            </table>
        </td>

        <!-- Columna 2: Valores -->
        <td style="width: 55%; margin: 0;">
            <table >
                <tbody>';

$queryvaloresp = "SELECT * FROM valoresp WHERE idpedimentoc = ?";
$stmtvaloresp = $conexion->prepare($queryvaloresp);
$stmtvaloresp->bind_param("i", $idPedimento);
$stmtvaloresp->execute();
$resultvaloresp = $stmtvaloresp->get_result();

if ($resultvaloresp->num_rows > 0) {
    $datosvp = $resultvaloresp->fetch_assoc();
    $html .= '
                    <tr>
                        <th style="font-weight:bold; width: 75%; text-align: right;">VALOR EN DOLARES</th>
                        <td style="width: 25%; text-align: right;">$' . htmlspecialchars($datosvp['valorDolares']) . '</td>
                    </tr>
                    <tr>
                        <th style="font-weight:bold; text-align: right;">VALOR ADUANA</th>
                        <td style="text-align: right;">$' . htmlspecialchars($datosvp['valorAduna']) . '</td>
                    </tr>
                    <tr>
                        <th style="font-weight:bold; text-align: right;">PRECIO PAGADO / VALOR COMERCIAL</th>
                        <td style="text-align: right;">$' . htmlspecialchars($datosvp['precioPagado']) . '</td>
                    </tr>';
} else {
    $html .= '<tr><td colspan="2" style="text-align:center;">No se encontraron registros en el cuadro de valores.</td></tr>';
}

$html .= '
                </tbody>
            </table>
        </td>
    </tr>
</table>';



$queryimpoex =  "SELECT * FROM importadorexportador WHERE idpedimentoc = ?";
$stmtimpoex = $conexion->prepare($queryimpoex);
$stmtimpoex->bind_param("i", $idPedimento);
$stmtimpoex->execute();
$resultimpoex = $stmtimpoex->get_result();

if ($resultimpoex->num_rows > 0) {
    $datosimport = $resultimpoex->fetch_assoc();
    $html .= '
<table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
        <thead>
            <tr style="background-color: #6c757d; color: #ffffff;">
                <th colspan="14" style="text-align: center;">DATOS DEL IMPORTADOR / EXPORTADOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="font-weight:bold;">RFC:</th>
                <td colspan="3">' . htmlspecialchars($datosimport['rfc']) . '</td>
                <th colspan="5" style="font-weight:bold;">NOMBRE, DENOMINACION O RAZON SOCIAL:</th>
                <td colspan="5">' . htmlspecialchars($datosimport['nombreE']) . '</td>
            </tr>
           
            <tr>
                <th style="font-weight:bold;">CURP:</th>
                <td colspan="13">' . htmlspecialchars($datosimport['curp']) . '</td>
            </tr>
            <tr>
             <td colspan="14">
                <strong>DOMICILIO: </strong><strong>AVE.</strong> ' . htmlspecialchars($datosimport['Calle']) . '
                <strong>No. Ext</strong>' . htmlspecialchars($datosimport['numeroExterior']) . '
                <strong>No. Int:</strong> ' . htmlspecialchars($datosimport['numeroInterior']) . '
                <strong>C.P:</strong> ' . htmlspecialchars($datosimport['codigoPostal']) . '
                <strong>MUNICIPIO:</strong> ' . htmlspecialchars($datosimport['municipio']) . '
                <strong>ENTIDAD FEDERATIVA:</strong> ' . htmlspecialchars($datosimport['entidadfederativa']) . '
                <strong>PAIS:</strong> ' . htmlspecialchars($datosimport['pais']) . '
             </td>
            </tr>
        </tbody>
    </table>';
} else {
    $html .= '<p>No se encontraron registros en el cuadro de importador o exportador.</p>';
}


$html .= '
    <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 6px;">
    <thead>
        <tr style="text-align: center;">
            <th style="font-weight:bold;">VAL. SEGUROS</th>
            <th style="font-weight:bold;">SEGUROS</th>
            <th style="font-weight:bold;">FLETES</th>
            <th style="font-weight:bold;">EMBALAJES</th>
            <th style="font-weight:bold;">OTROS INCREMENTABLES</th>
        </tr>
    </thead>
    <tbody>';

// Consulta SQL para obtener los valores incrementables
$queryvaloresin = "SELECT * FROM valorincrementable WHERE idpedimentoc = ?";
$stmtvaloresin = $conexion->prepare($queryvaloresin);
$stmtvaloresin->bind_param("i", $idPedimento);
$stmtvaloresin->execute();
$resultvaloresin = $stmtvaloresin->get_result();

if ($resultvaloresin->num_rows > 0) {
    // Obtener los datos de la consulta
    while ($datosincr = $resultvaloresin->fetch_assoc()) {
        $html .= '
        <tr style="text-align: center;">
            <td>$' . htmlspecialchars($datosincr['Vseguros']) . '</td>
            <td>$' . htmlspecialchars($datosincr['seguros']) . '</td>
            <td>$' . htmlspecialchars($datosincr['fletes']) . '</td>
            <td>$' . htmlspecialchars($datosincr['embalajes']) . '</td>
            <td>$' . htmlspecialchars($datosincr['otrosincrement']) . '</td>
        </tr>';
    }
} else {
    // Mensaje si no hay registros
    $html .= '<tr><td colspan="5" style="text-align:center;">No se encontraron registros en el cuadro de valores incrementables.</td></tr>';
}


$html .= '
    </tbody>
</table>';

$queryvaloresd =  "SELECT * FROM valordecrementable WHERE idpedimentoc = ?";
$stmtvaloresd = $conexion->prepare($queryvaloresd);
$stmtvaloresd->bind_param("i", $idPedimento);
$stmtvaloresd->execute();
$resultvaloresd = $stmtvaloresd->get_result();

if ($resultvaloresd->num_rows > 0) {
    $datosdcre = $resultvaloresd->fetch_assoc();

    // Crear el contenido HTML de la tabla
    $html .= '
    <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 6px;">
       
        <tbody>
            <tr>
                <th align="center" style="font-weight:bold;">TRANSPORTE D</th>
                <th align="center" style="font-weight:bold;">SEGURO DECREMENTABLE</th>
                <th align="center" style="font-weight:bold;">CARGA</th>
                <th align="center" style="font-weight:bold;">DESCARGA</th>
                <th align="center" style="font-weight:bold;">OTROS DECREMENTABLES</th>
            </tr>
            <tr>
                <td align="center" >$' . htmlspecialchars($datosdcre['VsegurosD']) . '</td>
                <td align="center" >$' . htmlspecialchars($datosdcre['segurosD']) . '</td>
                <td align="center" >$' . htmlspecialchars($datosdcre['fletesD']) . '</td>
                <td align="center" >$' . htmlspecialchars($datosdcre['embalajesD']) . '</td>
                <td align="center" >$' . htmlspecialchars($datosdcre['otrosDecrement']) . '</td>
            </tr>
        </tbody>
    </table>';
} else {
    // Si no se encontraron registros, mostrar un mensaje
    $html = '<p align="center">No se encontraron registros en el cuadro de valores decrementables.</p>';
}


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
    $html .= '
    <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0;pading: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
        
        <tbody>
                     <tr>
                        <th align="center" style="font-weight:bold;">CODIGO DE ACEPTACION</th>
                        <th align="center" style="font-weight:bold;">CODIGO DE BARRAS</th>
                        <th align="center" style="font-weight:bold;">CLAVE DE LA SECCION ADUANERA</th>
                    </tr>
                    <tr>
                        <td  align="center">' . htmlspecialchars($datosperm['aviso_electronico']) . '</td>
                        <th  align="center"></th>
                        <td  align="center">' . htmlspecialchars($datosperm['claveapn1']) . '</td>
                    </tr>
                   
        </tbody>
    </table>';
    $html .= ' 
    <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
        <tr>
            <th  style="font-weight:bold;">MARCAS, NUMERO Y TOTAL DE BULTOS:</th>
            <td>' . htmlspecialchars($datosperm['marca'] . ' ' . $datosperm['modelo']) . '</td>
            <td align="right">' . htmlspecialchars($datosperm['nBultos']) . '</td>
        </tr>
    </table>';
} else {
    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de valores decrementables.</td></tr>";
}


$html .= '
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0; border: 1px solid black;">
    <tr style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">';

// Consulta para obtener las fechas
$queryfechas = "SELECT * FROM fechas WHERE idpedimentoc = ?";
$stmtfechas = $conexion->prepare($queryfechas);
$stmtfechas->bind_param("i", $idPedimento);
$stmtfechas->execute();
$resultfechas = $stmtfechas->get_result();

if ($resultfechas->num_rows > 0) {
    $rowfech = $resultfechas->fetch_assoc();
    $html .= '
        <td style="width: 40%; vertical-align: top; margin: 0; padding: 0;">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
                <tbody>
                    <tr style="text-align: center; margin: 0; padding: 0;">
                        <th colspan="2" style="font-weight: bold; margin: 0; padding: 0;">FECHAS</th>
                    </tr>
                    <tr style="margin: 0; padding: 0;">
                        <th style="font-weight: bold; text-align: left; margin: 0; padding: 0;">ENTRADAS</th>
                        <td style="margin: 0; padding: 0;">' . htmlspecialchars($rowfech['entrada']) . '</td>
                    </tr>
                    <tr style="margin: 0; padding: 0;">
                        <th style="font-weight: bold; text-align: left; margin: 0; padding: 0;">PAGO</th>
                        <td style="margin: 0; padding: 0;">' . htmlspecialchars($rowfech['pago']) . '</td>
                    </tr>
                </tbody>
            </table>
        </td>';
} else {
    $html .= "<td colspan='3' style='text-align: center; margin: 0; padding: 0;'>No se encontraron registros en el cuadro de fechas.</td>";
}

// Consulta para obtener las contribuciones
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
    WHERE 
        tasapedimento.idpedimentoc = ?
";

$stmttasasp = $conexion->prepare($querytasasp);
$stmttasasp->bind_param("i", $idPedimento);
$stmttasasp->execute();
$resulttasasp = $stmttasasp->get_result();

if ($resulttasasp->num_rows > 0) {
    $html .= '
        <td style="width: 60%; vertical-align: top; margin: 0; padding: 0;">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
                <thead>
                    <tr style="background-color: #6c757d; color: #ffffff; text-align: center; margin: 0; padding: 0;">
                        <th colspan="3" style="font-weight: bold; margin: 0; padding: 0; margin: 0; padding: 0; border-left: 1px solid black; border-right: 1px solid black;">TASA NIVEL PEDIMENTO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="margin: 0; padding: 0;">
                        <th style="text-align: center; font-weight: bold; margin: 0; padding: 0;margin: 0; padding: 0; border-left: 1px solid black; border-right: 1px solid black;">CONTRIB</th>
                        <th style="text-align: center; font-weight: bold; margin: 0; padding: 0;margin: 0; padding: 0; border-left: 1px solid black; border-right: 1px solid black;">CVE.T.TASA</th>
                        <th style="text-align: center; font-weight: bold; margin: 0; padding: 0;margin: 0; padding: 0; border-left: 1px solid black; border-right: 1px solid black;">TASA</th>
                    </tr>';

    // Iteramos a través de todos los registros de contribuciones
    while ($rowtsp = $resulttasasp->fetch_assoc()) {
        $html .= '
                    <tr style="margin: 0; padding: 0;">
                        <td style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black;">' . htmlspecialchars($rowtsp['clavea12']) . '</td>
                        <td style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black;">' . htmlspecialchars($rowtsp['clavea18']) . '</td>
                        <td style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black;">' . htmlspecialchars($rowtsp['tasa']) . '</td>
                    </tr>';
    }

    $html .= '
                </tbody>
            </table>
        </td>';
} else {
    $html .= "<td colspan='3' style='text-align: center; margin: 0; padding: 0;'>No se encontraron registros en el cuadro de contribuciones.</td>";
}

// Cerramos la fila y la tabla principal
$html .= '
    </tr>
</table>';





$html .= '
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
        <thead>
            <tr style="background-color: #6c757d; color: #ffffff;">
                <th colspan="14" style="text-align: center;">CUADRO DE LIQUIDACION</th>
            </tr>
        </thead>
</table>';

$html .= '
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <tr>';
$html .= '
    <td style="width: 65%; vertical-align: top;">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
            <tbody>
                <tr>
                    <th style="text-align: center; margin: 0; padding: 0; font-weight: bold;">CONCEPTO</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">F.P.</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">IMPORTE</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">CONCEPTO</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">F.P.</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">IMPORTE</th>
                </tr>';

// Consulta SQL para obtener los datos del cuadro de liquidación
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
}

if (!empty($cuadroLiquidacion)) {
    $numRegistros = count($cuadroLiquidacion);
    $mitad = ceil($numRegistros / 2); // Calcula la mitad para dividir los registros

    for ($i = 0; $i < $mitad; $i++) {
        $html .= "<tr>";

        // Primera columna de la tabla
        if (isset($cuadroLiquidacion[$i])) {
            $html .= '
                    <td style="text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i]['clavetpa12_cl']) . '</td>
                    <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i]['clavetpa13_cl']) . '</td>
                    <td style="border-left: 1px solid black; text-align: center;">$' . htmlspecialchars($cuadroLiquidacion[$i]['importe']) . '</td>';
        } else {
            $html .= "<td colspan='3' style='border-left: 1px solid black;'></td>"; // Relleno vacío si no hay más registros
        }

        // Segunda columna de la tabla
        if (isset($cuadroLiquidacion[$i + $mitad])) {
            $html .= '
                    <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i + $mitad]['clavetpa12_cl']) . '</td>
                    <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i + $mitad]['clavetpa13_cl']) . '</td>
                    <td style="border-left: 1px solid black; text-align: center;">$' . htmlspecialchars($cuadroLiquidacion[$i + $mitad]['importe']) . '</td>';
        } else {
            $html .= '<td colspan="3" style="border-left: 1px solid black;"></td>'; // Relleno vacío si no hay más registros
        }

        $html .= '</tr>';
    }
} else {
    $html .= "<tr><td colspan='6' class='text-center' style='border-left: 1px solid black;'>No se encontraron registros en el cuadro de liquidación.</td></tr>";
}


$html .= '
            </tbody>
        </table>
    </td>';


$html .= '
       <td style="width: 35%; vertical-align: top;">';

$querytotales = "SELECT * FROM total WHERE idpedimentoc = ?";

$stmttotales = $conexion->prepare($querytotales);
$stmttotales->bind_param("i", $idPedimento);
$stmttotales->execute();
$resulttotales = $stmttotales->get_result();

if ($resulttotales->num_rows > 0) {
    $rowt = $resulttotales->fetch_assoc();

    $html .= '
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 3px; padding: 0;">
        <tbody>
            <tr>
                <th  colspan="2" style="text-align: center; border: 1px solid black; font-weight: bold;">TOTALES</th>
            </tr>
            <tr>
                <th style="border: 1px solid black; font-weight: bold; "> EFECTIVO</th>
                <td style="border: 1px solid black;"> $' . htmlspecialchars($rowt['efectivo']) . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; font-weight: bold; "> OTROS</th>
                <td style="border: 1px solid black;"> $' . htmlspecialchars($rowt['otros']) . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; font-weight: bold; "> TOTAL</th>
                <td style="border: 1px solid black;"> $' . htmlspecialchars($rowt['total']) . '</td>
            </tr>
        </tbody>
    </table>';
} else {
    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de liquidación.</td></tr>";
}


$html .= ' </td>
    </tr>
</table>';

$querypagoe = "SELECT * FROM pagoelectronico WHERE idpedimentoc = ?";
$stmtpagoe = $conexion->prepare($querypagoe);
$stmtpagoe->bind_param("i", $idPedimento);
$stmtpagoe->execute();
$resultpagoe = $stmtpagoe->get_result();

if ($resultpagoe->num_rows > 0) {
    $rowpe = $resultpagoe->fetch_assoc();

    // Verifica si existe la imagen del código de barras
    if (!empty($rowpe['barcode_image'])) {
        // Codifica la imagen en Base64
        $barcode_image_base64 = base64_encode($rowpe['barcode_image']);
        $barcode_image_data = 'data:image/png;base64,' . $barcode_image_base64;

        // Agrega la información adicional del pedimento
        $html .= '
        <style>
            .barcode-container {
                text-align: center;
            }
            .barcode-image {
                width: 310px;
                height: 45px;
            }
        </style>
        <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%;">
            <tr>
                <td colspan="7" style="border-collapse: collapse; width: 100%;  text-align: center;">
                    <img src="' . $barcode_image_data . '" class="barcode-image">
                </td>
            </tr>
            <tr>
                <th colspan="7" style="padding-bottom: 10px; font-weight: bold; text-align: center;">***DEPÓSITO ELECTRÓNICO***</th>
            </tr>
            <tr>
                <th style="font-weight: bold; width: 12%;">PATENTE:</th>
                <td>' . htmlspecialchars($rowpe['patente']) . '</td>
                <th style="font-weight: bold;">PEDIMENTO:</th>
                <td>' . htmlspecialchars($rowpe['pedimento']) . '</td>
                <th style="font-weight: bold;">ADUANA:</th>
                <td>' . htmlspecialchars($rowpe['aduana']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">NOMBRE DE LA INSTITUCIÓN BANCARIA:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['banco']) . '</td>
            </tr>
            <tr>
                <th colspan="2" style="font-weight: bold;">LÍNEA DE CAPTURA:</th>
                <td colspan="5">' . htmlspecialchars($rowpe['lineaC']) . '</td>
            </tr>
            <tr>
                <th colspan="2" style="font-weight: bold;">IMPORTE PAGADO:</th>
                <td>$' . htmlspecialchars($rowpe['importePago']) . '</td>
                <th style="font-weight: bold;">FECHA DE PAGO:</th>
                <td colspan="2">' . htmlspecialchars($rowpe['fechapago']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">NÚMERO DE OPERACIÓN BANCARIA:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['noperacionbancar']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">NÚMERO DE TRANSACCIÓN SAT:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['ntransaccionS']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">MEDIO DE PRESENTACIÓN:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['mPresentacion']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">MEDIO DE RECEPCIÓN/COBRO:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['MedioRecepcion']) . '</td>
            </tr>
        </table>';

    } else {
        $pdf->SetY(30);  // Ajusta la posición vertical para el texto de error
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 10, 'No se encontró el código de barras.', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
    }
} else {
    $pdf->SetY(30);  // Ajusta la posición vertical para el texto de error
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 10, 'No se encontraron registros en el cuadro de liquidación.', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
}



$html .= '</td>

        <!-- Columna del 20% -->
        <td style="width: 25%; vertical-align: top;">
        </td>
    </tr>
</table>';
$queryprovocom = "SELECT * FROM provedorocomprador WHERE idpedimentoc = ?";

$stmtprovocom = $conexion->prepare($queryprovocom);
$stmtprovocom->bind_param("i", $idPedimento);
$stmtprovocom->execute();
$resultprovocom = $stmtprovocom->get_result();

if ($resultprovocom->num_rows > 0) {
    $rowpro = $resultprovocom->fetch_assoc();

    $html .= '
<table border="0" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <thead>
        <tr style="background-color: #6c757d; color: #ffffff;">
            <th colspan="4" style="text-align: center; border: none;">DEPÓSITO REFERENCIADO - LÍNEA DE CAPTURA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th style="font-weight: bold; width: 10%; border: none;"> ID.FISCAL</th>
            <th style="font-weight: bold; width: 25%; border: none;">NOMBRE, DENOMINACIÓN O RAZÓN SOCIAL</th>
            <th style="font-weight: bold; width: 55%; border: none;">DOMICILIO</th>
            <th style="font-weight: bold; width: 10%; text-align: center; border: none;">VINCULACIÓN</th>
        </tr>
        <tr>
            <td style="border: none;"> ' . htmlspecialchars($rowpro['idfiscal']) . '</td>
            <td style="border: none;">' . htmlspecialchars($rowpro['nombreDORS']) . '</td>
            <td style="border: none;">' . htmlspecialchars('CALLE: ' . $rowpro['calle'] . ' NO. E ' . $rowpro['noexterior'] . ' NO. I ' . $rowpro['nointerior'] . ' C.P. ' . $rowpro['codigo_postal'] . ' CIUDAD: ' . $rowpro['localidad'] . ' ESTADO: ' . $rowpro['entidadF'] . ' PAÍS: ' . $rowpro['pais']) . '</td>
            <td style="text-align: center; border: none;">' . htmlspecialchars($rowpro['vinculacion']) . '</td>
        </tr>
    </tbody>
</table>';
} else {
    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en los datos del comprador.</td></tr>";
}


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
    $html .= '
<table border="0" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <thead>
        <tr>
                        <th style="width: 28%;  text-align: center; font-weight: bold;border-left: 1px solid black;">NUM. CFDI O DOCUMENTO EQUIVALENTE</th>
                        <th  style="width: 12%; text-align: center; font-weight: bold; border-left: 1px solid black;">FECHA</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">INCOTERM</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">MONEDA</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">VAL.MON.FACT</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">FACTOR MON. FACT</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">VAL. DOLARES</th>

                    </tr>
    </thead>
    <tbody>
       
      <tr>
                        <td style="width: 28%;  border-left: 1px solid black;" > ' . htmlspecialchars($rowdm['numfactura']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['fecha']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['claveapn14']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['claveapn5']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['valmonfact']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['factormonfact']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['valdolares']) . '</td>
                    </tr>
    </tbody>
</table>';
} else {
    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en los datos monetarios</td></tr>";
}



$html .= '
<table border="1" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <thead>
        <tr style="background-color: #6c757d; ">
            <th style="text-align: center; color: #ffffff;">TRANPORTE:</th>
            <th style="text-align: center; color: #ffffff;">IDENTIFICACION:</th>
            <th style="text-align: left; ">THLinternational E.C.</th>
            <th style="text-align: center; ">AEREO</th>
            <th style="text-align: center; color: #ffffff;">PAIS:</th>
            <th style="text-align: center; ">USA</th>
        </tr>
        
        <tr>
        <td colspan="5">TRANSPORTISTA</td>
        <td colspan="1">RFC</td>
        </tr>

        <tr>
            <td >CURP</td>
            <td ></td>
            <td colspan="4">COMICILIO/CIUDAD/ESTADO</td>
        </tr>
        <tr>
            <td colspan="2">NUMERO DE CANDADO</td>
            <td colspan="4">FX30850000</td>
        </tr>
    </thead>
    <tbody>
       
    </tbody>
</table>';


$querydembar = "SELECT * FROM dembarque WHERE idpedimentoc = ?";

$stmtdembar = $conexion->prepare($querydembar);
$stmtdembar->bind_param("i", $idPedimento);
$stmtdembar->execute();
$resultdembar = $stmtdembar->get_result();

if ($resultdembar->num_rows > 0) {
    $rowemb = $resultdembar->fetch_assoc();
    $html .= '
<table border="0" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <tbody>
       
      <tr>
                        <th style="background-color: #6c757d;  width: 30%; color: #ffffff; font-weight: bold;" >NUMERO (GUIA/ORDEN EMBARQUE)/ID:</th>
                        <td style="width: 30%; ">' .  htmlspecialchars($rowemb['numeroembarque']) . '</td>

                        <th style="width: 10%; font-weight: bold;">M</th>
                        <td style="width: 10%; ">' .  htmlspecialchars($rowemb['nconocimiento']) . '</td>

                        <th style="width: 10%; font-weight: bold;">H</th>
                        <td style="width: 10%; ">' .  htmlspecialchars($rowemb['nhouse']) . '</td>

                    </tr>
    </tbody>
</table>';
} else {
    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en los datos monetarios</td></tr>";
}



// Añadir contenido HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF
$pdf->Output('archivo_pedimento.pdf', 'I');
