<?php

/* @var $bdd PDO */
//On instancie la connection à FALSE par défaut
$connecte = FALSE;
//print_r2($_COOKIE);
//S'il n'y a pas de cookie, on en crée un, en partant de la valeur du sid de l'utilisateur connecté
if (isset($_COOKIE['sid'])) {
    $sid = $_COOKIE['sid'];
    $sth_connexion = $bdd->prepare("SELECT * FROM utilisateur WHERE sid = :sid");
    $sth_connexion->bindValue(':sid', $sid, PDO::PARAM_STR);
    $sth_connexion->execute();
    if ($sth_connexion->rowCount() > 0) {
        $connecte = TRUE;
    }
}
?>