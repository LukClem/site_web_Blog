<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
//Fonction permettant d'afficher l'état, le type d'une variable
function print_r2($ma_variable) {
    echo '<pre>';
    print_r($ma_variable);
    echo '</pre>';
}

//On définit la plage horaire pour l'heure
date_default_timezone_set('Europe/Paris');
//On définit le nombre maximum d'articles par page à 2
define('_nb_art_par_page', 2);

