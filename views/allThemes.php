    <?php include 'layout.php'; ?>
        <?php include 'header.php'; ?>
    
<div>
    <br><br>
    <h3>Choisir une spécialité</h3>
    <br>
    <?php if(!empty($themes))
        { ?>  
            <?php foreach($themes as $theme)
            { ?>
                <br><a href='/creer-une-carte/<?php echo $theme->getId_theme(); ?>' id='<?php echo $theme->getId_theme(); ?>'><?php echo $theme->getNom_Thematiques(); ?></a>
            <?php } ?>
        <?php } ?>    
</div>
 
        <?php include 'footer.php'; ?>
  