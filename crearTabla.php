<?php
function checkErrors($mysqli, $query, $tableName)
{
    if ($mysqli->query($query) === true) {
        echo "Table" . $tableName . "created successfully <br><br>";
    } else {
        echo "Error creating table: " . $mysqli->error . "<br><br>";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "encuestas";

// Crea conexión
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Creamos tabla titulación
$query =
    "CREATE TABLE titulaciones(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nombre VARCHAR(200) NOT NULL
	)";
$nombreTabla = "titulaciones";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Creamos tabla asignaturas
$query =
    "CREATE TABLE asignaturas(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nombre VARCHAR(200) NOT NULL,
		id_titulaciones INT NOT NULL,
		FOREIGN KEY (id_titulaciones) REFERENCES titulaciones(id)
	)";
$nombreTabla = "asignaturas";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Creamos la tabla grupos
$query =
    "CREATE TABLE grupos(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		id_asignatura INT NOT NULL,
		FOREIGN KEY (id_asignatura) REFERENCES asignaturas(id)
    )";
$nombreTabla = "grupos";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Creamos tabla encuestas
$query =
    "CREATE TABLE encuestas(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		id_asignatura INT NOT NULL,
		id_grupo INT NOT NULL,
		id_estudiante INT NOT NULL,
		FOREIGN KEY (id_asignatura) REFERENCES asignaturas(id),
		FOREIGN KEY (id_grupo) REFERENCES asignaturas(id),
		FOREIGN KEY (id_estudiante) REFERENCES asignaturas(id)
	)";
$nombreTabla = "encuestas";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Creamos la tabla estudiantes
$query =
    "CREATE TABLE estudiantes(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		edad INT NOT NULL,
		sexo VARCHAR(200) NOT NULL,
		curso_alto INT NOT NULL,
		curso_bajo INT NOT NULL,
		nMatriculas INT NOT NULL,
		nExamenes INT NOT NULL,
		interes INT NOT NULL,
		tutorias VARCHAR(200) NOT NULL,
		dificultad VARCHAR(200) NOT NULL,
		calificacion VARCHAR(200) NOT NULL,
		asistencia VARCHAR(200) NOT NULL
	)";
$nombreTabla = "estudiantes";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Creamos la tabla profesores
$query =
    "CREATE TABLE profesores(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nombre VARCHAR(200) NOT NULL
    )";
$nombreTabla = "profesores";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Creamos la tabla preguntas
$query =
    "CREATE TABLE preguntas(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		pregunta VARCHAR(200) NOT NULL,
		campo VARCHAR(200) NOT NULL,
		subcampo VARCHAR(200) NOT NULL
    )";
$nombreTabla = "preguntas";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Creamos la tabla respuestas
$query =
    "CREATE TABLE respuestas(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		valor INT NOT NULL,
		nVotos INT NOT NULL,
		id_estudiante INT NOT NULL,
		id_profesor INT NOT NULL,
		id_pregunta INT NOT NULL,
		FOREIGN KEY (id_estudiante) REFERENCES estudiantes(id),
		FOREIGN KEY (id_profesor) REFERENCES profesores(id),
		FOREIGN KEY (id_pregunta) REFERENCES preguntas(id)
    )";
$nombreTabla = "respuestas";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Cerramos conexión
$mysqli->close();