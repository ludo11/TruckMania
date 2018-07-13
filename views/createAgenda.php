<?php include 'layout.php'; ?>
<?php include 'header.php'; ?>



<section>
  

        
        <h4>Votre agenda</h4>

        
        
        <table class="table table-bordered table-dark">

  <tbody>
    <tr>
      <th scope="row">Jours</th>
      <?php for ($i = 0; $i < count($jours); $i++) { ?><?php ?>
      <td><?php echo $jours[$i]->getNom_jour(); ?></td>
       <?php } ?>
    </tr>

         <tr> 
      <th scope="row">Ville</th>
      <!--Afficher les villes par apport au jour correspondand!-->
          <?php for ($i = 0; $i < count($perso); $i++) { 
            if($perso[$i]->getJours()== 'lundi'){
                $lundi = $perso[$i]->getVille() ; 
             }
                if($perso[$i]->getJours()== 'mardi'){
                    $mardi = $perso[$i]->getVille() ;
                }  
                    if($perso[$i]->getJours()== 'mercredi'){
                    $mercredi = $perso[$i]->getVille() ;
                    }  
                        if($perso[$i]->getJours()== 'jeudi'){
                        $jeudi = $perso[$i]->getVille() ;
                        }   
                            if($perso[$i]->getJours()== 'vendredi'){
                            $vendredi = $perso[$i]->getVille() ;
                            }
                                if($perso[$i]->getJours()== 'samedi'){
                                    $samedi = $perso[$i]->getVille() ;
                                }
                                if($perso[$i]->getJours()== 'dimanche'){
                                $dimanche = $perso[$i]->getVille() ;
                                }   ?>
                    
     
         <?php } ?>
          
      <td>
          <?php if (!empty($lundi)){
                echo $lundi  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
     <td>
         <?php if (!empty($mardi)){
                echo $mardi  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
      <td>
        <?php if (!empty($mercredi)){
                echo $mercredi  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
      <td>
          <?php if (!empty($jeudi)){
                echo $jeudi  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
     <td>
        <?php if (!empty($vendredi)){
                echo $vendredi  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
      <td>
        <?php if (!empty($samedi)){
                echo $samedi  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
      <td>
        <?php if (!empty($dimanche)){
                echo $dimanche  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>

    </tr>
    <tr>
       
      <th scope="row">Horaire</th>
       <?php for ($i = 0; $i < count($perso); $i++) { 
            if($perso[$i]->getJours()== 'lundi'){
                $lundiH = $perso[$i]->getHoraires() ; 
             }
                if($perso[$i]->getJours()== 'mardi'){
                    $mardiH = $perso[$i]->getHoraires() ;
                }  
                    if($perso[$i]->getJours()== 'mercredi'){
                    $mercrediH = $perso[$i]->getHoraires() ;
                    }  
                        if($perso[$i]->getJours()== 'jeudi'){
                        $jeudiH = $perso[$i]->getHoraires() ;
                        }   
                            if($perso[$i]->getJours()== 'vendredi'){
                            $vendrediH = $perso[$i]->getHoraires() ;
                            }
                                if($perso[$i]->getJours()== 'samedi'){
                                    $samediH = $perso[$i]->getHoraires() ;
                                }
                                if($perso[$i]->getJours()== 'dimanche'){
                                $dimancheH = $perso[$i]->getHoraires() ;
                                }   ?>
                    
     
         <?php } ?>
      
          <td>
          <?php if (!empty($lundiH)){
                echo $lundiH  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
     <td>
         <?php if (!empty($mardiH)){
                echo $mardiH  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
      <td>
        <?php if (!empty($mercrediH)){
                echo $mercrediH  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
      <td>
          <?php if (!empty($jeudiH)){
                echo $jeudiH  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
     <td>
        <?php if (!empty($vendrediH)){
                echo $vendrediH  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
      <td>
        <?php if (!empty($samediH)){
                echo $samediH  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
      <td>
        <?php if (!empty($dimancheH)){
                echo $dimancheH  ;
               } else {
                   echo '<span style="color:red" >Fermer'; 
               } ?>
     </td>
      
     
    </tr>  
     <tr>
       
        
  </tbody>
</table>
         <br> <br>
         <artcile>
        <h4>Créer votre agenda</h4>
        <p>
        <form method="POST" action="/foodtruck/valider-agenda/">
            <p>
                <label for='eventName'>Jour de la semaine</label>
                <select id="monselect" name="jour">
                    <?php for ($i = 0; $i < count($jours); $i++) { ?><?php ?>
                        <?php // echo var_dump($jours); ?>

                        <option value="<?php echo $jours[$i]->getNom_jour(); ?>"><?php echo $jours[$i]->getNom_jour(); ?></option> 
                        <?php // echo var_dump($jours[$i]->getNom_jour());  ?>
                    <?php } ?>
                </select>
            <p>
                <label for='jours'>horaire(midi,soir,toute la journéé)</label>

                <select id="monselect" name="horaire">
                    <option value="10h-14h">10h-14h</option> 
                    <option value="17-22h">17-22h</option> 
                    <option value="midi et soir">midi et soir</option>
                    <option value="midi">midi</option>
                    <option value="soir">soir</option>
                   
                </select>
            </p>
            <p>
                <input type='hidden' name='id' class='pass_word' value="<?php echo $_SESSION['id'] ?>">
            </p>
            <p>
            <div class="ui-widget">  
                <label for="birds">Ville ou se déroule évenement: </label>
                <input type="text" id="pro"  class='business_name' name="ville">
            </div>
            <!--        <label for='Villes_nom_villes'>Ville</label>
                    <input type='text' name='Villes_nom_villes' class='ville'>-->
            </p>
            <p>
                <input type='hidden' name='role' class='pass_word' >
            </p>

            <p>
            <p>
                <input type='submit' name='Space' class='space-submit' value='Envoyer'>
            </p>
        </form>
        </p>
        </artcile>   
       
</section>
<?php include 'footer.php'; ?>