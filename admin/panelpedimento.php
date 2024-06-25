<?php
include '../conexion.php';

$agentesResult = $conexion->query("SELECT idagente, nombreagente FROM agenteaduanal");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de Pedimento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Pedimento de Importación</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        h2 {
            color: #ff0000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .tex {
            color: #FF0000;
            font-size: bolder;
        }
    </style>
</head>

<body>
    <header>
        <?php include '../public/cabeza.php'; ?>
    </header>
    <section class="zona1">
        <fieldset>
            <legend><strong>Captura de Pedimento</strong></legend>

            <div class="form-group">
                <label for="agenteSelect" class="tex"><i class="fas fa-user"></i><strong> Seleccione el agente aduanal
                        responsable de la
                        generación del pedimento.</strong>
                </label><br><br>
                <select class="form-control" id="agenteSelect" name="agenteSelect">
                    <?php while ($agente = $agentesResult->fetch_assoc()): ?>
                        <option value="<?= $agente['idagente'] ?>"><?= $agente['nombreagente'] ?></option>
                    <?php endwhile; ?>
                </select><br>
            </div>

            <button id="generar-pedimento" class="btn btn-primary">Generar Pedimento</button>
            <br>
            <br>

            <div id="bloques-container" style="display: ;">

                <div class="form-section">
                    <h5 class="tex">Bloque 1</h5>
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
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg>
                    </button>
                    <br>
                </div>

                <div class="form-section">
                    <h5 class="tex">Bloque 2</h5>
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
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg>
                    </button>
                    <br>
                </div>

                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-section">
                                <h5 class="tex">Bloque 3</h5>
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
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
                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                                    data-bs-target="#bloque3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-database-add" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                        <path
                                            d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-section">
                                <h5 class="tex">Bloque 4</h5>
                                <table class="table table-bordered table-hover">
                                    <tbody>

                                        <tr>
                                            <th>VALOR EN DOLARES</th>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <th>VALOR ADUANA</th>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <th>PRECIO PAGADO/VALOR COMERCIAL</th>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                                    data-bs-target="#bloque4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-database-add" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                        <path
                                            d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h5 class="tex">Bloque 5</h5>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="14" class="text-center">DATOS DEL IMPORTADOR/EXPORTADOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">NOMBRE, DENOMINACION O RAZON SOCIAL</th>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <th scope="row">RFC</th>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <th scope="row">CURP</th>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <th scope="row">DOMICILIO</th>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <th scope="row">CALLE</th>
                                <td></td>
                                <th scope="row">NUMERO INTERIOR</th>
                                <td></td>
                                <th scope="row">NUMERO EXTERIOR</th>
                                <td></td>
                                <th scope="row">CODIGO POSTAL</th>
                                <td></td>
                                <th scope="row">MUNICIPIO</th>
                                <td></td>
                                <th scope="row">ENTIDAD FEDERATIVA</th>
                                <td></td>
                                <th scope="row">PAIS</th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg> </button>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 6</h5>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="14" class="text-center">VALOR INCREMENTABLES</th>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg> </button>
                    <br>
                </div>

                <div class="form-section">
                    <h5 class="tex">Bloque 7</h5>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="14" class="text-center">VALOR DECREMENTABLES</th>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg> </button>
                    <br>
                </div>

                <div class="form-section">
                    <h5 class="tex">Bloque 8</h5>
                    <table class="table table-bordered table-hover">

                        <tbody>
                            <tr>
                                <th scope="row">ACUSE ELECTRONICO DE VALIDACION</th>
                                <td></td>
                                <th scope="row">CLAVE DE LA SECCION ADUANERA DE DESPACHO</th>
                                <td></td>
                            </tr>
                            <tr>
                                <tH scope="row">MARCAS, NUMERO Y TOTAL DE BULTOS:</tH>
                                <td colspan="3"></td>

                            </tr>
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg> </button>
                    <br>
                </div>


                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-section">
                                <h5 class="tex">Bloque 8</h5>
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="8" class="text-center">FECHAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th>ENTRADAS</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>PAGO</th>
                                            <td></td>

                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                                    data-bs-target="#bloque3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-database-add" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                        <path
                                            d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-section">
                                <h5 class="tex">Bloque 9</h5>
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="8" class="text-center">TASA NIVEL PEDIMENTO.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>CONTRIB</th>
                                            <th>CVE.T.TASA</th>
                                            <th>TASA</th>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>

                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                                    data-bs-target="#bloque4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-database-add" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                        <path
                                            d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-section">
                                <h5 class="tex">Bloque 10</h5>
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="8" class="text-center">CUADRO DE LIQUIDACION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th>CONCEPTO</th>
                                            <th>F.P.</th>
                                            <th>IMPORTE</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>


                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                                    data-bs-target="#bloque3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-database-add" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                        <path
                                            d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-section">
                                <h5 class="tex">Bloque 11</h5>
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="8" class="text-center">TOTALES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>EFECTIVO</th>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <th>OTROS</th>
                                            <td></td>

                                        </tr>

                                        <tr>
                                            <th>TOTAL</th>
                                            <td></td>

                                        </tr>

                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                                    data-bs-target="#bloque4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-database-add" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                        <path
                                            d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="form-section">
                    <h5 class="tex">Bloque 12</h5>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="14" class="text-center">DEPOSITO REFERENCIADO - LINEA DE CAPTURA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="14" class="text-center">***DEPOSITO ELECTRONICO***</th>

                            </tr>

                            <tr>
                                <th>PATENTE</th>
                                <td></td>
                                <th>PEDIMENTO</th>
                                <td></td>
                                <th>ADUANA</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">BANCO</th>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <th scope="row">LINEA DE CAPTURA</th>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <th>IMPORTE PAGADO</th>
                                <td></td>
                                <th>FECHA PAGADA</th>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <th scope="row">NUMERO DE OPERACIÓN BANCARIA</th>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <th scope="row">NUMERO DE TRANSACCION SAT</th>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <th scope="row">MEDIO DE PRESENTACION</th>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <th scope="row">MEDIO DE PRESENTACION</th>
                                <td colspan="13"></td>
                            </tr>

                            <tr>
                                <th colspan="14" class="text-center"> </th>

                            </tr>


                        </tbody>
                    </table>

                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg> </button>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 13</h5>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
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
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg>
                    </button>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 14</h5>
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
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg>
                    </button>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 15</h5>
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
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg>
                    </button>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 16</h5>
                    <table class="table table-bordered table-hover">

                        <tbody>
                            <tr>
                                <th>CLAVE/COMPL. IDENTIFICADOR</th>
                                <th>COMPLEMENTO 1</th>
                                <th>COMPLEMENTO 2</th>
                                <th>COMPLEMENTO 3</th>
                                

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg>
                    </button>
                    <br>
                </div>


                <div class="form-section">
                    <h5 class="tex">Bloque 17</h5>
                    <table class="table table-bordered table-hover">
                        <thead  class="thead-dark">
                            <tr>
                                <th class="text-center">OBSERVACIONES</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>
                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#bloque2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-database-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                            <path
                                d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                        </svg>
                    </button>
                    <br>
                </div>








                <button id="guardar-pedimento-completo" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-database-fill-up" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1" />
                        <path
                            d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905" />
                    </svg>
                </button>
            </div>
        </fieldset>
    </section>
    <footer>
        <?php include '../public/footer.php'; ?>
    </footer>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 1 </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bloque-a-form">
                        <div class="form-group">
                            <label for="bloque-a-campo1">NUM. PEDIMENTO</label>
                            <input type="text" class="form-control" id="bloque-a-campo1" name="campo1" required>
                        </div>
                        <div class="form-group">
                            <label for="bloque-a-campo2">T.OPER</label>
                            <input type="text" class="form-control" id="bloque-a-campo2" name="campo2" required>
                        </div>
                        <div class="form-group">
                            <label for="bloque-a-campo1">CVE PEDIMENTO</label>
                            <input type="text" class="form-control" id="bloque-a-campo1" name="campo1" required>
                        </div>
                        <div class="form-group">
                            <label for="bloque-a-campo2">REGIMEN</label>
                            <input type="text" class="form-control" id="bloque-a-campo2" name="campo2" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 1</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="bloque2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 2 </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form">
                        <div class="form-group">
                            <label for="bloque-b-campo1">DESTINO O ORIGEN</label>
                            <input type="text" class="form-control" id="bloque-b-campo1" name="campo1" required>
                        </div>
                        <div class="form-group">
                            <label for="bloque-b-campo2">TIPO DE CAMBIO</label>
                            <input type="text" class="form-control" id="bloque-b-campo2" name="campo2" required>
                        </div>
                        <div class="form-group">
                            <label for="bloque-b-campo3">PESO BRUTO</label>
                            <input type="text" class="form-control" id="bloque-b-campo1" name="campo1" required>
                        </div>
                        <div class="form-group">
                            <label for="bloque-b-campo4">ADUNA</label>
                            <input type="text" class="form-control" id="bloque-b-campo2" name="campo2" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 2</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="bloque3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 3 </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form">
                        <div class="form-group">
                            <label for="bloque-b-campo1">DESTINO O ORIGEN</label>
                            <input type="text" class="form-control" id="bloque-b-campo1" name="campo1" required>
                        </div>
                        <div class="form-group">
                            <label for="bloque-b-campo2">TIPO DE CAMBIO</label>
                            <input type="text" class="form-control" id="bloque-b-campo2" name="campo2" required>
                        </div>
                        <div class="form-group">
                            <label for="bloque-b-campo3">PESO BRUTO</label>
                            <input type="text" class="form-control" id="bloque-b-campo1" name="campo1" required>
                        </div>
                        <div class="form-group">
                            <label for="bloque-b-campo4">ADUNA</label>
                            <input type="text" class="form-control" id="bloque-b-campo2" name="campo2" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 2</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            var pedimentoId;

            $('#generar-pedimento').click(function () {
                var agenteId = $('#agenteSelect').val();
                $.ajax({
                    url: 'generar_pedimento.php',
                    method: 'POST',
                    data: { agente_id: agenteId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            pedimentoId = response.pedimento_id;
                            $('#bloques-container').show();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function () {
                        alert('Error al generar el pedimento.');
                    }
                });
            });

            $('#bloque-a-form').submit(function (event) {
                event.preventDefault();
                $.ajax({
                    url: 'guardar_bloque_a.php',
                    method: 'POST',
                    data: {
                        pedimento_id: pedimentoId,
                        campo1: $('#bloque-a-campo1').val(),
                        campo2: $('#bloque-a-campo2').val()
                    },
                    success: function (response) {
                        alert('Bloque A guardado exitosamente.');
                    },
                    error: function () {
                        alert('Error al guardar el Bloque A.');
                    }
                });
            });

            $('#bloque-b-form').submit(function (event) {
                event.preventDefault();
                $.ajax({
                    url: 'guardar_bloque_b.php',
                    method: 'POST',
                    data: {
                        pedimento_id: pedimentoId,
                        campo1: $('#bloque-b-campo1').val(),
                        campo2: $('#bloque-b-campo2').val()
                    },
                    success: function (response) {
                        alert('Bloque B guardado exitosamente.');
                    },
                    error: function () {
                        alert('Error al guardar el Bloque B.');
                    }
                });
            });

            $('#guardar-pedimento-completo').click(function () {
                alert('Pedimento completo guardado exitosamente.');
            });
        });
    </script>
</body>

</html>