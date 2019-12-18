<?php
/* Smarty version 3.1.33, created on 2019-12-04 11:12:13
  from '/opt/lampp/htdocs/tp1/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de7867d487612_14095970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28abc1f7dd41332266fd5cf85097daae1277a661' => 
    array (
      0 => '/opt/lampp/htdocs/tp1/templates/connexion.tpl',
      1 => 1574783477,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de7867d487612_14095970 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Blog</h1>
            <h2>Connexion</h2>

            <form method="post" enctype='multipart/form-data' action="connexion.php">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" required placeholder="Email">
                    <small class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <input type="password" required name="mdp" class="form-control" placeholder="mot de passe">
                </div>

                <button type="submit" name="bouton" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
    <div class="row">

    </div>
</div>

<?php }
}
