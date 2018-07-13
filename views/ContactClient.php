<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>

<div class="content">
    <div id="menupm">

        <ul>

            <li><a href="/ContactClient/" >Nouveau message</a> </li>
            <li><a href="/espace-client/messages/<?php echo $_SESSION['id']; ?>">Retour</a> </li>
            <li> <a href="/espace-client/profile">Accueil</a> </li>
        </ul>
    </div>   
    <form action="/contact/create-message/" method="post">
        Veuillez remplir ce formulaire pour envoyer le message.<br />



        <label for="title">Titre</label><input type="text"  id="title" name="title" /><br />
        <?php echo $id ?>
        <input type="hidden" name="user2" value="<?php echo $id ?>" /><br />
        <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"></textarea><br />
        <input type="submit" value="Envoyer" />
    </form>
</div>   





<table class="messages_table">


