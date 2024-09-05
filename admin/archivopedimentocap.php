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
        $queryprovocom = "SELECT * FROM provedorocomprador WHERE idpedimentoc = ?";

        $stmtprovocom = $conexion->prepare($queryprovocom);
        $stmtprovocom->bind_param("i", $pedimento_id);
        $stmtprovocom->execute();
        $resultprovocom = $stmtprovocom->get_result();

        if ($resultprovocom->num_rows > 0) {
            $rowpro = $resultprovocom->fetch_assoc();
        ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th colspan="14" class="text-center table-dark">DATOS DEL PROVEEDOR O COMPRADOR</th>
                    </tr>
                </thead>
                <tbody></tbody>
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
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th colspan="14" class="text-center">DATOS DEL PROVEEDOR O COMPRADOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>ID.FISCAL</th>
                        <th>NOMBRE,DENOMINACION O RAZON SOCIAL</th>
                        <th>DOMICILIO</th>
                        <th>VINCULACION</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>

            </table>
            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque14">
                <i class="fas fa-database"></i>
            </button>
        <?php
        }
        ?>




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
            $stmtdmonetarios->bind_param("i", $pedimento_id);
            $stmtdmonetarios->execute();
            $resultdmonetarios = $stmtdmonetarios->get_result();

            if ($resultdmonetarios->num_rows > 0) {
                $rowdm = $resultdmonetarios->fetch_assoc();
            ?>
                <table class="table table-bordered table-hover">
                    <tbody>

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
                    </tbody>
                </table>

            <?php
            } else {
            ?>

                <table class="table table-bordered table-hover">

                    <tbody>
                        <tr>
                            <th>NUM.FACTURA</th>
                            <th>FECHA</th>
                            <th>INCOTERM</th>
                            <th>MONEDA</th>
                            <th>FACT</th>
                            <th>VAL.MON.FACT</th>
                            <th>FACTOR MON. FACT</th>
                            <th>VAL. DOLARES</th>

                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque15">
                    <i class="fas fa-database"></i>
                </button>

            <?php
            }
            ?>

            <br><br>

            <?php
            $querydembar = "SELECT * FROM dembarque WHERE idpedimentoc = ?";

            $stmtdembar = $conexion->prepare($querydembar);
            $stmtdembar->bind_param("i", $pedimento_id);
            $stmtdembar->execute();
            $resultdembar = $stmtdembar->get_result();

            if ($resultdembar->num_rows > 0) {
                $rowemb = $resultdembar->fetch_assoc();
            ?><table class="table table-bordered table-hover">

                    <tbody>
                        <tr>
                            <th>NUMERO (GUIA/ORDEN EMBARQUE)/ID:</th>
                            <td><?php echo htmlspecialchars($rowemb['numeroembarque']); ?></td>

                            <th>M</th>
                            <td><?php echo htmlspecialchars($rowemb['nconocimiento']); ?></td>

                            <th>H</th>
                            <td><?php echo htmlspecialchars($rowemb['nhouse']); ?></td>

                        </tr>
                    </tbody>
                </table>
            <?php
            } else {
            ?>
                <table class="table table-bordered table-hover">

                    <tbody>
                        <tr>
                            <th>NUMERO (GUIA/ORDEN EMBARQUE)/ID:</th>
                            <td></td>

                            <th>M</th>
                            <td></td>

                            <th>H</th>
                            <td></td>

                        </tr>
                    </tbody>

                </table>
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque16">
                    <i class="fas fa-database"></i>
                </button>


            <?php
            }
            ?>

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
                    $stmtcomplemento->bind_param("i", $pedimento_id);
                    $stmtcomplemento->execute();
                    $resultcomplemento = $stmtcomplemento->get_result();

                    $cuadrocomplemento = [];
                    if ($resultcomplemento->num_rows > 0) {
                        while ($rowcomp = $resultcomplemento->fetch_assoc()) {
                            $cuadrocomplemento[] = $rowcomp;
                        }
                    } else {
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

                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque17">
                <i class="fas fa-database"></i>
            </button>
        <?php
                    }
        ?>
        </tbody>

        </table>


        <table class="table table-bordered table-hover">
            <thead class="text-center">
                <tr>
                    <th class="text-center table-dark">OBSERVACIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $querycomplemento = "SELECT * FROM observaciones WHERE idpedimentoc = ?";

                $stmtcomplemento = $conexion->prepare($querycomplemento);
                $stmtcomplemento->bind_param("i", $pedimento_id);
                $stmtcomplemento->execute();
                $resultcomplemento = $stmtcomplemento->get_result();

                $cuadrocomplemento = [];
                if ($resultcomplemento->num_rows > 0) {
                    while ($rowcomp = $resultcomplemento->fetch_assoc()) {
                        $cuadrocomplemento[] = $rowcomp;
                    }
                } else {
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
                    ?>

                    <tr>
                        <td></td>
                    </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque18">
            <i class="fas fa-database"></i>
        </button>
    <?php
                }
    ?>
    </tbody>
    </table>
    <div class="form-section">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center table-dark">PATIDAS</th>
                </tr>
            </thead>


        </table>
    </div>

    <?php include_once 'bloque20/partida1.php';
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
    include 'bloque14/modalb14.php';
    include 'bloque15/modalb15.php';
    include 'bloque16/modalb16.php';
    include 'bloque17/modalb17.php';
    include 'bloque18/modalb18.php';
    include 'bloque4/modalb4editar.php';
    /*include 'bloque20/modalb20.php';
    include 'bloque28/modalb28.php';
    */
    ?>

</body>

</html>