<?php

    require_once('../php_libraries/bd.php');

    if (isset($_POST['insert']))
    {
        insertPokemon($_POST['numero'],
                     $_POST['nombre'],
                     $_POST['altura'], 
                     $_POST['peso'], 
                     $_POST['evolucion'], 
                     $_POST['imagen'], 
                     $_POST['region_id']);

        header('Location: ../php_views/pokemon_list.php');
        exit();
    }
?>