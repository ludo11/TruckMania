<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\CommandesRapides;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOCommandesRapides extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array)
	{
		$user = $array['user'];
		$date = $array['date'];

		$sql = "INSERT INTO Commandes_rapides (date_creation,Clients_id_client) VALUES('" . $date ."','" . $user . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Commandes_rapides WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new CommandesRapides();
		$entity->setDate_creation();
		$entity->setClients_id_client();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Commandes_rapides SET date_creation = '" . $entity->getDate_creation() ."',clients_id_client = '" . $entity->getClients_id_client() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Commandes_rapides WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Commandes_rapides";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Commandes_rapides();
			$entity->setId($result['id']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setClients_id_client($result['Clients_id_client']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Commandes_rapides";
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
			$entity = new Commandes_rapides;
			$entity->setId($result['id']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setClients_id_client($result['Clients_id_client']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}