<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h2>INFORMACIÓN PERSONAL Y ACADÉMICA DE LOS ESTUDIANTES QUE HAN RESPONDIDO A LA ENCUESTA</h2>
	<h4>(La representación del resultado es porcentual)</h4>

	<?php
echo "<h3>Nº DE ESTUDIANTES ENCUESTADOS:" . getEncuestados() . "</h3>";

?>




</h1>
</body>
</html>

<?php
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
?>