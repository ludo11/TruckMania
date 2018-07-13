<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<br><br><br><br><br>
<div class="row" >
    <?php
//                  
////
    foreach ($event as $liste) {



//  echo var_dump($liste); 
        ?>
        <section>

            <h4><strong>Nom de l'evenement: <?php echo $liste->getNom_event(); ?> </strong></h4>
            <p>

                date: <?php echo $liste->getdate_event() ?><br>
                adresse: <?php echo $liste->getAdresse() ?><br>
                ville: <?php echo $liste->getVilles_nom_villes() ?><br>
                Statut: <?php
                if ($liste->getRole() == 0) {
                    echo '<span style="color:red" > En Attente </span>';
                } else {
                    echo '<span style="color:green"> Valider </span><br>'; ?>
              
                <a href="/espace-pro-candidature/<?php echo $liste->getId() ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Voir les candidatures</a>
                <?php  }if(FALSE) {
                    echo '<h4>------Pas d evenement créer ou en attente</h4>';
                }
?>
                <br>

            </p>
        </section>
    <?php   }
 

    
    ?>


</div>
<footer>
<?php include 'footer.php'; ?>
</footer>



