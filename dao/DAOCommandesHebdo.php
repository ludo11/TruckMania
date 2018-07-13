<?php
namespace BWB\Framework\mvc;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Commandes_hebdo;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOCommandesHebdo extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO Commandes_hebdo (date_creation,date_modif,Clients_id_client) VALUES('" . $entity->getDate_creation() . ',' . $entity->getDate_modif() . ',' . $entity->getClients_id_client() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Commandes_hebdo WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Commandes_hebdo();
		$entity->setDate_creation();
		$entity->setDate_modif();
		$entity->setClients_id_client();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Commandes_hebdo SET date_creation = '" . $entity->getDate_creation() ."',date_modif = '" . $entity->getDate_modif() ."',clients_id_client = '" . $entity->getClients_id_client() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Commandes_hebdo WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Commandes_hebdo";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Commandes_hebdo();
			$entity->setId($result['id']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setDate_modif($result['date_modif']);
			$entity->setClients_id_client($result['Clients_id_client']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Commandes_hebdo";
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
			$entity = new Commandes_hebdo;
			$entity->setId($result['id']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setDate_modif($result['date_modif']);
			$entity->setClients_id_client($result['Clients_id_client']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}