


<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<br><br>
<h3 class="h3">Espace Foodtruck</h3>
<br><br>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card" style="width: 18rem;" id="inscriptionClient">
                    <div class="card-body">
                      <h5 class="card-text">Inscription</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Vous n'êtes pas encore inscrit ? </h6>
                      <p class="card-text">Rejoignez nous et profitez des plats de tous nos Foodtrucks !.</p>
                     
                    </div>
                 
                <form method="POST" action="/espace-foodtruck/signUp">
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
               
                <form method="POST" action="/espace-foodtruck/login">
                    <input id="form-connect-client" type='submit' name='logIn'  class="btn btn-secondary btn-sm" value='Connexion'>
                </form> 
                 </div>
            </div>
        </div>  
    </div>

   
<br>
<!--<a href="/espace-foodtruck/signUp" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Inscription</a>
<a href="/espace-foodtruck/login" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Login</a>-->



<footer>
<?php include 'footer.php'; ?>
</footer>