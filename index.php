<?php

//on démarre la session, on se connecte à la base de données, on récupère le code du menu 

require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
require_once 'vendor/smarty/Smarty.class.php';

/* @var $bdd PDO */

//PAGINATION
//On récupère le nombre d'articles, et on affiche un certain nombre (ici 2) par page. 
$page_courante = !empty($_GET['p']) ? $_GET['p'] : 1;

if (!empty($_GET['search'])) {
    $get_value = $_GET['search'];
}

function pagination($page_courante, $nb_articles_par_page) {
    $index = ($page_courante - 1) * $nb_articles_par_page;
    return $index;
}

//Fonction qui retourne le nombre total d'article présent dans la table article
function nb_total_article($bdd) {
    $sth = $bdd->prepare("SELECT COUNT(*) as total_articles FROM article WHERE publie = :publie");
    $sth->bindValue('publie', 1, PDO::PARAM_BOOL);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    $total_articles = $result['total_articles'];
    return $total_articles;
}

$nb_total_articles = nb_total_article($bdd);

$nb_total_pages = ceil($nb_total_articles / _nb_art_par_page);

$index = pagination($page_courante, _nb_art_par_page);

//PAGINATION FIN
//On limite l'affichage à un nombre maximum de 2 articles. 
$sth = $bdd->prepare("SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, publie "
        . "FROM article WHERE publie = :publie LIMIT :index, :nb_art_par_page");
$sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
$sth->bindValue(':index', $index, PDO::PARAM_INT);
$sth->bindValue(':nb_art_par_page', _nb_art_par_page, PDO::PARAM_INT);
$sth->execute();
$tab_article = $sth->fetchAll(PDO::FETCH_ASSOC);

//smarty
$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//transmission des variables au template
$smarty->assign('tab_article', $tab_article);
$smarty->assign('nb_total_pages', $nb_total_pages);

if (!empty($_GET['search'])) {
    $smarty->assign('get_value', $get_value);
}
//** un-comment the following line to show the debug console
//$smarty->debugging = true;

include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';
$smarty->display('index.tpl');
include_once 'includes/footer.inc.php';

unset($_SESSION['var']);
