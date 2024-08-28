<?php
require 'vendor/autoload.php';
include_once '../../conexion.php';
include_once '../sesion.php';

// Extender la clase TCPDF para personalizar el pie de página
class CustomPDF extends TCPDF {
    public $footerHtml = '';

    // Sobrescribir el método Footer
    public function Footer() {
        // Posicionar el pie de página a 15 mm del final
        $this->SetY(-15);
        // Configuración de la fuente
        $this->SetFont('helvetica', '', 6);
        // Escribir el contenido HTML en el pie de página
        $this->writeHTML($this->footerHtml, true, false, true, false, '');
    }
}

$idPedimento = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Crear nueva instancia del PDF usando la clase personalizada
$pdf = new CustomPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
$pdf->setViewerPreferences(array('Zoom' => '100'));  // Establece el nivel de zoom a 100%

$pdf->AddPage();  // Agrega una página al documento

// Aquí va el código para generar el contenido principal del PDF...

// Construye el contenido que aparecerá en el pie de página
$htmlFooter = '
<table border="1" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <tbody>
        <tr>
            <td style="width: 60%; vertical-align: top;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="10" style="font-weight: bold; text-align: center;">AGENTE ADUANAL, APODERADO ADUANAL O EL ALMACÉN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="5" style="font-weight: bold;">NOMBRE O RAZ. SOC.</th>
                            <td colspan="5">Nombre Agente Aduanal</td>
                        </tr>
                        <!-- Más contenido aquí según tus necesidades -->
                    </tbody>
                </table>
            </td>
            <td style="width: 40%; vertical-align: top;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="font-weight: bold;">DECLARO BAJO PROTESTA DE DECIR VERDAD...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="3">PATENTE O AUTORIZACIÓN:</th>
                        </tr>
                        <tr>
                            <td colspan="3">Número de Patente</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>';

// Asignar el contenido del pie de página al PDF
$pdf->footerHtml = $htmlFooter;

// Aquí iría la lógica para añadir el contenido principal al PDF...

// Salida del PDF
$pdf->Output('archivo_pedimento.pdf', 'I');
?>
