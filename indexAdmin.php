<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {

    $adminController = new \Projet\Controllers\AdminController(); //objet controler

        if(isset($_GET['action'])){

                if ($_GET['action'] == 'createAdmin'){ 
                $email = $_POST['email'];
                $pass = $_POST['mdp'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $mdp = password_hash($pass, PASSWORD_DEFAULT);
                $adminController->createAdmin($firstname, $lastname, $mdp, $email);
                }
                
                if ($_GET['action'] == 'connexionAdmin') { //connexion admin
                    $email = htmlspecialchars($_POST['email']);
                    $mdp = $_POST['mdp'];
                    if (!empty($email) && !empty($mdp)) {
                        $adminController->connexion($email, $mdp); // on passe deux paramètre
                    } else {
                        throw new Exception('renseigner vos identifiants');
                    }
                } 

                elseif($_GET['action'] == 'contact'){
                    $adminController->contactAdmin();
                }
        
                elseif($_GET['action'] == 'about'){
                    $adminController->aboutAdmin();
                }
                elseif($_GET['action'] == 'portfolio'){
                    $adminController->portfolioAdmin();
                }
                elseif($_GET['action'] == 'blog'){
                    $adminController->blogAdmin();
                }
                elseif($_GET['action'] == 'postArticle'){
                    $adminController->postArticle();
                }
                elseif($_GET['action'] == 'yourinfos'){
                    $adminController->infosAdmin();
                }
    }else{
            // $adminController->connexionAdmin();
            $adminController->dashBoard();
        }
} catch (Exception $e)
{
    require 'app/Views/Admin/error.php';
}
    
//     if (isset($_GET['action'])) {

//             // création d'un administrateur
//         if ($_GET['action'] == 'creatAdmin'){ 
//             // isConnect();
//             $mail = $_POST['mail'];
//             $pass = $_POST['password'];
//             $firstname = $_POST['firstname'];
//             $mdp = password_hash($pass, PASSWORD_DEFAULT);
//             $backController->createAdmin($firstname, $mdp, $mail);

//         }

//         if ($_GET['action'] == 'connexionAdmin') { //connexion admin
//             $mail = htmlspecialchars($_POST['mail']);
//             $mdp = $_POST['pass'];
//             if (!empty($mail) && !empty($mdp)) {
//                 $backController->connexion($mail, $mdp); // on passe deux paramètre
//             } else {
//                 throw new Exception('renseigner vos identifiants');
//             }
//         } 


//         //déconnexion de session admin

//         elseif ($_GET['action'] == 'deconnexion'){
//             session_destroy();
//             header('Location: index.php');
//         }

//         // voir les mails

//         elseif ($_GET['action'] == 'showMails'){
//             $backController->showMails();
//         }

//           //supprimer un mail de la page emailView.php 

//           elseif ($_GET['action'] == 'deleteMail'){
//             $id = $_GET['id'];
//             $backController->deleteMail($id);
//         }

//         // voir un mail
//         elseif ($_GET['action'] == 'showMail'){
//             $id = $_GET['id'];
//             $backController->showMail($id);
//         }
//         // retour tableau de bord
//         elseif ($_GET['action'] == 'dashbord'){
//             $backController->dashbord();
//         }

//         // compte
//         elseif ($_GET['action'] == 'compte'){
//             $id = $_GET['id'];
//             $backController->compte($id);
//         }
//         /*====================== changer de compte =================================================================*/

//         elseif ($_GET['action'] == 'newCompte'){
//             $id = $_GET['id'];
//             $firstname = htmlspecialchars($_POST['firstname']);
//             $mail = htmlspecialchars($_POST['mail']);

//             if (!empty($firstname) && (!empty($mail))){
//                 $backController->newCompte($id, $firstname, $mail);
//             }else {
//                 throw new Exception('tous les champs ne sont pas remplis');
//             }
//         }
       
        
//     } else{
//         $backController->connexionAdmin();
//         // $backController->createPageAdmin();

//     }



   



// } catch (Exception $e) {
//     die('Erreur : ' . $e->getMessage());// faire page erreur !!!!
// }