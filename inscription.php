<?php

require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
require_once 'vendor/smarty/Smarty.class.php';

/* @var $bdd PDO */
//print_r2($_POST);
//print_r2($_FILES);
//print_r2($_SESSION);

if (isset($_POST['bouton'])) {

    //Création des variables 
    // Elles correspondent aux données qui ont été envoyés
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    //Insertion des données
    $sth = $bdd->prepare("INSERT INTO utilisateur(nom, prenom, email, mdp) VALUE (:nom, :prenom, :email, :mdp)");
//On sécurise chaque variable en s'assurant qu'on ne puisse pas rentrer des valeurs d'un autre type que ceux déjà imposés
    $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);
//On exécute la requête préparée
    $result_insert_inscription = $sth->execute();

    /* Notification
      en fonction de la valeur reultinsertarticle true ou false
      selon sa valeur, on crée une variable de session.
      bandeau vert ou rouge
    */
//Si la requête a été exécutée sans erreurs on affiche une alerte verte sur la page d'acceuil, explicitant sa réussite
    if ($result_insert_inscription == true) {

        $_SESSION['var'] = '<div class="alert alert-success" role="alert">Utilisateur inséré 
</div>';
    } else {
//Si la requête n'a pas été executée, on affiche sur la page d'acceuil une alerte rouge d'erreur
        $_SESSION["var"] = '<div class="alert alert-danger" role="alert">Utilisateur non inséré 
</div>';
    }
    /* Notification */
    //On redirige ensuite sur la page d'acceuil
    header("Location: index.php");
    exit();
} else {
    $smarty = new Smarty();

    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');
    $smarty->debugging = true;


    include_once 'includes/header.inc.php';
    include_once 'includes/menu.inc.php';
    $smarty->display('inscription.tpl');
    include_once 'includes/footer.inc.php';
}
?>

