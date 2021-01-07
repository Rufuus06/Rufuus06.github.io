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
                     $_POST['txtAdmin'],
                     $_POST['txtPuntuacion']);

        header('Location: ../php_views/usuarios.php');
        exit();
    }

    if (isset($_POST['insertOfertas']))
    {
        insertOferta($_POST['txtNombre'],
                     $_POST['imagen'],
                     $_POST['txtDescripcion'],
                     $_POST['txtPuntuacion']);

        header('Location: ../php_views/ofertas.php');
        exit();
    }

    if (isset($_POST['deleteUsuario'])) {
        deleteUsuari($_POST['id']);

        header('Location: ../php_views/usuarios.php');
        exit();
    }

    if (isset($_POST['deleteTienda'])) {
        deleteTienda($_POST['id']);

        header('Location: ../php_views/tiendas.php');
        exit();
    }

    if (isset($_POST['deleteOferta'])) {
        selectOferta($_POST['id']);
        deleteOferta($_POST['id']);

        header('Location: ../php_views/ofertas.php');
        exit();
    }

    if (isset($_POST['updateOfertas']))
    {
        updateOferta($_POST['txtombre'],
                     $_POST['imagen'],
                     $_POST['txtDescripcion'],
                     $_POST['txtPuntuacion']);

        header('Location: ../php_views/ofertas.php');
        exit();
    }

    if (isset($_POST['updateTienda']))
    {
        updateTienda($_POST['txtNombre'],
                     $_POST['txtLocalizacion']);

        header('Location: ../php_views/tiendas.php');
        exit();
    }

    if (isset($_POST['updateUsuario']))
    {
        updateUsuari($_POST['txtNombre'],
                     $_POST['txtEmail'],
                     $_POST['txtContrasenya'],
                     $_POST['txtPuntuacion'],
                     $_POST['txtAdmin']);

        header('Location: ../php_views/usuarios.php');
        exit();
    }

?>