<?php require 'layout.php'; ?>
<?php include 'header.php'; ?>
<div>
    <br>
    <h3 class="h3">Inscription Client</h3>
    <br>
    <div class="form-group">
        <form method="POST" action="/inscription-client">
            <div class="form-inscri">
                <p>
                    <label for='pseudo' class='form-text text-muted'>Pseudo</label>
                    <input type='text' name='pseudo' class='form-control'>
                </p>
                <p>
                    <label for='password' class='form-text text-muted'>Password</label>
                    <input type='password' name='password' class='form-control'>
                </p>
                <p>
                    <label for='verifPassword' class='form-text text-muted'>Vérifier mot de passe</label>
                    <input type='password' name='verifPassword' class='form-control'>
                </p>
                <p>
                    <label for='email' class='form-text text-muted'>E-mail</label>
                    <input type='email' name='email' class='form-control'>
                </p>
                <p>
                    <label for='tel' class='form-text text-muted'>Numéro de téléphone</label>
                    <input type='tel' name='tel' class='form-control'>
                </p>
                <p>
                    <label for='address' class='form-text text-muted'>Adresse</label>
                    <input type='text' name='address' class='form-control'>
                </p>

                <div class="ui-widget">  
                    <label for="birds">Votre ville: </label>
                    <input type="text" id="pro" class='form-control' name="city">
                </div>
            
            <br>
         
                <input type='submit' name='Space' class='space-submit' value='Envoyer'>
            </div>
        </form>
    </div>
</div>

        <?php include 'footer.php'; ?>
  
