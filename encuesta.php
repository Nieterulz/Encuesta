<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Encuesta</title>
	<link rel='stylesheet' href='css/encuesta.css' />
</head>
<body>
	<?php
echo "<h2>
ENCUESTA SOBRE LA OPINIÓN DE LOS/AS ESTUDIANTES SOBRE LA LABOR
DOCENTE DEL PROFESORADO
</h2>
<h3>
CÓDIGO ASIGNATURA
</h3>
<form action='encuesta.php' method='get' class='form-group'>
<div class='parent'>
	<div class='round1'>
		<p>
			<i> Titulación:</i>
			<input
				type='number'
				name='titulacion'
				maxlength='4'
				min='0000'
				max='9999'
			/>
		</p>
		<p>
			<i>Asignatura:</i>
			<input
				type='number'
				name='asignatura'
				min='000'
				max='999'
			/>
		</p>
		<p>
			<i> Grupo:</i>
			<input type='number' name='grupo' min='00' max='99' />
		</p>
	</div>
	<div class='round2'>
		<h3>
			INFORMACIÓN PERSONAL Y ACADÉMICA DE LOS ESTUDIANTES
		</h3>
		<p>
			<i>Edad:</i>
			<input type='radio' name='edad' value='-19' /> &le;19
			<input type='radio' name='edad' value='20-21' /> 20-21
			<input type='radio' name='edad' value='22-23' /> 22-23
			<input type='radio' name='edad' value='24-25' /> 24-25
			<input type='radio' name='edad' value='+25' /> &ge;25
		</p>
		<p>
			<i> Sexo:</i>
			<input type='radio' name='sexo' value='hombre' /> Hombre
			<input type='radio' name='sexo' value='mujer' /> Mujer
		</p>
		<p>
			<i> Curso más alto en el que estás matriculado:</i>
			<input type='radio' name='curso-alto' value='1' /> 1º
			<input type='radio' name='curso-alto' value='2' /> 2º
			<input type='radio' name='curso-alto' value='3' /> 3º
			<input type='radio' name='curso-alto' value='4' /> 4º
			<input type='radio' name='curso-alto' value='5' /> 5º
			<input type='radio' name='curso-alto' value='6' /> 6º
		</p>
		<p>
			<i> Curso más bajo en el que estás matriculado:</i>
			<input type='radio' name='curso-bajo' value='1' /> 1º
			<input type='radio' name='curso-bajo' value='2' /> 2º
			<input type='radio' name='curso-bajo' value='3' /> 3º
			<input type='radio' name='curso-bajo' value='4' /> 4º
			<input type='radio' name='curso-bajo' value='5' /> 5º
			<input type='radio' name='curso-bajo' value='6' /> 6º
		</p>
		<p>
			<i>Veces que te has matriculado en esta asignatura:</i>
			<input type='radio' name='matriculaciones' value='1' />
			1
			<input type='radio' name='matriculaciones' value='2' />
			2
			<input type='radio' name='matriculaciones' value='3' />
			3
			<input type='radio' name='matriculaciones' value='+3' />
			&gt;3
		</p>
		<p>
			<i>Veces que te has examinado en esta asignatura:</i>
			<input type='radio' name='examinaciones' value='1' /> 1
			<input type='radio' name='examinaciones' value='2' /> 2
			<input type='radio' name='examinaciones' value='3' /> 3
			<input type='radio' name='examinaciones' value='+3' />
			&gt;3
		</p>
		<p>
			<i>La asignatura me interesa:</i>
			<input type='radio' name='interes' value='nada' /> Nada
			<input type='radio' name='interes' value='algo' /> Algo
			<input type='radio' name='interes' value='bastante' />
			Bastante
			<input type='radio' name='interes' value='mucho' />
			Mucho
		</p>
		<p>
			<i>Hago uso de las tutorías:</i>
			<input type='radio' name='tutorias' value='nada' /> Nada
			<input type='radio' name='tutorias' value='algo' /> Algo
			<input type='radio' name='tutorias' value='bastante' />
			Bastante
			<input type='radio' name='tutorias' value='mucho' />
			Mucho
		</p>
		<p>
			<i>Dificultad de esta Asignatura:</i>
			<input type='radio' name='dificultad' value='baja' />
			Baja
			<input type='radio' name='dificultad' value='media' />
			Media
			<input type='radio' name='dificultad' value='alta' />
			Alta
			<input
				type='radio'
				name='dificultad'
				value='muy-alta'
			/>
			Muy alta
		</p>
		<p>
			<i>Calificación esperada:</i>
			<input type='radio' name='calificacion' value='np' />
			N.P.
			<input type='radio' name='calificacion' value='sus' />
			Sus.
			<input type='radio' name='calificacion' value='apro' />
			Apro.
			<input type='radio' name='calificacion' value='not' />
			Not.
			<input type='radio' name='calificacion' value='sobr' />
			Sobr.
			<input
				type='radio'
				name='calificacion'
				value='mat-hon'
			/>
			Mat. Hon.
		</p>
		<p>
			<i>Asistencia clase (% de horas lectivas):</i>
			<input type='radio' name='asistencia' value='-50' />
			Menos 50%
			<input type='radio' name='asistencia' value='50-80' />
			Entre 50% y 80%
			<input type='radio' name='asistencia' value='+80' /> Más
			de 80%
		</p>
	</div>
	<div class='round3'>
		<p>
			<i class='parrafo'>
				A continuación se presentan una serie de cuestiones
				relativas a la docencia en esta asignatura. Tu
				colaboración es necesaria y consiste en señalar en
				la escala de respuesta tu grado de acuerdo con cada
				una de las afirmaciones, teniendo en cuenta que '1'
				significa 'totalmente en desacuerdo' y '5'
				'totalmente de acuerdo', Si el enunciado no procede
				o no tienes suficiente información, marca la opción
				NS. En nombre de la Universidad de Cádiz, GRACIAS
				POR TU PARTICIPACIÓN.
			</i>
		</p>
	</div>
</div>
<p>
	CÓD. PROF. 1
	<input
		type='number'
		name='codigo-prof'
		maxlength='4'
		min='0000'
		max='9999'
	/>
</p>
<h3>PLANIFICACIÓN DE LA ENSEÑANZA Y APRENDIZAJE</h3>
<p>
	1.- El profesor/a informa sobre los distintos aspectos de la
	guía docente o programa de la asignatura (objetivos,
	actividades, contenidos del temario, metodología, bibliografía,
	sistemas de evaluación,...):
	<input type='radio' name='1' value='ns' /> NS
	<input type='radio' name='1' value='1' /> 1
	<input type='radio' name='1' value='2' /> 2
	<input type='radio' name='1' value='3' /> 3
	<input type='radio' name='1' value='4' /> 4
	<input type='radio' name='1' value='5' /> 5
</p>
<h3>DESARROLLO DE LA DOCENCIA</h3>
<h4>
	Cumplimiento de las obligaciones docentes (del encargo docente)
</h4>
<p>
	2.- Imparte las clases en el horario fijado:
	<input type='radio' name='2' value='ns' /> NS
	<input type='radio' name='2' value='1' /> 1
	<input type='radio' name='2' value='2' /> 2
	<input type='radio' name='2' value='3' /> 3
	<input type='radio' name='2' value='4' /> 4
	<input type='radio' name='2' value='5' /> 5
</p>
<p>
	3.- Asiste regularmente a clase:
	<input type='radio' name='3' value='ns' /> NS
	<input type='radio' name='3' value='1' /> 1
	<input type='radio' name='3' value='2' /> 2
	<input type='radio' name='3' value='3' /> 3
	<input type='radio' name='3' value='4' /> 4
	<input type='radio' name='3' value='5' /> 5
</p>
<p>
	4.- Cumple adecuadamente su labor de tutoría (presencial o
	virtual):
	<input type='radio' name='4' value='ns' /> NS
	<input type='radio' name='4' value='1' /> 1
	<input type='radio' name='4' value='2' /> 2
	<input type='radio' name='4' value='3' /> 3
	<input type='radio' name='4' value='4' /> 4
	<input type='radio' name='4' value='5' /> 5
</p>
<h4>
	Cumplimiento de la Planificación
</h4>
<p>
	5.- Se ajusta a la planificación de la asignatura:
	<input type='radio' name='5' value='ns' /> NS
	<input type='radio' name='5' value='1' /> 1
	<input type='radio' name='5' value='2' /> 2
	<input type='radio' name='5' value='3' /> 3
	<input type='radio' name='5' value='4' /> 4
	<input type='radio' name='5' value='5' /> 5
</p>
<p>
	6.- Se han coordinado las actividades teóricas y prácticas
	previstas:
	<input type='radio' name='6' value='ns' /> NS
	<input type='radio' name='6' value='1' /> 1
	<input type='radio' name='6' value='2' /> 2
	<input type='radio' name='6' value='3' /> 3
	<input type='radio' name='6' value='4' /> 4
	<input type='radio' name='6' value='5' /> 5
</p>
<p>
	7.- Se ajusta a los sistemas de evaluación especificados en la
	guía docente/programa de la asignatura:
	<input type='radio' name='7' value='ns' /> NS
	<input type='radio' name='7' value='1' /> 1
	<input type='radio' name='7' value='2' /> 2
	<input type='radio' name='7' value='3' /> 3
	<input type='radio' name='7' value='4' /> 4
	<input type='radio' name='7' value='5' /> 5
</p>
<p>
	8.- La bibliografía y otras fuentes de información recomendadas
	en el programa son útiles para el aprendizaje de la asignatura:
	<input type='radio' name='8' value='ns' /> NS
	<input type='radio' name='8' value='1' /> 1
	<input type='radio' name='8' value='2' /> 2
	<input type='radio' name='8' value='3' /> 3
	<input type='radio' name='8' value='4' /> 4
	<input type='radio' name='8' value='5' /> 5
</p>
<h4>Metodología docente</h4>
<p>
	9.- El/la profesor/a organiza bien las actividades que se
	realizan en clase:
	<input type='radio' name='9' value='ns' /> NS
	<input type='radio' name='9' value='1' /> 1
	<input type='radio' name='9' value='2' /> 2
	<input type='radio' name='9' value='3' /> 3
	<input type='radio' name='9' value='4' /> 4
	<input type='radio' name='9' value='5' /> 5
</p>
<p>
	10.- Utiliza recursos didácticos (pizarra, transparencias,
	mediosaudiovisuales, material de apoyo en red virtual...) que
	facilitan el aprendizaje:
	<input type='radio' name='10' value='ns' /> NS
	<input type='radio' name='10' value='1' /> 1
	<input type='radio' name='10' value='2' /> 2
	<input type='radio' name='10' value='3' /> 3
	<input type='radio' name='10' value='4' /> 4
	<input type='radio' name='10' value='5' /> 5
</p>
<h4>Competencias docentes desarrolladas por el/la profesor/a</h4>
<p>
	11.- Explica con claridad y resalta los contenidos importantes:
	<input type='radio' name='11' value='ns' /> NS
	<input type='radio' name='11' value='1' /> 1
	<input type='radio' name='11' value='2' /> 2
	<input type='radio' name='11' value='3' /> 3
	<input type='radio' name='11' value='4' /> 4
	<input type='radio' name='11' value='5' /> 5
</p>
<p>
	12.- Se interesa por el grado de comprensión de sus
	explicaciones:
	<input type='radio' name='12' value='ns' /> NS
	<input type='radio' name='12' value='1' /> 1
	<input type='radio' name='12' value='2' /> 2
	<input type='radio' name='12' value='3' /> 3
	<input type='radio' name='12' value='4' /> 4
	<input type='radio' name='12' value='5' /> 5
</p>
<p>
	13.- Expone ejemplos en los que se ponen en práctica los
	contenidos de la asignatura:
	<input type='radio' name='13' value='ns' /> NS
	<input type='radio' name='13' value='1' /> 1
	<input type='radio' name='13' value='2' /> 2
	<input type='radio' name='13' value='3' /> 3
	<input type='radio' name='13' value='4' /> 4
	<input type='radio' name='13' value='5' /> 5
</p>
<p>
	14.- Explica los contenidos con seguridad:
	<input type='radio' name='14' value='ns' /> NS
	<input type='radio' name='14' value='1' /> 1
	<input type='radio' name='14' value='2' /> 2
	<input type='radio' name='14' value='3' /> 3
	<input type='radio' name='14' value='4' /> 4
	<input type='radio' name='14' value='5' /> 5
</p>
<p>
	15.- Resuelve las dudas que se le plantean:
	<input type='radio' name='15' value='ns' /> NS
	<input type='radio' name='15' value='1' /> 1
	<input type='radio' name='15' value='2' /> 2
	<input type='radio' name='15' value='3' /> 3
	<input type='radio' name='15' value='4' /> 4
	<input type='radio' name='15' value='5' /> 5
</p>
<p>
	16.- Fomenta un clima de trabajo y participación:
	<input type='radio' name='16' value='ns' /> NS
	<input type='radio' name='16' value='1' /> 1
	<input type='radio' name='16' value='2' /> 2
	<input type='radio' name='16' value='3' /> 3
	<input type='radio' name='16' value='4' /> 4
	<input type='radio' name='16' value='5' /> 5
</p>
<p>
	17.- Propicia una comunicación fluida y espontánea:
	<input type='radio' name='17' value='ns' /> NS
	<input type='radio' name='17' value='1' /> 1
	<input type='radio' name='17' value='2' /> 2
	<input type='radio' name='17' value='3' /> 3
	<input type='radio' name='17' value='4' /> 4
	<input type='radio' name='17' value='5' /> 5
</p>
<p>
	18.- Motiva a los/as estudiantes para que se interesen por la
	asignatura:
	<input type='radio' name='18' value='ns' /> NS
	<input type='radio' name='18' value='1' /> 1
	<input type='radio' name='18' value='2' /> 2
	<input type='radio' name='18' value='3' /> 3
	<input type='radio' name='18' value='4' /> 4
	<input type='radio' name='18' value='5' /> 5
</p>
<p>
	19.- Es respetuoso/a en el trato con los/las estudiantes:
	<input type='radio' name='19' value='ns' /> NS
	<input type='radio' name='19' value='1' /> 1
	<input type='radio' name='19' value='2' /> 2
	<input type='radio' name='19' value='3' /> 3
	<input type='radio' name='19' value='4' /> 4
	<input type='radio' name='19' value='5' /> 5
</p>
<h4>Sistemas de evaluación</h4>
<p>
	20.- Tengo claro lo que se me va a exigir para superar esta
	asignatura:
	<input type='radio' name='20' value='ns' /> NS
	<input type='radio' name='20' value='1' /> 1
	<input type='radio' name='20' value='2' /> 2
	<input type='radio' name='20' value='3' /> 3
	<input type='radio' name='20' value='4' /> 4
	<input type='radio' name='20' value='5' /> 5
</p>
<p>
	21.- Los criterios y sistemas de evaluación me parecen
	adecuados, en el contexto de la asignatura:
	<input type='radio' name='21' value='ns' /> NS
	<input type='radio' name='21' value='1' /> 1
	<input type='radio' name='21' value='2' /> 2
	<input type='radio' name='21' value='3' /> 3
	<input type='radio' name='21' value='4' /> 4
	<input type='radio' name='21' value='5' /> 5
</p>
<h4>Resultados</h4>
<p>
	22.- Las actividades desarrolladas (teóricas, prácticas, de
	trabajo individual, en grupo, ...) contribuyen a alcanzar los
	objetivos de la asignatura:
	<input type='radio' name='22' value='ns' /> NS
	<input type='radio' name='22' value='1' /> 1
	<input type='radio' name='22' value='2' /> 2
	<input type='radio' name='22' value='3' /> 3
	<input type='radio' name='22' value='4' /> 4
	<input type='radio' name='22' value='5' /> 5
</p>
<p>
	23.- Estoy satisfecho/a con la labor docente de este/a
	profesor/a:
	<input type='radio' name='23' value='ns' /> NS
	<input type='radio' name='23' value='1' /> 1
	<input type='radio' name='23' value='2' /> 2
	<input type='radio' name='23' value='3' /> 3
	<input type='radio' name='23' value='4' /> 4
	<input type='radio' name='23' value='5' /> 5
</p>
<input type='submit' value='Enviar' />
</form>"
?>
</body>
</html>
