
<?php require 'layout.php'; ?>
 <?php include 'header.php'; ?>
<img src="/images/banniere.png" >
<h1 id="titreResultSearch">Vos Food trucks pour <?php echo $villeFood[0]->getVilles_nom_villes(); ?></h1>

  <?php//      echo var_dump($datas);  ?>
<div class="container" id="backSearch">
            
                <div class="row" id="searchVille" >
<?php
//                  var_dump($datas);

foreach ($villeFood as $food) {
    ?>
<div class="card" style="width: 20rem;" id="listeFoodTruck">
        <img class="card-img-top" src="../images/food-truck-new-york-food-street-food-brooklyn-food-porn-1.gif" alt="Card image cap">
        <div class="card-body">
            <h5 class="card">
    <?php echo $food->getNom_entreprise ();  ?></h5>
            <p class="card-text"></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo $food->getNom(); ?> euros</li>
            <li class="list-group-item"><?php echo $food->getVilles_nom_villes(); ?></li>
           
        </ul>
        <div class="card-body">
            <a href="/infoFoodTruck/<?php echo $food->getId(); ?>" class="card-link"  id="voirFoodtruck">Voir le foodtruck</a>
            
        </div>
    </div>
 <?php } ?>
</div>
</div>

   






<footer>
<?php include 'footer.php'; ?>
</footer>
