<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Estadísticas</title>
        <link rel='stylesheet' href='estadisticas.css' />
    </head>
    <body>
		<?php
$codigos['titulacion'] = getCampo('titulacion');
$codigos['asignatura'] = getCampo('asignatura');
$codigos['grupo'] = getCampo('grupo');
$codigos['profesor'] = getCampo('profesor');

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

    echo "<h2 style='margin: 2% 3% 2% 3%;'>INFORME DE SATISFACCIÓN CON LA DOCENCIA UNIVERSITARIA</h2>";

    echo "<div class='round1' style='margin: 0% 70% 0 3%;'>";

    echo "<p class='codigos'><b>Titulación/a:</b> " . getNombre($base, 'titulaciones', $codigos['titulacion']) . "</p>";
    echo "<p class='codigos'><b>Asignatura/a:</b> " . getNombre($base, 'asignaturas', $codigos['asignatura']) . "</p>";
    echo "<p class='codigos'><b>Grupo:</b> " . $codigos['grupo'] . "</p>";
    echo "<p class='codigos'><b>Profesor/a:</b> " . getNombre($base, 'profesores', $codigos['profesor']) . "</p>";

    echo "</div>";

    echo "<div class='round1' style='margin: 0% 10%;'>";
    echo "<b style='float: right;'>N / MD /  DT</b>";
    echo "<br>";

    for ($i = 0; $i < 23; $i++) {
        $respuestas[$i] = getRespuestas($base, $codigos['profesor'], $i + 1);
        $votantes[$i] = getN($respuestas[$i]);
        $medias[$i] = getMedia($respuestas[$i], $votantes[$i]);
        $desvTipicas[$i] = getDesvTipica($respuestas[$i], $medias[$i], $votantes[$i]);
    }

    echo "<b><br>PLANIFICACIÓN DE LA ENSEÑANZA Y APRENDIZAJE</b>";
    echo "<b><a style='float: right;'>" . resumenCampos($medias, $desvTipicas, 0, 1) . "</a></b>";
    echo "<br><br>";

    $question = "1.- El profesor/a informa sobre los distintos aspectos de la
	guía docente o programa de la asignatura (objetivos,<br>
	actividades, contenidos del temario, metodología, bibliografía,
    sistemas de evaluación,...): ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[0] . " / " . number_format($medias[0], 2, '.', ',') . " / " . number_format($desvTipicas[0], 2, '.', ',') . "</a></b>";
    echo "<br>";
    ?>

    <br><b>DESARROLLO DE LA DOCENCIA</b>
    <?php
echo "<b><a style='float: right;'>" . resumenCampos($medias, $desvTipicas, 1, 21) . "</a></b>";
    ?>
    <br><br>
    <div  class='cuadro'>
    <b>Cumplimiento de las obligaciones docentes (del encargo docente)</b>
    <?php
echo "<b><a style='float: right;'>" . resumenCampos($medias, $desvTipicas, 1, 4) . "</a></b>";
    ?>
    <br>
<?php
$question = "2.- Imparte las clases en el horario fijado: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[1] . " / " . number_format($medias[1], 2, '.', ',') . " / " . number_format($desvTipicas[1], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "3.- Asiste regularmente a clase: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[2] . " / " . number_format($medias[2], 2, '.', ',') . " / " . number_format($desvTipicas[2], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "4.- Cumple adecuadamente su labor de tutoría (presencial o virtual): ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[3] . " / " . number_format($medias[3], 2, '.', ',') . " / " . number_format($desvTipicas[3], 2, '.', ',') . "</a></b>";
    echo "<br>";
    ?>

</div>
<div class='cuadro'>
<br><b>Cumplimiento de la Planificación</b>
<?php
echo "<b><a style='float: right;'>" . resumenCampos($medias, $desvTipicas, 4, 8) . "</a></b>";
    ?>
<br>

<?php
$question = "5.- Se ajusta a la planificación de la asignatura: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[4] . " / " . number_format($medias[4], 2, '.', ',') . " / " . number_format($desvTipicas[4], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "6.- Se han coordinado las actividades teóricas y prácticas previstas: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[5] . " / " . number_format($medias[5], 2, '.', ',') . " / " . number_format($desvTipicas[5], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "7.- Se ajusta a los sistemas de evaluación especificados en
la guía docente/programa de la asignatura: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[6] . " / " . number_format($medias[6], 2, '.', ',') . " / " . number_format($desvTipicas[6], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "8.- La bibliografía y otras fuentes de información recomendadas
en el programa son útiles para el aprendizaje<br> de la asignatura: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[7] . " / " . number_format($medias[7], 2, '.', ',') . " / " . number_format($desvTipicas[7], 2, '.', ',') . "</a></b>";
    echo "<br>";
    ?>
</div>

<div class='cuadro'>
<br><b>Metodología docente</b>
<?php
echo "<b><a style='float: right;'>" . resumenCampos($medias, $desvTipicas, 8, 10) . "</a></b>";
    ?>
<br>

<?php
$question = "9.- El/la profesor/a organiza bien las actividades que se
realizan en clase: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[8] . " / " . number_format($medias[8], 2, '.', ',') . " / " . number_format($desvTipicas[8], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "10.- Utiliza recursos didácticos (pizarra, transparencias,
mediosaudiovisuales, material de apoyo en red virtual...)<br> que
facilitan el aprendizaje:";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[9] . " / " . number_format($medias[9], 2, '.', ',') . " / " . number_format($desvTipicas[9], 2, '.', ',') . "</a></b>";
    echo "<br>";
    ?>
</div>

<div class='cuadro'>
<br><b>Competencias docentes desarrolladas por el/la profesor/a</b>
<?php
echo "<b><a style='float: right;'>" . resumenCampos($medias, $desvTipicas, 10, 19) . "</a></b>";
    ?>
<br>

<?php
$question = "11.- Explica con claridad y resalta los contenidos importantes: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[10] . " / " . number_format($medias[10], 2, '.', ',') . " / " . number_format($desvTipicas[10], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "12.- Se interesa por el grado de comprensión de sus
explicaciones: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[11] . " / " . number_format($medias[11], 2, '.', ',') . " / " . number_format($desvTipicas[11], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "13.- Expone ejemplos en los que se ponen en práctica los
contenidos de la asignatura: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[12] . " / " . number_format($medias[12], 2, '.', ',') . " / " . number_format($desvTipicas[12], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "14.- Explica los contenidos con seguridad: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[13] . " / " . number_format($medias[13], 2, '.', ',') . " / " . number_format($desvTipicas[13], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "15.- Resuelve las dudas que se le plantean: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[14] . " / " . number_format($medias[14], 2, '.', ',') . " / " . number_format($desvTipicas[14], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "16.- Fomenta un clima de trabajo y participación: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[15] . " / " . number_format($medias[15], 2, '.', ',') . " / " . number_format($desvTipicas[15], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "17.- Propicia una comunicación fluida y espontánea: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[16] . " / " . number_format($medias[16], 2, '.', ',') . " / " . number_format($desvTipicas[16], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "18.- Motiva a los/as estudiantes para que se interesen por la
asignatura: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[17] . " / " . number_format($medias[17], 2, '.', ',') . " / " . number_format($desvTipicas[17], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "19.- Es respetuoso/a en el trato con los/las estudiantes: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[18] . " / " . number_format($medias[18], 2, '.', ',') . " / " . number_format($desvTipicas[18], 2, '.', ',') . "</a></b>";
    echo "<br>";
    ?>

</div>
<div class='cuadro'>
<br><b>Sistemas de evaluación</b>
<?php
echo "<b><a style='float: right;'>" . resumenCampos($medias, $desvTipicas, 19, 21) . "</a></b>";
    ?>
<br>

<?php
$question = "20.- Tengo claro lo que se me va a exigir para superar esta
asignatura: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[19] . " / " . number_format($medias[19], 2, '.', ',') . " / " . number_format($desvTipicas[19], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "21.- Los criterios y sistemas de evaluación me parecen
adecuados, en el contexto de la asignatura: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[20] . " / " . number_format($medias[20], 2, '.', ',') . " / " . number_format($desvTipicas[20], 2, '.', ',') . "</a></b>";
    echo "<br>";
    ?>

</div>


<br><b>RESULTADOS</b>
<?php
echo "<b><a style='float: right;'>" . resumenCampos($medias, $desvTipicas, 21, 23) . "</a></b>";
    ?>
<br><br>

<div class='cuadro'>
<?php
$question = "22.-Las actividades desarrolladas(teóricas, prácticas, de
trabajo individual, en grupo,...) contribuyen a alcanzar<br> los
objetivos de la asignatura:";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[21] . " / " . number_format($medias[21], 2, '.', ',') . " / " . number_format($desvTipicas[21], 2, '.', ',') . "</a></b>";
    echo "<br>";

    $question = "23.- Estoy satisfecho/a con la labor docente de este/a
profesor/a: ";
    echo $question;
    echo "<b><a style='float: right;'>" . $votantes[22] . " / " . number_format($medias[22], 2, '.', ',') . " / " . number_format($desvTipicas[22], 2, '.', ',') . "</a></b>";
    echo "<br>";

    echo "</div>";
} catch (Exception $e) {
    die('Error: ' . $e->GetMessage());
} finally {
    $base = null; // Cierra la conexión
}

function resumenCampos($medias, $desvTipicas, $ini, $fin)
{
    $m = 0;
    $d = 0;
    for ($i = $ini; $i < $fin; $i++) {
        $m += $medias[$i];
        $d += $desvTipicas[$i];
    }
    $N = $fin - $ini;
    $m = number_format($m / $N, 2, '.', ',');
    $d = number_format($d / $N, 2, '.', ',');
    return $m . " / " . $d;
}

function getDesvTipica($respuestas, $media, $N)
{
    $numerador = 0;
    foreach ($respuestas as $key => $value) {
        if (strcmp($value, "ns") != 0) {
            $numerador += pow($value - $media, 2);
        }
    }
    $desvTipica = sqrt($numerador / $N);
    return $desvTipica;
}

function getMedia($respuestas, $N)
{
    $media = 0;
    foreach ($respuestas as $key => $value) {
        if (strcmp($value, "ns") != 0) {
            $media += (int) $value;
        }
    }
    $media /= $N;
    return $media;
}

// Devuelve el número de personas que han votado distinto de ns
function getN($respuestas)
{
    $N = 0;
    foreach ($respuestas as $key => $value) {
        if (strcmp($value, "ns") != 0) {
            $N++;
        }
    }
    return $N;
}

// Devuelve todas las respuestas a una pregunta sobre un profesor
function getRespuestas($base, $idProfesor, $i)
{
    $query = "SELECT `id` FROM  `encuestas` WHERE `id_profesor`=" . $idProfesor . ";";
    $resultado = $base->query($query);
    $resultado2 = $resultado->fetchAll();

    for ($j = 0; $j < count($resultado2); $j++) {
        $id_encuestas[$j] = $resultado2[$j][0];
    }

    for ($j = 0; $j < count($id_encuestas); $j++) {
        $query = "SELECT `respuesta` FROM  `respuestas`
            WHERE (`id_encuesta`=" . $id_encuestas[$j] . " AND `id_pregunta`= " . $i . ");";
        $resultado = $base->query($query);
        $resultado2 = $resultado->fetch();
        $respuestas[$j] = $resultado2[0];
    }

    return $respuestas;
}

function getNombre($base, $tabla, $id)
{
    $query = "SELECT `nombre` FROM  " . $tabla . " WHERE `id`=" . $id . ";";
    $resultado = $base->query($query);
    $resultado = $resultado->fetch();
    $nombre = $resultado[0];
    return $nombre;
}

function getCampo($campo)
{
    if (!empty($_POST[$campo])) {
        return test_input($_POST[$campo]);
    }
    return "";
}

function test_input($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
?>

	</body>
</html>
