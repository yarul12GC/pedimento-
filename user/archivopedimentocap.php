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
        <?php include '../public/cabezauser.php'; ?>
    </header>

    <section class="zona1">
        <table class="table table-bordered table-hover">
            <?php
            include_once 'bloque1/tablab1edit.php'
            ?>
        </table>


        <table class="table table-bordered table-hover">
            <?php
            include_once 'bloque2/tablab2edit.php'
            ?>
        </table>

        <br><br>

        <div class="row">
            <div class="col-md-6">
                <div class="form-section">
                    <?php
                    include_once 'bloque3/tablab3edit.php'
                    ?>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-section">
                    <?php
                    include_once 'bloque4/tablab4edit.php'
                    ?>

                </div>
            </div>
        </div>


        <?php
        include_once 'bloque5/tablab5edit.php'
        ?>

        <?php
        include_once 'bloque6/tablab6edit.php'
        ?>


        <?php
        include_once 'bloque7/tablab7edit.php'
        ?>


        <?php
        include_once 'bloque8/tablab8edit.php'
        ?>



        <br><br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-section">


                    <?php
                    include_once 'bloque9/tablab9edit.php'
                    ?>


                </div>
            </div>

            <div class="col-md-6">
                <?php
                include_once 'bloque10/tablab10edit.php'
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-section">
                    <?php
                    include_once 'bloque11/tablab11edit.php'
                    ?>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-section">

                    <?php
                    include_once 'bloque12/tablab12edit.php'
                    ?>

                </div>
            </div>
        </div>


        <?php
        include_once 'bloque13/tablab13edit.php'
        ?>

        <br><br>



        <?php
        include_once 'bloque14/tablab14edit.php'
        ?>

        <?php
        include_once 'bloque15/tablab15edit.php'
        ?>

        <br><br>

        <?php
        include_once 'bloque16/tablab16edit.php'
        ?>


        <?php
        include_once 'bloque17/tablab17edit.php'
        ?>

        <?php
        include_once 'bloque18/tablab18edit.php'
        ?>



        <div class="form-section">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center table-dark">PATIDAS</th>
                    </tr>
                </thead>


            </table>
        </div>


        <?php include_once 'bloque20/partidaedit.php';
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
                $stmtagente->bind_param("i", $pedimento_id);
                $stmtagente->execute();
                $resultagente = $stmtagente->get_result();

                if ($resultagente->num_rows > 0) {
                    while ($rowagente = $resultagente->fetch_assoc()) {
                ?>
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="10" class="text-center table-dark">
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
                                        <th colspan="10" class="text-center table-dark">
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
                                        <th class="text-center table-dark">
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
    include 'bloque3/modalb3.php';
    include 'bloque4/modalb4.php';
    include 'bloque5/modalb5.php';
    include 'bloque6/modalb6.php';
    include 'bloque7/modalb7.php';
    include 'bloque8/modalb8.php';
    include 'bloque9/modalb9.php';
    include 'bloque10/modalb10.php';
    include 'bloque11/modalb11.php';
    include 'bloque11/modalediatrb11.php';
    include 'bloque12/modalb12.php';
    include 'bloque13/modalb13.php';
    include 'bloque13/modalb131.php';
    include 'bloque14/modalb14.php';
    include 'bloque15/modalb15.php';
    include 'bloque15/modaleditb15.php';
    include 'bloque16/modalb16.php';
    include 'bloque17/modalb17.php';
    include 'bloque17/modaleditb17.php';
    include 'bloque18/modalb18.php';
    include 'bloque18/modaleditb18.php';
    include 'bloque4/modalb4editar.php';
    include 'bloque30/modalqr.php';


    ?>

</body>

</html>