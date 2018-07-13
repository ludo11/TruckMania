<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use PDO;
/**
 * Description of ProsController
 *
 * @author ludo
 */
class ProsController extends Controller {
   
    public function  signUpPros() {
        
         if(!empty($_POST['businessName'] && !empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['siretNumber']) && !empty($_POST['ville'])))
        {
            $connect = new \BWB\Framework\mvc\dao\DAOPros;
            $businessName = htmlspecialchars($_POST['businessName']);
            $name = htmlspecialchars($_POST['name']);
            $firstName = htmlspecialchars($_POST['firstName']);
            $email = htmlspecialchars($_POST['email']);
            $tel = htmlspecialchars($_POST['tel']);
            $siretNumber = htmlspecialchars($_POST['siretNumber']);
            $ville = htmlspecialchars($_POST['ville']);
            if(!empty($_POST['password']))
                
            { 
                if($_POST['password'] === $_POST['verifPassword'])
                {
                    $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));
                    $entity = new \BWB\Framework\mvc\models\Pros();

                    $entity->setNom_entreprise($businessName);
                    $entity->setNom($name);
                    $entity->setPrenom($firstName);
                    $entity->setPassword($password);
                    $entity->setEmail($email);
                    $entity->setTel($tel);
                    $entity->setN_siret($siretNumber);
                    $entity->setVilles_nom_villes($ville);

                    $model = $connect->create(array(
                        "nom_entreprise" => $entity->getNom_entreprise(),
                        "nom" => $entity->getNom(),
                        "prenom" => $entity->getPrenom(),
                        "password" => $entity->getPassword(),
                        "email" => $entity->getEmail(),
                        "tel" => $entity->getTel(),
                        "n_siret" => $entity->getN_siret(),
                        "Villes_nom_villes" => $entity->getVilles_nom_villes()
                    ));
                    if(true){
                        header("location:/espace-pros/login");
                         echo 'Operation: success';
                    }
                       
                   
                }
                else
                {
                    echo 'Operation: verify the password';
                }
            }
            else
            {
                echo 'Operation: missing password';
            } 
        }
        else
        {
            echo 'Operation: missing datas';
        }
    }
    
    public function loginPros()
    {
//        var_dump($_POST['logInPassword']);
        if(!empty($_POST['logInMail'] && !empty($_POST['logInPassword'])))
        {
            $connect = new \BWB\Framework\mvc\dao\DAOPros();
            $mail = htmlspecialchars($_POST['logInMail']);
            $pass = htmlspecialchars($_POST['logInPassword']);
            $entity = new \BWB\Framework\mvc\models\Pros();

            $entity->setEmail($mail);
            $entity->setPassword($pass);

            $list = $connect->search(array(
                "email" => $entity->getEmail()
            ));

            if(password_verify($pass, $list['password']))
            {
                $_SESSION['id'] = $list['id'];
                $_SESSION['id_pro'] = $list['id_pro'];
                $_SESSION['nom_entreprise'] = $list['nom_entreprise'];
                $_SESSION['nom'] = $list['nom'];
                $_SESSION['prenom'] = $list['prenom'];
                $_SESSION['password'] = $list['password'];
                $_SESSION['email'] = $list['email'];
                $_SESSION['n_siret'] = $list['n_siret'];
                $_SESSION['Villes_nom_villes'] = $list['Villes_nom_villes'];
                $_SESSION['tel'] = $list['tel'];
                header("location:/espace-pros/profile");
//                var_dump($_SESSION['nom_entreprise']);
            }
            else
            {
                echo '<br>' . "Opperation: not connected";
            }
        }
        else
        {
            echo 'Operation: missing datas';
        }
    }
    
    public function createEvent() {
       if(!empty($_POST['nom_event'] && !empty($_POST['date_event']) && !empty($_POST['adresse']) && !empty($_POST['Villes_nom_villes'])  ))
        {           
            $connect = new \BWB\Framework\mvc\dao\DAOEvents;
            $eventName = htmlspecialchars($_POST['nom_event']);
            $date = htmlspecialchars($_POST['date_event']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $id = htmlspecialchars($_POST['Pros_id']);
            $ville = htmlspecialchars($_POST['Villes_nom_villes']);
            $role = htmlspecialchars($_POST['role']);
  
             
                  
                    $entity = new \BWB\Framework\mvc\models\Events();
                    
                    $entity->setNom_event($eventName);
                    $entity->setDate_event($date);
                    $entity->setAdresse($adresse);
                    $entity->setPros_id($id);
                    $entity->setVilles_nom_villes($ville);
                    $entity->setRole($role);
                
         
                    $model = $connect->create(array(
                        "nom_event" => $entity->getNom_event(),
                        "date_event" => $entity->getDate_event(),
                        "adresse" => $entity->getAdresse(),
                        "Pros_id" => $entity->getPros_id(),
                        "Villes_nom_villes" => $entity->getVilles_nom_villes(),
                        
                        "role" => $entity->getRole(),
                        
                    ));
                    if(true){
                        $retour = new \BWB\Framework\mvc\dao\DAOPm;
                        $message = $retour->messageEvenementAdmin($_SESSION['id_pro']);
                         header("location:/espace-pros/profile");  
                    echo 'En attente validation a admistrateur';
                    }
                    
                }
               
        
        else
        {
            echo 'Operation: missing datas';
        }
    }
//    mise a jour lundi 25
    
    
    
    
    public function getProEvent($id) {
//        var_dump($id);
    
        $model = new \BWB\Framework\mvc\dao\DAOEvents();
       
        $donnee = $model->eventPro($id);
        $datas = array(
            "event" => $donnee
                
        );
//        var_dump($datas);
        $this->render("ProEventPerso", $datas);
    }
    
    public function logoutPro() {
         if(isset($_SESSION['id_pro']))
        {
            if(!empty($_SESSION['id_pro']))
            {
                session_destroy();
                header('location:/espace-pros/login');
            }
        }
        else
        {
            echo '<br>' . '<br>' . '<br>' . 'déjà deco';
        }
    }
    
    public function  getCandidature($id) {
        $model = new \BWB\Framework\mvc\dao\DAOValiderPositionnement;
        $donnee = $model->getAllBy($id);
        $datas = array(
            'candidature' => $donnee
        );
//        var_dump($datas);
        $this->render('validationCandidatureParPro',$datas);
    }
    
    public function validFoodtruck() {
        $model = new \BWB\Framework\mvc\dao\DAOValiderPositionnement();
        $result = array(
            'id'=> ($_POST['id']),
//            'Foodtrucks_id' => ($_POST['Foodtrucks_id']),
            'role' => ($_POST['role']),
            'Events_id' => ($_POST['Events_id'])
        );
        var_dump($result);
        $resultat = $model->update($result);
//        self::getAllEvents ();
    }
    
    public function villeFormulaire(){
 
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=Trucksmania;charset=utf8', 'root', '', $pdo_options);
    $log = $_POST['birds'];
   
     
    $requete = $bdd->prepare('SELECT ville_nom  FROM Villes WHERE ville_nom LIKE :log LIMIT 0,10 '); // j'effectue ma requête SQL grâce au mot-clé LIKE
    $requete->execute(array('log' => $log."%"));
     
    $array = array(); // on créé le tableau
     
    while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
    {
        array_push($array, $donnee['ville_nom'] ); // et on ajoute celles-ci à notre tableau
    }
//    header('Content-Type: application/json');
    echo json_encode($array); // il n'y a plus qu'à convertir en JSON


   }
   
   public function reponse() {
 
 if( !empty($_POST['title']) && !empty($_POST['user1']) && !empty($_POST['message']))
        {
    
            $connect = new \BWB\Framework\mvc\dao\DAOPm;
            
            $tilte = htmlspecialchars($_POST['title']);
            $user1 = htmlspecialchars($_SESSION['id_pro']);
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
                        "id_pro" => $entity->getId2(),
                        "title" => $entity->getTitle(),
                        "id_pro" => $entity->getUser1(),
                        "user1" => $entity->getUser2(),
                        "message" => $entity->getMessage(),                       
                        "lu" => $entity->getLu(),
                        
                    ));
                    if(true){
                    
                         header("location:/espace-pros/messages/$user1");  
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
        $this->render("ProMessages", $datas);
       
    }
    public function notificationPm() {
//        echo $_SESSION['id_pro'];
        $message = new \BWB\Framework\mvc\dao\DAOPm;
        $mess = $message->retrieve($_SESSION['id_pro']);
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
        $this->render("ProVoirMessage", $datas);
       
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
