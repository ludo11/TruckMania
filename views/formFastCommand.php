<?php require 'layout.php'; ?>
<?php include 'header.php'; ?>
<div>
    <br><br> 
    <h3 class="h3">Résumer de votre commande</h3>
    <br>
    <?php //var_dump($datas["foods"]); ?>  
        <div class="container-fluid">
        
            <div class="row">  
                <div class="card-affi">
                    <div class="card" style="width: 25rem;" id="Cards">
                    <img class="card-img-top" src="../images/food-truck-new-york-food-street-food-brooklyn-food-porn-1.gif">
                        <div class="card-body">
                            <ul>
                                <?php foreach($menus as $menu) ?>
                                <?php 
                                { ?>
                                    <li><?= $menu->getNom_menu(); ?></li>
                                    <li><?= $menu->getDetail_menu(); ?></li>
                                    <li><?= $menu->getPrix_menu(); ?> euros</li> 
                                <?php
                                } ?>
                            </ul>
                            Un menu de <?= $foods->getNom_entreprise(); ?>
                            <br><br><br>
                            <a href="/ajouter-une-commande/<?= $foods->getId(); ?>">Valider votre commande</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
<footer>
    <?php include 'footer.php'; ?>
</footer>