<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Foodtrucks;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOFoodtrucks extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	
	public function create($array)
	{
//            var_dump($array);
		$businessName = $array["nom_entreprise"];
		$name = $array["nom"];
		$firstName = $array["prenom"];
		$password = $array["password"];
		$email = $array["email"];
		$tel = $array["tel"];
		$n_siret = $array["n_siret"];
		$address = $array["addresse"];
		$villes = $array['ville'];

		if(!empty($villes))
		{
			$villes_sql = $this->getPdo()->prepare("SELECT ville_nom FROM Villes WHERE ville_nom = '". $villes ."'");
			$villes_sql->execute($array);
			$result = $villes_sql->fetch();
			
			if($result)
			{
				$sql = "INSERT INTO Foodtrucks (nom_entreprise,nom,prenom,password,email,tel,n_siret,adresse, Villes_nom_villes) VALUES('". $businessName . "','" . $name . "','" . $firstName . "','" . $password . "','" . $email . "','" . $tel . "','" . $n_siret . "','" . $address ."','" . $villes . "')";
				$this->getPdo()->query($sql);
//				var_dump($sql);
			}
			if($result === FALSE)
			{
				echo 'Operation: Unknow city';
			}
			return $result;
		}
	}


	public function retrieve ($id){

		$sql =  "SELECT f.*, Villes.lng1 , Villes.lat1 FROM Foodtrucks f INNER JOIN Villes ON Villes.Ville_nom = f.Villes_nom_villes WHERE id='$id' ";
                $statement = $this->getPdo()->query($sql);
                $result = $statement->fetch();
//                $entities = array();
                $entity = new Foodtrucks();
                $entity->setId($result['id']);
		$entity->setNom_entreprise($result['nom_entreprise']);
	        $entity->setNom($result['adresse']);
	        $entity->setPrenom($result['prenom']);
	        $entity->setPassword($result['password']);
                $entity->setEmail($result['email']);
		$entity->setTel($result['tel']);
		$entity->setN_siret($result['lat1']);
		$entity->setAdresse($result['lng1']);
		$entity->setVilles_nom_villes($result['Villes_nom_villes']);
		$entity->setThematiques_nom_thematiques($result['Thematiques_nom_thematiques']);	

		return $entity;
	}


	public function update ($array)
	{
		$id = $array['id'];
		$id_food = $array['session'];
//                var_dump($id_food);
		if(isset($id))
		{
			$theme_sql = $this->getPdo()->prepare("SELECT nom_Thematiques FROM Thematiques WHERE id_theme = '". $id ."'");
			$theme_sql->execute($array);
			$result = $theme_sql->fetch();
		
			if($result)
			{
				$sql = "UPDATE Foodtrucks SET Thematiques_nom_thematiques = '" . $result['nom_Thematiques'] . "' WHERE id = '". $id_food ."'";
				$this->getPdo()->query($sql);
			}
			return $result;
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Foodtrucks WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT Villes.lng1,Villes.lat1, f.* FROM Foodtrucks f INNER JOIN Villes ON Villes.Ville_nom = f.Villes_nom_villes";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
//                var_dump($results);
		$entities = array();
//
		foreach($results as $result){
			$entity = new Foodtrucks();
			$entity->setId($result['id']);
			$entity->setNom_entreprise($result['nom_entreprise']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['lat1']);
			$entity->setPassword($result['lng1']);
			$entity->setEmail($result['email']);
			$entity->setTel($result['tel']);
			$entity->setN_siret($result['n_siret']);
			$entity->setAdresse($result['adresse']);
			$entity->setVilles_nom_villes($result['Villes_nom_villes']);
			$entity->setThematiques_nom_thematiques($result['Thematiques_nom_thematiques']);
//                        $coordonnees = new \BWB\Framework\mvc\models\Villes();
//                        $coordonnees->setLat1($result['lat1']);
//                         $coordonnees->setLng1($result['lng1']);
			array_push($entities,$entity);
		}
//                var_dump($entities);
		return $entities;
	}


	public function getAllBy ($filter){
//            var_dump($filter);
		$sql = "SELECT * FROM Foodtrucks WHERE Villes_nom_villes = '$filter' ";
//                var_dump($sql);
		
		$entities = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
			$entity = new Foodtrucks;
			$entity->setId($result['id']);
			$entity->setNom_entreprise($result['nom_entreprise']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['prenom']);
			$entity->setPassword($result['password']);
			$entity->setEmail($result['email']);
			$entity->setTel($result['tel']);
			$entity->setN_siret($result['n_siret']);
			$entity->setAdresse($result['adresse']);
			$entity->setVilles_nom_villes($result['Villes_nom_villes']);
			$entity->setThematiques_nom_thematiques($result['Thematiques_nom_thematiques']);
			array_push($entities,$entity);
		}
//                var_dump($entity);
		return $entities;
	}

/* ____________________ Methods____________________*/

	public function search($array)
    {
            $mail = $array['email'];

            $sql = $this->getPdo()->prepare("SELECT * FROM Foodtrucks WHERE email = '". $mail ."'");
            $sql->execute($array);
            $result = $sql->fetch();
            return $result;
    }
    
    	public function exist($array)
    {
		$mail = $array['email'];

		$sql = $this->getPdo()->prepare("SELECT * FROM Foodtrucks WHERE email = '". $mail ."'");
        $sql->execute($array);
		$email = $sql->rowcount($sql);
    
        return $email;
    }
    
    public function searchTheme($array)
    {
		$mail = $array['email'];

		if(isset($mail))
		{
			$sql = $this->getPdo()->prepare("SELECT Thematiques_nom_thematiques FROM Foodtrucks WHERE email = '". $mail ."'");
			$sql->execute($array);
			$result = $sql->fetch();
			
		
			if(!empty($result))
			{
				if($result['Thematiques_nom_thematiques'] === NULL)
				{
					$theme = new \BWB\Framework\mvc\controllers\FoodtruckController();
                    $theme->getAllTheme();
				}
				elseif(!empty($result))
				{
					$profil = new \BWB\Framework\mvc\controllers\DefaultController();
					$profil->getProfileFoodtruck();	
				}
			}
			return $result;
		}	
	}
        
    public function persoAgenda($id){
   
        $sql = "SELECT Agenda_foodtruck.Horaires,Agenda_foodtruck.jours,Agenda_foodtruck.ville FROM `Foodtrucks` INNER JOIN Agenda_foodtruck ON Foodtrucks.id = Agenda_foodtruck.Foodtrucks_id WHERE $id ";
                var_dump($sql);
//		
		$entities = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
			$entity = new \BWB\Framework\mvc\models\AgendaFoodtruck;
			$entity->setHoraires($result['Horaires']);
			$entity->setJours($result['jours']);
                        $entity->setVille($result['ville']);
			
			array_push($entities,$entity);
		}
//                var_dump($entity);
		return $entities;
    }

}