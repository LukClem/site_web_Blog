<?php

try {
    //On crée un objet PDO pour la connexion à la base de données, ici monblogs, en précisant 
    //le serveur et les paramètres de connexion à celui-ci
    $bdd = new PDO('mysql:host=localhost;dbname=monblogs;charset=utf8', 'root', '');
    $bdd->exec("set names utf8");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
		

