<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>

<br>Liste des clients  </h3><br>
<?php // echo var_dump($datas) ?>
<?php foreach($clients as $liste) { ?>

<form method="POST" action="/administration-infoClient/<?php echo $liste->getId(); ?>">
   
 
  
<input type="text" name="user" id="author" value="<?php echo $liste->getPseudo(); ?>" disabled="disabled"/>


 <button type="submit" class="btn btn-primary mb-2">Detail</button>
<!--<input type="submit" id="submit"/>-->

</form>
<?php }
