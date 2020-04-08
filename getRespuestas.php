<!-- Aqui obtenemos los ids de las encuestas que cumplen los filtros aplicados -->

<?php

$q = $_REQUEST["q"];

try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=encuestas', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = explode(',', $q);

    $id_profesor = $q[11];

    $query = "SELECT `id` FROM `encuestas` WHERE `id_profesor`=" . $id_profesor . ";";
    $resultado = $base->query($query);
    $resultado2 = $resultado->fetchAll();
    for ($j = 0; $j < count($resultado2); $j++) {
        $id_encuestas[11][$j] = $resultado2[$j][0];
    }

    $resultado->closeCursor();

    for ($i = 0; $i < count($q) - 1; $i++) {
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
    }

    $array_aux = $id_encuestas[0];
    for ($i = 0; $i < count($q); $i++) {
        $array_aux = array_intersect($id_encuestas[$i], $array_aux);
    }

    $i = 0;
    $id_encuestas = array();
    foreach ($array_aux as $key => $value) {
        $id_encuestas[$i] = $value;
        $i++;
    }

    if (!empty($id_encuestas)) {
        for ($i = 0; $i < 23; $i++) {
            $respuestas[$i] = getRespuestas($base, $id_encuestas, $i + 1);
            $votantes[$i] = getN($respuestas[$i]);
            $medias[$i] = getMedia($respuestas[$i], $votantes[$i]);
            $desvTipicas[$i] = getDesvTipica($respuestas[$i], $medias[$i], $votantes[$i]);
        }

        echo "<div class='round1' style='float: left; margin: 0% 10% 0% 10%'>";
        echo "<b style='float: right;'>N / MD /  DT</b>";
        echo "<br>";

        echo "<b><br>VALORACIÓN GLOBAL PROFESOR/A - ASIGNATURA</b>";
        echo "<b><a style='float: right;'>" . resumenCampos($medias, $desvTipicas, 0, 23) . "</a></b>";
        echo "<br>";

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

        echo "<h2>INFORMACIÓN PERSONAL Y ACADÉMICA DE LOS ESTUDIANTES QUE HAN RESPONDIDO A LA ENCUESTA</h2>";
        echo "<h4>(La representación del resultado es porcentual)</h4>";
        $nEncuestados = getEncuestados($base, $id_profesor);
        echo "<h4>Nº DE ESTUDIANTES ENCUESTADOS: " . $nEncuestados . "</h4>";

        $query = "SELECT `id` FROM `encuestas` WHERE `id_profesor`=" . $id_profesor . ";";
        $resultado = $base->query($query);
        $resultado2 = $resultado->fetchAll();
        for ($j = 0; $j < count($resultado2); $j++) {
            $id_encuestas[$j] = $resultado2[$j][0];
        }

        $resultado->closeCursor();

        $id_pregunta = 24;
        // Edad
        echo "<b style='float: right;'>&le;19 / 20-21 /  22-23 / 24-25 / &ge;25</b>";
        echo "<br>";
        $campo = "Edad: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'menor que 20') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '20-21') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '22-23') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '$24-25') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'mayor que 25') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // Sexo
        echo "<b style='float: right;'>Hombre / Mujer</b>";
        echo "<br>";
        $campo = "Sexo: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'Hombre') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'Mujer') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // Curso más alto en el que están matriculados
        echo "<b style='float: right;'>1º / 2º / 3º / 4º / 5º / 6º</b>";
        echo "<br>";
        $campo = "Curso más alto en el que están matriculados: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '1') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '2') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '3') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '4') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '5') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '6') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // Curso más bajo en el que están matriculados
        echo "<b style='float: right;'>1º / 2º / 3º / 4º / 5º / 6º</b>";
        echo "<br>";
        $campo = "Curso más bajo en el que están matriculados: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '1') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '2') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '3') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '4') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '5') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '6') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // Veces que se han matriculado en esta asignatura
        echo "<b style='float: right;'>1 / 2 / 3 / >3</b>";
        echo "<br>";
        $campo = "Veces que se han matriculado en esta asignatura: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '1') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '2') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '3') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'mas de 3') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // Veces que se han examinado de esta asignatura
        echo "<b style='float: right;'>1 / 2 / 3 / >3</b>";
        echo "<br>";
        $campo = "Veces que se han matriculado en esta asignatura: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '1') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '2') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, '3') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'mas de 3') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // La asignatura les interesa
        echo "<b style='float: right;'>Nada / Algo / Bastante / Mucho</b>";
        echo "<br>";
        $campo = "La asignatura les interesa: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'nada') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'algo') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'bastante') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'mucho') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // Hacen uso de las tutorías
        echo "<b style='float: right;'>Nada / Algo / Bastante / Mucho</b>";
        echo "<br>";
        $campo = "Hacen uso de las tutorías: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'nada') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'algo') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'bastante') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'mucho') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // La dificultad de esta asignatura es
        echo "<b style='float: right;'>Baja / Media / Alta / Muy / Alta</b>";
        echo "<br>";
        $campo = "La dificultad de esta asignatura es: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'baja') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'media') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'alta') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'muy alta') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // La calificación esperada es
        echo "<b style='float: right;'> N.P. / Sus. / Apro. / Not. / Sobr. / Mat. Hon.</b>";
        echo "<br>";
        $campo = "La calificación esperada es: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'n.p.') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'sus.') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'apro.') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'not.') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'sobr.') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'mat. hon.') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

        // La asistencia a clase es de
        echo "<b style='float: right;'>Menos 50% / Entre 50% y 80% /  Más de 80%</b>";
        echo "<br>";
        $campo = "La asistencia a clase es de: ";
        echo $campo;
        echo "<a style='float: right;'>" .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'menos 50% ') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'entre 50% y 80%') . " / " .
        getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, 'mas de 80%') . "</a>";
        $id_pregunta++;
        echo "<br><br>";

    } else {
        echo "<h1 style='float: left;'>No se han encontrado resultados</h1>";
    }

} catch (Exception $e) {
    die('Error: ' . $e->GetMessage());
} finally {$base = null;}

function getPorcentaje($base, $id_encuestas, $nEncuestados, $id_pregunta, $respuesta)
{
    $count = 0;
    for ($i = 0; $i < count($id_encuestas); $i++) {
        $query = "SELECT `id` FROM  `respuestas` WHERE (`id_pregunta`=" . $id_pregunta .
            " AND `respuesta`='" . $respuesta . "' AND id_encuesta=" . $id_encuestas[$i] . ");";
        // echo $query . "<br>";

        $resultado = $base->query($query);
        $resultado2 = $resultado->fetchAll();
        // print_r($resultado2);
        // echo "<br>";
        if (!empty($resultado2)) {
            $count++;
        }
    }

    $porcentaje = ($count / $nEncuestados) * 100;

    $resultado->closeCursor();

    return number_format($porcentaje, 2, '.', ',');

}

function getEncuestados($base, $id_profesor)
{
    $query = "SELECT `id` FROM  `encuestas` WHERE `id_profesor`=" . $id_profesor . ";";
    $resultado = $base->query($query);
    $resultado2 = $resultado->fetchAll();
    for ($j = 0; $j < count($resultado2); $j++) {
        $id_encuestas[$j] = $resultado2[$j][0];
    }

    $resultado->closeCursor();

    return count($id_encuestas);
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

function getRespuestas($base, $id_encuestas, $i)
{
    for ($j = 0; $j < count($id_encuestas); $j++) {
        $query = "SELECT `respuesta` FROM  `respuestas`
            WHERE (`id_encuesta`=" . $id_encuestas[$j] . " AND `id_pregunta`= " . $i . ");";
        $resultado = $base->query($query);
        $resultado2 = $resultado->fetch();
        $respuestas[$j] = $resultado2[0];
    }

    return $respuestas;
}

function getDesvTipica($respuestas, $media, $N)
{
    if ($N != 0) {
        $numerador = 0;
        foreach ($respuestas as $key => $value) {
            if (strcmp($value, "ns") != 0) {
                $numerador += pow($value - $media, 2);
            }
        }
        $desvTipica = sqrt($numerador / $N);
        return $desvTipica;
    }
    return 0;
}

function getMedia($respuestas, $N)
{
    if ($N != 0) {
        $media = 0;
        foreach ($respuestas as $key => $value) {
            if (strcmp($value, "ns") != 0) {
                $media += (int) $value;
            }
        }
        $media /= $N;
        return $media;
    }
    return 0;
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
