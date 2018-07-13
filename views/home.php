<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>
<aside id='banniereTitre'>
    <form class="form-inline" method="POST" action="/search">

                            <div class="ui-widget" id="rechercheAccueil">
                                <!--  <label for="birds">Selectionnez votre ville: </label>-->
                                <input type="text" id="tags" name="search" placeholder="Choisissez votre ville">
<!--                                 <select id="tags" name="horaire">
                    <option value="Theme Americain">Theme Americain</option> 
                    <option value="Theme asiatique">Theme asiatique</option> 
                    <option value="Theme européen">Theme européen</option>
                    <option value="Theme oriantal">Theme oriantal</option>
                   
                   
                </select>-->
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button> 
                         </div></form> 
    

 

    

</aside>
<div class="row" id="secondAccueil">
         <div class="col-sm">

             <div class="alert alert-primary" role="alert" id="banniereFood">
  Liste des Foodtrucks inscrits !
 
</div>
             <div id="scolbar">
             <?php foreach ($foods as $food) { ?>
    <div class="card" id="foodListe">
        <h3 class="card-header"><?php echo $food->getNom_entreprise(); ?></h3>
        <a  href="/infoFoodTruck/<?php echo $food->getID() ?>"><img class ="miniatureFood" src="/images/Food-truck.png"></a>
        <div class="card-body">
          <h6 class="card-title"><?php echo $food->getThematiques_nom_thematiques(); ?></h6>
          <ul>
              <li class="card-text">Téléphone : <?php echo $food->getTel(); ?></li>
           <li class="card-text">Emplacement : <?php echo $food->getVilles_nom_villes(); ?></li>
          </ul>
<!--          <a href="#" class="btn btn-primary">Go somewhere</a>-->
<!--              <a class="btn btn-primary" href="/infoFoodTruck/<?php echo $food->getID() ?>" role="button">Voir le foodtruck</a>-->
        </div>
</div>
                
             <?php } ?>  </div>     
             </div>
    <div class="col-sm" id="theme" style="width: 630px; height: 600px;">
         <h3 class="card-header">Nos Thèmes</h3>

     
        <img class ="francaise" src="/images/francaise.jpeg" style="width: 250px; height: 150px;"> 

        <img class ="asiatique" src="/images/asia.jpeg" style="width: 250px; height: 150px;">
        <img class ="americain" src="/images/americain.jpeg" style="width: 250px; height: 150px;">
        <img class ="oriental" src="/images/oriental.jpeg" style="width: 250px; height: 150px;">
    </div>

<script>


var popup = L.popup();
var mymap = L.map('mapid').setView([46.9, 2.2], 5.5);
</script>

</div>
<section class="container-fluid">
<div class="row  " id="secondRow">

  <div class="col-sm-6" >
      <div class="card" id="proPresentation">
      <div class="card-body">
        
        <p class="card-text">Besoin de food trucks

au bureau, à la maison, ...<img src="/images/images.png" style="width: 80px; height: 80px;">

Vous cherchez un/des food truck/s pour un événement privé ou public ?
Vous êtes au bon endroit !</p>
        <a class="btn btn-primary" href="/espace-pros" role="button">Inscription</a>


      </div>
    </div>
  </div>
  <div class="col-sm-6">

      <div class="card" id="clienPresentation">
      <div class="card-body">
      
         <p class="card-text">Besoin de food trucks
au bureau, à la maison, ...<img src="/images/images.png" style="width: 80px; height: 80px;">

Vous cherchez un/des food truck/s pour un événement privé ou public ?
Vous êtes au bon endroit !</p>
        <a class="btn btn-primary" href="#" role="button">Inscription</a>

   
  </div>
</div>
    </div>
 </section>   
    


<div><?php foreach ($foods as $food) {
    $longitude =  $food->getPrenom(); 
    $latitude =  $food->getPassword(); 
    $nom = $food->getNom_entreprise(); 
  
//    echo var_dump($longitude);?>
    <script>
var latitude = <?php echo json_encode($latitude) ?>; 
var longitude = <?php echo json_encode($longitude) ?>;
var foodtruck = <?php echo json_encode($nom) ?>;
//console.log(foodtruck);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
maxZoom: 18,
attribution: 'Map Data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-by-SA</a>, ' +
'Imagery © <a href="http://mapbox.com">Mapbox</a>',
id: 'mapbox.streets'
}).addTo(mymap);


L.marker([longitude,latitude]).addTo(mymap)
.bindPopup('<div id="miniatureMap">'  + foodtruck +'<br><a class="btn btn-success"  href="/infoFoodTruck/<?php echo $food->getID() ?>" role="button">Détail</a></div>');
L.circle([longitude, latitude], 1500, {
Color: 'blue',
fillColor: 'blue',
fillOpacity: 0.4
}).addTo(mymap);

</script>
  </div>


  
    



    <?php } ?>
<script>
function onMapClick(e) {
    
    popup
        .setLatLng(e.latlng)
        .setContent( e.latlng.toString())
        .openOn(mymap);
      
}

mymap.on('click', onMapClick);
  console.log();
</script>   


<!--  <a href="/popup" onclick="javascript:open_infos();">Ouvrir la Pop-Up</a>-->

  

     <!--</div>-->
<?php include 'footer.php'; ?>
