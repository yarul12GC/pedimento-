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
    'complementos' => "SELECT * FROM complementosp WHERE idpedimentoc = ? ORDER BY section_id",
    'observaciones' => "SELECT * FROM observacionesnp WHERE idpedimentoc = ? ORDER BY section_id",
    'contribuciones' => "SELECT * FROM contribuciones WHERE idpedimentoc = ? ORDER BY section_id"
];

// Ejecutar las consultas
foreach ($queries as $key => $query) {
    fetchData($conexion, $query, $idPedimento, $key, $secciones);
}