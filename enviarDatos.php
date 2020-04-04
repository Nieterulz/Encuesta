<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
</head>
<body>
    <h1>Sus datos han sido enviados correctamente</h1>
</body>
</html>

<?php
header("Content-Type: text/html;charset=utf-8");
// Definimos los campos que existen en el formulario
$codigosN = array("titulacion", "asignatura", "grupo", "profesor");

$estudiantesN = array("edad", "sexo", "cursoalto", "cursobajo",
    "matriculas", "examenes", "interes", "tutorias", "dificultad",
    "calificacion", "asistencia");

$datosN = array("dato1", "dato2", "dato3", "dato4", "dato5", "dato6",
    "dato7", "dato8", "dato9", "dato10", "dato11", "dato12",
    "dato13", "dato14", "dato15", "dato16", "dato17", "dato18",
    "dato19", "dato20", "dato21", "dato22", "dato23");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($codigosN as $c => $valor) {
        $codigos[$valor] = getCampo($valor);
    }

    foreach ($estudiantesN as $e => $valor) {
        $estudiantes[$valor] = getCampo($valor);
    }

    foreach ($datosN as $e => $valor) {
        $datos[$valor] = getCampo($valor);
    }

    print_r($codigos);
    echo "<br>";
    print_r($estudiantes);
    echo "<br>";
    print_r($datos);
    echo "<br>";

    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=encuestas', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $keys = array('titulacion', 'asignatura', 'grupo');
        $tabla = array('titulaciones', 'asignaturas', 'grupos');
        for ($i = 0; $i < count($keys); $i++) {
            if (!exists($base, $codigos[$keys[$i]], $tabla[$i], $codigos['titulacion'])) {
                die("Error al introducir " . $keys[$i]);
            }
        }
    } catch (Exception $e) {
        die('Error: ' . $e->GetMessage());
    } finally {
        $base = null; // Cierra la conexión
    }
}

// Comprueba si es valido el campo introducido
function test_input($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Obtiene el campo introducido, de lo contrario devuelve vacio
function getCampo($campo)
{
    if (!empty($_POST[$campo])) {
        return test_input($_POST[$campo]);
    }
    return "";
}

function exists($base, $id, $tabla, $id_titulacion)
{
    $query = "SELECT `id` FROM `" . $tabla . "` WHERE `id`=" . $id;

    if (strcmp($tabla, "titulaciones") != 0) {
        $query = $query . " AND `id_titulacion`=" . $id_titulacion . ";";
    }

    echo $query;

    $resultado = $base->query($query);

    if (empty($resultado->fetchAll())) {
        return false;
    }
    $resultado->closeCursor();
    return true;
}