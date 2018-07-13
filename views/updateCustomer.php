<?php require 'layout.php'; ?>
<?php include 'header.php'; ?>
<div>
    <h3>Mise à jour de vos infos:</h3>
    <br>
    <div class="form-group">
        <form method="POST" action="/info-client/update">
            <input type='hidden' name='id' class='form-control' value="<?php echo $infoClient->getId() ?>">
                <label for='email' class='form-text text-muted'>E-mail</label>
                <input type='email' name='email' class='form-control' value="<?php echo $infoClient->getEmail() ?>">
            </p>
            <p>
                <label for='tel' class='form-text text-muted'>Numéro de téléphone</label>
                <input type='tel' name='tel' class='form-control' value="<?php echo $infoClient->getTel() ?>">
            </p>
            <p>
                <label for='address' class='form-text text-muted'>Adresse</label>
                <input type='text' name='address' class='form-control' value="<?php echo $infoClient->getAdresse() ?>">
            </p>
          
            <div class="ui-widget">  
                <label for="birds">Votre ville: </label>
                <input type="text" id="pro" class='form-control' name="city" >
            </div>
            <br>
         
            <input type='submit' name='Space' class='space-submit' value='Envoyer'>

        </form>
    </div>
</div>

        <?php include 'footer.php'; ?>
  
