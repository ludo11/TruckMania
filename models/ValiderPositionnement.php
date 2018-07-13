<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class ValiderPositionnement {

		private $id;

		private $Events_id;

		private $Foodtrucks_id;
                
                private $role;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getEvents_id (){
		return $this->Events_id;
	}


	public function setEvents_id ($val){
		$this->Events_id = $val;
	}


	public function getFoodtrucks_id (){
		return $this->Foodtrucks_id;
	}


	public function setFoodtrucks_id ($val){
		$this->Foodtrucks_id = $val;
	}
        
        public function getRole (){
		return $this->role;
	}


	public function setRole ($val){
		$this->role = $val;
	}

}