
<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<br><br>
<h3 class="h3">Espace Pros</h3>
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card" style="width: 18rem;" id="inscriptionClient">
                    <div class="card-body">
                      <h5 class="card-text">Inscription</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Vous n'êtes pas encore inscrit ? </h6>
                      <p class="card-text">Rejoignez nous et profitez des plats de tous nos Foodtrucks !.</p>
                     
                    </div>
                 
                <form method="POST" action="/espace-Pros/inscription-Pros">
                    <input id="form-inscri-client" type='submit' name='signUp' class="btn btn-secondary btn-sm" value='Inscription'> 
                </form> 
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="width: 18rem;" id="connexionClient">
                    <div class="card-body">
                      <h5 class="card-text">Connexion</h5>
<!--                      <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->
                      <p class="card-text">Connectez vous pour passer commande rapidement !.</p>
                     
                    </div>
               
                <form method="POST" action="/espace-pros/login">
                    <input id="form-connect-client" type='submit' name='logIn'  class="btn btn-secondary btn-sm" value='Connexion'>
                </form> 
                 </div>
            </div>
        </div>  
    </div>
</div>
       
    </div>
    </div>
    </div>

   
<br>
<!--<div class="form-inscri">
<a href="/espace-Pros/inscription-Pros" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Inscription</a>
</div>
<div class="form-inscri">
<a href="/espace-pros/login" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Login</a>
</div>-->


<footer>
<?php include 'footer.php'; ?>
</footer>