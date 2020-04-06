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
		nombre VARCHAR(50) NOT NULL
	)";
$nombreTabla = "titulaciones";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Creamos tabla asignaturas
$query =
    "CREATE TABLE asignaturas(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nombre VARCHAR(50) NOT NULL,
		id_titulacion INT NOT NULL,
		FOREIGN KEY (id_titulacion) REFERENCES titulaciones(id)
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

// Creamos la tabla profesores
$query =
    "CREATE TABLE profesores(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nombre VARCHAR(70) NOT NULL,
		id_grupo INT NOT NULL,
		FOREIGN KEY (id_grupo) REFERENCES grupos(id)
    )";
$nombreTabla = "profesores";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Creamos tabla encuestas
$query =
    "CREATE TABLE encuestas(
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		id_profesor INT NOT NULL,
		FOREIGN KEY (id_profesor) REFERENCES profesores(id)
	)";
$nombreTabla = "encuestas";
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
		respuesta INT NOT NULL,
		id_encuesta INT NOT NULL,
		id_pregunta INT NOT NULL,
		FOREIGN KEY (id_encuesta) REFERENCES encuestas(id),
		FOREIGN KEY (id_pregunta) REFERENCES preguntas(id)
    )";
$nombreTabla = "respuestas";
checkErrors($mysqli, $query, $nombreTabla);
$mysqli->query($query);

// Cerramos conexión
$mysqli->close();
