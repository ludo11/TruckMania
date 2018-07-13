<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Adresses {

		private $id_adresse;

		private $adresse;

		private $Villes_id_villes;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId_adresse (){
		return $this->id_adresse;
	}


	public function setId_adresse ($val){
		$this->id_adresse = $val;
	}


	public function getAdresse (){
		return $this->adresse;
	}


	public function setAdresse ($val){
		$this->adresse = $val;
	}


	public function getVilles_id_villes (){
		return $this->Villes_id_villes;
	}


	public function setVilles_id_villes ($val){
		$this->Villes_id_villes = $val;
	}

}