<?php
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
require_once 'vendor/smarty/Smarty.class.php';

include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';
 
if (isset($_POST['bouton'])) {
  
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$message = $_POST['message'];
//Requête permettant de créer un commentaire dans la base de données
 $sth = $bdd->prepare("INSERT INTO commentaire(id_article, pseudo, email, message) VALUE (:id_article, :pseudo, :email, :message)");
//On sécurise chaque variable en s'assurant qu'on ne puisse pas rentrer des valeurs d'un autre type que ceux déjà imposés
    $sth->bindValue(':id_article', $_SESSION['id_article'], PDO::PARAM_INT);
    $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':message', $message, PDO::PARAM_STR);
//On exécute la requête préparée
    $result_insert_commentaire = $sth->execute();
     header('location: contenu.php?id='.$_SESSION['id_article']);
    }
   
    
$id = $_GET['id'];

$_SESSION['id_article'] = $id;

$sth = $bdd->prepare("SELECT titre, texte, DATE_FORMAT(date, '%d/%m/%Y') AS date_fr "
        . "FROM article WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_INT);
$sth->execute();
$tab_article = $sth->fetchAll(PDO::FETCH_ASSOC);
//On récupère les données de la table commentaire se rapportant à l'article
$sth2 = $bdd->prepare("SELECT pseudo, email, message "
        . "FROM commentaire WHERE id_article = :id");
$sth2->bindValue(':id', $id, PDO::PARAM_INT);
$sth2->execute();
$tab_article2 = $sth2->fetchAll(PDO::FETCH_ASSOC);
 


$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//transmission des variables au template
$smarty->assign('id', $id);
$smarty->assign('tab_article2', $tab_article2);
$smarty->assign('tab_article', $tab_article);
//$smarty->debugging = true;
$smarty->display('contenu.tpl');
include_once 'includes/footer.inc.php';


