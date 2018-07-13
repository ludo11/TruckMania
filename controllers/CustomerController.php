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
class CustomerController extends Controller
{
    public function signUpCustomer()
    {
        HomeController::jquery();
        if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['address'])  && !empty($_POST['city']))
        {           
            $connect = new \BWB\Framework\mvc\dao\DAOClients;
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $tel = htmlspecialchars($_POST['tel']);
            $address = htmlspecialchars($_POST['address']);
            $villes = htmlspecialchars($_POST['city']);

            if(!empty($_POST['password']))
            {
                if($_POST['password'] === $_POST['verifPassword'])
                {                    
                    $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));
                    $entity = new \BWB\Framework\mvc\models\Clients;

                    $entity->setPseudo($pseudo);
                    $entity->setPassword($password);
                    $entity->setEmail($email);
                    $entity->setTel($tel);
                    $entity->setAdresse($address);
                    $entity->setVilles_nom_villes($villes);

                    $model = $connect->create(array(
                        "pseudo" => $entity->getPseudo(),
                        "password" => $entity->getPassword(),
                        "email" => $entity->getEmail(),
                        "tel" => $entity->getTel(),
                        "addresse" => $entity->getAdresse(),
                        "ville" => $entity->getVilles_nom_villes()
                    ));
                    header("location:/espace-client/login");
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

    public function loginCustomer()
    {
        if(!empty($_POST['logInMail'] && !empty($_POST['logInPassword'])))
        {
            echo 'si';
            $connect = new \BWB\Framework\mvc\dao\DAOClients;
            $mail = htmlspecialchars($_POST['logInMail']);
            $pass = htmlspecialchars($_POST['logInPassword']);
            $entity = new \BWB\Framework\mvc\models\Clients;

            $entity->setEmail($mail);
            $entity->setPassword($pass);

            $list = $connect->search(array(
                "email" => $entity->getEmail()
            ));

            if(password_verify($pass, $list['password']))
            {
                if($_SESSION)
                {
                    session_destroy();
                }
                session_start();
                $_SESSION['id'] = $list['id'];
                $_SESSION['idC'] = $list['id'];
                $_SESSION['pseudo'] = $list['pseudo'];
                $_SESSION['password'] = $list['password'];
                $_SESSION['email'] = $list['email'];
                $_SESSION['tel'] = $list['tel'];
                $_SESSION['adresse'] = $list['adresse'];
                $_SESSION['Villes_nom_villes'] = $list['Villes_nom_villes'];
                header('location:/espace-client/profil');
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

    public function logoutCustomer()
    {
        if(isset($_SESSION['id']))
        {
            if(!empty($_SESSION['id']))
            {
                session_destroy();
                header('location:/espace-client/login');
            }
        }
        else
        {
            echo '<br>' . '<br>' . '<br>' . 'déjà deco';
        }
    }
    public function updateCustomer($id) {
        $client = new \BWB\Framework\mvc\dao\DAOClients();
        $info = $client->retrieve($id);
        $datas = array(
            "infoClient"=> $info
        );
//        var_dump($datas);
        
        $this->render("updateCustomer",$datas);
    }
    
    public function UpdateInfoCustomer() {
        $model = new \BWB\Framework\mvc\dao\DAOClients();
        $donnee = $model->update(array(
            'id' => $_POST['id'],
            'email' => $_POST['email'],
            'tel' => $_POST['tel'],
            'adresse' => $_POST['address'],
            'Villes_nom_villes' => $_POST['city']
        ));
        
        $this->render('profileCustomer');
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
                    
                         header("location:/espace-client/profil");  
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
        $this->render("ClientMessages", $datas);
       
    }
    public function notificationPm() {
//        echo $_SESSION['id_pro'];
        $message = new \BWB\Framework\mvc\dao\DAOPm;
        $mess = $message->retrieve($_SESSION['pseudo']);
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
        $this->render("ClientVoirMessage", $datas);
       
    }  
    
}