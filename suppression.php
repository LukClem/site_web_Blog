<?php
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';

//On commence par supprimer les commentaires se rapportant aux articles
//Commencer par supprimer l'article ne fonctionnerait pas à cause des contraintes de clés étrangères
$id_article = $_GET['id'];

$sth = $bdd->prepare("DELETE FROM commentaire WHERE id_article = :id");
$sth->bindValue('id', $id_article, PDO::PARAM_INT);
$sth->execute();

//On supprime l'article

 $sth2 = $bdd->prepare("DELETE FROM article WHERE id = :id");
 $sth2->bindValue('id', $id_article, PDO::PARAM_INT);
 $sth2->execute();

header("Location: index.php");

