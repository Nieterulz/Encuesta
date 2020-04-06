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

    // Almacenamos los códigos de la encuesta
    foreach ($codigosN as $c => $valor) {
        $codigos[$valor] = getCampo($valor);
    }

    // Almacenamos los datos de los estudiantes
    foreach ($estudiantesN as $e => $valor) {
        $estudiantes[$valor] = getCampo($valor);
    }

    // Almacenamos los datos de la encuesta para el profesor
    foreach ($datosN as $e => $valor) {
        $datos[$valor] = getCampo($valor);
    }

    // Nos conectamos a la base de datos
    try {
        $base = new PDO('mysql:host=127.0.0.1;dbname=encuestas', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->query("SET NAMES 'utf8'");

        if (!existeTitulacion($base, $codigos['titulacion'])) {
            die("Error al introducir `titulacion`");
        }
        if (!existeAsignatura($base, $codigos['asignatura'], $codigos['titulacion'])) {
            die("Error al introducir `asignatura`");
        }
        if (!existeGrupo($base, $codigos['grupo'], $codigos['asignatura'])) {
            die("Error al introducir `grupo`");
        }
        if (!existeProfesor($base, $codigos['profesor'], $codigos['grupo'])) {
            die("Error al introducir `profesor`");
        }

        introducirEncuesta($base, $codigos);
        introducirRespuesta($base, $codigos, $datos, $estudiantes, $estudiantesN);

    } catch (Exception $e) {
        die('Error: ' . $e->GetMessage());
    } finally {
        $base = null; // Cierra la conexión
    }

    echo "<h1>Sus datos han sido enviados correctamente</h1>";
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

// Si existe el profesor devuelve true
function existeProfesor($base, $id, $id_grupo)
{
    $query = "SELECT `id` FROM `profesores`
        WHERE `id`=" . $id . " AND `id_grupo`=" . $id_grupo . ";";
    $resultado = $base->query($query);
    if (empty($resultado->fetchAll())) {
        return false;
    }
    $resultado->closeCursor();
    return true;
}

// Si existe el grupo devuelve true
function existeGrupo($base, $id, $id_asignatura)
{
    $query = "SELECT `id` FROM `grupos`
        WHERE `id`=" . $id . " AND `id_asignatura`=" . $id_asignatura . ";";
    $resultado = $base->query($query);
    if (empty($resultado->fetchAll())) {
        return false;
    }
    $resultado->closeCursor();
    return true;
}

// Si existe la asignatura devuelve true
function existeAsignatura($base, $id, $id_titulacion)
{
    $query = "SELECT `id` FROM `asignaturas`
        WHERE `id`=" . $id . " AND `id_titulacion`=" . $id_titulacion . ";";
    $resultado = $base->query($query);
    if (empty($resultado->fetchAll())) {
        return false;
    }
    $resultado->closeCursor();
    return true;
}

// Si existe la titulacion devuelve true
function existeTitulacion($base, $id)
{
    $query = "SELECT `id` FROM `titulaciones` WHERE `id`=" . $id;
    $resultado = $base->query($query);
    if (empty($resultado->fetchAll())) {
        return false;
    }
    $resultado->closeCursor();
    return true;
}

function verDatos($codigos, $estudiantes, $datos)
{
    print_r($codigos);
    echo "<br>";
    print_r($estudiantes);
    echo "<br>";
    print_r($datos);
    echo "<br>";
}

function introducirEncuesta($base, $codigos)
{
    $query = "INSERT INTO `encuestas` VALUES
                (NULL," . $codigos['profesor'] . ");";
    $base->query($query);
}

function introducirRespuesta($base, $codigos, $datos, $estudiantes, $estudiantesN)
{
    $query = "SELECT MAX(id) FROM `encuestas`";
    $encuesta = $base->query($query);
    $encuesta = $encuesta->fetch();
    $idEncuesta = $encuesta['0'];

    for ($i = 1; $i <= 23; $i++) {
        $query = "INSERT INTO `respuestas` VALUES
            (NULL, '" .
            $datos['dato' . $i] . "', '" .
            $idEncuesta . "', '" .
            $i . "');";
        $base->query($query);
    }

    $j = 0;
    for ($i = 24; $i <= 34; $i++) {
        $query = "INSERT INTO `respuestas` VALUES
            (NULL, '" .
            $estudiantes[$estudiantesN[$j]] . "', '" .
            $idEncuesta . "', '" .
            $i . "');";
        $base->query($query);
        $j++;
    }
}
