<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$bdd = new PDO('mysql:host=localhost;dbname=Trucksmania','root','');

$req = $bdd->prepare('SELECT COUNT(id) as row FROM pm WHERE lu=:lu');
$req->execute(array(':lu'=>false));

$data = $req->fetch(PDO::FETCH_OBJ);

$count = $data->row;
?>
