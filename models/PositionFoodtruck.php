<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class PositionFoodtruck {

		private $id;

		private $adresse;

		private $Foodtrucks_id;

		private $Villes_id_villes;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getAdresse (){
		return $this->adresse;
	}


	public function setAdresse ($val){
		$this->adresse = $val;
	}


	public function getFoodtrucks_id (){
		return $this->Foodtrucks_id;
	}


	public function setFoodtrucks_id ($val){
		$this->Foodtrucks_id = $val;
	}


	public function getVilles_id_villes (){
		return $this->Villes_id_villes;
	}


	public function setVilles_id_villes ($val){
		$this->Villes_id_villes = $val;
	}

}