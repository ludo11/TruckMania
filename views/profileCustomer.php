<?php require 'layout.php'; ?>
 <?php include 'header.php'; ?>
    <?php include_once 'notification.php'; ?>
<div>
   
    <div class="container">

        <br>
        <div class="row">
            <div class 
        <h3>Mon Profil Client</h3>
                <br>
        <section>
            <div class="form-inscri">
                <h4>Infos Persos: </h4>
                <p>
                    Pseudo: <?php echo $_SESSION['pseudo']; ?><br>
                    E-mail: <?php echo $_SESSION['email']; ?><br>
                    Numéro de téléphone: <?php echo $_SESSION['tel']; ?><br>
                    Adresse: <?php echo $_SESSION['adresse']; ?><br>
                    Ville: <?php echo $_SESSION['Villes_nom_villes']; ?><br>
                </p>
            
            <a href="/modifier-info-client/<?php echo $_SESSION['idC']; ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Modifier vos coordonnées</a>
        </div>
        </section>
    </div>
        </div>
</div>
    
<?php include 'footer.php'; ?>
    


