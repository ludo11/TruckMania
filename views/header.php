<header>

   <nav id="mainmenu">
       <div class="container">

           <div class="dropdown" id="menu">

               <nav class="navbar navbar-expand-lg navbar  fixed-top" id="menu">
                   <ul class="nav nav-pills" role="menu" aria-labelledby="dLabel"  id="menu">
                       
                       <li><a href="/" class="active">Accueil</a></li>
                       <?php if (empty($_SESSION))
                       { ?>
                       <ul class="nav nav-pills" role="menu" aria-labelledby="dLabel"  id="menu">
                           <li><a href="/espace-client" class="active">Espace Client</a></li>
                           <li><a href="/espace-pros">Espace Pro</a></li>
                           <li><a href="/espace-foodtruck" class="active">Espace FoodTruck</a></li>
                       <?php
                       } ?>

                       <?php if(isset($_SESSION['id']))
                       { ?>
                           <li><a href="/deconnexion">Deconnexion</a></li>
                       <?php
                       } ?>

                       <?php if (isset($_SESSION['idC']))
                       { ?>
                           <li><a href="/espace-client/profil">Mon Profil</a></li>
                           <li><a href="/tous-les-foodtrucks">Nos Foodtrucks</a></li>
                       <?php
                       } ?>

                       <?php if (isset($_SESSION['idF']))
                       { ?>
                           <li><a href="/espace-foodtruck/profil">Mon Profil</a></li>
                           <li><a href="/carte">Carte</a></li>
                           <li><a href="/espace-foodtruck/evenement">Evenement</a></li>
                       <?php
                       } ?>
                       <?php if (isset($_SESSION['id_pro']))
                       { ?>
                               <li><a href="/espace-pros/profile">Mon Profil</a></li>
                       <?php
                       } ?>

                       <?php if (isset($_SESSION['id_admin']))
                       {?>
                           <li><a href="/espace-administration">Administration</a></li>
                       <?php
                       } ?>
                       <li><a href="/contact">Contactez-nous</a></li>


<!--                        <form class="form-inline" method="POST" action="/search">

                            <div class="ui-widget">
                                  <label for="birds">Selectionnez votre ville: </label>
                                <input type="text" id="tags" name="search">
                            </div>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button> 
                        </form>-->

                        <?php if (isset($_SESSION['pseudo']) == true) { ?> 
                             <p id="messageHeader">
                                 <a href="/espace-client/messages/<?php echo $_SESSION['id'];?>">Mes messages</a>
                            </p>
                            <img src="/images/blankuser.png" id="visiteur" style="width: 40px; height: 50px;">

                            <div id="bonjour"><p>Bonjour <?php echo ' ' . $_SESSION['pseudo']; ?></p></div><br><br>
                           
                               
                        <?php } ?>
                        <?php if (isset($_SESSION['idF']) == true) { ?> 
                            <img src="/images/blankuser.png" id="visiteurFood" style="width: 40px; height: 50px;">

                            <div id="bonjourFood"><p>Bonjour <br><?php echo ' ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom']; ?></div></p>
    
                        <?php } ?>

                        <?php if (isset($_SESSION['id_pro']) == true) { ?> 
                            <img src="/images/blankuser.png" id="visiteurFood" style="width: 40px; height: 50px;">

                            <div id="bonjourFood"><p>Bonjour <br><?php echo ' ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom']; ?></div></p>

                        <?php } ?>
                        



                        <!--                            
                                                                <label id="birds">Ville</label>
                                                                <input class="form-control mr-sm-2" id="tags"   name="search" placeholder="Rechercher par ville" aria-label="Rechercher par ville">-->



   </ul>
    </nav>                   
           
            </div>
                       
                 
                
            </div>
       
    </nav>
</header>

<?php
if (isset($_SESSION['id'])) {
//        var_dump($_SESSION['id'], $_SESSION['email']);
}
?> 
