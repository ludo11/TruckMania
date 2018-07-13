<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Visiteurs {

		private $id;

		private $nom;

		private $prenom;

		private $email;

		private $tel;

		private $adresse;

		private $Cartes_nom_carte;

		private $Villes_id_villes;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getNom (){
		return $this->nom;
	}


	public function setNom ($val){
		$this->nom = $val;
	}


	public function getPrenom (){
		return $this->prenom;
	}


	public function setPrenom ($val){
		$this->prenom = $val;
	}


	public function getEmail (){
		return $this->email;
	}


	public function setEmail ($val){
		$this->email = $val;
	}


	public function getTel (){
		return $this->tel;
	}


	public function setTel ($val){
		$this->tel = $val;
	}


	public function getAdresse (){
		return $this->adresse;
	}


	public function setAdresse ($val){
		$this->adresse = $val;
	}


	public function getCartes_nom_carte (){
		return $this->Cartes_nom_carte;
	}


	public function setCartes_nom_carte ($val){
		$this->Cartes_nom_carte = $val;
	}


	public function getVilles_id_villes (){
		return $this->Villes_id_villes;
	}


	public function setVilles_id_villes ($val){
		$this->Villes_id_villes = $val;
	}

}