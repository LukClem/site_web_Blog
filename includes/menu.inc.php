<!--Menu qui est reprit dans chaque page du site-->
<body>

    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">


                    <form class="form-inline my-2 my-lg-0"  method="get" enctype='multipart/form-data' action="index.php">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Rechercher" aria-label="Rechercher">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                    </form>


                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                    <?php
                    if ($connecte == TRUE) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="article.php">Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inscription.php">Ajouter utilisateur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="deconnexion.php">Deconnexion</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

