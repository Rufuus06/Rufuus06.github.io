<?php
require_once('../php_libraries/bd.php');

$ofertas = selectAllOfertas();
$contador = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomerçem</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../tercers/darkly-bootstrap.min.css">
</head>

<body style="background-color: #FBF7F6;">
    <script type="text/javascript">
        function confirmDelete() {
            var respuesta = confirm("Estas seguro que deseas eliminar la oferta?");
            
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
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
    <?php require_once('../php_partials/mensajes.php') ?>
        <div class="card bg-light" style="margin-top: 10px;">
            <div class="card-header">
                <a>Ofertas</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr class="table-secondary">
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Puntuación</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ofertas as $oferta) { ?>
                            <tr class="table-active">

                                <th scope="row"><?php echo $oferta['id'] ?></th>
                                <td><?php echo $oferta['name'] ?></td>
                                <td><?php echo $oferta['descripcion'] ?></td>
                                <td><?php echo $oferta['puntuacion_min'] ?></td>
                                <td><?php echo $oferta['imagen'] ?></td>

                                <form action="./update_oferta.php" method="POST">
                                    <td><button type="submit" class="btn btn-success" name="pasarOferta">Modificar</button></td>
                                    <input type="hidden" id="id" name="id" value="<?php echo $oferta['id'] ?>">
                                </form>


                                <form action="../php_controllers/recomercemController.php" method="POST">
                                    <td><button type="submit" class="btn btn-success" name="deleteOferta" id="boton"  onclick=" return confirmDelete()">Eliminar</button></td>
                                    <input type="hidden" id="id" name="id" value="<?php echo $oferta['id'] ?>">
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <form action="./update_oferta.php" method="POST">
                    <button type="submit" class="btn btn-success">Crear Oferta</button>
                </form>
            </div>

        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>