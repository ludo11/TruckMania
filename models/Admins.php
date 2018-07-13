<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Admins {

		private $id_admin;

		private $pseudo;

		private $password;

		private $email;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId_admin (){
		return $this->id_admin;
	}


	public function setId ($val){
		$this->id_admin = $val;
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

}