<?php require 'layout.php'; ?>
<?php include 'header.php'; ?>
  
 
<br><br>
	<!-- Custom styles -->
	
        <section>
<h3 class="h3">Inscription Profesionnel de l'événement</h3>
<br><br>
<div class="form-group">
<form method="POST" action="/inscription-pros">
    <div class="form-inscri">
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
<!--        <label id="pro" for='ville'>Ville</label>
        <input type='text' id="ville" name='ville' class='address'>-->
    </p>

        <div class="ui-widget">  
            <label for="birds">Votre ville: </label>
            <input type="text" id="pro" name="ville" class='siret_number'>
           
        </div>
  
    <input type='submit' name='Space' class='space-submit' value='Envoyer'>
   
    </div>
</form>

</div>
  

 

 
</section>

<?php require 'footer.php'; ?>



