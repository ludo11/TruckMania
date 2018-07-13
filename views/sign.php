<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
 
  
	<!-- Custom styles -->
     <br>   	
<section> 
    <br>
<h3 class="h3">Inscription Foodtruck</h3>
 <br> 
<div class="form-group">
<div class="form-inscri">
<form method="POST" action="/inscription-foodtruck">
    <p>
        <label for='businessName'>Nom de l'entreprise</label>
        <input type='text' name='businessName' class='form-control'>
    </p>
    <p>
        <label for='name'>Nom</label>
        <input type='text' name='name' class='form-control'>
    </p>
    <p>
        <label for='firstName'>Prénom</label>
        <input type='text' name='firstName' class='form-control'>
    </p>
    <p>
        <label for='password'>Mot de passe</label>
        <input type='password' name='password' class='form-control'>
    </p>
    <p>
        <label for='verifPassword'>Vérifier mot de passe</label>
        <input type='password' name='verifPassword' class='form-control'>
    </p>
    <p>
        <label for='email'>E-mail</label>
        <input type='email' name='email' class='form-control'>
    </p>
    <p>
        <label for='tel'>Numéro de téléphone</label>
        <input type='tel' name='tel' class='form-control'>
    </p>
    <p>
        <label for='siretNumber'>Numéro de siret</label>
        <input type='text' name='siretNumber' class='form-control'>
    </p>
    <p>
        <label for='address'>Adresse</label>
        <input type='text' name='address' class='form-control'>
    </p>
    <p>
        <div class="ui-widget">  
            <label for="birds">Votre ville: </label>
            <input type="text" id="pro" name='ville' class='form-control'>
           
        </div>
    </p>
    <p>
        <input type='submit' name='Space' class=' btn-primary' value='Envoyer'>
    </p>
    
</form>
</div></div>
    </div>
</section>

<?php include 'footer.php'; ?>

<?php 
