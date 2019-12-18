 <!-- Page Content -->
  <div class="container">
      <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Mon super blog</h1>
     
      </div>
    </div>

     {if !empty($smatry.session.var)}
         <div class="row">
              <div class="col-12 center-block">
           <div class="alert alert-{$smarty.session.var.result}" role="alert">
           {$smarty.session.var.message}
           </div>
              </div>
         </div>
     {/if}
       
       <div class="row">
       {foreach from=$tab_article item=value}    
    <div class="col-6">
  <div class="card" style="width: 100%;">
  <img src="img/{$value.id}.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <!--On affiche dans chaque balise les informations du tableau contenant les articles et leurs informations-->
    <h5 class="card-title">{$value.titre}</h5>
    <p class="card-text">{$value.texte}</p>
        <a href="#" class="btn btn-secondary">{$value.date_fr}</a>
     <a href="contenu.php?id={$value.id}" class="btn btn-primary">Consulter</a>
    <a href="article.php?id={$value.id}" class="btn btn-primary">Modifier</a>
     <a href="suppression.php?id={$value.id}" class="btn btn-primary">Supprimer</a>
  </div>
</div>
</div>
 {/foreach} 
</div>

 <div class="row">
      <nav aria-label="...">
  <ul class="pagination pagination-lg">
     {for $index1=1 to $nb_total_pages}          
    <li class="page-item"><a class="page-link" href="index.php?p={$index1}">{$index1}</a></li>
    {/for}
       </ul>
    </nav>
  </div>
</div>



