<?php require 'layout.php'; ?>
<?php include 'header.php'; ?>
<div>
       <h3>Ajouter une carte</h3>
       <br><?php echo var_dump($datas); ?>
    <div class="form-group">
        <form method="POST" action="/ajouter-une-carte/<?php echo $datas['id_theme'] ?>">
            <p>
                <label for='price' class='form-text text-muted'>Spécialité</label>
                <a href='' name='themes'><?php echo $themes->getNom_Thematiques(); ?></a>
            </p>
            <p>
                <label for='name' class='form-text text-muted'>Nom de la carte</label>
                <input type='text' name='name' class='form-control'>
                <input type='submit' name='Space' class='btn btn-warning' value='Envoyer'>
            </p>
        </form>
    </div>
</div>
        <?php include 'footer.php'; ?>


