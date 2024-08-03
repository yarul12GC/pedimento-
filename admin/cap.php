<?php
include_once '../sesion.php';
include_once '../public/mensaje.php';
$pedimento_id = $_SESSION['pedimento_id'];

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

            < id="bloques-container">
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



                
                    <div class="duplicate-container" id="table-container">
                        <div class="row row-cols-auto">
                            <div class="col-md-1">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SECCION.</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-sm-8">
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
                                            <td> <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque20">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                        <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                    </svg>
                                                </button></td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" colspan="10">IDENTIF</th>
                                            <td> <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                        <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                    </svg>
                                                </button></td>
                                        </tr>

                                        <tr>
                                            <th colspan="3">VAL.ADU./USD</th>
                                            <th colspan="2">IMP.PRECIO PAG.</th>
                                            <th colspan="2">PRECIO UNIT.</th>
                                            <th colspan="3">VAL. AGREG.</th>
                                            <td> <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                        <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                    </svg>
                                                </button></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="11"></td>
                                        </tr>

                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2"></td>
                                            <td colspan="2"></td>
                                            <td colspan="4"></td>
                                        </tr>


                                        <tr>
                                            <th colspan="2">PERMISO</th>
                                            <th colspan="2">NUMERO DE PERMISO</th>
                                            <th colspan="2">FIRMA DE PERMISO</th>
                                            <th colspan="2">VAL. COM. DLS</th>
                                            <th colspan="2">CANTIDAD UMT</th>
                                            <td>
                                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                        <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2"></td>
                                            <td colspan="2"></td>
                                            <td colspan="2"></td>
                                            <td colspan="3"></td>
                                        </tr>

                                        <tr>
                                            <th colspan="2">IDENTIF</th>
                                            <th colspan="3">COMPLEMENTO 1</th>
                                            <th colspan="2">COMPLEMENTO 2</th>
                                            <th colspan="3">COMPLEMENTO 3</th>
                                            <td>
                                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                        <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                    </svg>
                                                </button>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="3"></td>
                                            <td colspan="2"></td>
                                            <td colspan="4"></td>
                                        </tr>

                                        <tr>
                                            <th colspan="10" class="text-center table-dark">OBSERVACIONES A NIVEL PARTIDA
                                            </th>
                                            <td> <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                        <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="11"></td>
                                        </tr>



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
                                            <th>IMP.</th>
                                            <td><button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                        <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                    </svg>
                                                </button></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="11"></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="duplicate-table-btn">Duplicar Tabla</button>
    


                <div class="form-section">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="11" class="text-center">AGENTE ADUANAL, APODERADO ADUANAL O EL
                                            ALMACEN</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th colspan="5">NOMBRE O RAZ. SOC.</th>
                                        <td colspan="6"></td>

                                    </tr>
                                    <tr>
                                        <th>RFC</th>
                                        <td></td>
                                        <th>P. Moral</th>
                                        <td></td>
                                        <th>RFC</th>
                                        <td></td>
                                        <th>P. Fisica</th>
                                        <td></td>
                                        <th>CURP</th>
                                        <td></td>
                                        <td>

                                            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                    <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                </svg>
                                            </button>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="10" class="text-center table-dark">MANDATARIO / PERSONA AUTORIZADA
                                        </th>
                                        <td> <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                    <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="6">NOMBRE</th>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">RFC</th>
                                        <td colspan="3"></td>
                                        <th colspan="3">CURP</th>
                                        <td colspan="3"></td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">DECLARO BAJO PROTESTA DE DECIR VERDAD, EN LOS TERMINOS
                                            DE LO DISPUESTO POR EL ARTICULO 81 DE LA LEY ADUANERA</th>
                                        <td>
                                            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                                    <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th colspan="3" class="text-center">PATENTE O AUTORIZACION:</th>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center">

                                        </td>
                                    </tr>

                                </tbody>

                            </table>
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








    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        document.getElementById('duplicate-table-btn').addEventListener('click', function() {
            const container = document.getElementById('table-container');
            const newTable = container.children[0].cloneNode(true); // Clonar la primera tabla
            container.appendChild(newTable); // Agregar la nueva tabla al contenedor
        });
    </script>
</body>

</html>