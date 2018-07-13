<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<div>
    <br>
    <h3 class="h3">Espace Client</h3>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card" style="width: 18rem;" id="inscriptionClient">
                    <div class="card-body">
                      <h5 class="card-text">Inscription</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Vous n'êtes pas encore inscrit ? </h6>
                      <p class="card-text">Rejoignez nous et profitez des plats de tous nos Foodtrucks !.</p>
                     
                    </div>
                 
                <form method="POST" action="/espace-client/signUp">
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
               
                <form method="POST" action="/espace-client/login">
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

   
        <?php include 'footer.php'; ?>



