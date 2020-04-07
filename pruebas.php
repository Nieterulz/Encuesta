<?php
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=encuestas', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT `id` FROM  `encuestas` WHERE `id_profesor`=1;";
    $resultado = $base->query($query);
    $id_encuestas = $resultado->fetchAll();

    for ($i = 0; $i < count($id_encuestas); $i++) {
        $valores[$i] = $id_encuestas[$i][0];
    }

    print_r($valores);

    $resultado->closeCursor();
} catch (Exception $e) {
    die('Error: ' . $e->GetMessage());
} finally {$base = null;}
