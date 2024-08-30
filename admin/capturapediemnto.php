<?php
include_once '../sesion.php';
include_once '../conexion.php';
include_once '../public/mensaje.php';
$_SESSION['page_origin'] = 'capturapediemnto';

$pedimento_id = $_SESSION['pedimento_id'];

$agenteNombre = isset($_SESSION['agente_nombre']) ? $_SESSION['agente_nombre'] : 'N/A';
$agenteApellidoP = isset($_SESSION['agente_apellidoP']) ? $_SESSION['agente_apellidoP'] : 'N/A';
$agenteApellidoM = isset($_SESSION['agente_apellidoM']) ? $_SESSION['agente_apellidoM'] : 'N/A';
$agenteCurp = isset($_SESSION['agente_curp']) ? $_SESSION['agente_curp'] : 'N/A';
$agenteRfc = isset($_SESSION['agente_rfc']) ? $_SESSION['agente_rfc'] : 'N/A';
$agenteNacionalidad = isset($_SESSION['agente_nacionalidad']) ? $_SESSION['agente_nacionalidad'] : 'N/A';
$agenteTipoDomicilio = isset($_SESSION['agente_tipo_domicilio']) ? $_SESSION['agente_tipo_domicilio'] : 'N/A';
$agenteEstado = isset($_SESSION['agente_estado']) ? $_SESSION['agente_estado'] : 'N/A';
$agenteLocalidad = isset($_SESSION['agente_localidad']) ? $_SESSION['agente_localidad'] : 'N/A';
$agentePatente = isset($_SESSION['agente_patente']) ? $_SESSION['agente_patente'] : 'N/A';
$agenteCodigoPostal = isset($_SESSION['agente_codigo_postal']) ? $_SESSION['agente_codigo_postal'] : 'N/A';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/pedimento.css">
    <title>captura de pedimento</title>

    
</head>


<body>
    <header>
        <?php include '../public/cabeza.php'; ?>
    </header>
    <section class="zona1">
        <fieldset>
            <legend><strong>CAPTURA DE PEDIMENTO</strong></legend>

            <div id="bloques-container">
                <div class="form-section">
                    <h5 class="tex">Bloque 1</h5>
                    <?php
                    include_once 'bloque1/tablasb1.php'
                    ?>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 2</h5>
                    <?php
                    include_once 'bloque2/tablab2.php'
                    ?>
                    <br>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-section">
                            <h5 class="tex">Bloque 3</h5>


                            <?php
                            include_once 'bloque3/tablasb3.php'
                            ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-section">
                            <h5 class="tex">Bloque 4</h5>
                            <?php include_once 'bloque4/tablasb4.php';
                            ?>
                        </div>
                    </div>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 5</h5>
                    <?php include_once 'bloque5/tablasb5.php';
                    ?>

                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 6</h5>


                    <?php include_once 'bloque6/tablasb6.php';

                    ?>
                    <br>
                </div>

                <div class="form-section">
                    <h5 class="tex">Bloque 7</h5>
                    <?php include_once 'bloque7/tablasb7.php';

                    ?>

                    <br>
                </div>

                <div class="form-section">
                    <h5 class="tex">Bloque 8</h5>

                    <?php include_once 'bloque8/tablasb8.php';

                    ?>

                    <br>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-section">
                            <h5 class="tex">Bloque 9</h5>

                            <?php include_once 'bloque9/tablasb9.php';

                            ?>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-section">
                            <h5 class="tex">Bloque 10</h5>

                            <?php include_once 'bloque10/tablasb10.php';

                            ?>

                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-6">
                        <div class="form-section">
                            <h5 class="tex">Bloque 11</h5>

                            <?php include_once 'bloque11/tablasb11.php';

                            ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-section">
                            <h5 class="tex">Bloque 12</h5>
                            <?php include_once 'bloque12/tablab12.php';

                            ?>


                        </div>
                    </div>
                </div>




                <div class="form-section">
                    <h5 class="tex">Bloque 13</h5>
                    <?php include_once 'bloque13/tablab13.php';

                    ?>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 14</h5>
                    <?php include_once 'bloque14/tablab14.php';
                    ?>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 15</h5>
                    <?php include_once 'bloque15/tablasb15.php';
                    ?>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 16</h5>
                    <?php include_once 'bloque16/tablasb16.php';
                    ?>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 17</h5>
                    <?php include_once 'bloque17/tablasb17.php';
                    ?>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 18</h5>
                    <?php include_once 'bloque18/tablasb18.php';
                    ?>
                    <br>
                </div>

                <div class="form-section">
                    <h5 class="tex">Bloque 19</h5>
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">PATIDAS</th>
                            </tr>
                        </thead>


                    </table>
                </div>


                <?php include_once 'bloque20/partida1.php';
                ?>

                <div class="form-section">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th colspan="11" class="text-center">AGENTE ADUANAL, APODERADO ADUANAL O EL
                                            ALMACEN</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php include_once 'bloque28/tablab28.php';
                                    ?>

                                    <?php include_once 'bloque29/tablab29.php';
                                    ?>



                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-6">
                            <?php include_once 'bloque30/tablab30.php';
                            ?>
                        </div>
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


                <button id="guardar-pedimento-completo" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-up" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1" />
                        <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905" />
                    </svg>
                </button>

            </div>

    </section>
    <footer>
        <?php include '../public/footer.php'; ?>
    </footer>
    <?php
    include 'bloque1/modalb1.php';
    include 'bloque2/modalb2.php';
    include 'bloque3/modalb3.php';
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
    ?>

</body>
</html>