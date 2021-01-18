<?php

if (!isset($_SESSION)) {
    session_start();
}

function openBd()
{
    $servername = "localhost";
    $username = "root";
    $password = "mysql";

    $conexion = new PDO("mysql:host=$servername;dbname=recomerçem", $username, $password);
    // set the PDO error mode to exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("set names utf8");

    return $conexion;
}

function closeBd()
{
    return null;
}

function checkLogin($email, $password, $admin)
{
    try {
        $conexion = openBd();

        $sentenciaSelect = "select * from usuario where email = '$email' and passw = '$password' and admin = '$admin'";

        $sentencia = $conexion->prepare($sentenciaSelect);
        $sentencia->execute();

        $resultado = $sentencia->fetchAll();

        $_SESSION['mensaje'] = "Bienvenido";
        
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }

    $conexion = closeBd();
    return $resultado;
}

function selectAllUsuaris()
{
    $conexion = openBd();

    $sentenciaSelect = "select * from usuario";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = closeBd();

    return $resultado;
}

function selectAllTiendas()
{
    try {
        $conexion = openBd();

        $sentenciaSelect = "select * from tienda";

        $sentencia = $conexion->prepare($sentenciaSelect);
        $sentencia->execute();

        $resultado = $sentencia->fetchAll();
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }

    $conexion = closeBd();

    return $resultado;
}

function selectAllOfertas()
{
    $conexion = openBd();

    $sentenciaSelect = "select * from oferta";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = closeBd();

    return $resultado;
}


function selectTienda($id)
{
    try {
        $conexion = openBd();

        $sentenciaSelect = "select * from tienda where id = '$id'";

        $sentencia = $conexion->prepare($sentenciaSelect);
        $sentencia->execute();

        $resultado = $sentencia->fetchAll();
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }

    $conexion = closeBd();
    return $resultado;
}

function selectOferta($id)
{
    $conexion = openBd();

    $sentenciaSelect = "select * from oferta where id = $id";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = closeBd();

    return $resultado;
}

function selectUsuari($id)
{
    $conexion = openBd();

    $sentenciaSelect = "select * from usuario where id = $id";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = closeBd();

    return $resultado;
}


function insertUsuari($nickname, $email, $passw, $puntuacion, $admin)
{
    try {
        $conexion = openBd();

        $sentenciaInsert = "insert into usuario ( nickname, email, passw, puntuacion, admin)
     values (:nickname, :email, :passw, :puntuacion, :admin)";

        $sentencia = $conexion->prepare($sentenciaInsert);

        $sentencia->bindParam(':nickname', $nickname);
        $sentencia->bindParam(':email', $email);
        $sentencia->bindParam(':passw', $passw);
        $sentencia->bindParam(':puntuacion', $puntuacion);
        $sentencia->bindParam(':admin', $admin);

        $sentencia->execute();
        $_SESSION['mensaje'] = "Registro insertado correctamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }
    $conexion = closeBd();
}

function insertTienda($nombre, $localizacion)
{
    try {
        $conexion = openBd();

        $sentenciaInsert = "insert into tienda (nombre, Localizacion)
     values (:nombre, :localizacion)";

        $sentencia = $conexion->prepare($sentenciaInsert);

        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':localizacion', $localizacion);

        $sentencia->execute();
        $_SESSION['mensaje'] = "Registro insertado correctamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }

    $conexion = closeBd();
}

function insertOferta($name, $imagen, $descripcion, $puntuacion_min)
{
    try {
        $conexion = openBd();

        $sentenciaInsert = "insert into oferta (name, imagen, descripcion, puntuacion_min)
        values (:name, :imagen, :descripcion, :puntuacion_min)";
        $sentencia = $conexion->prepare($sentenciaInsert);
        $sentencia->bindParam(':name', $name);
        $sentencia->bindParam(':imagen', $imagen);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':puntuacion_min', $puntuacion_min);
        $sentencia->execute();

        $_SESSION['mensaje'] = "Registro insertado correctamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
        $oferta['name'] = $name;
        $oferta['imagen'] = $imagen;
        $oferta['descripcion'] = $descripcion;
        $oferta['puntuacion_min'] = $puntuacion_min;
        $_SESSION['oferta'] = $oferta;
    }
    $conexion = closeBd();
}

function deleteUsuario($id)
{
    try {
        $conexion = openBd();

        $sentenciaDelete = "delete from usuario where id = '$id'";

        $sentencia = $conexion->prepare($sentenciaDelete);
        $sentencia->execute();
        $_SESSION['mensaje'] = "Eliminado correctamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }


    $conexion = closeBd();
}

function deleteTienda($id)
{
    try {
        $conexion = openBd();

        $sentenciaDelete = "delete from tienda where id = '$id'";

        $sentencia = $conexion->prepare($sentenciaDelete);
        $sentencia->execute();
        $_SESSION['mensaje'] = "Eliminado correctamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }

    $conexion = closeBd();
}

function deleteOferta($id)
{
    try {
        $conexion = openBd();

        $sentenciaDelete = "delete from oferta where id = $id";
        $sentencia = $conexion->prepare($sentenciaDelete);
        $sentencia->execute();
        $_SESSION['mensaje'] = "Eliminado correctamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }


    $conexion = closeBd();
}

function updateUsuari($id, $nickname, $email, $passw, $puntuacion, $admin)
{
    try {
        $conexion = openBd();

        $sentenciaInsert = "
        update usuario set
        nickname = '$nickname',
        email = '$email', 
        passw = '$passw', 
        admin = '$admin', 
        puntuacion = '$puntuacion'
        where id = '$id'
        ";

        $sentencia = $conexion->prepare($sentenciaInsert);
        $sentencia->execute();
        $_SESSION['mensaje'] = "Modificado correctamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }


    $conexion = closeBd();
}

function updateTienda($nombre, $localizacion, $id)
{
    try {
        $conexion = openBd();

        $sentenciaInsert = "
            update tienda set nombre = '$nombre',
            Localizacion = '$localizacion'
            where id = '$id'
            ";

        $sentencia = $conexion->prepare($sentenciaInsert);
        $sentencia->execute();
        $_SESSION['mensaje'] = "Modificado correctamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }

    $conexion = closeBd();
}

function updateOferta($name, $imagen, $descripcion, $puntuacion_min, $id)
{
    try {
        $conexion = openBd();

        $sentenciaInsert = "update oferta set name = '$name',
                                            imagen = '$imagen',
                                             descripcion = '$descripcion', 
                                             puntuacion_min = '$puntuacion_min'
                                             where id = '$id'";


        $sentencia = $conexion->prepare($sentenciaInsert);
        $sentencia->execute();
        $_SESSION['mensaje'] = "Modificado correctamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = errorMessage($e);
    }


    $conexion = closeBd();
}

function errorMessage($e)
{
    if (!empty($e->errorInfo[1])) {
        switch ($e->errorInfo[1]) {
            case 1062:
                $mensaje = 'Registro duplicado';
                break;
            case 1451:
                $mensaje = 'Registro con elementos relacionados';
                break;
            default:
                $mensaje = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                break;
        }
    } else {
        switch ($e->getCode()) {
            case '1044':
                $mensaje = 'Usuario y/o password incorrecto';
                break;
            case '1049':
                $mensaje = 'Base de datos desconocida';
                break;
            case '2002':
                $mensaje = 'No se encuentra el servidor';
                break;
            default:
                $mensaje = $e->getCode() . ' - ' . $e->getMessage();
                break;
        }
    }
    return $mensaje;
}
