<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>


<div class="row" >
<?php
//                  
////
foreach ($event as $liste) {
    if ($liste->getRole() == 1) {?>
<section>
    
    <h4>Nom de l'evenement:<strong> <?php echo $liste->getNom_event()  ; ?> </strong></h4>
        <p>
            <?php // echo var_dump($liste->getId()); ?>
            date: <?php echo $liste->getdate_event() ?><br>
           adresse: <?php echo $liste->getAdresse() ?><br>
            ville: <?php echo $liste->getVilles_nom_villes() ?><br>
            Statut: <?php // if($liste->getRole() == 0){  
                echo '<span style="color:red" > En Attente </span>';
                } else {
                    echo '<span style="color:green"> Valider par admin </span>'; }
                    ?><br>
                       <form method="POST" action="/se-positionner-event">
            <p>
                
                <input type='hidden' name='Events_id' class='form-control' value="<?php echo $liste->getId() ?>">
            </p>
            <p>
               
                <input type='hidden' name='Foodtrucks_id' class='form-control' value="<?php echo $_SESSION['id'] ?>">
            </p>
            <p>
                <input type="submit" name="profile" class='btn btn-warning' value='Candidaté a cette evenement'>
            </p>
        </form>
           
        </p>
        <?php // } ?>
        <br><br>
<?php } ?>










<footer>
<?php include 'footer.php'; ?>
</footer>
<?php 