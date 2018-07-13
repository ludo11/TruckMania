<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<?php include_once 'notification.php'; ?>

    <h2>
        <?php echo $foods->getNom_entreprise(); ?>
    </h2>
    
    <?php foreach($cards as $card)?>
    
    <?php { ?>
    
        <div class="card" style="width: 18rem;" id="Cards">
            <img class="card-img-top" src="../images/food-truck-new-york-food-street-food-brooklyn-food-porn-1.gif">
            <div class="card-body">
                <ul>
                    <?php 
                    if($datas['menus'] === 'Pas de menus') { ?>
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
                <a href="/commande/<?php echo $foods->getId(); ?>">Commander</a>
            </div> 
        </div>
    <?php 
    } ?>

<?php include 'footer.php'; ?>
