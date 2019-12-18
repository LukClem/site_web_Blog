<?php
//on démarre la session, on se connecte à la base de données, on récupère le code du menu 
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';

/* @var $bdd PDO */
//PAGINATION
//On récupère le nombre d'articles, et on affiche un certain nombre (ici 2) par page. 
$page_courante = !empty($_GET['p']) ? $_GET['p'] : 1;

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
?>
<!DOCTYPE html>
<html lang="en">
    <!--Header-->
    <?php include_once 'includes/header.inc.php'; ?>

    <body>

        <!-- Navigation -->
        <?php include_once 'includes/menu.inc.php'; ?>

        <!-- Page Content -->
        <div class="container">   
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Mon super blog</h1>
                    <?php
                    if (!empty($_GET['search'])) {
                        echo "résultat recherche";

                        $sth = $bdd->prepare("SELECT id, titre, texte, DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, publie "
                                . "FROM article WHERE publie = :publie AND (titre LIKE :recherche OR texte LIKE :recherche)"
                                . " LIMIT :index, :nb_art_par_page");
                        $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
                        $sth->bindValue(':index', $index, PDO::PARAM_INT);
                        $sth->bindValue(':recherche', '%' . $_GET['search'] . '%', PDO::PARAM_STR);
                        $sth->bindValue(':nb_art_par_page', _nb_art_par_page, PDO::PARAM_INT);

                        $sth->execute();
                        $nb_result = $sth->rowCount();
                        if ($nb_result > 0) {
                            $tab_articles2 = $sth->fetchAll(PDO::FETCH_ASSOC);
                        }
                        print_r2($tab_articles2);


                        if ($nb_result = 0) {
                            ?>
                            <div class="row">
                            <?php
                            //Pour tous les articles présent dans le tableau $tab_article2
                            foreach ($tab_article2 as $value) {
                                ?>

                                    <div class="col-6">
                                        <div class="card" style="width: 100%;">
                                            <img src="img/<?= $value['id'] ?>.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <!--On affiche dans chaque balise les informations du tableau contenant les articles et leurs informations-->
                                                <h5 class="card-title"><?= $value['titre'] ?></h5>
                                                <p class="card-text"><?= $value['texte'] ?></p>
                                                <a href="#" class="btn btn-primary"><?= $value['date_fr']; ?></a>
                                                <a href="article.php?id=<?php echo $value['id']; ?>" class="btn btn-secondary">Modifier</a>
                                            </div>

                                        </div>
                                    </div>

            <?php
        }
        ?>
                            </div>
                            <div class="row">
                                <nav aria-label="...">
                                    <ul class="pagination pagination-lg">
        <?php
        //Suivant le nombre total de page nécessaire à l'affichage des articles, on affiche un certain nombre de liens
        for ($index1 = 1; $index1 <= $nb_total_pages; $index1++) {
            ?>
                                            <!--Lors de l'activation du lien, on associe dans l'url une variable GET correspondant à l'id de l'article-->
                                            <li class="page-item"><a class="page-link" href="index.php?p=<?php echo $index1; ?>"><?php echo $index1; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div> <?php
                            }
                        } else {
                            if (!empty($_SESSION['var'])) {
                                echo $_SESSION['var'];
                                unset($_SESSION['var']);
                            }
                                    ?>
                </div>
            </div>
            <div class="row">
    <?php
    //Pour tous les articles présent dans le tableau $tab_article
    foreach ($tab_article as $value) {
        ?>

                    <div class="col-6">
                        <div class="card" style="width: 100%;">
                            <img src="img/<?= $value['id'] ?>.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <!--On affiche dans chaque balise les informations du tableau contenant les articles et leurs informations-->
                                <h5 class="card-title"><?= $value['titre'] ?></h5>
                                <p class="card-text"><?= $value['texte'] ?></p>
                                <a href="#" class="btn btn-primary"><?= $value['date_fr']; ?></a>
                                <a href="article.php?id=<?php echo $value['id']; ?>" class="btn btn-secondary">Modifier</a>

                            </div>

                        </div>
                    </div>

        <?php
    }
    ?>
            </div>
            <div class="row">
                <nav aria-label="...">
                    <ul class="pagination pagination-lg">
    <?php
    //Suivant le nombre total de page nécessaire à l'affichage des articles, on affiche un certain nombre de liens
    for ($index1 = 1; $index1 <= $nb_total_pages; $index1++) {
        ?>
                            <!--Lors de l'activation du lien, on associe dans l'url une variable GET correspondant à l'id de l'article-->
                            <li class="page-item"><a class="page-link" href="index.php?p=<?php echo $index1; ?>"><?php echo $index1; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Footer -->
    <?php
}
include_once 'includes/footer.inc.php';
?>
</body>

</html>
