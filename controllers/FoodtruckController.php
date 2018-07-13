<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
/**
 * Description of FoodtruckController
 *
 * @author ludo
 */
class FoodtruckController extends Controller
{
    public function signUpFoodtruck()
    {
        if(!empty($_POST['businessName'] && !empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['siretNumber']) && !empty($_POST['address'])))
        {
            $connect = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
            $businessName = htmlspecialchars($_POST['businessName']);
            $name = htmlspecialchars($_POST['name']);
            $firstName = htmlspecialchars($_POST['firstName']);
            $email = htmlspecialchars($_POST['email']);
            $tel = htmlspecialchars($_POST['tel']);
            $siretNumber = htmlspecialchars($_POST['siretNumber']);
            $address = htmlspecialchars($_POST['address']);
            $villes = htmlspecialchars($_POST['ville']);

            if(!empty($_POST['password']))
            {
                if($_POST['password'] === $_POST['verifPassword'])
                {
                    $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));
                    $entity = new \BWB\Framework\mvc\models\Foodtrucks;

                    $entity->setNom_entreprise($businessName);
                    $entity->setNom($name);
                    $entity->setPrenom($firstName);
                    $entity->setPassword($password);
                    $entity->setEmail($email);
                    $entity->setTel($tel);
                    $entity->setN_siret($siretNumber);
                    $entity->setAdresse($address);
                    $entity->setVilles_nom_villes($villes);
                    $dao = new \BWB\Framework\mvc\dao\DAOFoodtrucks();

                    if($dao->exist(array("email" => $entity->getEmail())) !== 0)
                    {
                        echo '<br>' . '<br>' . '<br>' . 'Operation: email already existing';
                        $view = new DefaultController();
                        $view->getSignUpFoodtruck();
                    }
                    else
                    {
                        $entity = $connect->create(array(
                            "nom_entreprise" => $entity->getNom_entreprise(),
                            "nom" => $entity->getNom(),
                            "prenom" => $entity->getPrenom(),
                            "password" => $entity->getPassword(),
                            "email" => $entity->getEmail(),
                            "tel" => $entity->getTel(),
                            "n_siret" => $entity->getN_siret(),
                            "addresse" => $entity->getAdresse(),
                            "ville" => $entity->getVilles_nom_villes()
                        ));
                        $session = new DefaultController();
                        $session->getLogInFoodtruck();
                    } 
                }
                else
                {
                    echo '<br>' . '<br>' . '<br>' . 'Operation: verify the password';
                    $view = new DefaultController(); 
                    $view->getSignUpFoodtruck();
                }
            }
            else
            {
                echo '<br>' . '<br>' . '<br>' . 'Operation: missing password';
                $view = new DefaultController(); 
                $view->getSignUpFoodtruck();
            }
        }
        else
        {
            echo '<br>' . '<br>' . '<br>' . 'Operation: missing datas';
            $view = new DefaultController(); 
            $view->getSignUpFoodtruck();
        }
    }
 public function loginFoodtruck()
    {
        if(!empty($_POST['logInMail'] && !empty($_POST['logInPassword'])))
        {
            $connect = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
            $mail = htmlspecialchars($_POST['logInMail']);
            $pass = htmlspecialchars($_POST['logInPassword']);
            $entity = new \BWB\Framework\mvc\models\Foodtrucks;

            $entity->setEmail($mail);
            $entity->setPassword($pass);
            $list = $connect->search(array(
                "email" => $entity->getEmail()
            ));

            if(password_verify($pass, $list['password']))
            {
                $_SESSION['id'] = $list['id'];
                $_SESSION['idF'] = $list['id'];
                $_SESSION['nom_entreprise'] = $list['nom_entreprise'];
                $_SESSION['nom'] = $list['nom'];
                $_SESSION['prenom'] = $list['prenom'];
                $_SESSION['password'] = $list['password'];
                $_SESSION['email'] = $list['email'];
                $_SESSION['tel'] = $list['tel'];
                $_SESSION['n_siret'] = $list['n_siret'];
                $_SESSION['adresse'] = $list['adresse'];
                $_SESSION['Villes_nom_villes'] = $list['Villes_nom_villes'];
                $_SESSION['id_thematique'] = $list['Thematiques_nom_thematiques'];
                
                if($_SESSION)
                {
                    $dao = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
                    $dao->searchTheme(array("email" => $list['email']));
                }
            }
            else
            {
                echo '<br>' . '<br>' . '<br>' . "Opperation: not connected";
                $view = new DefaultController(); 
                $view->getLogInFoodtruck();
            }
        }
        else
        {
            echo '<br>' . '<br>' . '<br>' . 'Operation: missing datas';
            $view = new DefaultController(); 
            $view->getLogInFoodtruck();
        }
    }



   /* public function createSession()
    {
        if(!$_SESSION)
        {
            session_start();
            $_SESSION['id'] = $list['id'];
            $_SESSION['idF'] = $list['id'];
            $_SESSION['nom_entreprise'] = $list['nom_entreprise'];
            $_SESSION['nom'] = $list['nom'];
            $_SESSION['prenom'] = $list['prenom'];
            $_SESSION['password'] = $list['password'];
            $_SESSION['email'] = $list['email'];
            $_SESSION['tel'] = $list['tel'];
            $_SESSION['n_siret'] = $list['n_siret'];
            $_SESSION['adresse'] = $list['adresse'];
            $_SESSION['Villes_nom_villes'] = $list['Villes_nom_villes'];
            $theme = new FoodtruckController();
            $theme->getAllTheme();
        }
        else
        {
            session_destroy();
        
        }
        
    }*/

    public function getAllEvents()
    {
        $dao = new \BWB\Framework\mvc\dao\DAOEvents;
        $events = $dao->getAll();

        $datas = array(
            "event" => $events
        );

        $this->render("EventForFoodtruck", $datas);
    }

    public function getAllTheme()
    {
        $dao = new \BWB\Framework\mvc\dao\DAOThematiques;
        $themes = $dao->getAll();

        $datas = array(
            "themes" => $themes
        );

        $this->render("allThemes", $datas);
    }    

     public function toPositionYourself()
    {
        $model = new \BWB\Framework\mvc\dao\DAOValiderPositionnement;
        $donnee = array(
            $eventId = htmlspecialchars($_POST['Events_id']),
	    $FoodtruckId = htmlspecialchars($_POST['Foodtrucks_id']),
            );
        $model->create($donnee);
        
        $this->render("profileFoodtruck");
        
    }

    public function addCard($id)
    {
        
        if(!empty($_POST['name']) && isset($_SESSION['idF']))
        {           
            $dao = new \BWB\Framework\mvc\dao\DAOCartes; 

            $name = htmlspecialchars($_POST['name']);
            $id_food = $_SESSION['idF'];
            
            $entity = new \BWB\Framework\mvc\models\Cartes;
            $theme = new \BWB\Framework\mvc\models\Thematiques;
            
            $entity->setNom_carte($name);
            $entity->setFoodtrucks_id($id_food);
            $theme->setId_theme($id);
////            
            $cards = $dao->create(array(
                "nom_carte" => $entity->getNom_carte(),
                "Foodtrucks_id" => $entity->getFoodtrucks_id(),
                "id_theme" => $theme->getId_theme()
            )); 
            $card = new DefaultController();
            $card->getAllCards();
        }  
    }

     
    public function getMenu($id)
    {
        $daoMenu = new \BWB\Framework\mvc\dao\DAOMenus;
        $menu = $daoMenu->retrieve($id);

        $datas = array(
            "menu" => $menu
        );

        $this->render("menu", $datas);
    }
    
    public function getMyEvents($id) {
        $model = new \BWB\Framework\mvc\dao\DAOValiderPositionnement;
        $donnee = $model->getStatut($id);

        //var_dump($donnee);
        $datas = array(
            'info' => $donnee['entite'],
            'event' => $donnee['event'],
            'food' => $donnee['food'],
         
        );
        
//        var_dump($datas);
        $this->render("foodtruckMyEvent", $datas);
    }
    
      public function addMenu($id)
    {  
        if(!empty($_POST['nameMenu']) AND !empty($_POST['detail']) AND !empty($_POST['price']) AND !empty($_POST['theme']))
        {   
            $daoMenu = new \BWB\Framework\mvc\dao\DAOMenus;

            $name = htmlspecialchars($_POST['nameMenu']);
            $detail = htmlspecialchars($_POST['detail']);
            $price = htmlspecialchars($_POST['price']);
            $theme = $_POST['theme'];

            $entity = new \BWB\Framework\mvc\models\Menus;

            $entity->setNom_menu($name);
            $entity->setDetail_menu($detail);
            $entity->setPrix_menu($price);
            $entity->setCartes_Thematiques_nom_thematiques($theme);

            $menu = $daoMenu->create(array(
                "nameMenu" => $name,
                "detail" => $detail,
                "price" => $price,
                "id_card" => $id,
                "theme" => $theme
            ));
            $card = new DefaultController();
            $card->getAllCards();
        }
    }
    
      public function createAgenda($id) {
        $agenda = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
        $model = new \BWB\Framework\mvc\dao\DAOJours;
        $jours = $model->getAll();
        $perso = $agenda->persoAgenda($id);
        $datas = array(
            'jours'=> $jours,
            'perso'=>$perso,
        );
//        var_dump($datas);
        $this->render("createAgenda",$datas);
    }
    
    public function validerAgenda() {
    
        if(!empty($_POST['id'] && !empty($_POST['ville']) && !empty($_POST['jour'])));
        {
            $model = array(
                'id'=> $_POST['id'],
                'jour'=> $_POST['jour'],
                'horaire'=> $_POST['horaire'],
                'ville'=> $_POST['ville'],
            );
            $agenda = new \BWB\Framework\mvc\dao\DAOAgendaFoodtruck;
            $donnee = $agenda->create($model);
            $view = new FoodtruckController(); 
            $view->createAgenda($_POST['id']);
        }
            echo '<br>' . '<br>' . '<br>' . 'Operation: missing datas';
            $view = new FoodtruckController(); 
            $view->createAgenda($_POST['id']);
        
        
    }
    
 public function reponse() {
 
 if( !empty($_POST['title']) && !empty($_POST['user1']) && !empty($_POST['message']))
        {
    
            $connect = new \BWB\Framework\mvc\dao\DAOPm;
            
            $tilte = htmlspecialchars($_POST['title']);
            $user1 = htmlspecialchars($_SESSION['id']);
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
                        "id" => $entity->getId2(),
                        "title" => $entity->getTitle(),
                        "id" => $entity->getUser1(),
                        "user1" => $entity->getUser2(),
                        "message" => $entity->getMessage(),                       
                        "lu" => $entity->getLu(),
                        
                    ));
                    if(true){
                    
                         header("location:/espace-foodtruck/profil");  
                    echo 'ok';
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
        $this->render("FoodtruckMessages", $datas);
       
    }
    public function notificationPm() {
//        echo $_SESSION['id'];
        $message = new \BWB\Framework\mvc\dao\DAOPm;
        $mess = $message->retrieve($_SESSION['id']);
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
        $this->render("FoodtruckVoirMessage", $datas);
       
    }   
    

}