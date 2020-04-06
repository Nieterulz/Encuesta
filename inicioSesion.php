<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="encuesta.css" />
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Administrador de encuesta</title>
    </head>
    <body>
        <div class="container col-sm-5" style="margin-left: 25%;">
            <h2>Iniciar sesión</h2>
            <form class="form-horizontal" action="admin.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="usuario">
                        Usuario:
                    </label>
                    <div class="col-sm-10">
                        <input
                            type="username"
                            class="form-control"
                            id="usuario"
                            name="usuario"
                        />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="password"
                        >Contraseña:</label
                    >
                    <div class="col-sm-10">
                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">
                            Aceptar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
