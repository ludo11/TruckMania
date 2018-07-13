<?php
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=Trucksmania;charset=utf8', 'root', '', $pdo_options);
    $log = $_POST['birds'];
   
     
    $requete = $bdd->prepare('SELECT ville_nom ,ville_code_postal FROM Villes WHERE ville_nom LIKE :log'); // j'effectue ma requête SQL grâce au mot-clé LIKE
    $requete->execute(array('log' => $log."%"));
     
    $array = array(); // on créé le tableau
     
    while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
    {
        array_push($array, $donnee['ville_nom'] . ' '.$donnee['ville_code_postal']); // et on ajoute celles-ci à notre tableau
    }
//    header('Content-Type: application/json');
    echo json_encode($array); // il n'y a plus qu'à convertir en JSON
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
