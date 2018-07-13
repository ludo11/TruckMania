<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Adresses;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOAdresses extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO Adresses (id_adresse,adresse,Villes_id_villes) VALUES('" . $entity->getId_adresse() . ',' . $entity->getAdresse() . ',' . $entity->getVilles_id_villes() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Adresses WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Adresses();
		$entity->setId_adresse();
		$entity->setAdresse();
		$entity->setVilles_id_villes();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Adresses SET id_adresse = '" . $entity->getId_adresse() ."',adresse = '" . $entity->getAdresse() ."',villes_id_villes = '" . $entity->getVilles_id_villes() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Adresses WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Adresses";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Adresses();
			$entity->setId_adresse($result['id_adresse']);
			$entity->setAdresse($result['adresse']);
			$entity->setVilles_id_villes($result['Villes_id_villes']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Adresses";
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
			$entity = new Adresses;
			$entity->setId_adresse($result['id_adresse']);
			$entity->setAdresse($result['adresse']);
			$entity->setVilles_id_villes($result['Villes_id_villes']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}