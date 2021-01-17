<?php
require_once('../php_libraries/bd.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $oferta = selectOferta($id);
}


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
        </div> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
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
    <?php require_once('../php_partials/mensajes.php') ?>
        <div class="card bg-light" style="margin-top: 10px;">
            <div class="card-header">
                <a>Oferta</a>
            </div>
            <div class="card-body">

                <form action="../php_controllers/recomercemController.php" method="POST" id="usdform">

                    <!-- NOMBRE -->
                    <div class="form-group row">
                        <label for="txtNombre" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <?php if (isset($_POST['id'])) { ?>
                                <input type="text" name="txtNombre" id="txtombre" autofocus class="form-control" placeholder="Nombre" value="<?php echo $oferta[0]['name'] ?>" required>
                            <?php } else { ?>
                                <input type="text" name="txtNombre" id="txtombre" autofocus class="form-control" placeholder="Nombre" required>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- DESCRIPCION -->
                    <div class="form-group row">
                        <label for="txtDescripcion" class="col-sm-2 col-form-label">Descripción</label>
                        <div class="col-sm-10">
                            <?php if (isset($_POST['id'])) { ?>
                                <textarea class="form-control" id="txtDescripcion" rows="3" name="txtDescripcion" placeholder="Descripción" required ><?php echo $oferta[0]['descripcion'] ?></textarea>
                            <?php } else { ?>
                                <textarea class="form-control" id="txtDescripcion" rows="3" name="txtDescripcion" placeholder="Descripción" required ></textarea>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- PUNTUACION -->
                    <div class="form-group row">
                        <label for="txtPuntuacion" class="col-sm-2 col-form-label">Puntuación</label>
                        <div class="col-sm-10">
                            <?php if (isset($_POST['id'])) { ?>
                                <input type="text" name="txtPuntuacion" id="txtPuntuacion" autofocus class="form-control" placeholder="100" value="<?php echo $oferta[0]['puntuacion_min'] ?>" required>
                            <?php } else { ?>
                                <input type="text" name="txtPuntuacion" id="txtPuntuacion" autofocus class="form-control" placeholder="100" required>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- IMAGEN -->
                    <div class="form-group row">
                        <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                            <?php if (isset($_POST['id'])) { ?>
                                <input type="file" class="form-control-file" id="imagen" aria-describedby="fileHelp" name="imagen" value="<?php echo $oferta[0]['imagen'] ?>">
                                <label class=" custom-file-label" name="imagen" id="imagen" for="imagen"><?php echo $oferta[0]['imagen'] ?></label>
                                <?php } else { ?>
                                    <input type="file" class="form-control-file" id="imagen" aria-describedby="fileHelp" name="imagen" >
                                <label class=" custom-file-label" name="imagen" id="imagen" for="imagen"></label>
                                    <?php } ?>
                                
                            </div>
                        </div>
                    </div>

                    <!-- BOTON CANCELAR -->
                    <button type="button" class="btn btn-dark" style="float: right;" name="cancelarOferta">
                            <a href="../php_views/usuarios.php" style="color: white;">Cancelar</a>
                    </button>

                    <!-- BOTONES -->
                    <div class="form-group row" style="margin-right: 0px; float:right">
                        <?php if (isset($id)) { ?>
                            <input type="hidden" id="id" name="id" value="<?php echo $id ?>">

                            <button type="submit" class="btn btn-success" style="margin-right: 10px;" name="updateOfertas">Modificar Oferta</button>
                        <?php } else { ?>

                            <button type="submit" class="btn btn-success" style="margin-right: 10px;" name="insertOfertas">Crear Oferta</button>
                        <?php } ?>

                        <!-- <button type="submit" class="btn btn-dark" name="cancelarOferta">Cancelar</button> -->
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>