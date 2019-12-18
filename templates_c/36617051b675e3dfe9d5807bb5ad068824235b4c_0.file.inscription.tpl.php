<?php
/* Smarty version 3.1.33, created on 2019-11-26 17:06:27
  from '/opt/lampp/htdocs/tp1/templates/inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddd4d83c0cab3_49383801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36617051b675e3dfe9d5807bb5ad068824235b4c' => 
    array (
      0 => '/opt/lampp/htdocs/tp1/templates/inscription.tpl',
      1 => 1574783473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ddd4d83c0cab3_49383801 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
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
<?php }
}
