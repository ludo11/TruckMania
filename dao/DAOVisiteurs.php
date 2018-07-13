<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Visiteurs;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOVisiteurs extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO Visiteurs (nom,prenom,email,tel,adresse,Cartes_nom_carte,Villes_id_villes) VALUES('" . $entity->getNom() . ',' . $entity->getPrenom() . ',' . $entity->getEmail() . ',' . $entity->getTel() . ',' . $entity->getAdresse() . ',' . $entity->getCartes_nom_carte() . ',' . $entity->getVilles_id_villes() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Visiteurs WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Visiteurs();
		$entity->setNom();
		$entity->setPrenom();
		$entity->setEmail();
		$entity->setTel();
		$entity->setAdresse();
		$entity->setCartes_nom_carte();
		$entity->setVilles_id_villes();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Visiteurs SET nom = '" . $entity->getNom() ."',prenom = '" . $entity->getPrenom() ."',email = '" . $entity->getEmail() ."',tel = '" . $entity->getTel() ."',adresse = '" . $entity->getAdresse() ."',cartes_nom_carte = '" . $entity->getCartes_nom_carte() ."',villes_id_villes = '" . $entity->getVilles_id_villes() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Visiteurs WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Visiteurs";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Visiteurs();
			$entity->setId($result['id']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['prenom']);
			$entity->setEmail($result['email']);
			$entity->setTel($result['tel']);
			$entity->setAdresse($result['adresse']);
			$entity->setCartes_nom_carte($result['Cartes_nom_carte']);
			$entity->setVilles_id_villes($result['Villes_id_villes']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Visiteurs";
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
			$entity = new Visiteurs;
			$entity->setId($result['id']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['prenom']);
			$entity->setEmail($result['email']);
			$entity->setTel($result['tel']);
			$entity->setAdresse($result['adresse']);
			$entity->setCartes_nom_carte($result['Cartes_nom_carte']);
			$entity->setVilles_id_villes($result['Villes_id_villes']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}