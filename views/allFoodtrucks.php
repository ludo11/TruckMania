<?php require 'layout.php'; ?>
<?php include 'header.php'; ?>
<?php include_once 'notification.php'; ?>  
<br><br>
<h4>Tous nos Food-trucks</h4>
<?php  var_dump($datas); ?>
<div class="container-fluid">
    <div class="row">
        <?php //foreach($menus as $menu) 
        //{ ?>
            <?php foreach($foods as $food)
            { ?>
                <div class="col-lg-4"> 
                <h4><?php echo $food->getNom_entreprise(); ?></h4>
                   <div class="card" style="width: 18rem;" id="listeCards">
                       <img class="card-img-top" src="../images/food-truck-new-york-food-street-food-brooklyn-food-porn-1.gif" alt="">
                       <div class="card-body">
                           <ul>
                               <li class="list-group-item"><a href="">Thèmes : <?php echo $food->getThematiques_nom_thematiques(); ?></a></li>
                           </ul>
                       </div>
                       <a href="/infoFoodTruck/<?php echo $food->getId(); ?>">Voir le détail</a>
                   </div>
               </div> 
            <?php 
            } ?>
        <?php 
        //} ?>
    </div>
</div>
<?php include 'footer.php'; ?>

