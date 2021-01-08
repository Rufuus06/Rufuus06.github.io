<?php
require_once('../php_libraries/bd.php');

$id = $_POST['id'];
$usuario = selectUsuari($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomerçem</title>
    <link rel="stylesheet" href="../tercers/darkly-bootstrap.min.css">
</head>

<body style="background-color: #FBF7F6;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="d-flex w-10 order-0" style="margin-right: 25px;">
            <a class="navbar-brand mr-1 color-nav" href="">
                <!-- <h2>LANDING PAGE</h2> -->
                <img src="../media/logo.png" alt="" style="width: 200px; height: 60px;">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="usuarios.php">Usuarios</a>
                        <a class="dropdown-item" href="tiendas.php">Tiendas</a>
                        <a class="dropdown-item" href="ofertas.php">Ofertas</a>
                        <a class="dropdown-item" href="../index.php">Desconectar</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="card bg-light" style="margin-top: 10px;">
            <div class="card-header">
                <a>Usuario</a>
            </div>
            <div class="card-body">
                <?php foreach ($usuario as $value) { ?>
                    <form action="../php_controllers/recomercemController.php" method="POST">
                        <div class="form-group row">
                            <label for="txtNombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" name="txtNombre" id="txtombre" autofocus class="form-control" placeholder="Nombre" value="<?php echo $value['nickname'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="txtEmail" id="txtEmail" autofocus class="form-control" placeholder="Email" value="<?php echo $value['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtContrasenya" class="col-sm-2 col-form-label">Contraseña</label>
                            <div class="col-sm-10">
                                <input type="password" name="txtContrasenya" id="txtContrasenya" autofocus class="form-control" placeholder="Contraseña" value="<?php echo $value['passw'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtPuntuacion" class="col-sm-2 col-form-label">Puntuación</label>
                            <div class="col-sm-10">
                                <input type="text" name="txtPuntuacion" id="txtPuntuacion" autofocus class="form-control" placeholder="Puntuación" value="<?php echo $value['puntuacion'] ?>">
                            </div>
                        </div>
                        <div class="form-group row" style="width: max-content; position:relative; left:95%">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="txtAdmin" id="txtAdmin" value="<?php echo $value['admin'] ?>">
                                    Admin
                                </label>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-right: 0px; float:right">
                            <input type="hidden" id="id" name="id" value="<?php echo $value['id'] ?>">
                            <button type="submit" class="btn btn-success" style="margin-right: 10px;" name="updateUsuario">Modificar usuario</button>
                            
                                <button type="submit" class="btn btn-dark" name="cancelarUsuario">Cancelar</button>
                            

                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>