<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Menus {

		private $id;

		private $nom_menu;

		private $Detail_menu;

		private $Prix_menu;

		private $Cartes_nom_carte;
		
		private $Cartes_Thematiques_nom_thematiques;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getNom_menu (){
		return $this->nom_menu;
	}


	public function setNom_menu ($val){
		$this->nom_menu = $val;
	}

	public function getDetail_menu (){
		return $this->Detail_menu;
	}

	public function setDetail_menu ($val){
		$this->Detail_menu = $val;
	}

	public function getPrix_menu (){
		return $this->Prix_menu;
	}

	public function setPrix_menu ($val){
		$this->Prix_menu = $val;
	}

		
	public function getCartes_nom_carte()
	{
		return $this->Cartes_nom_carte;
	}

		
	public function setCartes_nom_carte($val)
	{
		$this->Cartes_nom_carte = $val;
	}

	 
	public function getCartes_Thematiques_nom_thematiques()
	{
		return $this->Cartes_Thematiques_nom_thematiques;
	}

	
	public function setCartes_Thematiques_nom_thematiques($val)
	{
		$this->Cartes_Thematiques_nom_thematiques = $val;
	}
}