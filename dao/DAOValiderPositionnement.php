<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Valider_positionnement;
use PDO;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOValiderPositionnement extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){
 var_dump($array);
                $eventId = $array[0];
		$Foodtruck = $array[1];
		
				$sql = "INSERT INTO Valider_positionnement (Events_id,Foodtrucks_id) VALUES('". $eventId . "','" . $Foodtruck . "')";
				var_dump($sql);
				$this->getPdo()->query($sql);
//                                var_dump($sql);
                                echo 'Positionement effectuer attente validation pros';
                               
	
//                        
//		
		
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Valider_positionnement WHERE Events_id= '$id' " ;
//                var_dump($sql);
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch();
		$entity = new \BWB\Framework\mvc\models\ValiderPositionnement();
		$entity->setEvents_id($result['Events_id']);
		$entity->setFoodtrucks_id($result['Foodtrucks_id']);
                $entity->setRole($result['role']);
//                var_dump($entity);
		return $entity;
	}


	public function update ($array){
//            var_dump($array);
              $foodtruck = $array['id'];
              $id = $array['id'];
                $role = $array['role'];
                try {
                    $sql = "UPDATE Valider_positionnement SET role = '" . $role ."' WHERE id = ". $id;
//                var_dump($sql);
		if ($this->getPdo()->exec($sql) !== 0)
			echo "Updated";
		
                } catch (Exception $ex) {

                    echo 'Vous avez déja validé sur cette evenement';
		
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Valider_positionnement WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Valider_positionnement";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new DAOValider_positionnement();
			$entity->setId($result['id']);
			$entity->setEvents_id($result['Events_id']);
			$entity->setPosition_foodtruck_id($result['Position_foodtruck_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
            
		$sql = "SELECT vp.id id , f.nom_entreprise nom, vp.role role, vp.Events_id Events_id FROM Foodtrucks f INNER JOIN Valider_positionnement vp ON vp.Foodtrucks_id = f.id WHERE vp.Events_id = '$filter' ";
//                var_dump($sql);
		
		$entities = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
			$entity = new \BWB\Framework\mvc\models\ValiderPositionnement() ;
                        $entity->setId($result['id']);
			$entity->setEvents_id($result['Events_id']);
			$entity->setFoodtrucks_id($result['nom']);
                        $entity->setRole($result['role']);
			array_push($entities,$entity);
		}
		return $entities;
	}
        
        public function getStatut($id) {
            
            $sql = "SELECT Events.Villes_nom_villes, Events.nom_event,Valider_positionnement.id, Foodtrucks.nom_entreprise,Valider_positionnement.role FROM `Valider_positionnement` INNER JOIN   Foodtrucks ON Foodtrucks.id = Valider_positionnement.Foodtrucks_id INNER JOIN Events ON Events.id = Valider_positionnement.Events_id WHERE Foodtrucks.id = '$id' ";
            $global = array();
            $entities = array();
             $events = array();
             $foods = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
                        $entity = array();
			$entity = new \BWB\Framework\mvc\models\ValiderPositionnement() ;
                        $entity->setId($result['id']);
			$entity->setRole($result['role']);
                       
                        $event = new \BWB\Framework\mvc\models\Events();
                        $event->setVilles_nom_villes($result['Villes_nom_villes']);
                        $event->setNom_event($result['nom_event']);
                        
                        $food = new \BWB\Framework\mvc\models\Foodtrucks();
;			$food->setNom_entreprise($result['nom_entreprise']);
//                        $entities = array(
//                            'entity' => $entity,
//                            'event' => $event,
//                            'food' => $food,
//                        );
                        array_push($entities, $entity);
                        array_push($events, $event);
                        array_push($foods, $food);
//			array_push($global,$entity,$entity,$event,$food);
		$global = array(
                    'entite' =>$entities,
                    'event' => $events,
                    'food' => $foods
                        );
                
                }
                
//                var_dump($global);
		return $global;
            
        }
}