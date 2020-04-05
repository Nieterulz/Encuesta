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

    // Vemos los datos que recibimos
    // verDatos($codigos, $estudiantes, $datos);

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
        if (!existeGrupo($base, $codigos['grupo'], $codigos['titulacion'])) {
            die("Error al introducir `grupo`");
        }
        if (!existeProfesor($base, $codigos['profesor'], $codigos['asignatura'])) {
            die("Error al introducir `profesor`");
        }

        introducirEstudiante($base, $estudiantes);
        introducirEncuesta($base, $codigos);
        introducirRespuesta($base, $codigos, $datos);

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
function existeProfesor($base, $id, $id_asignatura)
{
    $query = "SELECT `id` FROM `profesores`
        WHERE `id`=" . $id . " AND `id_asignatura`=" . $id_asignatura . ";";
    $resultado = $base->query($query);
    if (empty($resultado->fetchAll())) {
        return false;
    }
    $resultado->closeCursor();
    return true;
}

// Si existe el grupo devuelve true
function existeGrupo($base, $id, $id_titulacion)
{
    $query = "SELECT `id` FROM `grupos`
        WHERE `id`=" . $id . " AND `id_titulacion`=" . $id_titulacion . ";";
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

function introducirEstudiante($base, $estudiantes)
{
    $query = "INSERT INTO `estudiantes` VALUES
                (NULL, '" .
        $estudiantes['edad'] . "', '" .
        $estudiantes['sexo'] . "', '" .
        $estudiantes['cursoalto'] . "', '" .
        $estudiantes['cursobajo'] . "', '" .
        $estudiantes['matriculas'] . "', '" .
        $estudiantes['examenes'] . "', '" .
        $estudiantes['interes'] . "', '" .
        $estudiantes['tutorias'] . "', '" .
        $estudiantes['dificultad'] . "', '" .
        $estudiantes['calificacion'] . "', '" .
        $estudiantes['asistencia'] .
        "');";
    $base->query($query);
}

function introducirEncuesta($base, $codigos)
{
    $query = "SELECT MAX(id) FROM `estudiantes`";
    $estudiante = $base->query($query);
    $estudiante = $estudiante->fetch();
    $idEstudiante = $estudiante['0'];

    $query = "INSERT INTO `encuestas` VALUES
                (NULL, '" .
        $codigos['asignatura'] . "', '" .
        $codigos['grupo'] . "', '" .
        $idEstudiante .
        "');";
    $base->query($query);
}

function introducirRespuesta($base, $codigos, $datos)
{
    $query = "SELECT MAX(id) FROM `estudiantes`";
    $estudiante = $base->query($query);
    $estudiante = $estudiante->fetch();
    $idEstudiante = $estudiante['0'];

    for ($i = 1; $i <= 23; $i++) {
        $query = "INSERT INTO `respuestas` VALUES
            (NULL, '" .
            $datos['dato' . $i] . "', '" .
            $idEstudiante . "', '" .
            $codigos['profesor'] . "', '" .
            $i . "');";
        $base->query($query);
    }
}
