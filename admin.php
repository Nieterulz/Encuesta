<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Panel de administrador</title>
        <link rel="stylesheet" href="encuesta.css" />
    </head>
    <body>
        <form action="estadisticas.php" method="post" class="form-group">
            <h1 style="margin-left: 8%;">Introduzca sus datos</h1>
            <div class="round1" style="margin: 0% 37%;">
                <p>
                    <i>
                        <b>Titulación:</b>
                    </i>
                    <input
                        type="number"
                        name="titulacion"
                        maxlength="4"
                        min="0000"
                        max="9999"
                        value="0000"
                        style="float: right;"
                    />
                </p>
                <p>
                    <i><b>Asignatura:</b> </i>
                    <input
                        type="number"
                        name="asignatura"
                        min="0000"
                        max="9999"
                        value="0001"
                        style="float: right;"
                    />
                </p>
                <p>
                    <i>
                        <b>Grupo:</b>
                    </i>
                    <input
                        type="number"
                        name="grupo"
                        min="00"
                        max="99"
                        value="06"
                        style="float: right;"
                    />
                </p>
                <p>
                    <i><b>Profesor:</b></i>
                    <input
                        type="number"
                        name="profesor"
                        maxlength="4"
                        min="0000"
                        max="9999"
                        value="0002"
                        style="float: right;"
                    />
                </p>
            </div>
            <input type="submit" value="Enviar" class="submit" />
        </form>
    </body>
</html>
