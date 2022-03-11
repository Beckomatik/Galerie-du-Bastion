<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';

try{
    $frontController = new \Projet\Controllers\FrontController();//objet controler

    if(isset($_GET['action'])){
        
        if($_GET['action'] == 'contact'){
            $frontController->contact();
        }

        elseif($_GET['action'] == 'about'){
            $frontController->about();
        }
        elseif($_GET['action'] == 'portfolio'){
            $frontController->portfolio();
        }
        elseif($_GET['action'] == 'blog'){
            $frontController->blog();
        }
        elseif($_GET['action'] == 'shop'){
            $frontController->shop();
        }
        elseif($_GET['action'] == 'legales'){
            $frontController->legales();
        }
        elseif($_GET['action'] == 'cgv'){
            $frontController->cgv();
        }
         // envois de mail dans la bdd
        //  elseif ($_GET['action'] == 'contactPost') {
        //     $lastname = htmlspecialchars($_POST['name']);
        //     $firstname = htmlspecialchars($_POST['firstname']);
        //     $mail = htmlspecialchars($_POST['mail']);
        //     $phone = htmlspecialchars($_POST['phone']);
        //     $objet = htmlspecialchars($_POST['object']);
        //     $content = htmlspecialchars($_POST['content']);
        //     if (!empty($lastname) && (!empty($firstname) && (!empty($mail) && (!empty($phone) && (!empty($objet) && (!empty($content))))))) {
        //         $frontController->contactPost($lastname, $firstname, $mail, $phone, $objet, $content);
        //     } else {
        //         throw new Exception('tous les champs ne sont pas remplis');
        //     }
        // }
    }else{
        $frontController->home();
    }

} catch(Exception $e){
    require 'app/Views/front/error.php';
}