<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Clients {

		private $id;

		private $pseudo;

		private $password;

		private $email;

		private $tel;

		private $adresse;

		private $Villes_nom_villes;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getPseudo (){
		return $this->pseudo;
	}


	public function setPseudo ($val){
		$this->pseudo = $val;
	}


	public function getPassword (){
		return $this->password;
	}


	public function setPassword ($val){
		$this->password = $val;
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


	public function getVilles_nom_villes (){
		return $this->Villes_nom_villes;
	}


	public function setVilles_nom_villes ($val){
		$this->Villes_nom_villes = $val;
	}

}