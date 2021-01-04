<?php

function openBd()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

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
    $conexion = openBd();

    $sentenciaSelect = "select * from tienda";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

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
    $conexion = openBd();

    $sentenciaSelect = "select * from tienda where id = $id";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

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


function insertUsuari($nickname, $email, $passw, $admin, $puntuacion)
{
    $conexion = openBd();

    $sentenciaInsert = "insert into usuario (nickname, email, passw, admin, puntuacion)
     values (:nickname, :email, :passw, :admin, :puntuacion)";
    $sentencia = $conexion->prepare($sentenciaInsert);
    $sentencia->bindParam(':nickname', $nickname);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':passw', $passw);
    $sentencia->bindParam(':admin', $admin);
    $sentencia->bindParam(':puntuacion', $puntuacion);
    $sentencia->execute();

    $conexion = closeBd();
}

function insertTienda($nombre, $localizacion)
{
    $conexion = openBd();

    $sentenciaInsert = "insert into tienda (nombre, localizacion)
     values (:nombre, :localizacion)";
    $sentencia = $conexion->prepare($sentenciaInsert);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':localizacion', $localizacion);
    $sentencia->execute();

    $conexion = closeBd();
}

function insertOferta($name, $descripcion, $puntuacion_min, $imagen)
{
    $conexion = openBd();

    $sentenciaInsert = "insert into oferta (name, imagen, descripcion, puntuacion_min)
     values (:name, :imagen, :descripcion, :puntuacion_min)";
    $sentencia = $conexion->prepare($sentenciaInsert);
    $sentencia->bindParam(':name', $name);
    $sentencia->bindParam(':imagen', $imagen);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':puntuacion_min', $puntuacion_min);
    $sentencia->execute();

    $conexion = closeBd();
}

function deleteUsuari($id)
{
    $conexion = openBd();

    $sentenciaDelete = "delete from usuario where id = $id";
    $sentencia = $conexion->prepare($sentenciaDelete);
    $sentencia->execute();

    $conexion = closeBd();
}

function deleteTienda($id)
{
    $conexion = openBd();

    $sentenciaDelete = "delete from tienda where id = $id";
    $sentencia = $conexion->prepare($sentenciaDelete);
    $sentencia->execute();

    $conexion = closeBd();
}

function deleteOferta($id)
{
    $conexion = openBd();

    $sentenciaDelete = "delete from oferta where id = $id";
    $sentencia = $conexion->prepare($sentenciaDelete);
    $sentencia->execute();

    $conexion = closeBd();
}

function updateUsuari($nickname, $email, $passw, $admin, $puntuacion)
{
    $conexion = openBd();

    $sentenciaInsert = "update usuario set nickname = $nickname,
                                             email = $email, 
                                             passw = $passw, 
                                             admin = $admin, 
                                             puntuacion = $puntuacion";
    $sentencia = $conexion->prepare($sentenciaInsert);
    $sentencia->execute();

    $conexion = closeBd();
}

function updateTienda($nombre, $localizacion)
{
    $conexion = openBd();

    $sentenciaInsert = "update tienda set nombre = $nombre,
                                             localizacion = $localizacion";
    $sentencia = $conexion->prepare($sentenciaInsert);
    $sentencia->execute();

    $conexion = closeBd();
}

function updateOferta($name, $imagen, $descripcion, $puntuacion_min)
{
    $conexion = openBd();

    $sentenciaInsert = "update oferta set name = $name,
                                            imagen = $imagen,
                                             descripcion = $descripcion, 
                                             puntuacion_min = $puntuacion_min";
    $sentencia = $conexion->prepare($sentenciaInsert);
    $sentencia->execute();

    $conexion = closeBd();
}
