<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Pros;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/

//modifier le 26
class DAOPros extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


public function create ($array){
//            var_dump($array);
		$businessName = $array["nom_entreprise"];
		$name = $array["nom"];
		$firstName = $array["prenom"];
		$password = $array["password"];
		$email = $array["email"];
		$tel = $array["tel"];
		$n_siret = $array["n_siret"];
		$villes = $array['Villes_nom_villes'];
               
		if(!empty($villes))
		{
                    echo '<br>ville';
			$villes_sql = $this->getPdo()->prepare("SELECT ville_nom FROM Villes WHERE ville_nom = '" . $villes . "'");
			var_dump($villes_sql);
			$villes_sql->execute($array);
			$result = $villes_sql->fetch();
//			var_dump($result);
			
			
			if(TRUE)
			{
				$sql = "INSERT INTO Pros (nom_entreprise,nom,prenom,password,email,tel,n_siret,Villes_nom_villes) VALUES('". $businessName . "','" . $name . "','" . $firstName . "','" . $password . "','" . $email . "','" . $tel . "','" . $n_siret . "','" . $villes . "')";
				var_dump($sql);
				$this->getPdo()->query($sql);
                                return $result;
			}
                        echo 'Nom de ville inconnu';
			
		}
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Pros WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Pros();
		$entity->setNom_entreprise();
		$entity->setNom();
		$entity->setPrenom();
		$entity->setPassword();
		$entity->setEmail();
		$entity->setVilles_id_villes();
		$entity->setTel();
		$entity->setN_siret();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Pros SET nom_entreprise = '" . $entity->getNom_entreprise() ."',nom = '" . $entity->getNom() ."',prenom = '" . $entity->getPrenom() ."',password = '" . $entity->getPassword() ."',email = '" . $entity->getEmail() ."',villes_id_villes = '" . $entity->getVilles_id_villes() ."',tel = '" . $entity->getTel() ."',n_siret = '" . $entity->getN_siret() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Pros WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Pros";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Pros();
			$entity->setId($result['id']);
			$entity->setNom_entreprise($result['nom_entreprise']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['prenom']);
			$entity->setPassword($result['password']);
			$entity->setEmail($result['email']);
			$entity->setVilles_id_villes($result['Villes_id_villes']);
			$entity->setTel($result['tel']);
			$entity->setN_siret($result['n_siret']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Pros";
		$i = 0;
		foreach($filter as $key => $value){
			if($i===0){
				$sql .= " WHERE ";
			} else {
				$sql .= " AND ";
			}
			$sql .= $key . " = " . $value . "'";
			$i++;
		}
		$entities = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
			$entity = new Pros;
			$entity->setId($result['id_pro']);
			$entity->setNom_entreprise($result['nom_entreprise']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['prenom']);
			$entity->setPassword($result['password']);
			$entity->setEmail($result['email']);
			$entity->setVilles_id_villes($result['Villes_id_villes']);
			$entity->setTel($result['tel']);
			$entity->setN_siret($result['n_siret']);
			array_push($entities,$entity);
		}
		return $entities;
	}
        
     public function search($array)
    {
//		var_dump($array);
		$mail = $array['email'];

		$sql = $this->getPdo()->prepare("SELECT * FROM Pros WHERE email = '". $mail ."'");
		var_dump($sql);
        $sql->execute($array);
        $result = $sql->fetch();
        return $result;
    }
}