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
// define variables and set to empty values

$edadErr = $sexoErr = $cursoaltoErr = $cursobajoErr = $matriculasErr = $examenesErr
= $interesErr = $tutoriasErr = $dificultadErr = $calificacionErr = $asistenciaErr = "";

$edad = $sexo = $cursoalto = $cursobajo = $matriculas = $examenes
= $interes = $tutorias = $dificultad = $calificacion = $asistencia = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["edad"])) {
        $edadErr = "edad is required";
    } else {
        $edad = test_input($_POST["edad"]);
    }

    if (empty($_POST["sexo"])) {
        $sexoErr = "sexo is required";
    } else {
        $sexo = test_input($_POST["sexo"]);
    }

    if (empty($_POST["cursoalto"])) {
        $cursoalto = "cursoalto is required";
    } else {
        $cursoalto = test_input($_POST["cursoalto"]);
    }

    if (empty($_POST["cursobajo"])) {
        $cursobajo = "cursobajo is required";
    } else {
        $cursobajo = test_input($_POST["cursobajo"]);
    }

    if (empty($_POST["matriculas"])) {
        $matriculasErr = "matriculas is required";
    } else {
        $matriculas = test_input($_POST["matriculas"]);
    }

    if (empty($_POST["examenes"])) {
        $examenesErr = "examenes is required";
    } else {
        $examenes = test_input($_POST["examenes"]);
    }

    if (empty($_POST["interes"])) {
        $interesErr = "interes is required";
    } else {
        $interes = test_input($_POST["interes"]);
    }

    if (empty($_POST["tutorias"])) {
        $tutoriasErr = "tutorias is required";
    } else {
        $tutorias = test_input($_POST["tutorias"]);
    }

    if (empty($_POST["dificultad"])) {
        $dificultadErr = "dificultad is required";
    } else {
        $dificultad = test_input($_POST["dificultad"]);
    }

    if (empty($_POST["calificacion"])) {
        $calificacionErr = "calificacion is required";
    } else {
        $calificacion = test_input($_POST["calificacion"]);
    }

    if (empty($_POST["asistencia"])) {
        $asistenciaErr = "asistencia is required";
    } else {
        $asistencia = test_input($_POST["asistencia"]);
    }
}

function test_input($data)
{
    $data = trim($data); // Borra espacios de más
    $data = stripslashes($data); //
    $data = htmlspecialchars($data);
    return $data;
}

echo $edad . "<br>";
echo $sexo . "<br>";
echo $cursoalto . "<br>";
echo $cursobajo . "<br>";
echo $matriculas . "<br>";
echo $examenes . "<br>";
echo $interes . "<br>";
echo $tutorias . "<br>";
echo $dificultad . "<br>";
echo $calificacion . "<br>";
echo $asistencia . "<br>";