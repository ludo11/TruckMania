<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<br><br><br><br>
<br>Detail Evenement <br>


 <br>Nom evenement :    
<input type="text" name="user" id="author" value="<?php echo $detail->getNom_event(); ?>" disabled="disabled"/>
 <br>Email : 
<input type="text" name="user" id="author" value="<?php echo $detail->getDate_event(); ?>" disabled="disabled"/>
 <br>Telephone : 
<input type="text" name="user" id="author" value="<?php echo $detail->getAdresse(); ?>" disabled="disabled"/>
 
 <br>Ville : 
<input type="text" name="user" id="author" value="<?php echo $detail->getVilles_nom_villes(); ?>" disabled="disabled"/>
<br>Role : 
<input type="text" name="user" id="author" value="<?php echo $detail->getRole(); ?>" disabled="disabled"/>
<!--<input type="submit" id="submit"/>-->
<br>
Statut: <?php if($detail->getRole() == 0){  
                echo '<span style="color:red" > En Attente </span>';
                } else {
                    echo '<span style="color:green"> Valider  </span>'; }
//                    ?>

<form method="POST" action="/administration-infoEvent-suppression/<?php echo $detail->getId(); ?>">
 <button type="submit" class="btn btn-primary btn-lg active">Supprimer evenement</button>
</form>

    
<form method="POST" action="/administration-infoEvent-validation/">
    <input type="hidden" name="id" id="author" value="<?php echo $detail->getId() ?>"/>

<input type="hidden" name="role" id="author" value="1" />
 <button type="submit" class="btn btn-primary btn-lg active">Valider evenement</button>

</form>



<footer>
<?php include 'footer.php'; ?>
</footer>

