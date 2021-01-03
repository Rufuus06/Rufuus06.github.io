<?php

function openBd()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conexion = new PDO("mysql:host=$servername;dbname=pokedex", $username, $password);
    // set the PDO error mode to exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("set names utf8");

    return $conexion;
}

function closeBd()
{
    return null;
}

function selectPokemons()
{
    $conexion = openBd();

    $sentenciaSelect = "select * from pokemons";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = closeBd();

    return $resultado;
}

function selectTipos()
{
    $conexion = openBd();

    $sentenciaSelect = "select nombre from tipos";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = closeBd();

    return $resultado;
}

function selectRegiones()
{
    $conexion = openBd();

    $sentenciaSelect = "select nombre from regiones";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = closeBd();

    return $resultado;
}

function selectPokemon($id)
{
    $conexion = openBd();

    $sentenciaSelect = "select * from pokemons where id = $id";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = closeBd();

    return $resultado;
}

function selectPokemonTipo($id)
{
    $conexion = openBd();

    $sentenciaSelect = "SELECT id, nombre FROM tipos JOIN tipos_has_pokemons ON tipos.id = tipos_has_pokemons.tipos_id WHERE tipos_has_pokemons.pokemons_id = $id";

    $sentencia = $conexion->prepare($sentenciaSelect);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = closeBd();

    return $resultado;
}

function insertPokemon($numero, $nombre, $altura, $peso, $evolucion, $imagen, $region)
{
    $conexion = openBd();

    $sentenciaInsert = "insert into pokemons (numero, nombre, altura, peso, evolucion, imagen, region_id)
     values (:numero, :nombre, :altura, :peso, :evolucion, :imagen, :region_id)";
     $sentencia = $conexion->prepare($sentenciaInsert);
     $sentencia->bindParam(':numero', $numero);
     $sentencia->bindParam(':nombre', $nombre);
     $sentencia->bindParam(':altura', $altura);
     $sentencia->bindParam(':peso', $peso);
     $sentencia->bindParam(':evolucion', $evolucion);
     $sentencia->bindParam(':imagen', $imagen);
     $sentencia->bindParam(':region_id', $region_id);
     $sentencia->execute();

    $conexion = closeBd();
}

function deletePokemon($id)
{
    $conexion = openBd();

    $sentenciaDelete = "delete from pokemons where id = $id";
     $sentencia = $conexion->prepare($sentenciaDelete);
     $sentencia->execute();

    $conexion = closeBd();
}

function updatePokemon($id, $numero, $nombre, $altura, $peso, $evolucion, $imagen, $region)
{
    $conexion = openBd();

    $sentenciaInsert = "update pokemons set numero = $numero,
                                             nombre = $nombre, 
                                             altura = $altura, 
                                             peso = $peso, 
                                             evolucion = $evolucion,
                                             imagen = $imagen,
                                             region_id = $region
                                             where id = $id";
     $sentencia = $conexion->prepare($sentenciaInsert);
     $sentencia->execute();

    $conexion = closeBd();
}