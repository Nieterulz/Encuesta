<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="scripts.js"></script>
</head>
<body>
<form>
        <!-- Edad -->
        <label for="edad">Edad: </label>
        <select id="edad" name="edad">
            <option value=""></option>
            <option value="≤19">≤19</option>
            <option value="20-21">20 - 21</option>
            <option value="22-23">22 - 23</option>
            <option value="24-25">24 - 25</option>
            <option value="≥25">≥25</option>
        </select>
        <br><br>

        <!-- Sexo -->
        <label for="sexo">Sexo: </label>
        <select id="sexo" name="sexo">
            <option value=""></option>
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
        </select>
        <br><br>

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
        <br><br>

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
        <br><br>

        <!-- Matriculas -->
        <label for="matriculas">Matriculas: </label>
        <select id="matriculas" name="matriculas">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value=">3">>3</option>
        </select>
        <br><br>

        <!-- Examenes -->
        <label for="examenes">Exámenes: </label>
        <select id="examenes" name="examenes">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value=">3">>3</option>
        </select>
        <br><br>

        <!-- Interes -->
        <label for="interes">Interés en la asignatura: </label>
        <select id="interes" name="interes">
            <option value=""></option>
            <option value="nada">Nada</option>
            <option value="algo">Algo</option>
            <option value="bastante">Bastante</option>
            <option value="mucho">Mucho</option>
        </select>
        <br><br>

        <!-- Tutorías -->
        <label for="tutorias">Uso de tutorías: </label>
        <select id="tutorias" name="tutorias">
            <option value=""></option>
            <option value="nada">Nada</option>
            <option value="algo">Algo</option>
            <option value="bastante">Bastante</option>
            <option value="mucho">Mucho</option>
        </select>
        <br><br>

        <!-- Tutorías -->
        <label for="tutorias">Uso de tutorías: </label>
        <select id="tutorias" name="tutorias">
            <option value=""></option>
            <option value="nada">Nada</option>
            <option value="algo">Algo</option>
            <option value="bastante">Bastante</option>
            <option value="mucho">Mucho</option>
        </select>
        <br><br>



    </form>
    <button onclick="mostrarResultados()">Mostrar</button>
    <br>
    <span id="resultados"></span>
</body>
</html>
<?php
// try {
//     $base = new PDO('mysql:host=127.0.0.1;dbname=encuestas', 'root', '');
//     $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $query = "SELECT `id` FROM  `encuestas` WHERE `id_profesor`=1;";
//     $resultado = $base->query($query);
//     $id_encuestas = $resultado->fetchAll();

//     for ($i = 0; $i < count($id_encuestas); $i++) {
//         $valores[$i] = $id_encuestas[$i][0];
//     }

//     print_r($valores);

//     $resultado->closeCursor();
// } catch (Exception $e) {
//     die('Error: ' . $e->GetMessage());
// } finally {$base = null;}
