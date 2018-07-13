<?php include 'layout.php'; ?>
<?php include 'header.php'; ?>
<br><br>
<div>
    <h3>Choisir le type de commande</h3>
    <br>
    <a href="/commande-hebdo/<?php //echo $food->getId(); ?>">Commande hebdo</a><br>
    <a href="/commande-rapide/<?php echo $datas['food']; ?>">Commande rapide</a>
</div>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>