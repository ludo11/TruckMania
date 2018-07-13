<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class CommandesRapides {

		private $id;

		private $date_creation;

		private $Clients_id_client;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getDate_creation (){
		return $this->date_creation;
	}


	public function setDate_creation ($val){
		$this->date_creation = $val;
	}


	public function getClients_id_client (){
		return $this->Clients_id_client;
	}


	public function setClients_id_client ($val){
		$this->Clients_id_client = $val;
	}

}