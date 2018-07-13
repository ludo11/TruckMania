<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;

/**
 * Description of AdminController
 *
 * @author ludo
 */
class AdminController extends Controller{
    public function loginAdmin()
    {
//        var_dump($_POST['logInPassword']);
        if(!empty($_POST['logInMail'] && !empty($_POST['logInPassword'])))
        {
            $connect = new \BWB\Framework\mvc\dao\DAOAdmins;
            $mail = htmlspecialchars($_POST['logInMail']);
            $pass = htmlspecialchars($_POST['logInPassword']);
            $entity = new \BWB\Framework\mvc\models\Admins;

            $entity->setEmail($mail);
            $entity->setPassword($pass);

            $list = $connect->search(array(
                "email" => $entity->getEmail()
            ));

           
                $_SESSION['id'] = $list['id'];
                $_SESSION['id_admin'] = $list['id_admin'];
                $_SESSION['pseudo'] = $list['pseudo'];
                $_SESSION['email'] = $list['email'];
              
                header("location:/espace-administration");
                var_dump($list);
            
           
           
        }
        else
        {
            echo 'Operation: missing datas';
        }
    }
    
//    mise a jour lundi 25 juin
    
    public function getClients() {
        $model = new \BWB\Framework\mvc\dao\DAOClients;
        $donnee = $model->getAll();
        
        $datas = array (
          "clients" => $donnee  
        );
//        var_dump($datas);
        $this->render("AdministrationClient" , $datas);
        
    }
    
    public function getIdInfoClient($id) {
       
       $dao = new \BWB\Framework\mvc\dao\DAOClients();
       
////       echo $id;
       $donnees = $dao->retrieve($id);
//       var_dump($donnees);
       $dataClient = array(
           "detail" => $donnees
       );
       $this->render("administrationInfoClient", $dataClient);

   }
   
   public function deleteClient($id) {
       $client = new \BWB\Framework\mvc\dao\DAOClients;
       $delete = $client->delete($id);
       self::getClients();
       
   }
   
   public function  getFoodtruck() {
       $model = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
        $donnee = $model->getAll();
        
        $datas = array (
          "foodtruck" => $donnee  
        );
//        var_dump($datas);
        $this->render("AdministrationFoodtruck" , $datas);
       
   }
   
   public function getIdInfoFoodtruck($id) {
       
       $dao = new \BWB\Framework\mvc\dao\DAOFoodtrucks();
       
////       echo $id;
       $donnees = $dao->retrieve($id);
//       var_dump($donnees);
       $dataClient = array(
           "detail" => $donnees
       );
       $this->render("administrationInfoFoodtruck", $dataClient);

   }
   
   public function deleteFoodtruck($id) {
       $foodtruck = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
       $delete = $foodtruck->delete($id);
       self::getFoodtruck();
       
   }
   
   public  function getAllEvents () {
       $evenement = new \BWB\Framework\mvc\dao\DAOEvents;
       $event = $evenement->getAll();
       $datas = array (
          "event" => $event  
        );
//        var_dump($datas);
        $this->render("AdministrationEvenement" , $datas);
   }
   
   public function getIdInfoEvent ($id) {
        $dao = new \BWB\Framework\mvc\dao\DAOEvents();
       
////       echo $id;
       $donnees = $dao->retrieve($id);
//       var_dump($donnees);
       $dataClient = array(
           "detail" => $donnees
       );
       $this->render("administrationInfoEvenement", $dataClient);
   }
   
    public function logoutAdmin()
    {
        if(isset($_SESSION['id_admin']))
        {
            if(!empty($_SESSION['id_admin']))
            {
                session_destroy();
                header('location:/administration');
            }
        }
        else
        {
            echo '<br>' . '<br>' . '<br>' . 'déjà deco';
        }
    }
    
    public function validEvent() {
        $model = new \BWB\Framework\mvc\dao\DAOEvents;
        $result = array(
            'id'=> ($_POST['id']),
            'role' => ($_POST['role'])
        );
//        var_dump($donnee);
        $resultat = $model->update($result);
        $reponse = new \BWB\Framework\mvc\dao\DAOPm;
        $message = $reponse->validationEvenementAdmin($_POST['id']);
        self::getAllEvents ();
    }
    
    public function deleteEvent($id) {
       $event = new \BWB\Framework\mvc\dao\DAOEvents();
       $delete = $event->delete($id);
       self::getAllEvents();
       
   }
    
    public function reponse() {
 
 if( !empty($_POST['title']) && !empty($_POST['user1']) && !empty($_POST['message']))
        {
    
            $connect = new \BWB\Framework\mvc\dao\DAOPm;
            
            $tilte = htmlspecialchars($_POST['title']);
            $user1 = htmlspecialchars($_SESSION['id_admin']);
            $user2 = htmlspecialchars($_POST['user1']);
            $message = htmlspecialchars($_POST['message']);
            $lu = htmlspecialchars($_POST['lu']);
  
             
                  
                    $entity = new \BWB\Framework\mvc\models\Pm();
                    
                    
                    $entity->setTitle($tilte);
                    $entity->setUser1($user1);
                    $entity->setUser2($user2);
                    $entity->setMessage($message);
                    $entity->setLu($lu);
                
         
                    $model = $connect->reponse(array(
                       
                        "title" => $entity->getTitle(),
                        "id_admin" => $entity->getUser1(),
                        "user1" => $entity->getUser2(),
                        "message" => $entity->getMessage(),                       
                        "lu" => $entity->getLu(),
                        
                    ));
                    if(true){
                    
                         header("location:/espace-admin/messages/$user1");  
//                    echo 'ok';
                    }
                    
                }
               
        
        else
        {
            echo 'Operation: missing datas';
        }
    }

    
 public function getProPm($id) {
//        var_dump($id);
    
        $model = new \BWB\Framework\mvc\dao\DAOPm();
       
        $donnee = $model->retrieve($id);
        
        $datas = array(
            "message" => $donnee,
            
        );
//        var_dump($datas);
        $this->render("AdminMessages", $datas);
       
    }
    public function notificationPm() {
//        echo $_SESSION['id_admin'];
        $message = new \BWB\Framework\mvc\dao\DAOPm;
        $mess = $message->retrieve($_SESSION['id_admin']);
        $datas = array(
            'lu'=>$mess,
            
        );
//        var_dump($mess);
        $model = new \BWB\Framework\mvc\dao\DAOPm;
        $nonLu = $model->nonLu($datas);
        
    }
    
    public function voirMessage($id) {
//        var_dump($id);
    
        $model = new \BWB\Framework\mvc\dao\DAOPm();
       
        $donnee = $model->retrievePm($id);
        
        $datas = array(
            "message" => $donnee,
             
        );
//        var_dump($datas);
        $this->render("AdminVoirMessage", $datas);
       
    } 
    
    public function updatePm ($id){
//            var_dump($id);
		$sql = "UPDATE pm SET lu=:lu WHERE id= $id ";
//                var_dump($sql);
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}

    
 }
