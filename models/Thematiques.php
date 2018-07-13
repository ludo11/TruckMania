<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Thematiques {

		private $id_theme;

		private $nom_Thematiques;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId_theme (){
		return $this->id_theme;
	}


	public function setId_theme ($val){
		$this->id_theme = $val;
	}


	public function getNom_Thematiques (){
		return $this->nom_Thematiques;
	}


	public function setNom_Thematiques ($val){
		$this->nom_Thematiques = $val;
	}

}