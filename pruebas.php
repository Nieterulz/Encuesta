<?php
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=encuestas', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión ok <br><br>";

    $tabla = 'titulaciones';
    $id = 1;
    $query = "SELECT id FROM `" . $tabla . "` WHERE id=" . $id;
    $resultado = $base->query($query);

    if (empty($resultado->fetchAll())) {
        echo "No existe";
    } else {
        echo "Si existe";
    }

    // $datos = $resultado->fetchAll();
    // foreach ($datos as $d => $v) {
    //     $valor[$d] = $datos[$d]['id'];
    // }

    // print_r($valor);
    // if (in_array(1, $valor)) {
    //     echo "Si que esta";
    // } else {
    //     echo "No esta";
    // }

    $resultado->closeCursor();

} catch (Exception $e) {
    die('Error: ' . $e->GetMessage());
} finally {
    $base = null; // Cierra la conexión
}
