<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Thematiques;
use PDO;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOThematiques extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO Thematiques (nom_Thematiques) VALUES('" . $entity->getNom_Thematiques() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT nom_Thematiques FROM Thematiques WHERE id_theme=" . $id;
                var_dump($sql);
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Thematiques();
            
		$entity->setNom_Thematiques($result['nom_Thematiques']);
                var_dump($entity);
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Thematiques SET nom_thematiques = '" . $entity->getNom_Thematiques() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Thematiques WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Thematiques";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Thematiques();
			$entity->setId_theme($result['id_theme']);
			$entity->setNom_Thematiques($result['nom_Thematiques']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Thematiques";
		$i = 0;
		foreach($filter as $key => $value){
			if($i===0){
				$sql .= " WHERE ";
			} else {
				$sql .= " AND ";
			}
			$sql .= $key . " = " . $value . "'";
			$i++;
		}
		$entities = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
			$entity = new Thematiques;
			$entity->setId($result['id']);
			$entity->setNom_Thematiques($result['nom_Thematiques']);
			array_push($entities,$entity);
		}
		return $entities;
	}
        
        public function getTheme ($id){

		$sql = "SELECT * FROM `Thematiques` INNER JOIN Foodtrucks ON Thematiques.nom_Thematiques = Foodtrucks.Thematiques_nom_thematiques WHERE id = $id ";
                var_dump($sql);
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Thematiques();
            
		$entity->setId_theme($result['id_theme']);
                var_dump($entity);
		return $entity;
	}
}