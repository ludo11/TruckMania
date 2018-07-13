<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Cartes {

		private $id;

		private $nom_carte;

		private $Thematiques_nom_thematiques;

		private $Foodtrucks_id;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getNom_carte (){
		return $this->nom_carte;
	}


	public function setNom_carte ($val){
		$this->nom_carte = $val;
	}



	public function getThematiques_nom_thematiques (){
		return $this->Thematiques_nom_thematiques;
	}


	public function setThematiques_nom_thematiques ($val){
		$this->Thematiques_nom_thematiques = $val;
	}


	public function getFoodtrucks_id (){
		return $this->Foodtrucks_id;
	}


	public function setFoodtrucks_id ($val){
		$this->Foodtrucks_id = $val;
	}
}