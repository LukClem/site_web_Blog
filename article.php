<?php

require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
require_once 'vendor/smarty/Smarty.class.php';
/* @var $bdd PDO */
//print_r2($_POST);
//print_r2($_FILES);
//print_r2($_SESSION);
//On entre dans la boucle seulement si le bouton "bouton" a été activé
if (isset($_POST['bouton'])) {
    //Création des variables
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $publie = isset($_POST['publie']) ? 1 : 0;
    $date = date('Y-m-d');
    //Insertion des données
    //if (!empty($_GET['id'])){
    if ($_SESSION['id'] != null) {
        echo"Modification ";
        echo $_SESSION['id'];

        $sth = $bdd->prepare("UPDATE article SET titre = :titre, texte = :texte, date = :date, publie = :publie WHERE id = :id");
        $sth->bindValue(':titre', $titre, PDO::PARAM_STR);
        $sth->bindValue(':texte', $texte, PDO::PARAM_STR);
        $sth->bindValue(':date', $date, PDO::PARAM_STR);
        $sth->bindValue(':publie', $publie, PDO::PARAM_INT);
        $sth->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);

        $result_insert_article = $sth->execute();
        $id_article = $_SESSION['id'];
        $_SESSION['id'] = null;

        session_unset();
        session_destroy();
    } else {
        echo "Ajouter";
        //On insère les données renseignés dans la table article de la bdd
        $sth = $bdd->prepare("INSERT INTO article(titre, texte, date, publie) VALUE (:titre, :texte, :date, :publie)");
        $sth->bindValue(':titre', $titre, PDO::PARAM_STR);
        $sth->bindValue(':texte', $texte, PDO::PARAM_STR);
        $sth->bindValue(':date', $date, PDO::PARAM_STR);
        $sth->bindValue(':publie', $publie, PDO::PARAM_INT);
        //On exécute la requête préparée
        $result_insert_article = $sth->execute();
    }

    if (isset($id_article)) {

        $id_insert = $id_article;

        //Traitement de l'image
        if ($_FILES['img']['error'] == 0) {
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            //on déplace l'image dans le dossier prévu à cet effet
            move_uploaded_file($_FILES['img']['tmp_name'], 'img/' . $id_insert . '.jpg');
        }
    } else {
        $id_insert = $bdd->lastInsertId();

        //Traitement de l'image
        if ($_FILES['img']['error'] == 0) {
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            //on déplace l'image dans le dossier prévu à cet effet
            move_uploaded_file($_FILES['img']['tmp_name'], 'img/' . $id_insert . '.jpg');
        }
    }
    /* Notification
      en fonction de la valeur reultinsertarticle true ou false
      selon sa valeur, on crée une variable de session.
      bandeau vert ou rouge
     */


    if ($result_insert_article == true) {
//Si l'insertion de l'article a fonctionnée, on affiche une alerte verte
        $_SESSION['var'] = '<div class="alert alert-success" role="alert">Article inséré 
</div>';
    } else {
//Si l'insertion de l'article a échouée, on affiche une alerte rouge
        $_SESSION["var"] = '<div class="alert alert-danger" role="alert">Article non inséré 
</div>';
    }
    /* Notification */
//On redirige automatique l'utilisateur vers la page d'acceuil
    header("Location: index.php");
    exit();
} else {


    include_once 'includes/header.inc.php';
    include_once 'includes/menu.inc.php';

    //On récupère les données de l'article
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
        
        $sth = $bdd->prepare("SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, publie "
                . "FROM article WHERE id = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $tab_article = $sth->fetch(PDO::FETCH_ASSOC);
    }
    //On crée un nouvel objet Smarty
    $smarty = new Smarty();

    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    if (isset($_GET['id'])) {
//transmission des variables au template
        $smarty->assign('tab_article', $tab_article);
        $smarty->assign('id', $id);
    }
//on met en relation la partie php avec la partie html
    $smarty->display('article.tpl');
    include_once 'includes/footer.inc.php';
    ?>


<?php } ?>
 


