<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Admins;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOAdmins extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO Admins (pseudo,password,email) VALUES('" . $entity->getPseudo() . ',' . $entity->getPassword() . ',' . $entity->getEmail() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM Admins WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Admins();
		$entity->setPseudo($result['id']);
		$entity->setPassword($result['password']);
		$entity->setEmail($result['email']);
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE Admins SET pseudo = '" . $entity->getPseudo() ."',password = '" . $entity->getPassword() ."',email = '" . $entity->getEmail() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Admins WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Admins";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Admins();
			$entity->setId($result['id']);
			$entity->setPseudo($result['pseudo']);
			$entity->setPassword($result['password']);
			$entity->setEmail($result['email']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Admins";
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
			$entity = new Admins;
			$entity->setId($result['id']);
			$entity->setPseudo($result['pseudo']);
			$entity->setPassword($result['password']);
			$entity->setEmail($result['email']);
			array_push($entities,$entity);
		}
		return $entities;
	}
        
         public function search($array)
    {
//		var_dump($array);
		$mail = $array['email'];

		$sql = $this->getPdo()->prepare("SELECT * FROM Admins WHERE email = '". $mail ." ' ");
//		var_dump($sql);
        $sql->execute($array);
        $result = $sql->fetch();
//        var_dump($result);
        return $result;
    }
}