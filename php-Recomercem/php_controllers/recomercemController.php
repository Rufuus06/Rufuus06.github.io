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
        deleteOferta($_POST['id']);

        header('Location: ../php_views/ofertas.php');
        exit();
    }

    if (isset($_POST['updateOfertas']))
    {
        updateOferta($_POST['txtNombre'],
                     $_POST['imagen'],
                     $_POST['txtDescripcion'],
                     $_POST['txtPuntuacion'],
                     $_POST['id']);

        header('Location: ../php_views/ofertas.php');
        exit();
    }

    if (isset($_POST['updateTienda']))
    {
        updateTienda($_POST['txtNombre'],
                     $_POST['txtLocalizacion'],
                     $_POST['id']);

        header('Location: ../php_views/tiendas.php');
        exit();
    }

    if (isset($_POST['updateUsuario']))
    {
        updateUsuari($_POST['txtNombre'],
                     $_POST['txtEmail'],
                     $_POST['txtContrasenya'],
                     $_POST['txtPuntuacion'],
                     $_POST['txtAdmin'],
                     $_POST['id']);

        header('Location: ../php_views/usuarios.php');
        exit();
    }

    if (isset($_POST['login']))
    {
        $login = login($_POST['txtEmail'],
                     $_POST['txtContrasenya']);

        if (!empty($login)) {
            header('Location: ../php_views/usuarios.php');
        }
            
        exit();
    }

    if (isset($_POST['pasarOferta']))
    {
        header('Location: ../php_views/update_oferta.php');
        exit();
    }

?>