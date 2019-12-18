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
    //print_r2($_POST);
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $sth = $bdd->prepare("SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp");
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);

    $sth->execute();

    if ($sth->rowCount() > 0) {
        //la connexion est OK
        $donnees = $sth->fetch(PDO::FETCH_ASSOC);
        //print_r2($donnees);
        $sid = $donnees['email'] . time();
        //echo $sid;
        $sid_hache = md5($sid);
        //echo $sid_hache;
        setcookie('sid', $sid_hache, time() + 3600);
        $sth_update = $bdd->prepare("UPDATE utilisateur SET sid = :sid WHERE id = :id");
        $sth_update->bindValue(':sid', $sid_hache, PDO::PARAM_STR);
        $sth_update->bindValue(':id', $donnees['id'], PDO::PARAM_INT);
        $result_connexion = $sth_update->execute();
        var_dump($sth_update);


        if ($result_connexion == true) {

            $_SESSION['var'] = '<div class="alert alert-success" role="alert">Vous êtes connectés 
</div>';
            header("Location: index.php");
            exit();
        }
    } else {
        //la connexion est refusée

        $_SESSION["var"] = '<div class="alert alert-danger" role="alert">Veuillez vérifier votre login / mot de passe
</div>';
        header("Location: index.php");
        exit();
    }
} else {
    //Création d'un nouvel objet Smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');
    include_once 'includes/header.inc.php';
    include_once 'includes/menu.inc.php';
    //On joint la page php avec la page html
    $smarty->display('connexion.tpl');
    //On apppelle le code du pied de page
    include_once 'includes/footer.inc.php';
}
?>

