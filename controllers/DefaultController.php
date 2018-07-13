<?php
namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewController
 *
 * @author loic
 */
class DefaultController extends Controller{
    
//accueil
    public function getDefault() {
        
        $this->render("default");
    }
//    --------foodtrucks------------
     public function getSignUpFoodtruck() {
       
        $this->render("sign");
    }
    
     public function getSpaceFoodtruck() {
       
        $this->render("espaceFood");
    }
    
    public function signUpFoodtruck() {
        
        $this->render();
    }
    
    public function getLogInFoodtruck() {
        $this->render("login");
    }
    
     public function getProfileFoodtruck()
    {
         $daoTheme = new \BWB\Framework\mvc\dao\DAOThematiques;
         $theme = $daoTheme->getTheme($_SESSION['id']);
         
         $datas = array(
             "theme" => $theme
         );
        //var_dump($datas['theme']);
         
        $this->render("profileFoodtruck", $datas);
    }
    
   public function getFormCard($id)
    {
       
        if(isset($id))
        { 
            $theme = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
            $theme->update(array(
                "id" => $id,
                "session" =>$_SESSION['id']
            ));
            

            $dao = new \BWB\Framework\mvc\dao\DAOThematiques;
            $menus = $dao->retrieve($id);
           
            $datas = array(
                "themes" => $menus,
                "id_theme" =>$id
            );
//             var_dump($theme);
            $this->render("formCard", $datas);

            $dao = new \BWB\Framework\mvc\dao\DAOCartes;
        }
    }

    public function getAllCards()
    {
        $daoCard = new \BWB\Framework\mvc\dao\DAOCartes;
        $daoMenu = new \BWB\Framework\mvc\dao\DAOMenus;
        $cards = $daoCard->getAllBy(array("id" => $_SESSION['idF']));
        $menus = $daoMenu->getAllBy(array("id" => $_SESSION['idF']));

        if(isset($menus))
        {
            if(empty($menus))
            {
                $datas = array(
                    "cards" => $cards,
                    "menus" => 'Pas de menus'
                );
            }
            if (!empty($menus))
            {
                $datas = array(
                    "cards" => $cards,
                    "menus" => $menus
                );
            }
        }
        
        $this->render("cards", $datas);
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

    public function getFormMenu($id)
    {
        $daoCard = new \BWB\Framework\mvc\dao\DAOCartes;
        $cards = $daoCard->retrieve($id);

        $datas = array(
            "cards" => $cards
        );

        $this->render("formMenu", $datas);
    }




//    ---------Pros-----------------------
    public function getPros() {
      
        $this->render("espacePros");
    }
    
    public function getSignUpPros() {
        
        $this->render("InscriptionPros");
    }
    
    public function getLogInPros() {
        $this->render("loginPros");
    }
    public function getProfilePros() {
        $this->render("profilePros");
    }
    
//    --------Admin----------------
      public function getAdmin() {
        $this->render("loginAdmin");
    }
    
    
    
    public function getProfileAdmin() {
        $this->render("espaceAdmin");
    }
    
//    -------------client-------------------
    
    public function getSpaceCustomer() {
        $this->render("SpaceCustomer");
    }
    
    public function getSignUpCustomer() {
        $this->render("signUpCustomer");
    }
    
    public function getLogInCustomer() {
        $this->render("logInCustomer");
    }
    
   
    
    public function getUpdateCustomer()
    {
        $this->render("profileCustomer");
    }
    
    public function logout()
    {
        
        if(isset($_SESSION['id']))
        {
            if(!empty($_SESSION['id']))
            {
                session_destroy();
                header('location:/');
            }
        }
    }
    
    public function popup()
    {
        $this->render("popup");
    }


    
    
//    mise ajour lundi 25  
 
 public function  vuContactPro($id) {
        $datas = array(
            'id' => $id
        );
        
//        var_dump($datas);
      
        $this->render("ContactPro", $datas);
    }
    public function  vuContactFood($id) {
        $datas = array(
            'id' => $id
        );
        
//        var_dump($datas);
      
        $this->render("ContactFoodtruck", $datas);
    }
    public function  vuContactClient($id) {
        $datas = array(
            'id' => $id
        );
        
//        var_dump($datas);
      
        $this->render("ContactClient", $datas);
    }
    
    public function createPm(){
        if( !empty($_POST['title'])  && !empty($_POST['message']))
        {
            $user2 = htmlspecialchars($_POST['user2']);
            $message = htmlspecialchars($_POST['message']);
            
            if(!empty($_SESSION['pseudo'])|| !empty($_SESSION['id_pro'])|| !empty($_SESSION['id'])){
          
                
                       
    
            $connect = new \BWB\Framework\mvc\dao\DAOPm;
           
            $tilte = htmlspecialchars($_POST['title']);
            if(!empty($_SESSION['id_pro'])){
                $user1 = htmlspecialchars($_SESSION['id_pro']);
            }
              if(!empty($_SESSION['pseudo'])){
                $user1 = htmlspecialchars($_SESSION['pseudo']);
            }
              if(!empty($_SESSION['id'])){
                $user1 = htmlspecialchars($_SESSION['id']);
            }
   
                    $entity = new \BWB\Framework\mvc\models\Pm();
                    
                    
                    $entity->setTitle($tilte);
                    $entity->setUser1($user1);
                    $entity->setUser2($user2);
                    $entity->setMessage($message);
                   
                
         
                    $model = $connect->create(array(
                        
                        "title" => $entity->getTitle(),
                        "user1" => $entity->getUser1(),
                        "user2" => $entity->getUser2(),
                        "message" => $entity->getMessage(),                       
                        
                        
                    ));
            }
                    if(true){
                    if(!empty($_SESSION['id_pro'])){
                        header("location:/espace-pros/profile");  
            }
              if(!empty($_SESSION['pseudo'])){
                 header("location:/espace-client/profile");
            }
              if(!empty($_SESSION['id'])){
                 header("location:/espace-foodtruck/profil");
            }
                         ;  
//                    echo 'ok';
                    }
                    
                }
               
        
        else
        {
            echo 'Operation: missing datas';
        }
    }
    
    //    -------------commandes-------------------

    public function getFoodtruck($id)
    {
        $daoFood = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
        $foods = $daoFood->retrieve($id);

        $daoCard = new \BWB\Framework\mvc\dao\DAOCartes;
        $cards = $daoCard->retrieve($id);

        $daoMenu = new \BWB\Framework\mvc\dao\DAOMenus;
        $menus = $daoMenu->getAllBy(array("id" => $id));

        if(!empty($menus))
        {
            $datas = array(
                "foods" => $foods,
                "cards" => $cards,
                "menus" => $menus
            );
        }

        if(empty($menus))
        {
            $datas = array(
                "foods" => $foods,
                "cards" => $cards,
                "menus" => 'Pas de menus'
            );
        }
        
        $this->render("detailFoodtruck", $datas);
    }

    public function getCommand($id)
    {
        $datas = array(
            "food" => $id
        );
        $this->render("commands", $datas);
    }

    public function getFormFastCommand($id)
    {
        $daoFood = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
        $foods = $daoFood->retrieve($id);

        $daoCard = new \BWB\Framework\mvc\dao\DAOCartes;
        $cards = $daoCard->retrieve($id);

        $daoMenu = new \BWB\Framework\mvc\dao\DAOMenus;
        $menus = $daoMenu->getAllBy(array("id" => $id));

        if(!empty($menus))
        {
            $datas = array(
                "foods" => $foods,
                "cards" => $cards,
                "menus" => $menus
            );
        }

        if(empty($menus))
        {
            $datas = array(
                "foods" => $foods,
                "cards" => $cards,
                "menus" => 'Pas de menus'
            );
        }
        
        $this->render("formFastCommand", $datas);
    }
     public function getProfileCustomer()
    {
        $daoFood = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
        $foods = $daoFood->getAll();

        $datas = array(
            "foods" => $foods
        );

        $this->render("profileCustomer", $datas);
    }
    
    public function getAllFoodtrucks()
   {
        $daoFood = new \BWB\Framework\mvc\dao\DAOFoodtrucks;
        $foods = $daoFood->getAll();
        
        /*$daoMenu = new \BWB\Framework\mvc\dao\DAOMenus;
        $menus = $daoMenu->getAllBy(array("id" => $id));*/
        
        $datas = array(
            "foods" => $foods,
            /*"menus" => $menus*/
        );
     
        $this->render("allFoodtrucks", $datas);
   }
}


   
    

