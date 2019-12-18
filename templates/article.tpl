<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">       
            <h1 class="mt-5">Blog</h1>
        </div>
    </div>
    {if !empty ($smarty.get.id)}
        <h2>Modifier l'article</h2>
    {else}
        <h2>Ajouter un article</h2>     
    {/if}

    <form method="post" enctype='multipart/form-data' action="article.php">
        <div class="form-group">
            <!--On affiche une valeur appropriée dans chaque champs si un get est présent dans l'url-->
            {if !empty ($smarty.get.id)}
                <input type="text" name="titre" class="form-control" required value={$tab_article.titre}>
                <small class="form-text text-muted"></small>       
            {else}
                <input type="text" name="titre" class="form-control" required placeholder="Entrer un titre">
                <small class="form-text text-muted"></small>
            {/if}
            {if !empty ($smarty.get.id)}
                <input type="textarea" name="texte" class="form-control" required value={$tab_article.texte}>
                <small class="form-text text-muted"></small>
            {else}
                <input type="textarea" name="texte" class="form-control" required placeholder="Entrer un texte">
                <small class="form-text text-muted"></small>
            {/if}
            <input type="file" required name="img" class="form-control-file">
            {if !empty ($smarty.get.id)}
                <div class="form-group form-check">
                    <input type="checkbox" checked value="" required name="publie" class="form-check-input">
                    <label class="form-check-label" for="exampleCheck1">Publier</label>
                </div>
            {else}
                <div class="form-group form-check">
                    <input type="checkbox" required name="publie" class="form-check-input">
                    <label class="form-check-label" for="exampleCheck1">Publier</label>
                </div>
            {/if}
            <button type="submit" name="bouton" class="btn btn-primary">Envoyer</button>
        </div>
    </form>