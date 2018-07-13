<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<?php include_once 'notification.php'; ?>


<h3>Espace Administration</h3>


<a href="/espace-admin/messages/<?php echo $_SESSION['id_admin'];?>">Mes messages</a><br />
   <br>
<div class="alert alert-primary" role="alert">
   <a href="/administration/administration-client" class="alert-link">Administration Client</a>
</div>
<br>
<div class="alert alert-primary" role="alert">
   <a href="/administration/administration-foodtruck" class="alert-link">Administration FoodTruck</a>
</div>
<br>
<div class="alert alert-primary" role="alert">
   <a href="/administration/administration-evenement" class="alert-link">Administration Evenement</a>
</div>
<br>
<div class="alert alert-primary" role="alert">
   <a href="#" class="alert-link">Administration Commande</a>
</div>
<?php // echo var_dump($_SESSION['id_admin']); ?>



<footer>
<?php include 'footer.php'; ?>
</footer>


