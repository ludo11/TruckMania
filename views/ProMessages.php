<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<?php include_once 'notification.php'; ?>

<div class="content">
       
        <div id="menupm">
       
           <?php $conteu = 1;for($i = 0; $i < count($datas['message']); $i++){
//     var_dump(count($datas['message']));
               if($datas['message'][$i]->getLu()!= 1){
                   
                    $count= $conteu++;
           
              
                 
               }

           }?>
            <ul> 
                <li><a href="/espace-pros/messages/<?php echo $_SESSION['id_pro'];?>" <?php if($count>0):?> class="notification" data-notification="<?php echo $count;?>" <?php endif;?>>Messages</a> </li>
               <li> <a href="/espace-pros/profile">Accueil</a> </li> 
                <li><a href="/contact/">Nouveau Message</a> </li></ul>
        </div>
        <?php // var_dump($datas);
           ?>
        
        <?php 
        $i=0; 
        for($i = 0 ; $i<count($message); $i++){
           
         
//     var_dump($message[$i]->getUser1());
        ?>
    <div id="messages">
    <div class="message" style="background:#a7a7a7;">
    
    <div class="read"><a href="/espace-pros/voir-message/<?php echo $message[$i]->getId() ?>">Voir</a></div>
    <tr>
    	<th class="title_cell">Titre :<?php echo $message[$i]->getTitle() ?></th>
        <th class="author">expéditeur: <?php echo $message[$i]->getUser1() ?></th>
        <th>Date d'envoi: <?php echo $message[$i]->getTimestamp() ?></th>
    </tr>
    
</div>
    </div>
      <?php }
         ?>  

</div>
<?php include 'footer.php'; ?>
   