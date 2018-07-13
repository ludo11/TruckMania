<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Pros {

		private $id;

		private $nom_entreprise;

		private $nom;

		private $prenom;

		private $password;

		private $email;

		private $Villes_nom_villes;

		private $tel;

		private $n_siret;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId_pro (){
		return $this->id_pro;
	}


	public function setId_pro ($val){
		$this->id_pro = $val;
	}


	public function getNom_entreprise (){
		return $this->nom_entreprise;
	}


	public function setNom_entreprise ($val){
		$this->nom_entreprise = $val;
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


	public function getVilles_nom_villes (){
		return $this->Villes_nom_villes;
	}


	public function setVilles_nom_villes ($val){
		$this->Villes_nom_villes = $val;
	}


	public function getTel (){
		return $this->tel;
	}


	public function setTel ($val){
		$this->tel = $val;
	}


	public function getN_siret (){
		return $this->n_siret;
	}


	public function setN_siret ($val){
		$this->n_siret = $val;
	}

}