<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once('../php_libraries/bd.php');

if (isset($_POST['Login'])) {
    $validate = checkLogin(
        $_POST['txtEmail'],
        $_POST['txtContraseña'],
        $_POST['admin']
    );

    if ($validate) {
        header('Location: ../php_views/usuarios.php');
        exit();
    } else {
        $_SESSION['mensaje'] = "Usuario y/o contraseña erronea";
        header('Location: ../index.php');
    }
}

if (isset($_POST['insertTienda'])) {
    insertTienda(
        $_POST['txtNombre'],
        $_POST['txtLocalizacion']
    );

    if (isset($_SESSION['error'])) {
        header('Location: ../php_views/CRUD_tienda.php');
    } else {
        header('Location: ../php_views/tiendas.php');
    }
    exit();
}

if (isset($_POST['insertUsuario'])) {
    if (empty($_POST['chbAdmin'])) {
        $admin = 0;
    } else {
        $admin = 1;
    }

    insertUsuari(
        $_POST['txtNickname'],
        $_POST['txtEmail'],
        $_POST['txtContrasenya'],
        $_POST['txtPuntuacion'],
        $admin
    );

    if (isset($_SESSION['error'])) {
        header('Location: ../php_views/CRUD_usuario.php');
        exit();
    } else {
        header('Location: ../php_views/usuarios.php');
    }
}

if (isset($_POST['insertOfertas'])) {
    insertOferta(
        $_POST['txtNombre'],
        $_POST['imagen'],
        $_POST['txtDescripcion'],
        $_POST['txtPuntuacion']
    );

    if (isset($_SESSION['error'])) {
        header('Location: ../php_views/CRUD_oferta.php');
    } else {
        header('Location: ../php_views/ofertas.php');
        exit();
    }
}

if (isset($_POST['updateOfertas'])) {
    updateOferta(
        $_POST['txtNombre'],
        $_POST['imagen'],
        $_POST['txtDescripcion'],
        $_POST['txtPuntuacion'],
        $_POST['id']
    );

    if (isset($_SESSION['error'])) {
        header('Location: ../php_views/CRUD_oferta.php');
        exit();
    } else {
        header('Location: ../php_views/ofertas.php');
        exit();
    }
}

if (isset($_POST['updateTienda'])) {
    updateTienda(
        $_POST['txtNombre'],
        $_POST['txtLocalizacion'],
        $_POST['id_tienda']
    );

    if (isset($_SESSION['error'])) {
        header('Location: ../php_views/CRUD_tienda.php');
        exit();
    } else {
        header('Location: ../php_views/tiendas.php');
        exit();
    }
}

if (isset($_POST['updateUsuario'])) {
    if (empty($_POST['chbAdmin'])) {
        $admin = 0;
    } else {
        $admin = 1;
    }

    updateUsuari(
        $_POST['id_usuario'],
        $_POST['txtNickname'],
        $_POST['txtEmail'],
        $_POST['txtContrasenya'],
        $_POST['txtPuntuacion'],
        $admin
    );

    if (isset($_SESSION['error'])) {
        header('Location: ../php_views/CRUD_usuario.php');
        exit();
    } else 
    {
        header('Location: ../php_views/usuarios.php');
        exit();
    }
}

if (isset($_POST['BtnDeleteUsuario'])) {
    deleteUsuario($_POST['id_usuario']);

    header('Location: ../php_views/usuarios.php');
    exit();
}

if (isset($_POST['BtnDeleteOferta'])) {
    deleteOferta($_POST['id']);

    header('Location: ../php_views/ofertas.php');
    exit();
}

if (isset($_POST['BtnDeleteTienda'])) {
    deleteTienda($_POST['id_tienda']);

    header('Location: ../php_views/tiendas.php');
    exit();
}

if (isset($_POST['cancelarOferta'])) {
    header('Location: ../php_views/ofertas.php');
    exit();
}

if (isset($_POST['cancelarTienda'])) {
    header('Location: ../php_views/tiendas.php');
    exit();
}

if (isset($_POST['cancelarUsuario'])) {
    header('Location: ../php_views/usuarios.php');
    exit();
}
