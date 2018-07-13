<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Commandes;
use PDO;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOCommandes extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array)
	{
		$user = $array['user'];
		$date = $array['date'];
		$contenu = $array['contenu'];
		$id = $array['id'];

		$sql = "INSERT INTO Commandes (date_creation, contenu, " . $id . ") VALUES('". $date . "','"  . $contenu ."','" . $user . "')";
		$this->getPdo()->query($sql);
		var_dump($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Commandes WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Commandes();
		$entity->setId_commandes($result['id_commandes']);
		$entity->setDate_creation($result['date_creation']);
		$entity->setContenu($result['contenu']);
		$entity->setVisiteurs_id_visiteur($result['Visiteurs_id_visiteur']);
		$entity->setClients_id_client($result['Clients_id_client']);
		$entity->setAdmins_id_admin($result['Admins_id_admin']);
		$entity->setPros_id_pro($result['Pros_id_pro']);
		return $entity;
	}


	public function update ($array){

		/*$sql = "UPDATE Commandes SET id_commandes = '" . $entity->getId_commandes() ."',date_creation = '" . $entity->getDate_creation() . "',Clients_id_client = '" . $entity->getClients_id_client() ."',visiteurs_id_visiteur = '" . $entity->getVisiteurs_id_visiteur() "',Pros_id_pro = '" . $entity->getPros_id_pro() . "',Admins_id_admin = '" . $entity->getAdmins_id_admin() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}*/
	}


	public function delete ($id){

		$sql = "DELETE FROM Commandes WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Commandes";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Commandes();
			$entity->setId_commandes($result['id_commandes']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setVisiteurs_id_visiteur($result['Visiteurs_id_visiteur']);
			$entity->setClients_id_client($result['Clients_id_client']);
			$entity->setAdmins_id_admin($result['Admins_id_admin']);
			$entity->setPros_id_pro($result['Pros_id_pro']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Commandes";
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
			$entity = new Commandes;
			$entity->setId_commandes($result['id_commandes']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setVisiteurs_id_visiteur($result['Visiteurs_id_visiteur']);
			$entity->setClients_id_client($result['Clients_id_client']);
			$entity->setAdmins_id_admin($result['Admins_id_admin']);
			$entity->setPros_id_pro($result['Pros_id_pro']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}