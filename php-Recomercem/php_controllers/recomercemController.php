<?php

    require_once('../php_libraries/bd.php');

    if (isset($_POST['insertTienda']))
    {
        insertTienda($_POST['txtNombre'],
                     $_POST['txtLocalizacion']);

        header('Location: ../php_views/tiendas.php');
        exit();
    }

    if (isset($_POST['insertUsuario']))
    {
        insertUsuari($_POST['txtNombre'],
                     $_POST['txtEmail'],
                     $_POST['txtContrasenya'],
                     $_POST['txtPuntuacion'],
                     $_POST['txtAdmin']);

        header('Location: ../php_views/usuarios.php');
        exit();
    }
?>