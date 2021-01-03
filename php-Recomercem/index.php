<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomerçem</title>
    <link rel="stylesheet" href="./tercers/darkly-bootstrap.min.css">
</head>

<body style="background-color: #FBF7F6;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Recomerçem</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container">
        <div class="card bg-light" style="margin-top: 10px;">
            <div class="card-header">
                <a>Login</a>
            </div>
            <div class="card-body">
                <form action="/Recomerçem/php_views/usuarios.php">
                    <div class="form-group row">
                        <label for="txtEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="txtEmail" id="txtEmail" autofocus class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtContrasenya" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" name="txtContrasenya" id="txtContrasenya" autofocus class="form-control" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group row float-right" style="margin-right: 20px;">
                        <button type="submit" class="btn btn-success float-right">Entrar</button>
                        <label class=" float-right" style="margin-left: 10px; margin-top: 10px;">
                            <input type="checkbox" checked="checked" name="remember"> Remember me
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>