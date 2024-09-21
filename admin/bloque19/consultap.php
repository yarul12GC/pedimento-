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
    a4.clave2 AS claveapp4 
FROM partida1 p
INNER JOIN apendice11 a11 ON p.idapendice11 = a11.idapendice11
INNER JOIN apendice4 a4 ON p.idapendice4 = a4.idapendice4
WHERE p.idpedimentoc = ? ORDER BY section_id",

    'partida2' => "SELECT descripcion, section_id FROM partida2 WHERE idpedimentoc = ? ORDER BY section_id",
    'partida3' => "SELECT * FROM partida3 WHERE idpedimentoc = ? ORDER BY section_id",
    'permisos' => "SELECT per.*, 
           ap9.clave AS claveapendice9 
    FROM permisop per 
    INNER JOIN apendice9 ap9 ON per.idapendice9 = ap9.idapendice9 
    WHERE per.idpedimentoc = ? 
    ORDER BY per.section_id
",
    'complementos' => "SELECT compl.*,
               ap8.clave AS claveapendice8p 
                FROM complementosp compl
                INNER JOIN apendice8 ap8 ON compl.idapendice8 = ap8.idapendice8 
                 WHERE compl.idpedimentoc = ? 
                 ORDER BY compl.section_id",
    'observaciones' => "SELECT * FROM observacionesnp WHERE idpedimentoc = ? ORDER BY section_id",

    'contribuciones' => "SELECT cont.*,
                   ap12.descripcion AS claveapendice12p, 
                    ap13.clave AS claveapendice13p,
                    ap18.clave AS claveapendice18p 
     FROM contribuciones cont
     INNER JOIN apendice12 ap12 ON cont.idapendice12 = ap12.idapendice12
     INNER JOIN apendice13 ap13 ON cont.idapendice13 = ap13.idapendice13
     INNER JOIN apendice18 ap18 on cont.idapendice18 = ap18.idapendice18
     WHERE cont.idpedimentoc = ? ORDER BY cont.section_id"
];

// Ejecutar las consultas
foreach ($queries as $key => $query) {
    fetchData($conexion, $query, $idPedimento, $key, $secciones);
}
