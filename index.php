<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';

function eCatcher($e) {
    if($_ENV["APP_ENV"] == "development") {
     var_dump($e);die;     
    }
  }

try{
    $frontController = new \Projet\Controllers\FrontController();//objet controler

    if(isset($_GET['action']))
    {
        
        if($_GET['action'] == 'contact')
        {
            $frontController->contact($error=null);
        }

        elseif($_GET['action'] == 'about')
        {
            $frontController->about();
        }
        elseif($_GET['action'] == 'portfolio')
        {
            $frontController->portfolio();
        }
        elseif($_GET['action'] == 'blog')
        {
            $frontController->blogArticles();
        }
        elseif($_GET['action'] == 'shop')
        {
            $frontController->shop();
        }
        elseif($_GET['action'] == 'legales')
        {
            $frontController->legales();
        }
        elseif($_GET['action'] == 'cgv')
        {
            $frontController->cgv();
        }
        elseif($_GET['action'] == 'oneArticle')
        {
            $id = $_GET['id'];
            $frontController->oneArticle($id);
        }
        elseif($_GET['action'] == 'postComment')
        {
            $data = [
                'idUser' => htmlspecialchars($_GET['user_id']),
                'idArticle' => htmlspecialchars($_GET['article_id']),
                'content' => htmlspecialchars($_POST['content']),
            ];
            $frontController->postComment($data);
        }


        //  envois de mail dans la bdd
        elseif ($_GET['action'] == 'contactPost') 
        {
            $fullname = htmlspecialchars($_POST['fullname']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $object = htmlspecialchars($_POST['objet']);
            $content = htmlspecialchars($_POST['content']);
           
            $data = 
            [
                ":fullname"=>$fullname,
                ":mail"=>$email,
                ":phone"=>$phone,
                ":objet"=>$object,
                ":content"=>$content
            ];
            if (!empty($fullname) && (!empty($email) && (!empty($content)))) 
            {
                 $frontController->contactPost($data);
            } 
            else 
            {
                $error = "Tous les champs obligatoires ne sont pas remplis !";
                return $frontController->contact($error);
            }
        } 
            
        // accès à la page de création d'un user
        elseif($_GET['action'] == 'userRegistrationPage')
        {
            $frontController->userRegistrationPage();        
        }         
        // création du user
        elseif($_GET['action'] == 'userRegistration')
        {
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $pass = htmlspecialchars($_POST['mdp']);
            $confirm_mdp = htmlspecialchars($_POST['confirm_mdp']);
            if($pass == $confirm_mdp)
            {
                $mdp = password_hash($pass, PASSWORD_DEFAULT);
                $mdp_confirm = password_hash($confirm_mdp, PASSWORD_DEFAULT);
            }
            else
            {
                header('Location: app/Views/Front/userRegistrationPage.php?erreurmdp');
            }
        
            $data = 
            [
                ":lastname"=>$lastname,
                ":firstname"=>$firstname,
                ":pseudo"=>$pseudo,
                ":email"=>$email,
                ":mdp"=>$mdp,
                ":confirm_mdp"=>$mdp_confirm           
            ];
           
            if ((!empty($lastname) && (!empty($firstname) && (!empty($pseudo) && (!empty($email) && (!empty($pass)) && (!empty($confirm_mdp))))))) 
            {

                $frontController->userRegistration($data);
            } 
            else 
            {
                $error = "Tous les champs ne sont pas remplis !";
                return $frontController->userRegistrationPage($error);
            }        
        }             
        // accès à la page de connexion du user
        elseif($_GET['action'] == 'userConnexionPage')
        {
            $frontController->userConnexionPage();           
        }         
        // connexion du user
        elseif($_GET['action'] == 'userConnexion')
        {
            $email = htmlspecialchars($_POST['email']);
            $mdp = $_POST['mdp'];
            

            if (!empty($email) && (!empty($mdp)))
            {
                $frontController->userConnexion($email, $mdp);
            }
            else 
            {
                header('Location: app/Views/Front/userConnexionPage.php?erreur');
                // $error = 'Tous les champs doivent etre remplis ! ';
                // // $frontController->userConnexionPage($error);
                // throw new Exception($error);
            }            
        }

        elseif($_GET['action'] == 'myAccount')
        {
            $id = $_GET['id'];
            $frontController->myAccountPage($id);          
        }  

        elseif($_GET['action'] == 'deleteComment')
        {
            $id = $_GET['id'];
            $frontController->deleteComment($id);          
        }  

        elseif($_GET['action'] == 'deconnexion')
        {
            session_destroy();
            header('Location: index.php');          
        }  
    }
    else
    {
        $frontController->home();
    }
} 
catch(Exception $e)
{
    // die($e->getMessage());
    require 'app/Views/Front/error.php';
}
catch(Error $e) 
{
    eCatcher($e);
    require "app/Views/Front/oups.php";
} 