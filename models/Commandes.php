<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Commandes {

		private $id_commandes;

		private $date_creation;

		private $contenu;

		private $Visiteurs_id_visiteur;

		private $Clients_id_client;

		private $Admins_id_admin;

		private $Pros_id_pro;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId_commandes (){
		return $this->id_commandes;
	}


	public function setId_commandes ($val){
		$this->id_commandes = $val;
	}


	public function getDate_creation (){
		return $this->date_creation;
	}


	public function setDate_creation ($val){
		$this->date_creation = $val;
	}


	public function getContenu (){
		return $this->contenu ;
	}


	public function setContenu  ($val){
		$this->contenu  = $val;
	}


	public function getVisiteurs_id_visiteur (){
		return $this->Visiteurs_id_visiteur;
	}


	public function setVisiteurs_id_visiteur ($val){
		$this->Visiteurs_id_visiteur = $val;
	}


	public function getClients_id_client (){
		return $this->Clients_id_client;
	}


	public function setClients_id_client ($val){
		$this->Clients_id_client = $val;
	}

	public function getAdmins_id_admin (){
		return $this->Admins_id_admin;
	}


	public function setAdmins_id_admin ($val){
		$this->Admins_id_admin = $val;
	}


	public function getPros_id_pro (){
		return $this->Pros_id_pro;
	}


	public function setPros_id_pro ($val){
		$this->Pros_id_pro = $val;
	}
}