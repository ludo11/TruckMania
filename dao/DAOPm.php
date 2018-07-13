<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Pm;
use PDO;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOPm extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	
        public function create($array){
 
//            var_dump($array);
//            
                $user2 = $array["user1"];
		$message = $array["message"];
		$tilte = $array["title"];
                 if(!empty($_SESSION['id_pro'])){
                $user1 = htmlspecialchars($_SESSION['id_pro']);
            }
              if(!empty($_SESSION['pseudo'])){
                $user1 = htmlspecialchars($_SESSION['pseudo']);
            }
              if(!empty($_SESSION['id'])){
                $user1 = htmlspecialchars($_SESSION['id']);
            }
		
		
		
//          
////                           
				$sql = "INSERT INTO pm (title,user1,user2,message,lu) VALUES('". $tilte . "','" . $user1 . "','" . $user2 . "','" . $message ."','". "0')";
				var_dump($sql);
				$result = $this->getPdo()->query($sql);
                                return $result;
//			}echo '';
//                        
//			
//		}
	}
        


 public function reponse ($array){
 
    
//            
               
        $tilte = $array["title"];     
         if(!empty($_SESSION['id_pro'])){
                $user1 = htmlspecialchars($_SESSION['id_pro']);
            }
             
              if(!empty($_SESSION['id'])){
                $user1 = htmlspecialchars($_SESSION['id']);
            }
             if(!empty($_SESSION['id_admin'])){
                $user1 = htmlspecialchars($_SESSION['id_admin']);
            }
        $user2 = $array["user1"];
        $message = $array["message"];
        $lu = $array["lu"];
//               var_dump($user2);
//      if(!empty($user2))
//      {
////            $food_sql = $this->getPdo()->prepare("SELECT `id`,`nom_entreprise` FROM Foodtrucks WHERE `id` = '" . $user2 . "'");
//          var_dump($food_sql);
//          $food_sql->execute($array);
//          $result = $food_sql->fetch();
//          var_dump($result);
//          
//          
//          if($result)
//          {
//                            var_dump($result);
                $sql = "INSERT INTO pm (title,user1,user2,message,lu) VALUES('" . $tilte . "','" . $user1 . "','" . $user2 . "','" . $message ."','". "0')";
//              var_dump($sql);
                $this->getPdo()->query($sql);
//                               return $result;
//          }echo '';
//                        
            
        }



        
        
        public function messageEvenementAdmin ($id){
 
	
//            
               
		$tilte = "Demande d evenement";		
		
                $user1 = $id;
          
		$user2 ="1";
		$message = "Nouvel evenement créer par un pro validez ou refuser sont evenement";
		$lu = "0";
////               var_dump($user2);
////		if(!empty($user2))
////		{
//////			$food_sql = $this->getPdo()->prepare("SELECT `id`,`nom_entreprise` FROM Foodtrucks WHERE `id` = '" . $user2 . "'");
////			var_dump($food_sql);
////			$food_sql->execute($array);
////			$result = $food_sql->fetch();
////			var_dump($result);
////			
////			
////			if($result)
////			{
////                            var_dump($result);
				$sql = "INSERT INTO pm (title,user1,user2,message,lu) VALUES('" . $tilte . "','" . $user1 . "','" . $user2 . "','" . $message ."','". "0')";
				var_dump($sql);
				$this->getPdo()->query($sql);
////                               return $result;
////			}echo '';
////                        
//        	
		}
//	}
   
            
            
        
//$id2 = $array['id2'] ;           
//$title = $array['title'];
//$user2 = $array['user2'];
//$message = $array['message'];
//$dn1 = $this->getPdo()->prepare('SELECT COUNT (id) as user2, id as userid, (SELECT COUNT (*) from pm) as npm from Pros where nom_entreprise="'.$user2.'"');
//$dn1->execute($array);
//$sql = 'INSERT INTO pm (id2, title, user1, user2, message, lu) VALUES( "1", "'.$title.'", "'.$_SESSION['userid'].'", "'.$dn1['recipid'].'", "'.$message.'", "0")';              
//$this->getPdo()->query($sql);
//	}


	public function retrieve ($id){

		$sql = "SELECT * FROM pm WHERE user2=" . $id;
//                var_dump($sql);
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();
//                var_dump($results);
		foreach($results as $result){
                    $entity = new Pm();
//                    var_dump($result);
                $entity->setId($result['id']);    		
		$entity->setTitle($result['title']);
		$entity->setUser1($result['user1']);
		$entity->setUser2($result['user2']);
		$entity->setMessage($result['message']);
		$entity->setLu($result['lu']);
                $entity->setTimestamp($result['timestamp']);
                array_push($entities,$entity);
                }
//                var_dump($entities);
		return $entities;
	}
        
        public function nonLu($array){
//            var_dump($array);
            $idUser = $array['lu'][0]->getUser1();
            $sql = "SELECT `lu` FROM `pm` WHERE `user1` = $idUser";
//            var_dump($sql);
            $statement = $this->getPdo()->query($sql);
		$results = $statement->fetchall();
//		var_dump($results);
             return $results;
                
                
//                var_dump($entities);
//                var_dump($entities);
//               var_dump($array['lu'][0]->getUser1());   
//            for($i = 0; $i <= count($array);$i++){
//           var_dump($array['lu'][$i]->getLu());
//           
////                var_dump($array['lu'][$i++]->getUser1());
////                var_dump($array['lu'][$i++]->getLu());
//            }
//            $user = $array[$lu->getUser1()];
//            var_dump($user);
//            $sql = " SELECT COUNT(id) as row FROM pm WHERE lu=:lu";
        }
        
        


	public function update ($id){
//            var_dump($id);
		$sql = "UPDATE pm SET lu=:lu WHERE id= $id ";
                var_dump($sql);
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM pm WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM pm";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Pm();
                        $entity->setId($result['id']);		
			$entity->setTitle($result['title']);
			$entity->setUser1($result['user1']);
			$entity->setUser2($result['user2']);
			$entity->setMessage($result['message']);
			$entity->setLu($result['lu']);
			$entity->setTimestamp($result['timestamp']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM pm";
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
			$entity = new Pm;
			$entity->setId($result['id']);
			$entity->setTitle($result['title']);
			$entity->setUser1($result['user1']);
			$entity->setUser2($result['user2']);
			$entity->setMessage($result['message']);
			$entity->setLu($result['lu']);
                        $entity->setTimestamp($result['timestamp']);
			array_push($entities,$entity);
		}
		return $entities;
	}
        
        public function retrievePm ($id){

		$sql = "SELECT * FROM pm WHERE id=" . $id;
//                var_dump($sql);
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();
//                var_dump($results);
		foreach($results as $result){
                    $entity = new Pm();
//                    var_dump($result);
                $entity->setId($result['id']);    
		$entity->setTitle($result['title']);
		$entity->setUser1($result['user1']);
		$entity->setUser2($result['user2']);
		$entity->setMessage($result['message']);
		$entity->setLu($result['lu']);
                $entity->setTimestamp($result['timestamp']);
                array_push($entities,$entity);
                }
//                var_dump($entities);
                return $entities;
        }
        
         public function validationEvenementAdmin ($id){
 
	
//            
               
		$tilte = "Evenement valider";		
		
                $user1 = '1';
          
		$user2 = $id;
		$message = "Votre evenement a était accepté il est visible sur l espace evenement pour les Food trucks";
		$lu = "0";
////               var_dump($user2);
////		if(!empty($user2))
////		{
//////			$food_sql = $this->getPdo()->prepare("SELECT `id`,`nom_entreprise` FROM Foodtrucks WHERE `id` = '" . $user2 . "'");
////			var_dump($food_sql);
////			$food_sql->execute($array);
////			$result = $food_sql->fetch();
////			var_dump($result);
////			
////			
////			if($result)
////			{
////                            var_dump($result);
				$sql = "INSERT INTO pm (title,user1,user2,message,lu) VALUES('" . $tilte . "','" . $user1 . "','" . $user2 . "','" . $message ."','". "0')";
				var_dump($sql);
				$this->getPdo()->query($sql);
////                               return $result;
////			}echo '';
////                        
//        	
		}
        
}