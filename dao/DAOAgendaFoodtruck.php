<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Agenda_foodtruck;
use PDO;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOAgendaFoodtruck extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){
          
//            var_dump($array);
            $foodtruck_id = $array['id'];
            $jour = $array['jour'];
            $horaire = $array['horaire'];
             $ville = $array['ville'];
             
             	if(!empty($ville))
		{
			$villes_sql = $this->getPdo()->prepare("SELECT ville_nom FROM Villes WHERE ville_nom = '". $ville ."'");
			$villes_sql->execute($array);
			$result = $villes_sql->fetch();
			
			if($result)
			{
				$sql = "INSERT INTO Agenda_foodtruck (Foodtrucks_id,Horaires,jours,ville) VALUES('" . $foodtruck_id . "','" . $horaire ." ','" . $jour . "',' ". $ville ."')";
				$this->getPdo()->query($sql);
//				var_dump($sql);
			}
			if($result === FALSE)
			{
				echo 'Operation: Unknow city';
			}
			return $result;
		}


	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Agenda_foodtruck WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Agenda_foodtruck();
		$entity->setFoodtrucks_id();
		$entity->setHoraires();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Agenda_foodtruck SET foodtrucks_id = '" . $entity->getFoodtrucks_id() ."',horaires = '" . $entity->getHoraires() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Agenda_foodtruck WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Agenda_foodtruck";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Agenda_foodtruck();
			$entity->setId($result['id']);
			$entity->setFoodtrucks_id($result['Foodtrucks_id']);
			$entity->setHoraires($result['Horaires']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Agenda_foodtruck";
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
			$entity = new Agenda_foodtruck;
			$entity->setId($result['id']);
			$entity->setFoodtrucks_id($result['Foodtrucks_id']);
			$entity->setHoraires($result['Horaires']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}