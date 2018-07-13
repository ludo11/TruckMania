<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use PDO;
// use BWB\Framework\mvc\models\Foodtrucks;
//use BWB\Framework\mvc\models\Foodtrucks;
/**
 * Description of FoodTrucks
 *
 * @author ludo
 */
class HomeController extends Controller {
    public function getHome() {
     
//       $resultats = [];
//       $lastTruks = new \BWB\Framework\mvc\dao\DAOCartes();
//       $resultats = $lastTruks->getAll();
//       $datas = array(
//            "cartes" => $resultats
//                
//        );
        
        $foods = [];
       $foodsTruks = new \BWB\Framework\mvc\dao\DAOFoodtrucks();
       $foods = $foodsTruks->getAll();
//       var_dump($foods);
       $datas = array(
            "foods" => $foods
                
        );
       
       
//       var_dump($donneesVilles);
//       var_dump($datas) ;
        $this->render("home",$datas);
       
    }
    
   public function getSearch() {
      
//       var_dump($_POST['search']);
       $searchVille  = substr ( $_POST['search'] ,  0 , -5 ); 
//       var_dump($search);
       $dao = new \BWB\Framework\mvc\dao\DAOFoodtrucks();
       $donnee = new \BWB\Framework\mvc\models\Foodtrucks;
       $donnee->setVilles_nom_villes($searchVille);
       $search = $donnee->getVilles_nom_villes ();
    
//       var_dump($search);
       $result = $dao->getAllBy($search);
       $datas = array(
           "villeFood" => $result
       );
//       var_dump($datas);
       $this->render("resultatSearch",$datas);
   }
   
   public function getIdFood($id) {
       
       $dao = new \BWB\Framework\mvc\dao\DAOFoodtrucks();
       //$donnees = new \BWB\Framework\mvc\models\Foodtrucks();
       $donnees = $dao->retrieve($id);
       
       $daoMenu = new \BWB\Framework\mvc\dao\DAOMenus;
        $menus = $daoMenu->getAllBy(array("id" => $id));
       $datas = array(
           "FoodId" => $donnees,
           "menus" => $menus,
       );
       //var_dump($datas);
       $this->render("foodId",$datas);

   }
//   mise jour lundi 25 juin    
   
   public function jquery(){
 
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=Trucksmania;charset=utf8', 'root', '', $pdo_options);
    $log = $_POST['birds'];
    
     
    $requete = $bdd->prepare('SELECT ville_nom ,ville_code_postal FROM Villes WHERE ville_nom LIKE :log LIMIT 0,10'); // j'effectue ma requête SQL grâce au mot-clé LIKE
    $requete->execute(array('log' => $log."%"));
     
    $array = array(); // on créé le tableau
     
    while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
    {
        array_push($array, $donnee['ville_nom'] . ' '.$donnee['ville_code_postal']); // et on ajoute celles-ci à notre tableau
    }
//    header('Content-Type: application/json');
    echo json_encode($array); // il n'y a plus qu'à convertir en JSON
    


   }
   
    public function markerMap(){
 
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=Trucksmania;charset=utf8', 'root', '', $pdo_options);
    
   
     
    $requete = $bdd->prepare('SELECT Villes.lng1,Villes.lat1 FROM Foodtrucks f INNER JOIN Villes ON Villes.Ville_nom = f.Villes_nom_villes '); // j'effectue ma requête SQL grâce au mot-clé LIKE
    $requete->execute();
     
    $array = array(); // on créé le tableau
     
    while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
    {
        array_push($array, $donnee['ville_nom'] ); // et on ajoute celles-ci à notre tableau
    }
//    header('Content-Type: application/json');
    echo json_encode($array); // il n'y a plus qu'à convertir en JSON
    var_dump($donnee);

   }
}
