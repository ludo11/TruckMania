<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Clients;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOClients extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create($array)
{
	$pseudo = $array["pseudo"];
	$password = $array["password"];
	$email = $array["email"];
	$tel = $array["tel"];
	$address = $array["addresse"];
	$villes = $array['ville'];

	if(!empty($villes))
	{
		$villes_sql = $this->getPdo()->prepare("SELECT ville_nom FROM Villes WHERE ville_nom = '". $villes ."'");
		$villes_sql->execute($array);
		$result = $villes_sql->fetch();

		if($result)
		{
			$sql = "INSERT INTO Clients (pseudo,password,email,tel,adresse, Villes_nom_villes) VALUES('" . $pseudo . "','" . $password . "','" . $email . "','" . $tel . "','" . $address ."','" . $villes . "')";
			$this->getPdo()->query($sql);
			var_dump($sql);
		}
		if($result === FALSE)
		{
			echo 'Operation: Unknow city';
		}
		return $result;
	}
}


	public function retrieve ($id){

		$sql = "SELECT * FROM Clients WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch();
		$entity = new Clients();
		$entity->setId($result['id']);
		$entity->setPseudo($result['pseudo']);
		$entity->setPassword($result['password']);
		$entity->setEmail($result['email']);
		$entity->setTel($result['tel']);
		$entity->setAdresse($result['adresse']);
		$entity->setVilles_nom_villes($result['Villes_nom_villes']);
		return $entity;
	}


	public function update ($array){
            var_dump($array);
            $id = $array['id'];
            $email = $array['email'];
            $tel = $array['tel'];
            $adresse = $array['adresse'];
            $ville = $array['Villes_nom_villes'];
		$sql = "UPDATE Clients SET email = '$email' , tel = '$tel' , adresse = '$adresse', villes_nom_villes = '$ville' WHERE id = $id ";
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM Clients WHERE id= " . $id;
                var_dump($sql);
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM Clients";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Clients();
			$entity->setId($result['id']);
			$entity->setPseudo($result['pseudo']);
			$entity->setPassword($result['password']);
			$entity->setEmail($result['email']);
			$entity->setTel($result['tel']);
			$entity->setAdresse($result['adresse']);
			$entity->setVilles_nom_villes($result['Villes_nom_villes']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM Clients";
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
			$entity = new Clients;
			$entity->setId($result['id']);
			$entity->setPseudo($result['pseudo']);
			$entity->setPassword($result['password']);
			$entity->setEmail($result['email']);
			$entity->setTel($result['tel']);
			$entity->setAdresse($result['adresse']);
			$entity->setVilles_nom_villes($result['Villes_nom_villes']);
			array_push($entities,$entity);
		}
		return $entities;
	}

	public function search($array)
    {
		$mail = $array['email'];

		$sql = $this->getPdo()->prepare("SELECT * FROM Clients WHERE email = '". $mail ."'");
        $sql->execute($array);
        $result = $sql->fetch();
        return $result;
    }
    
    public function exist($array)
    {
		$mail = $array['email'];

		$sql = $this->getPdo()->prepare("SELECT * FROM Clients WHERE email = '". $mail ."'");
        $sql->execute($array);
		$email = $sql->rowcount($sql);

        return $email;
    }

}