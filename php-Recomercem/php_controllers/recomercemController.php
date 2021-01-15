<?php

    require_once('../php_libraries/bd.php');

    if ( isset( $_POST['Login'] ))
    {
        $validate = checkLogin( $_POST['txtEmail'],
                                $_POST['txtContraseña'] 
                                );

        if ( $validate )
        {
            header('Location: ../php_views/usuarios.php');
            exit();
        }
        else {
            header('Location: ../index.php');
        }
    }

    if (isset($_POST['insertTienda']))
    {
        insertTienda($_POST['txtNombre'],
                     $_POST['txtLocalizacion']);

        header('Location: ../php_views/tiendas.php');
        exit();
    }

    if (isset($_POST['insertUsuario']))
    {
        if ( empty( $_POST['chbAdmin'] ))
        {
            $admin = 0;
        }
        else
        {
            $admin = 1;
        }

        insertUsuari( $_POST['txtNickname'],
                      $_POST['txtEmail'],
                      $_POST['txtContrasenya'],
                      $_POST['txtPuntuacion'],
                      $admin
                    );

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
        deleteUsuario($_POST['id']);

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
        if ( empty( $_POST['chbAdmin'] ))
        {
            $admin = 0;
        }
        else
        {
            $admin = 1;
        }

        updateUsuari( $_POST['id_usuario'],
                      $_POST['txtNickname'],
                      $_POST['txtEmail'],
                      $_POST['txtContrasenya'],
                      $_POST['txtPuntuacion'],
                      $admin
                    );

        header('Location: ../php_views/usuarios.php');
        exit();
    }

    if ( isset( $_POST['BtnDeleteUsuario'] ))
    {
        deleteUsuario ( $_POST['id_usuario'] ); 

        header('Location: ../php_views/usuarios.php');
        exit();
    }
?>