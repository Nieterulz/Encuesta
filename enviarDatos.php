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
$codigos = array("titulacion", "asignatura", "grupo");

$estudiantes = array("edad", "sexo", "cursoalto", "cursobajo",
    "matriculas", "examenes", "interes", "tutorias", "dificultad",
    "calificacion", "asistencia");

$datos = array("dato1", "dato2", "dato3", "dato4", "dato5", "dato6",
    "dato7", "dato8", "dato9", "dato10", "dato11", "dato12",
    "dato13", "dato14", "dato15", "dato16", "dato17", "dato18",
    "dato19", "dato20", "dato21", "dato22", "dato23");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($codigos as $c => $valor) {
        $codigos[$c] = getCampo($valor);
    }

    foreach ($estudiantes as $e => $valor) {
        $estudiantes[$e] = getCampo($valor);
    }

    foreach ($datos as $e => $valor) {
        $datos[$e] = getCampo($valor);
    }

    print_r($codigos);
    echo "<br>";
    print_r($estudiantes);
    echo "<br>";
    print_r($datos);
    echo "<br>";
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