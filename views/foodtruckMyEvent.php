<?php require 'layout.php'; ?>
<?php include 'header.php'; ?>

  <?php // var_dump($datas)?>
   
<?php // foreach ($datas as $result) ?>
  
<script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus'),
}) ; 
    
    
    
</script>
       <?php // var_dump($event);?>
<section><?php // $count = 0;?>
    
 <?php // foreach ($datas as $result) 
    
//   {  $count++;
          for($i = 0; $i<count($event) ;$i++){
//               var_dump($i);
 ?>
   
    <?php // var_dump($event); ?>
   <?php // var_dump($food); ?>
    
   <h4>Nom de l'evenement:<strong> <?php echo $event[$i]->getNom_event(); ?> </strong></h4>

   ville : <?php echo $event[$i]->getVilles_nom_villes() ?><br>
         
   Status : <?php if($info[$i]->getRole() == 0){  
                echo '<span style="color:red" > En Attente </span>';
                } else {
                    echo '<span style="color:green"> Valider par le pro </span>'; }
                    ?><br> 

 
         <?php     } ?>
                    
                    
                    
                 

</section>

<?php include 'footer.php'; 