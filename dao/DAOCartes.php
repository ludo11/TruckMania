<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Cartes;
use PDO;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOCartes extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create($array)
{
	$name = $array["nom_carte"];
	$id_food = $array["Foodtrucks_id"];
	$id_theme = $array['id_theme'];
        
	if(isset($id_theme))
	{
		$sql = $this->getPdo()->prepare("SELECT nom_Thematiques FROM Thematiques WHERE id_theme = '". $id_theme ."'");
                
		$sql->execute($array);
		$result = $sql->fetch();

		if($result)
		{
			$sql = "INSERT INTO Cartes (nom_carte, Thematiques_nom_thematiques, Foodtrucks_id) VALUES('". $name . "','" . $result['nom_Thematiques'] . "','" . $id_food . "')";
			$this->getPdo()->query($sql);

			if(isset($_SESSION['id']))
			{
				$sql = "UPDATE Foodtrucks SET Carte_nom_carte = '" . $name . "' WHERE id = '". $_SESSION['id'] ."'";
				$this->getPdo()->query($sql);
			}
			else
			{
				echo 'Operation: Are you a Foodtruck ?';
			}
		}
		else
		{
			echo 'Operation: select a theme';
		}
	}	
}


	public function retrieve ($id)
	{
		$sql = "SELECT * FROM Cartes WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Cartes();
		$entity->setId($result['id']);
		$entity->setNom_carte($result['nom_carte']);
		$entity->setThematiques_nom_thematiques($result['Thematiques_nom_thematiques']);
		$entity->setFoodtrucks_id($result['Foodtrucks_id']);
		
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Cartes SET nom_carte = '" . $entity->getNom_carte() ."',menus_nom_menu = '" . $entity->getMenus_nom_menu() ."',detail_menu = '" . $entity->getDetail_menu() ."',prix_menu = '" . $entity->getPrix_menu() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Cartes WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/



	public function getAll ()
	{
		$sql = "SELECT * FROM Cartes";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Cartes();
			$entity->setId($result['id']);
			$entity->setNom_carte($result['nom_carte']);
			$entity->setThematiques_nom_thematiques($result['Thematiques_nom_thematiques']);
			$entity->setFoodtrucks_id($result['Foodtrucks_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($array)
	{
		$id = $array['id'];

		$sql = "SELECT * FROM Cartes WHERE Foodtrucks_id = '". $id ."'";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result)
		{
			$entity = new Cartes();
			$entity->setId($result['id']);
			$entity->setNom_carte($result['nom_carte']);
			$entity->setThematiques_nom_thematiques($result['Thematiques_nom_thematiques']);
			$entity->setFoodtrucks_id($result['Foodtrucks_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}