<?php require 'layout.php'; ?>
<header> <?php include 'header.php'; ?></header>

<div class="row" >
    <div class="col-sm-6" >
<?php //var_dump($datas); ?>

<?php //foreach ($datas as $food) {
    $latitude =  $FoodId->getN_siret(); 
    $longitude = $FoodId->getAdresse(); 
    $foodtruck = $FoodId->getNom_entreprise(); ?>
    <section>
 <div id="mapid" style="width: 500px; height: 400px;"></div>
<script>
var latitude = <?php echo json_encode($latitude) ?>; 
var longitude = <?php echo json_encode($longitude) ?>;
var foodtruck = <?php echo json_encode($foodtruck) ?>;
var mymap = L.map('mapid').setView([latitude, longitude], 13);
var popup = L.popup();
// Add geolocate control to the map.

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?\n\
access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
maxZoom: 18,
attribution: 'Map Data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-by-SA</a>, ' +
'Imagery © <a href="http://mapbox.com">Mapbox</a>',
id: 'mapbox.streets'
}).addTo(mymap);

L.marker([latitude , longitude]).addTo(mymap)
.bindPopup(foodtruck);
//L.circle([latitude, longitude], 10500, {
//Color: 'red',
//fillColor: '#f03',
//fillOpacity: 0.5
//}).addTo(mymap).bindPopup("I am a circle.").on('click',clicSurUnObjet);







mymap.on('click', clicAilleursSurLaCarte);

</script>
 </div>
<div class="card" style="width: 18rem;" id="idFoodTruck">
        <img class="card-img-top" src="../images/food-truck-new-york-food-street-food-brooklyn-food-porn-1.gif" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">
     <?php // echo var_dump($datas); ?> </h5>
            <p class="card-text"><?php echo $FoodId->getNom_entreprise(); ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Adresse :<?php echo $FoodId->getNom(); ?> </li>
            <li class="list-group-item">Ville :<?php echo $FoodId->getVilles_nom_villes(); ?></li>
            <li class="list-group-item">Telephone :<?php echo $FoodId->getTel(); ?> </li><!--
-->            <li class="list-group-item"><?php // echo $food->getEmail(); ?> </li>
        </ul><?php //if($menus === TRUE){ ?>
             <div class="card-body"> 
            <a href="/commande-rapide/<?php echo $FoodId->getId(); ?>">Commander</a>
        </div>
       <?php //} ?>
       
    </div>
<?php //} ?>
</div>
 
<?php include 'footer.php'; ?>

