<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>

<?php include_once 'notification.php'; ?>



<br><br>
<a href="/espace-foodtruck/messages/<?php echo $_SESSION['id'];?>">Mes messages</a><br />
<section>
        <article>
            <h4>Infos Persos: </h4>
            <p>
                Nom de l'entreprise: <?php echo $_SESSION['nom_entreprise']; ?><br>
                Nom: <?php echo $_SESSION['nom']; ?><br>
                Prénom: <?php echo $_SESSION['prenom']; ?><br>
                E-mail: <?php echo $_SESSION['email']; ?><br>
                Adresse: <?php echo $_SESSION['adresse']; ?><br>
                Numéro de téléphone: <?php echo $_SESSION['tel']; ?><br>
                Numéro de siret: <?php echo $_SESSION['n_siret']; ?>
            </p>
        </artcile>    
    </section>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="encadrement">
            
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 class="card">Mes positionement</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Voir positionement en attente</h6>
                  <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                  <a href="/foodtruck-mes-evenements/<?php echo $_SESSION['id']?>" aria-pressed="true">Mes demandes de positionnement evenement</a>
                </div>
            
            
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                    <h5 class="card">Mes positionement</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Voir positionement en attente</h6>
            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="/creer-une-carte/<?php echo $theme->getId_theme();?>">Ajouter une carte</a>  </div>
                </div>
           
            
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                    <h5 class="card">Mon agenda</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Voir positionement en attente</h6>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="/agenda-foodtruck/<?php echo ($_SESSION['id']) ;?>">Votre agenda</a>
                    </div>
                </div>
            
        </div> 
    </div>
</div>

<?php // echo var_dump($_SESSION['id']) ;?>
<?php 
    if(!empty($events))
    {
        foreach($events as $event)
        { ?>
            <article>
                <ul>
                    <li><?php echo $event->getNoms_events(); ?></li>
                    <li><?php echo $event->getJours_events(); ?></li>
                </ul>
            </article>
        <?php } ?>
    <?php } ?>
    <?php // $themes = $theme->getThematiques_nom_thematiques(); ?>

       
    


<footer>
<?php include 'footer.php'; ?>
</footer>

