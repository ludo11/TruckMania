<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Events {

		private $id;

		private $nom_event;

		private $date_event;
                
                private $adresse;

		private $Pros_id;

		private $Villes_nom_villes;
                
                private $role;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getNom_event (){
		return $this->nom_event;
	}


	public function setNom_event ($val){
		$this->nom_event = $val;
	}
        
       


	public function getDate_event (){
		return $this->date_event;
	}


	public function setDate_event ($val){
		$this->date_event = $val;
	}
        
         public function getAdresse (){
		return $this->adresse;
	}


	public function setAdresse ($val){
		$this->adresse = $val;
	}


	public function getPros_id (){
		return $this->Pros_id;
	}


	public function setPros_id ($val){
		$this->Pros_id = $val;
	}


	public function getVilles_nom_villes (){
		return $this->Villes_nom_villes;
	}


	public function setVilles_nom_villes ($val){
		$this->Villes_nom_villes = $val;
	}
        
         public function getRole (){
		return $this->role;
	}


	public function setRole ($val){
		$this->role = $val;
	}

}