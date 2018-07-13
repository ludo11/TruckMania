<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>

<br>Liste des Foodtrucks  </h3><br>
<?php // echo var_dump($datas) ?>
<?php foreach($foodtruck as $liste) { ?>

   
    
   
<form method="POST" action="/administration-infoFoodtruck/<?php echo $liste->getId(); ?>">
   
 
    <br>Nom Foodtruck : 
<input type="text" name="user" id="author" value="<?php echo $liste->getnom_entreprise(); ?>" disabled="disabled"/>


 <button type="submit" class="btn btn-primary mb-2">Detail</button>
<!--<input type="submit" id="submit"/>-->

</form>
 <?php } ?>

