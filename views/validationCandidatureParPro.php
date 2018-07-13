<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo var_dump($datas);
?>
<section>
 <?php foreach ($candidature as $value) {?>
        <h4>Candidature: </h4>
    <p> 
        Nom du foodtruck: <?php echo $value->getFoodtrucks_id()?><br>
            Statut: <?php if($value->getRole() == 0){  
                echo '<span style="color:red" > En Attente de validation</span>';
                } else {
                    echo '<span style="color:green"> Valider  </span>'; }
//                    ?>
            <form method="POST" action="/espace-pro-validation-candidature/">
    <input type="hidden" name="id" id="author" value="<?php echo $value->getId()  ?>"/>
 <input type="hidden" name="Events_id" id="author" value="<?php echo $value->getEvents_id() ?>"/>
<input type="hidden" name="role" id="author" value="1" />
 <button type="submit" class="btn btn-primary btn-lg active">Valider Foodtruck</button>

</form>
    <br>
          
           
        </p>
 <?php } ?>
</section>
<footer>
        <?php include 'footer.php'; ?>
    </footer>
