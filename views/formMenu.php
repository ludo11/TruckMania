   <?php require('layout.php'); ?>
        <?php include 'header.php'; ?>

<div>
    <br><br>
    <h3>Ajouter un menu</h3>
    <br>
    <div class="form-group">
        <form method="POST" action="/ajouter-un-menu/<?php echo $cards->getId(); ?>">
            <p>
                <h2 name='cardName'><?php echo $cards->getNom_carte(); ?></h2>
            </p>
            <p>
                <label for='nameMenu' class='form-text text-muted'>Nom du menu</label>
                <input type='text' name='nameMenu' class='form-control'>
            </p>
                <label for='detail' class='form-text text-muted'>Detail</label>
                <input type='text' name='detail' class='form-control'>
            <p>
            </p>
                <input type='hidden' name='theme' class='form-control' value='<?php echo $cards->getThematiques_nom_thematiques(); ?>'>
            <p>
            </p>
                <label for='price' class='form-text text-muted'>Prix</label>
                <input type='text' name='price' class='form-control'>
            <p>
                <input type='submit' name='Space' class='btn btn-warning' value='Envoyer'>
            </p>
        </form>
    </div>
</div>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>