<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trabajando con MySQL</title>
</head>

<body>

<?php
$user = "root";
$password = "";
$database = "encuesta";

$mysqli = new mysqli('127.0.0.1', 'root', '', 'encuesta');

$query = "CREATE TABLE Titulacion(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY
	nombre text NOT NULL,
    )";
$mysqli->query($query);

$query = "CREATE TABLE Asignatura(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre text NOT NULL,
	FOREIGN KEY (id_titulacion) REFERENCES Titulacion(id)
    )";
$mysqli->query($query);

$query = "CREATE TABLE Grupo(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FOREIGN KEY (id_asignatura) REFERENCES Asignatura(id)
    )";
$mysqli->query($query);

$query = "CREATE TABLE Alumno(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	edad int NOT NULL,
	sexo TINYTEXT NOT NULL,
	curso_alto int NOT NULL,
	curso_bajo int NOT NULL,
	FOREIGN KEY (id_grupo) REFERENCES Grupo(id)
    )";
$mysqli->query($query);

$query = "CREATE TABLE Profesor(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre text NOT NULL,
	FOREIGN KEY (id_asignatura) REFERENCES Asignatura(id)
    )";
$mysqli->query($query);

$query = "CREATE TABLE Alumno_Grupo(
    -- id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	matriculaciones int NOT NULL,
	interes int NOT NULL,
	tutorias text NOT NULL,
	dificultad text NOT NULL,
	calificacion text NOT NULL,
	asistencia text NOT NULL,
	FOREIGN KEY (id_grupo) REFERENCES Grupo(id),
	FOREIGN KEY (id_alumno) REFERENCES ALumno(id),
    )";
$mysqli->query($query);

$query = "CREATE TABLE Asignatura_Profesor(
    -- id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	dato_1 int NOT NULL,
	dato_2 int NOT NULL,
	dato_3 int NOT NULL,
	dato_4 int NOT NULL,
	dato_5 int NOT NULL,
	dato_6 int NOT NULL,
	dato_7 int NOT NULL,
	dato_8 int NOT NULL,
	dato_9 int NOT NULL,
	dato_10 int NOT NULL,
	dato_11 int NOT NULL,
	dato_12 int NOT NULL,
	dato_13 int NOT NULL,
	dato_14 int NOT NULL,
	dato_15 int NOT NULL,
	dato_16 int NOT NULL,
	dato_17 int NOT NULL,
	dato_18 int NOT NULL,
	dato_19 int NOT NULL,
	dato_20 int NOT NULL,
	dato_21 int NOT NULL,
	dato_22 int NOT NULL,
	dato_23 int NOT NULL,
	FOREIGN KEY (id_asignatura) REFERENCES Asignatura(id),
	FOREIGN KEY (id_profesor) REFERENCES Profesor(id),
    )";
$mysqli->query($query);

$mysqli->close();

?>


</body>
</html>
