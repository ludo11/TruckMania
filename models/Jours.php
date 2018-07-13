<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Jours {

		private $id_jours;

		private $nom_jour;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId_jours (){
		return $this->id_jours;
	}


	public function setId_jours ($val){
		$this->id_jours = $val;
	}


	public function getNom_jour (){
		return $this->nom_jour;
	}


	public function setNom_jour ($val){
		$this->nom_jour = $val;
	}

}