<?php
/* Smarty version 3.1.33, created on 2019-12-18 13:56:35
  from '/opt/lampp/htdocs/tp1/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dfa22034bb999_09677914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '697afbe8c046565ae44ff7cdc71ae7aa44056da8' => 
    array (
      0 => '/opt/lampp/htdocs/tp1/templates/index.tpl',
      1 => 1576673793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dfa22034bb999_09677914 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
  <div class="container">
      <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Mon super blog</h1>
     
      </div>
    </div>

     <?php if (!empty($_smarty_tpl->tpl_vars['smatry']->value['session']['var'])) {?>
         <div class="row">
              <div class="col-12 center-block">
           <div class="alert alert-<?php echo $_SESSION['var']['result'];?>
" role="alert">
           <?php echo $_SESSION['var']['message'];?>

           </div>
              </div>
         </div>
     <?php }?>
       
       <div class="row">
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_article']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>    
    <div class="col-6">
  <div class="card" style="width: 100%;">
  <img src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <!--On affiche dans chaque balise les informations du tableau contenant les articles et leurs informations-->
    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h5>
    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
        <a href="#" class="btn btn-secondary"><?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</a>
     <a href="contenu.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-primary">Consulter</a>
    <a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-primary">Modifier</a>
     <a href="suppression.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-primary">Supprimer</a>
  </div>
</div>
</div>
 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
</div>

 <div class="row">
      <nav aria-label="...">
  <ul class="pagination pagination-lg">
     <?php
$_smarty_tpl->tpl_vars['index1'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['index1']->step = 1;$_smarty_tpl->tpl_vars['index1']->total = (int) ceil(($_smarty_tpl->tpl_vars['index1']->step > 0 ? $_smarty_tpl->tpl_vars['nb_total_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_total_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['index1']->step));
if ($_smarty_tpl->tpl_vars['index1']->total > 0) {
for ($_smarty_tpl->tpl_vars['index1']->value = 1, $_smarty_tpl->tpl_vars['index1']->iteration = 1;$_smarty_tpl->tpl_vars['index1']->iteration <= $_smarty_tpl->tpl_vars['index1']->total;$_smarty_tpl->tpl_vars['index1']->value += $_smarty_tpl->tpl_vars['index1']->step, $_smarty_tpl->tpl_vars['index1']->iteration++) {
$_smarty_tpl->tpl_vars['index1']->first = $_smarty_tpl->tpl_vars['index1']->iteration === 1;$_smarty_tpl->tpl_vars['index1']->last = $_smarty_tpl->tpl_vars['index1']->iteration === $_smarty_tpl->tpl_vars['index1']->total;?>          
    <li class="page-item"><a class="page-link" href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['index1']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index1']->value;?>
</a></li>
    <?php }
}
?>
       </ul>
    </nav>
  </div>
</div>



<?php }
}
