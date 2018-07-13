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
class CommandController extends Controller
{
    public function addInBasket($id)
    {   
        $daoCommand = new \BWB\Framework\mvc\dao\DAOCommandes;

        $user = self::searchUser();

        $daoMenu = new \BWB\Framework\mvc\dao\DAOMenus;
        $menus = $daoMenu->getAllBy(array(
            "id" => $id
        ));

        foreach($menus as $menu)
        {
            $datas = array(
                "detail" => $menu->getDetail_menu(), 
                "prix" => $menu->getPrix_menu(), 
                "theme" => $menu->getCartes_Thematiques_nom_thematiques()
            );
        }

        date_default_timezone_set('UTC');
        $time = date('Y-m-d_h:i:s');

        $command = $daoCommand->create(array(
            "user" => $user['user'],
            "contenu" => json_encode($datas),
            "date" => $time,
            "id" => $user['id']
        ));

        $fast = self::addFast($time, $user);
    }

    private function searchUser()
    {
        if(!empty($_SESSION['id_admin']))
        {
            $datas = array(
                "id" => 'Admins_id_admin',
                "user" => $_SESSION['id_admin']
            );
        }
        if(!empty($_SESSION['idC']))
        {
            $datas = array(
                "id" => 'Clients_id_client',
                "user" => $_SESSION['idC']
            );
        }

        if(!empty($_SESSION['id_pro']))
        {
            $datas = array(
                "id" => 'Pros_id_pro',
                "user" => $_SESSION['id_pro']
            );
        }
        return $datas;
    }

    private function addFast($time, $user)
    {
        $daoFast = new \BWB\Framework\mvc\dao\DAOCommandesRapides;
        $fast = $daoFast->create(array(
            "date" => $time,
            "user" => $user['user'] 
        ));
    }
}