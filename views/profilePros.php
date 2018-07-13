<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<?php include_once 'notification.php'; ?>

<a href="/espace-pros/messages/<?php echo $_SESSION['id_pro'];?>">Mes messages</a><br />

<h3>Mon Profil Pros</h3>
    <!--<a href="/espace-Pros/evenement/<?php // echo $_SESSION['id']?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Mes evenement</a>-->
<a href="/espace-pros/messages/<?php echo $_SESSION['id_pro'];?>">Mes messages</a><br />
<br>
 <a class='space-submit' href="/espace-Pros-evenement/<?php echo $_SESSION['id_pro']?>" role="button">Mes evenement</a>
 <br><br>
 <div class="row" >
<section>
    <article>
        <h4>Infos Persos: </h4>
        <p>
            Nom de l'entreprise: <?php echo $_SESSION['nom_entreprise']?><br>
            Nom: <?php echo $_SESSION['nom']?><br>
          
            E-mail: <?php echo $_SESSION['email']?><br>
            ville: <?php echo $_SESSION['Villes_nom_villes']?><br>
            Numéro de téléphone: <?php echo $_SESSION['tel']?><br>
            Numéro de siret: <?php echo $_SESSION['n_siret']?><br>
        </p>
    </artcile>    
</section>

<section>
    <article>
        <h4>Créer evenement (soumis a validation par administrateur)</h4>
        <p>
            <form method="POST" action="/espace-pros/creation-evenement">
    <p>
        <label for='eventName'>Nom de l'evenement</label>
        <input type='text' name='nom_event' class='business_name'>
    </p>
    <p>
        <label for='date_event'>Date</label>
        <input type='date' name='date_event' class='name'>
    </p>
    
     <p>
        <label for='adresse'>Adresse</label>
        <input type='text' name='adresse' class='name'>
    </p>
  
    <p>
        <input type='hidden' name='Pros_id' class='pass_word' value="<?php echo $_SESSION['id_pro'] ?>">
    </p>
    <?php // echo $_SESSION['id_pro'] ?>
    <p>
        <div class="ui-widget">  
                <label for="birds">Ville ou se déroule évenement: </label>
                <input type="text" id="pro" name='Villes_nom_villes' class='form-control' name="city">
            </div>
<!--        <label for='Villes_nom_villes'>Ville</label>
        <input type='text' name='Villes_nom_villes' class='ville'>-->
    </p>
    <p>
        <input type='hidden' name='role' class='pass_word' >
    </p>

    <p>
   <p>
        <input type='submit' name='Space' class='space-submit' value='Envoyer'>
    </p>
</form>
        </p>
    </artcile>    
</section>

</div>


<footer>
<?php include 'footer.php'; ?>
</footer>