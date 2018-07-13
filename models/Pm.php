<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Pm {

		private $id;

		private $id2;

		private $title;

		private $user1;

		private $user2;

		private $message;

		private $timestamp;

		private $lu;

		


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getId2 (){
		return $this->id2;
	}


	public function setId2 ($val){
		$this->id2 = $val;
	}


	public function getTitle (){
		return $this->title;
	}


	public function setTitle ($val){
		$this->title = $val;
	}


	public function getUser1 (){
		return $this->user1;
	}


	public function setUser1 ($val){
		$this->user1 = $val;
	}


	public function getUser2 (){
		return $this->user2;
	}


	public function setUser2 ($val){
		$this->user2 = $val;
	}


	public function getMessage (){
		return $this->message;
	}


	public function setMessage ($val){
		$this->message = $val;
	}


	public function getTimestamp (){
		return $this->timestamp;
	}


	public function setTimestamp ($val){
		$this->timestamp = $val;
	}



	public function getLu (){
		return $this->lu;
	}


	public function setLu ($val){
		$this->lu = $val;
	}

}