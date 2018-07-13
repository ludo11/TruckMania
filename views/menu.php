     <?php require('layout.php'); ?>
        <?php include 'header.php'; ?>
        

    <div class="card" style="width: 18rem;" id="listeCards">
        <img class="card-img-top" src="../images/food-truck-new-york-food-street-food-brooklyn-food-porn-1.gif" alt="<?php echo $menu->getNom_menu(); ?>">
        <div class="card-body">
            <ul>
                <li class="list-group-item"><a href="">Details : <?php echo $menu->getDetail_menu(); ?></a></li>
                <li class="list-group-item"><a href="">Prix : <?php echo $menu->getPrix_menu(); ?>$</a></li>
            </ul>
        </div>
        <div class="card-body">
        <?php if(isset($_SESSION['idF'])) 
        { ?> 
            <a href="" class="card-link">Modifier le menu</a>
        <?php 
        } ?>
        <?php if(isset($_SESSION['idC'])) 
        { ?>
            <a href="/commande-rapide/<?php echo $menu->getId(); ?>" class="card-link">Commander</a>
        <?php 
        } ?>
        </div>
    </div>
<footer>
        <?php include 'footer.php'; ?>
    </footer>
