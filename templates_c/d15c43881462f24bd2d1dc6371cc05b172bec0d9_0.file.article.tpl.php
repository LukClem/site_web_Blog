<?php
/* Smarty version 3.1.33, created on 2019-11-26 17:06:23
  from '/opt/lampp/htdocs/tp1/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ddd4d7f89ab58_54263469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd15c43881462f24bd2d1dc6371cc05b172bec0d9' => 
    array (
      0 => '/opt/lampp/htdocs/tp1/templates/article.tpl',
      1 => 1574783433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ddd4d7f89ab58_54263469 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">       
            <h1 class="mt-5">Blog</h1>
        </div>
    </div>
    <?php if (!empty($_GET['id'])) {?>
        <h2>Modifier l'article</h2>
    <?php } else { ?>
        <h2>Ajouter un article</h2>     
    <?php }?>

    <form method="post" enctype='multipart/form-data' action="article.php">
        <div class="form-group">
            <!--On affiche une valeur appropriée dans chaque champs si un get est présent dans l'url-->
            <?php if (!empty($_GET['id'])) {?>
                <input type="text" name="titre" class="form-control" required value=<?php echo $_smarty_tpl->tpl_vars['tab_article']->value['titre'];?>
>
                <small class="form-text text-muted"></small>       
            <?php } else { ?>
                <input type="text" name="titre" class="form-control" required placeholder="Entrer un titre">
                <small class="form-text text-muted"></small>
            <?php }?>
            <?php if (!empty($_GET['id'])) {?>
                <input type="textarea" name="texte" class="form-control" required value=<?php echo $_smarty_tpl->tpl_vars['tab_article']->value['texte'];?>
>
                <small class="form-text text-muted"></small>
            <?php } else { ?>
                <input type="textarea" name="texte" class="form-control" required placeholder="Entrer un texte">
                <small class="form-text text-muted"></small>
            <?php }?>
            <input type="file" required name="img" class="form-control-file">
            <?php if (!empty($_GET['id'])) {?>
                <div class="form-group form-check">
                    <input type="checkbox" checked value="" required name="publie" class="form-check-input">
                    <label class="form-check-label" for="exampleCheck1">Publier</label>
                </div>
            <?php } else { ?>
                <div class="form-group form-check">
                    <input type="checkbox" required name="publie" class="form-check-input">
                    <label class="form-check-label" for="exampleCheck1">Publier</label>
                </div>
            <?php }?>
            <button type="submit" name="bouton" class="btn btn-primary">Envoyer</button>
        </div>
    </form><?php }
}
