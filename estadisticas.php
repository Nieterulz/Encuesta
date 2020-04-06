<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Estadísticas</title>
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
	
	

} catch (Exception $e) {
    die('Error: ' . $e->GetMessage());
} finally {
    $base = null; // Cierra la conexión
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
?>

	</body>
</html>
