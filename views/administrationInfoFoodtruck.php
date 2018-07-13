<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>

<br>Detail Foodtruck <br>
<?php // echo var_dump($datas) ?>
<?php foreach ($detail as $lo) { 

// echo $datas->getPseudo (); ?>
<?php } ?>
 <br>Pseudo :    
<input type="text" name="user" id="author" value="<?php echo $detail->getNom_entreprise(); ?>" disabled="disabled"/>
 <br>Email : 
<input type="text" name="user" id="author" value="<?php echo $detail->getNom(); ?>" disabled="disabled"/>
 <br>Telephone : 
<input type="text" name="user" id="author" value="<?php echo $detail->getPrenom(); ?>" disabled="disabled"/>
 <br>Adresse : 
<input type="text" name="user" id="author" value="<?php echo $detail->getEmail(); ?>" disabled="disabled"/>
 <br>Ville : 
<input type="text" name="user" id="author" value="<?php echo $detail->getTel(); ?>" disabled="disabled"/>
<br>Numéro de siret: 
<input type="text" name="user" id="author" value="<?php echo $detail->getN_siret(); ?>" disabled="disabled"/>
<br>Adresse: 
<input type="text" name="user" id="author" value="<?php echo $detail->getAdresse(); ?>" disabled="disabled"/>
<br>Ville: 
<input type="text" name="user" id="author" value="<?php echo $detail->getVilles_nom_villes(); ?>" disabled="disabled"/>
<br>Thématique: 
<input type="text" name="user" id="author" value="<?php echo $detail->getThematiques_nom_thematiques(); ?>" disabled="disabled"/>
<br>Carte: 
<input type="text" name="user" id="author" value="<?php echo $detail->getCarte_nom_carte(); ?>" disabled="disabled"/>
<!--<input type="submit" id="submit"/>-->
<br>
<form method="POST" action="/administration-infoFoodtruck-suppression/<?php echo $detail->getId(); ?>">
<br><br>
 <button type="submit" class="btn btn-primary mb-2">Supprimer client</button>

</form>


<footer>
<?php include 'footer.php'; ?>
</footer>
