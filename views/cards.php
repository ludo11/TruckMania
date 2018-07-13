<?php include 'layout.php'; ?>
<?php include 'header.php'; ?>
<br><br>
    <h2>Ma carte </h2>
<?php foreach($cards as $card) ?>
<?php { ?>
    <div class="card" style="width: 18rem;" id="listeCards">
        <img class="card-img-top" src="../images/food-truck-new-york-food-street-food-brooklyn-food-porn-1.gif" alt="food">
            <div class="card-body">
                <ul>
                    <?php 
                    if($datas['menus'] === 'Pas de menus')
                    { ?>
                        <li class="list-group-item"><?php echo $datas['menus']; ?></li>
                    <?php } 
                    if($datas['menus'] !== 'Pas de menus')
                    {
                        foreach($menus as $menu)
                        { ?>
                            <li class="list-group-item"><a href="/menu/<?php echo $menu->getId(); ?>"><?php echo $menu->getNom_menu(); ?></a></li>                                                                                                                                                                               
                    <?php }
                    } ?>
                </ul>
            </div>  
        <div class="card-body">
            <a href="/creer-un-menu/<?php echo $card->getId(); ?>" class="card-link">Créer un menu</a>
        </div>
    </div>
<?php 
} ?>

        <?php include 'footer.php'; ?>
 
