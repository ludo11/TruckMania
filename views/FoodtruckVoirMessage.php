<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<?php include_once 'notification.php'; ?>
<!--
--><div class="content">
       
        <div id="menupm">
       
           <?php $conteu = 1;for($i = 0; $i < count($datas['message']); $i++){
//     var_dump(count($datas['message']));
               if($datas['message'][$i]->getLu()!= 1){
           
                    $counteur = $conteu++;
              
                 
               }

           }?>
            <ul> 
                <li><a href="/espace-foodtruck/messages/<?php echo $_SESSION['id'];?>">Retour</a> </li>
               <li> <a href="/espace-foodtruck/profil">Accueil</a> </li> </ul>
        </div>
        <?php 
           ?>
        
        <?php 
     
         
        
           
         
    
//        ?>
    <div id="messages">
    <div class="message" style="background:#a7a7a7;">
    
   
    <tr>
   
        <th class="title_cell">Titre :<?php echo $message[0]->getTitle() ?></th></br>
        <th class="author">expéditeur: <?php echo $message[0]->getUser1() ?></th></br>
        <th class="message">message  :<?php echo $message[0]->getMessage() ?></th></br>
        <th>Date d'envoi: <?php echo $message[0]->getTimestamp() ?></th>
    </tr>
      
</div>
    </div>
        
        
<div class="content">
<table class="messages_table">


<!--On affiche le formulaire de reponse-->
</table><br />
 

<section>
    <article>
        <h4>Repondre</h4>
        <p>
            <form method="POST" action="/espace-foodtruck/creation-messsage">
    <p>
       
<input type='hidden' name='id' class='pass_word' value="<?php echo $_SESSION['id'] ?>">
    </p>
    <p>
        <label for='tilte'>Titre</label>
        <input type='text' name='title' class='name'>
    </p>
    
    <p>
        <input type='hidden' name='id' class='pass_word' value="<?php echo $_SESSION['id'] ?>">
    </p>
    
    <p>
        
        <input type='hidden' name='user1' class='name' value="<?php echo $message[0]->getUser1() ?>">
    </p>
    
   
     <p>
        <label for='message'>message</label>
        <input type='text' name='message' class='name'>
    </p>
    
  <input type='hidden' name='lu' class='pass_word' value="0">
    
    
    
        <input type='submit' name='Space' class='space-submit' value='Envoyer'>
    </p>
</form>
        </p>
    </artcile>    
</section>
</div>

      
</div>


