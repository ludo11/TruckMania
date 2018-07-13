<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Villes {

		private $ville_id;

		private $ville_departement;

		private $ville_nom;

		private $ville_code_postal;

		private $lng1;

		private $ville_latitude_deg;

		private $ville_longitude_grd;

		private $ville_latitude_grd;

		private $ville_longitude_dms;

		private $ville_latitude_dms;


/* ____________________ Getter and Setter Part ____________________ */


	public function getVille_id (){
		return $this->ville_id;
	}


	public function setVille_id ($val){
		$this->ville_id = $val;
	}


	public function getVille_departement (){
		return $this->ville_departement;
	}


	public function setVille_departement ($val){
		$this->ville_departement = $val;
	}


	public function getVille_nom (){
		return $this->ville_nom;
	}


	public function setVille_nom ($val){
		$this->ville_nom = $val;
	}


	public function getVille_code_postal (){
		return $this->ville_code_postal;
	}


	public function setVille_code_postal ($val){
		$this->ville_code_postal = $val;
	}


	public function getLng1 (){
		return $this->lng1;
	}


	public function setLng1 ($val){
		$this->lng1 = $val;
	}


	public function getLat1 (){
		return $this->lat1;
	}


	public function setLat1 ($val){
		$this->lat1 = $val;
	}


	public function getVille_longitude_grd (){
		return $this->ville_longitude_grd;
	}


	public function setVille_longitude_grd ($val){
		$this->ville_longitude_grd = $val;
	}


	public function getVille_latitude_grd (){
		return $this->ville_latitude_grd;
	}


	public function setVille_latitude_grd ($val){
		$this->ville_latitude_grd = $val;
	}


	public function getVille_longitude_dms (){
		return $this->ville_longitude_dms;
	}


	public function setVille_longitude_dms ($val){
		$this->ville_longitude_dms = $val;
	}


	public function getVille_latitude_dms (){
		return $this->ville_latitude_dms;
	}


	public function setVille_latitude_dms ($val){
		$this->ville_latitude_dms = $val;
	}

}