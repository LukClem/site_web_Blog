<?php
/* Smarty version 3.1.33, created on 2019-12-18 13:31:26
  from '/opt/lampp/htdocs/tp1/templates/contenu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dfa1c1e2853a9_30719116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b0da392696b75823803668f75b3db3023056cf7' => 
    array (
      0 => '/opt/lampp/htdocs/tp1/templates/contenu.tpl',
      1 => 1576666236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dfa1c1e2853a9_30719116 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
     <div class="row">
     <div class="col-lg-12 text-center">
       <h1 class="mt-5">Mon super blog</h1>
         <br></br>
     </div>
   </div>
     <div class="container">
 <div class="row">
   <div class="col">
   </div>
   <div class="col-10">
      <img src="img/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.jpg" class="card-img-top" alt="...">

      <div class="jumbotron">
             <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_article']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?> 
                   <h1 class="display-4"><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h1>
      <p class="lead"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
 <hr class="my-4">

       <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  

</div> 
   </div>
   <div class="col">
   </div>
 </div>
</div>

        <hr class="my-4">
        
        <div class="container">
 <div class="row justify-content-md-center">
   <div class="col col-lg-4">
     <h2>Commentaires</h2>
   </div>
   <div class="col-md-auto">
   </div>
   <div class="col col-lg-2">
   </div>
 </div>

            
             <div class="container">
 <div class="row">
   <div class="col">
   </div>
   <div class="col-8">
    <form method="post" enctype='multipart/form-data' action="contenu.php">
               <div class="form-group">
                   <input type="text" name="pseudo" class="form-control" required placeholder="Pseudo">
                    </div>
      <div class="form-group">
                   <input type="email" name="email" class="form-control" required placeholder="Email">
                   </div>
      <div class="form-group">
                    <input type="text-area" name="message" class="form-control" required placeholder="Message">
                   <small class="form-text text-muted"></small>
               </div>
               <button type="submit" name="bouton" class="btn btn-primary">Envoyer</button>
           </form>


   </div>
   <div class="col">
   </div>
 </div>
</div>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_article2']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?> 
       <!-- Flexbox container for aligning the toasts -->
<div aria-live="assertive" aria-atomic="true"  class="d-flex justify-content-center align-items-center" style="min-height: 150px;">

 <!-- Then put toasts within -->
 <div class="toasts" role="alert" aria-live="assertive" aria-atomic="true">
   <div class="toasts-header">

                   <strong class="mr-auto" style="font-size: 30px;"><?php echo $_smarty_tpl->tpl_vars['value']->value['pseudo'];?>
</strong>

   </div>
                     <small style="font-size: 15px;"><?php echo $_smarty_tpl->tpl_vars['value']->value['email'];?>
</small>
   <div class="toasts-body" style="font-size: 20px;">
    <?php echo $_smarty_tpl->tpl_vars['value']->value['message'];?>

   </div>

 </div>

     </div>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
 </div>



 


<?php }
}
