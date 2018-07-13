<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class AgendaFoodtruck {

		private $id;

		private $Foodtrucks_id;

		private $Horaires;
                
                private $jours;
                
                private $ville;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getFoodtrucks_id (){
		return $this->Foodtrucks_id;
	}


	public function setFoodtrucks_id ($val){
		$this->Foodtrucks_id = $val;
	}


	public function getHoraires (){
		return $this->Horaires;
	}


	public function setHoraires ($val){
		$this->Horaires = $val;
	}
        
        public function getJours (){
		return $this->jours;
	}


	public function setJours ($val){
		$this->jours = $val;
	}
        
        public function getVille (){
		return $this->ville;
	}


	public function setVille ($val){
		$this->ville = $val;
	}

}