<!-- Page Content -->
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
      <img src="img/{$id}.jpg" class="card-img-top" alt="...">

      <div class="jumbotron">
             {foreach from=$tab_article item=value} 
                   <h1 class="display-4">{$value.titre}</h1>
      <p class="lead">{$value.texte}</p>
 <hr class="my-4">

       {/foreach}  

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
          {foreach from=$tab_article2 item=value} 
       <!-- Flexbox container for aligning the toasts -->
<div aria-live="assertive" aria-atomic="true"  class="d-flex justify-content-center align-items-center" style="min-height: 150px;">

 <!-- Then put toasts within -->
 <div class="toasts" role="alert" aria-live="assertive" aria-atomic="true">
   <div class="toasts-header">

                   <strong class="mr-auto" style="font-size: 30px;">{$value.pseudo}</strong>

   </div>
                     <small style="font-size: 15px;">{$value.email}</small>
   <div class="toasts-body" style="font-size: 20px;">
    {$value.message}
   </div>

 </div>

     </div>

        {/foreach}   
 </div>



 


