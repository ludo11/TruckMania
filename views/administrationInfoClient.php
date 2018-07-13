<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>

<br>Detail client <br>
<?php // echo var_dump($datas) ?>
<?php foreach ($detail as $lo) { 

// echo $datas->getPseudo (); ?>
<?php } ?>
 <br>Pseudo :    
<input type="text" name="user" id="author" value="<?php echo $detail->getPseudo(); ?>" disabled="disabled"/>
 <br>Email : 
<input type="text" name="user" id="author" value="<?php echo $detail->getEmail(); ?>" disabled="disabled"/>
 <br>Telephone : 
<input type="text" name="user" id="author" value="<?php echo $detail->getTel(); ?>" disabled="disabled"/>
 <br>Adresse : 
<input type="text" name="user" id="author" value="<?php echo $detail->getAdresse(); ?>" disabled="disabled"/>
 <br>Ville : 
<input type="text" name="user" id="author" value="<?php echo $detail->getVilles_nom_villes(); ?>" disabled="disabled"/>
<!--<input type="submit" id="submit"/>-->
<br>
<form method="POST" action="/administration-infoClient-suppression/<?php echo $detail->getId(); ?>">
<br><br>
 <button type="submit" class="btn btn-primary btn-lg active">Supprimer client</button>

</form>


<footer>
<?php include 'footer.php'; ?>
</footer>
