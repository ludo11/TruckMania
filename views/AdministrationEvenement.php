<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>

<br>Liste des evenements : </h3><br>
<?php // echo var_dump($datas) ?>
<?php foreach ($event as $liste) { ?>

<form method="POST" action="/administration-infoEvenement/<?php echo $liste->getId(); ?>">
   
 
    <br>Nom de l'evenement :
<input type="text" name="user" id="author" value="<?php echo $liste->getNom_event(); ?>" disabled="disabled"/>
 Statut: <?php if($liste->getRole() == 0){  
                echo '<span style="color:red" > En Attente </span>';
                } else {
                    echo '<span style="color:green"> Valider par admin </span>'; }
//                    ?>

 <button type="submit" class="btn btn-primary btn-lg active">Detail</button>
<!--<input type="submit" id="submit"/>-->

</form>
<?php } ?>










<footer>
<?php include 'footer.php'; ?>
</footer>
<?php 
