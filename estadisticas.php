<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Estadísticas</title>
        <link rel='stylesheet' href='estadisticas.css' />
        <script src="scripts.js"></script>
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

    echo "<form action='inicioSesion.php'>";
    echo "<button style='float: right;' class='button'>Cerrar sesión</button>";
    echo "</form>";

    echo "<div class='round1' style='float: left; margin: 0% 0% 0% 5%; padding: 0% 5%;'>";

    echo "<p class='codigos'><b>Titulación/a:</b> " . getNombre($base, 'titulaciones', $codigos['titulacion']) . "</p>";
    echo "<p class='codigos'><b>Asignatura/a:</b> " . getNombre($base, 'asignaturas', $codigos['asignatura']) . "</p>";
    echo "<p class='codigos'><b>Grupo:</b> " . $codigos['grupo'] . "</p>";
    echo "<p class='codigos'><b>Profesor/a:</b> " . getNombre($base, 'profesores', $codigos['profesor']) . "</p>";
    echo "</div>";

    ?>

        <div class='round1' style='float: right;  margin: 0% 32% 5% 0%;  padding: 3% 5%;'>
        <form>
            <!-- Edad -->
            <label for="edad">Edad: </label>
            <select id="edad" name="edad">
                <option value=""></option>
                <option value="menor que 20"><20</option>
                <option value="20-21">20 - 21</option>
                <option value="22-23">22 - 23</option>
                <option value="24-25">24 - 25</option>
                <option value="mayor que 25">>25</option>
            </select>
            <br /><br />

            <!-- Sexo -->
            <label for="sexo">Sexo: </label>
            <select id="sexo" name="sexo">
                <option value=""></option>
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
            </select>
            <br /><br />

            <!-- Curso Alto -->
            <label for="cursoalto">Curso más alto: </label>
            <select id="cursoalto" name="cursoalto">
                <option value=""></option>
                <option value="1">1º</option>
                <option value="2">2º</option>
                <option value="3">3º</option>
                <option value="4">4º</option>
                <option value="5">5º</option>
                <option value="6">6º</option>
            </select>
            <br /><br />

            <!-- Curso Bajo -->
            <label for="cursobajo">Curso más bajo: </label>
            <select id="cursobajo" name="cursobajo">
                <option value=""></option>
                <option value="1">1º</option>
                <option value="2">2º</option>
                <option value="3">3º</option>
                <option value="4">4º</option>
                <option value="5">5º</option>
                <option value="6">6º</option>
            </select>
            <br /><br />

            <!-- Matriculas -->
            <label for="matriculas">Matriculas: </label>
            <select id="matriculas" name="matriculas">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="mas de 3">>3</option>
            </select>
            <br /><br />

            <!-- Examenes -->
            <label for="examenes">Exámenes: </label>
            <select id="examenes" name="examenes">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="mas de 3">>3</option>
            </select>
            <br /><br />

            <!-- Interes -->
            <label for="interes">Interés en la asignatura: </label>
            <select id="interes" name="interes">
                <option value=""></option>
                <option value="nada">Nada</option>
                <option value="algo">Algo</option>
                <option value="bastante">Bastante</option>
                <option value="mucho">Mucho</option>
            </select>
            <br /><br />

            <!-- Tutorías -->
            <label for="tutorias">Uso de tutorías: </label>
            <select id="tutorias" name="tutorias">
                <option value=""></option>
                <option value="nada">Nada</option>
                <option value="algo">Algo</option>
                <option value="bastante">Bastante</option>
                <option value="mucho">Mucho</option>
            </select>
            <br /><br />

            <!-- Dificultad -->
            <label for="dificultad">Dificultad de la asignatura: </label>
            <select id="dificultad" name="dificultad">
                <option value=""></option>
                <option value="baja">Baja</option>
                <option value="media">Media</option>
                <option value="alta">Alta</option>
                <option value="muy alta">Muy Alta</option>
            </select>
            <br /><br />

            <!-- Calificación esperada -->
            <label for="calificacion">Calificación esperada: </label>
            <select id="calificacion" name="calificacion">
                <option value=""></option>
                <option value="n.p.">No presentado</option>
                <option value="sus.">Suspenso</option>
                <option value="apro.">Aprobado</option>
                <option value="not.">Notable</option>
                <option value="sobr.">Sobresaliente</option>
                <option value="mat. hon.">Matrícula de honor</option>
            </select>
            <br /><br />

            <label for="asistencia">Asistencia a clase: </label>
            <select id="asistencia" name="asistencia" >
                <option value=""></option>
                <option value="menos 50%">Menos del 50%</option>
                <option value="entre 50% y 80%">Entre un 50% y un 80%</option>
                <option value="mas de 80%">Más del 80%</option>
            </select>
            <br /><br />

        </form>
        <?php
echo '<button class="button" onclick="mostrarResultados(' . $codigos['profesor'] . ')">Mostrar</button>';
    ?>
        </div>
        <br />
        <span id="resultados"></span>
<?php

} catch (Exception $e) {
    die('Error: ' . $e->GetMessage());
} finally {
    $base = null; // Cierra la conexión
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
