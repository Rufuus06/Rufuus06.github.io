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


function insertUsuari($nombre, $email, $password, $admin, $puntos)
{
    $conexion = openBd();

    $sentenciaInsert = "insert into usuario (nombre, email, password, admin, puntos)
     values (:nombre, :email, :password, :admin, :puntos)";
     $sentencia = $conexion->prepare($sentenciaInsert);
     $sentencia->bindParam(':nombre', $nombre);
     $sentencia->bindParam(':email', $email);
     $sentencia->bindParam(':password', $password);
     $sentencia->bindParam(':admin', $admin);
     $sentencia->bindParam(':puntos', $puntos);
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

function insertOferta($nombre, $descripcion, $puntuacion, $imagen)
{
    $conexion = openBd();

    $sentenciaInsert = "insert into oferta (nombre, descripcion, puntuacion, imagen)
     values (:nombre, :descripcion, :puntuacion, :imagen)";
     $sentencia = $conexion->prepare($sentenciaInsert);
     $sentencia->bindParam(':nombre', $nombre);
     $sentencia->bindParam(':descripcion', $descripcion);
     $sentencia->bindParam(':puntuacion', $puntuacion);
     $sentencia->bindParam(':imagen', $imagen);
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

function updateUsuari($nombre, $email, $password, $admin, $puntos)
{
    $conexion = openBd();

    $sentenciaInsert = "update usuario set nombre = $nombre,
                                             email = $email, 
                                             password = $password, 
                                             admin = $admin, 
                                             puntos = $puntos";
     $sentencia = $conexion->prepare($sentenciaInsert);
     $sentencia->execute();

    $conexion = closeBd();
}

function updateTienda($nombre, $email, $password, $admin, $puntos)
{
    $conexion = openBd();

    $sentenciaInsert = "update pokemons set nombre = $nombre,
                                             email = $email, 
                                             password = $password, 
                                             admin = $admin, 
                                             puntos = $puntos";
     $sentencia = $conexion->prepare($sentenciaInsert);
     $sentencia->execute();

    $conexion = closeBd();
}

function updateOferta($nombre, $email, $password, $admin, $puntos)
{
    $conexion = openBd();

    $sentenciaInsert = "update pokemons set nombre = $nombre,
                                             email = $email, 
                                             password = $password, 
                                             admin = $admin, 
                                             puntos = $puntos";
     $sentencia = $conexion->prepare($sentenciaInsert);
     $sentencia->execute();

    $conexion = closeBd();
}