<!DOCTYPE html>
<html lang='en'>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Encuesta</title>
	<link rel='stylesheet' href='encuesta.css' />
</head>
<body>
	<?php
function inputRadio($name, $question, $options)
{
    echo "<p class='cuadro'>";
    echo "<i>" . $question . "</i>";
    for ($i = 0; $i < count($options); $i++) {
        $op = $options[$i];
        echo "<input type='radio' name='" . $name . "' value='" . strtolower($op) . "' checked/>" . $op;
    }
    echo "	</p>";
}

?>
	<h2>
		ENCUESTA SOBRE LA OPINIÓN DE LOS/AS ESTUDIANTES SOBRE LA LABOR
		DOCENTE DEL PROFESORADO
	</h2>
	<h3>
		CÓDIGO ASIGNATURA
	</h3>
	<form action='enviarDatos.php' method='post' class='form-group'>
	<div class='parent'>
	<div class='round1'>
			<p>
				<i> <b>Titulación:</b> </i>
				<input
					type='number' name='titulacion' maxlength='4' min='0000' max='9999' value='0001'
				/>
			</p>
			<p>
				<i><b>Asignatura:</b> </i>
				<input
					type='number' name='asignatura' min='0000' max='9999' value='0001'
				/>
			</p>
			<p>
				<i> <b>Grupo:</b> </i>
				<input type='number' name='grupo' min='00' max='99' value='01' />
			</p>
		</div>
	<div class='round2'>
		<h3> INFORMACIÓN PERSONAL Y ACADÉMICA DE LOS ESTUDIANTES </h3>
<?php
$name = "edad";
$question = "Edad: ";
$options = array(' Menor que 20', ' 20-21', ' 22-23', ' 24-25', ' Mayor que 25');
inputRadio($name, $question, $options);

$name = "sexo";
$question = "Sexo: ";
$options = array(' Hombre', ' Mujer');
inputRadio($name, $question, $options);

$name = "cursoalto";
$question = "Curso más alto en el que estás matriculado: ";
$options = array(' 1', ' 2', ' 3', ' 4', ' 5', '6');
inputRadio($name, $question, $options);

$name = "cursobajo";
$question = "Curso más bajo en el que estás matriculado: ";
$options = array(' 1', ' 2', ' 3', ' 4', ' 5', '6');
inputRadio($name, $question, $options);

$name = "matriculas";
$question = "Veces que te has matriculado en esta asignatura: ";
$options = array(' 1', ' 2', ' 3', ' Mas de 3');
inputRadio($name, $question, $options);

$name = "examenes";
$question = "Veces que te has examinado en esta asignatura: ";
$options = array(' 1', ' 2', ' 3', ' Mas de 3');
inputRadio($name, $question, $options);

$name = "interes";
$question = "La asignatura me interesa: ";
$options = array(' Nada', ' Algo', ' Bastante', ' Mucho');
inputRadio($name, $question, $options);

$name = "tutorias";
$question = "Hago uso de las tutorías: ";
$options = array(' Nada', ' Algo', ' Bastante', ' Mucho');
inputRadio($name, $question, $options);

$name = "dificultad";
$question = "Dificultad de esta Asignatura: ";
$options = array(' Baja', ' Media', ' Alta', ' Muy Alta');
inputRadio($name, $question, $options);

$name = "calificacion";
$question = "Calificación esperada: ";
$options = array(' N.P.', ' Sus.', ' Apro.', ' Not.', ' Sobr.', ' Mat. Hon.');
inputRadio($name, $question, $options);

$name = "asistencia";
$question = "Asistencia clase (% de horas lectivas): ";
$options = array(' Menos 50%', ' Entre 50% y 80%', ' Mas de 80%');
inputRadio($name, $question, $options);
?>
	</div>
	<div class='round3'>
		<p>
			<i class='parrafo'>
				A continuación se presentan una serie de cuestiones
				relativas a la docencia en esta asignatura. Tu
				colaboración es necesaria y consiste en señalar en
				la escala de respuesta tu grado de acuerdo con cada
				una de las afirmaciones, teniendo en cuenta que <b>'1'</b>
				significa 'totalmente en desacuerdo' y <b>'5'
				'totalmente de acuerdo'</b>, Si el enunciado no procede
				o no tienes suficiente información, marca la opción
				NS. <b>En nombre de la Universidad de Cádiz, GRACIAS
				POR TU PARTICIPACIÓN.</b>
			</i>
		</p>
	</div>
</div>
<p class='prof'>
	<b>Código Profesor</b>:
	<input
		type='number'
		name='profesor'
		maxlength='4'
		min='0000'
		max='9999'
		value='0001'
	/>
</p>
<h3>PLANIFICACIÓN DE LA ENSEÑANZA Y APRENDIZAJE</h3>
	<p>
<?php
$options = array(" NS", " 1", " 2", " 3", " 4", " 5");
$question = "1.- El profesor/a informa sobre los distintos aspectos de la
	guía docente o programa de la asignatura (objetivos,
	actividades, contenidos del temario, metodología, bibliografía,
	sistemas de evaluación,...): ";
inputRadio("dato1", $question, $options);
?>

	</p>
		<h3>DESARROLLO DE LA DOCENCIA</h3>
		<div  class='cuadro'>
		<h4>Cumplimiento de las obligaciones docentes (del encargo docente)</h4>
<?php
$question = "2.- Imparte las clases en el horario fijado: ";
inputRadio("dato2", $question, $options);

$question = "3.- Asiste regularmente a clase: ";
inputRadio("dato3", $question, $options);

$question = "4.- Cumple adecuadamente su labor de tutoría (presencial o virtual): ";
inputRadio("dato4", $question, $options);
?>

</div>
<div class='cuadro'>
<h4>Cumplimiento de la Planificación</h4>

<?php
$question = "5.- Se ajusta a la planificación de la asignatura: ";
inputRadio("dato5", $question, $options);

$question = "6.- Se han coordinado las actividades teóricas y prácticas previstas: ";
inputRadio("dato6", $question, $options);

$question = "7.- Se ajusta a los sistemas de evaluación especificados en
la guía docente/programa de la asignatura: ";
inputRadio("dato7", $question, $options);

$question = "8.- La bibliografía y otras fuentes de información recomendadas
en el programa son útiles para el aprendizaje de la asignatura: ";
inputRadio("dato8", $question, $options);
?>
</div>

<div class='cuadro'>
<h4>Metodología docente</h4>

<?php
$question = "9.- El/la profesor/a organiza bien las actividades que se
realizan en clase: ";
inputRadio("dato9", $question, $options);

$question = "10.- Utiliza recursos didácticos (pizarra, transparencias,
mediosaudiovisuales, material de apoyo en red virtual...) que
facilitan el aprendizaje:";
inputRadio("dato10", $question, $options);
?>
</div>

<div class='cuadro'>
<h4>Competencias docentes desarrolladas por el/la profesor/a</h4>

<?php
$question = "11.- Explica con claridad y resalta los contenidos importantes: ";
inputRadio("dato11", $question, $options);

$question = "12.- Se interesa por el grado de comprensión de sus
explicaciones: ";
inputRadio("dato12", $question, $options);

$question = "13.- Expone ejemplos en los que se ponen en práctica los
contenidos de la asignatura: ";
inputRadio("dato13", $question, $options);

$question = "14.- Explica los contenidos con seguridad: ";
inputRadio("dato14", $question, $options);

$question = "15.- Resuelve las dudas que se le plantean: ";
inputRadio("dato15", $question, $options);

$question = "16.- Fomenta un clima de trabajo y participación: ";
inputRadio("dato16", $question, $options);

$question = "17.- Propicia una comunicación fluida y espontánea: ";
inputRadio("dato17", $question, $options);

$question = "18.- Motiva a los/as estudiantes para que se interesen por la
asignatura: ";
inputRadio("dato18", $question, $options);

$question = "19.- Es respetuoso/a en el trato con los/las estudiantes: ";
inputRadio("dato19", $question, $options);
?>

</div>
<div class='cuadro'>
<h4>Sistemas de evaluación</h4>

<?php
$question = "20.- Tengo claro lo que se me va a exigir para superar esta
asignatura: ";
inputRadio("dato20", $question, $options);

$question = "21.- Los criterios y sistemas de evaluación me parecen
adecuados, en el contexto de la asignatura: ";
inputRadio("dato21", $question, $options);
?>

</div>


<p><h3>RESULTADOS</h3></p>

<div class='cuadro'>
<?php
$question = "22.-Las actividades desarrolladas(teóricas, prácticas, de
trabajo individual, en grupo,...) contribuyen a alcanzar los
objetivos de la asignatura:";
inputRadio("dato22", $question, $options);

$question = "23.- Estoy satisfecho/a con la labor docente de este/a
profesor/a: ";
inputRadio("dato23", $question, $options);
?>

</div>

<input type='submit' value='Enviar' class='submit'/>
</form>
</body>
</html>
