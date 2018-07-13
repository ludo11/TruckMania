<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Menus;
use PDO;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOMenus extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array)
	{
		$name = $array['nameMenu'];
		$detail = $array['detail'];
		$price = $array['price'];
		$id_card = $array['id_card'];
		$theme = $array['theme'];

		if(isset($id_card))
		{
                    
			$card_sql = $this->getPdo()->prepare("SELECT nom_carte FROM Cartes WHERE id = '". $id_card ."'");
			$card_sql->execute($array);
			$result = $card_sql->fetch();

			if($result)
			{
				$sql = "INSERT INTO Menus (nom_menu, detail_menu, prix_menu, Cartes_nom_carte, Cartes_Thematiques_nom_thematiques) VALUES('" . $name . "','" . $detail . "','" . $price . "','" . $result['nom_carte'] . "','" . $theme ."')";
				$this->getPdo()->query($sql);
				echo 'Menu created';
                                var_dump($sql);
			}
			return $result;
		}	
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Menus WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Menus();
		$entity->setId($result['id']);
		$entity->setNom_menu($result['nom_menu']);
		$entity->setDetail_menu($result['detail_menu']);
		$entity->setPrix_menu($result['prix_menu']);
		$entity->setCartes_nom_carte($result['Cartes_nom_carte']);
		$entity->setCartes_Thematiques_nom_thematiques($result['Cartes_Thematiques_nom_thematiques']);
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Menus SET nom_menu, detail_menu, prix_menu = '" . $entity->getNom_menu() . "',detail_menu = '" . $entity->getDetail_menu() . "',prix_menu = '" . $entity->getPrix_menu() . "',Cartes_nom_carte = '" . $entity->getCartes_nom_carte() . "',Cartes_Thematiques_nom_thematiques = '" . $entity->getCartes_Thematiques_nom_thematiques() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Menus WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAllBy ($array)
	{
		$id = $array['id'];

		if(isset($id))
		{
			$card_sql = $this->getPdo()->prepare("SELECT nom_carte FROM Cartes WHERE Foodtrucks_id = '". $id ."'");
			$card_sql->execute($array);
			$result = $card_sql->fetch();

			if($result)
			{
				$sql = "SELECT * FROM Menus WHERE Cartes_nom_carte = '". $result['nom_carte'] ."'";
				$statement = $this->getPdo()->query($sql);
				$results = $statement->fetchAll();
				$entities = array();

				foreach($results as $result){
					$entity = new Menus();
					$entity->setId($result['id']);
					$entity->setNom_menu($result['nom_menu']);
					$entity->setDetail_menu($result['detail_menu']);
					$entity->setPrix_menu($result['prix_menu']);
					$entity->setCartes_nom_carte($result['Cartes_nom_carte']);
					$entity->setCartes_Thematiques_nom_thematiques($result['Cartes_Thematiques_nom_thematiques']);
					array_push($entities,$entity);
				}
				return $entities;
			}
			return $result;
		}
		
	}


	public function getAll ()
	{
		$sql = "SELECT * FROM Menus";
		$i = 0;
		foreach($filter as $key => $value)
		{
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
			$entity = new Menus;
			$entity->setId($result['id']);
			$entity->setNom_menu($result['nom_menu']);
			$entity->setDetail_menu($result['detail_menu']);
			$entity->setPrix_menu($result['prix_menu']);
			$entity->setCartes_nom_carte($result['Cartes_nom_carte']);
			$entity->setCartes_Thematiques_nom_thematiques($result['Cartes_Thematiques_nom_thematiques']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}