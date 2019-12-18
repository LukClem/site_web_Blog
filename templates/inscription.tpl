<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Blog</h1>
            <h2>Ajouter un utilisateur</h2>
            <!--Formulaire permettant l'ajout d'un utilisateur dans la base de données utilisateur-->
            <form method="post" enctype='multipart/form-data' action="inscription.php">
                <div class="form-group">
                    <input type="text" name="nom" class="form-control" required placeholder="Nom">
                    <small class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input type="text" required name="prenom" class="form-control" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <input type="email" required name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" required name="mdp" class="form-control" placeholder="Mot de passe">
                </div>


                <button type="submit" name="bouton" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
    <div class="row">

    </div>
</div>
</body>
