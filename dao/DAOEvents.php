<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Events;
use PDO;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOEvents extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){
//            var_dump($array);
                $eventName = $array["nom_event"];
		$date = $array["date_event"];
		$adresse = $array["adresse"];
		$id = $array["Pros_id"];
		$ville = $array["Villes_nom_villes"];
		
		
//               
		if(!empty($ville))
		{
			$villes_sql = $this->getPdo()->prepare("SELECT ville_nom FROM Villes WHERE ville_nom = '" . $ville . "'");
//			var_dump($villes_sql);
			$villes_sql->execute($array);
			$result = $villes_sql->fetch();
//			var_dump($result);
//			
//			
			if($result)
			{
//                            var_dump($result);
				$sql = "INSERT INTO Events (nom_event,date_event,adresse,Pros_id,Villes_nom_villes) VALUES('". $eventName . "','" . $date . "','" . $adresse . "','" . $id . "','" . $ville . "')";
//				var_dump($sql);
				$this->getPdo()->query($sql);
                                return $result;
			}echo 'Nom de ville inconnu';
//                        
//			
		}
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Events WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Events();
                $entity->setId($result['id']);
		$entity->setNom_event($result['nom_event']);
		$entity->setDate_event($result['date_event']);
                $entity->setAdresse($result['adresse']);
		$entity->setPros_id($result['Pro_id']);
		$entity->setVilles_nom_villes($result['Villes_nom_villes']);
                $entity->setRole($result['role']);
		return $entity;
	}


	public function update ($array){
//            var_dump($array);
                $id = $array['id'];
                $role = $array['role'];
            
		$sql = "UPDATE Events SET role = '" . $role ."' WHERE id = ". $id;
                var_dump($sql);
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Events WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Events";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Events();
			$entity->setId($result['id']);
			$entity->setNom_event($result['nom_event']);
			$entity->setDate_event($result['date_event']);
			$entity->setPros_id($result['Pros_id']);
			$entity->setVilles_nom_villes($result['Villes_nom_villes']);
                        $entity->setRole($result['role']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Events WHERE id = '$filter'";
		
		$entities = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
			$entity = new Events;
			$entity->setId($result['id']);
			$entity->setNom_event($result['nom_event']);
			$entity->setDate_event($result['date_event']);
			$entity->setPros_id($result['Pros_id']);
			$entity->setVilles_nom_villes($result['Villes_nom_villes']);
                        $entity->setRole($result['role']);
			array_push($entities,$entity);
		}
		return $entities;
	}
        
        
        public function eventPro ($id){
                
		$sql = "SELECT * FROM Events WHERE Pros_id=" . $id;
//                var_dump($sql);
                $entities = array();
                $statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();

		foreach($results as $result){
			$entity = new Events();
			$entity->setId($result['id']);
			$entity->setNom_event($result['nom_event']);
			$entity->setDate_event($result['date_event']);
                        $entity->setAdresse($result['adresse']);
			$entity->setPros_id($result['Pros_id']);
			$entity->setVilles_nom_villes($result['Villes_nom_villes']);
                        $entity->setRole($result['role']);
			array_push($entities,$entity);
		}
//                var_dump($entities);
		return $entities;
	}
}