<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Villes;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOVilles extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO Villes (ville_id,ville_departement,ville_nom,ville_code_postal,ville_longitude_deg,ville_latitude_deg,ville_longitude_grd,ville_latitude_grd,ville_longitude_dms,ville_latitude_dms) VALUES('" . $entity->getVille_id() . ',' . $entity->getVille_departement() . ',' . $entity->getVille_nom() . ',' . $entity->getVille_code_postal() . ',' . $entity->getVille_longitude_deg() . ',' . $entity->getVille_latitude_deg() . ',' . $entity->getVille_longitude_grd() . ',' . $entity->getVille_latitude_grd() . ',' . $entity->getVille_longitude_dms() . ',' . $entity->getVille_latitude_dms() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Villes WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Villes();
		$entity->setVille_id();
		$entity->setVille_departement();
		$entity->setVille_nom();
		$entity->setVille_code_postal();
		$entity->setVille_longitude_deg();
		$entity->setVille_latitude_deg();
		$entity->setVille_longitude_grd();
		$entity->setVille_latitude_grd();
		$entity->setVille_longitude_dms();
		$entity->setVille_latitude_dms();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Villes SET ville_id = '" . $entity->getVille_id() ."',ville_departement = '" . $entity->getVille_departement() ."',ville_nom = '" . $entity->getVille_nom() ."',ville_code_postal = '" . $entity->getVille_code_postal() ."',ville_longitude_deg = '" . $entity->getVille_longitude_deg() ."',ville_latitude_deg = '" . $entity->getVille_latitude_deg() ."',ville_longitude_grd = '" . $entity->getVille_longitude_grd() ."',ville_latitude_grd = '" . $entity->getVille_latitude_grd() ."',ville_longitude_dms = '" . $entity->getVille_longitude_dms() ."',ville_latitude_dms = '" . $entity->getVille_latitude_dms() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Villes WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Villes";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Villes();
			$entity->setVille_id($result['ville_id']);
			$entity->setVille_departement($result['ville_departement']);
			$entity->setVille_nom($result['ville_nom']);
			$entity->setVille_code_postal($result['ville_code_postal']);
			$entity->setVille_longitude_deg($result['ville_longitude_deg']);
			$entity->setVille_latitude_deg($result['ville_latitude_deg']);
			$entity->setVille_longitude_grd($result['ville_longitude_grd']);
			$entity->setVille_latitude_grd($result['ville_latitude_grd']);
			$entity->setVille_longitude_dms($result['ville_longitude_dms']);
			$entity->setVille_latitude_dms($result['ville_latitude_dms']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Villes";
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
			$entity = new Villes;
			$entity->setVille_id($result['ville_id']);
			$entity->setVille_departement($result['ville_departement']);
			$entity->setVille_nom($result['ville_nom']);
			$entity->setVille_code_postal($result['ville_code_postal']);
			$entity->setVille_longitude_deg($result['ville_longitude_deg']);
			$entity->setVille_latitude_deg($result['ville_latitude_deg']);
			$entity->setVille_longitude_grd($result['ville_longitude_grd']);
			$entity->setVille_latitude_grd($result['ville_latitude_grd']);
			$entity->setVille_longitude_dms($result['ville_longitude_dms']);
			$entity->setVille_latitude_dms($result['ville_latitude_dms']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}