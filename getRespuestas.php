<?php
$q = $_REQUEST["q"];

try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=encuestas', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = explode(',', $q);

    for ($i = 0; $i < count($q); $i++) {
        $query = "SELECT `id_encuesta` FROM  `respuestas`;";
        if (!empty($q[$i])) {
            $query = "SELECT `id_encuesta` FROM  `respuestas` WHERE(
	            `id_pregunta`=" . ($i + 24) .
                " AND
	            `respuesta`= '" . $q[$i] . "' );";
        }
        $resultado = $base->query($query);
        $valores = $resultado->fetchAll();
        $id_encuestas[$i] = array();
        for ($j = 0; $j < count($valores); $j++) {
            $id_encuestas[$i][$j] = $valores[$j][0];
        }
        $resultado->closeCursor();
        echo $query;
        echo "<br><br>";
        print_r($id_encuestas[$i]);
        echo "<br><br>";
    }
} catch (Exception $e) {
    die('Error: ' . $e->GetMessage());
} finally {$base = null;}
