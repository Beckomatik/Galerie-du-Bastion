<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {

    $adminController = new \Projet\Controllers\AdminController(); //objet controler

    if (isset($_GET['action'])) {

        // création d'un nouvel admin



        if ($_GET['action'] == 'createAdmin') {
            $email = $_POST['email'];
            $pass = $_POST['mdp'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            $adminController->createAdmin($firstname, $lastname, $mdp, $email);
        }

        // connexion de l'admin
        if ($_GET['action'] == 'connexionAdmin') { 
       
            $email = htmlspecialchars($_POST['email']);
            $mdp = $_POST['mdp'];
            if (!empty($email) && !empty($mdp)) {
                $adminController->connexion($email, $mdp);
            } else {
                throw new Exception('renseigner vos identifiants');
            }

        // accès aux différentes pages
        } elseif ($_GET['action'] == 'createAdminPage') {
            $adminController->createAdminPage();

        } elseif ($_GET['action'] == 'contact') {
            $adminController->contactAdmin();

        } elseif ($_GET['action'] == 'about') {
            $adminController->aboutAdmin();

        } elseif ($_GET['action'] == 'portfolio') {
            $adminController->portfolioAdmin();

        } elseif ($_GET['action'] == 'blog') {
            $adminController->blogAdmin();

         } elseif ($_GET['action'] == 'yourinfos') {           
            $adminController->infoCompte();

        } elseif ($_GET['action'] == 'dashBoard') {           
            $adminController->dashBoard();

        } elseif ($_GET['action'] == 'deconnexion') {           
            session_destroy();
            $adminController->connexionAdminPage();
        
        
        
        // envoi d'article depuis le blog
        }elseif ($_GET['action'] == 'sendArticle') {
            if(isset($_FILES['photo']))
            $tmpName = $_FILES['photo']['tmp_name'];
            $name = $_FILES['photo']['name'];
            $size = $_FILES['photo']['size'];
            $error = $_FILES['photo']['error'];
            $type = $_FILES['photo']['type'];

            $arrExtension = explode('.', $name);
            $extension = strtolower(end($arrExtension));

            $extensionsAuthorized = ['jpg', 'jpeg', 'gif', 'png', 'wep'];
            $maxSize = 5000000;

            if (in_array($extension, $extensionsAuthorized) && $size <= $maxSize && $error == 0) {

                // pour modifier le nom d'une image si les noms sont similaires
                $uniqueName = uniqid('', true);
                $fileName = $uniqueName . '.' . $extension;
                // enregistre les images uploader dans le chemin
                move_uploaded_file($tmpName, './app/public/Administration/img/' . $name);
              
            } else {
                echo 'Mauvaise extension ou photo trop volumineuse ou erreur';
            }$data=[
                ':picture' => $name,
                ':title' => htmlspecialchars($_POST['title']),
                ':content' => htmlspecialchars($_POST['content']),
                ':category' => htmlspecialchars($_POST['category']), 
                ':alt' => htmlspecialchars($_POST['alt']) 
            ];           
            $adminController->articleForm($data);  
        

        // suppression de photo du porfolio
        }elseif($_GET['action'] == 'deletePicture'){
            $adminController->deletePicture();
        
        // redirection vers page de modification d'un article
        }elseif($_GET['action'] == 'updateArticlePage'){
            $adminController->updateArticlePage($_GET['id']);

        // modification d'article du blog'

        // }elseif($_GET['action'] == 'modifyArticle'){
        //     $id = $_SESSION['id'];
        //     $newPicture = $_POST['newPicture'];
        //     $newAlt = $_POST['newAlt'];
        //     $newTitle = $_POST['newTitle'];
        //     $newContent = $_POST['newContent'];
        //     $new = $_POST['newCategory'];

        //     $adminController->modifyArticle($id, $newPicture, $newAlt, $newTitle, $newContent, $newCategory);
        }elseif ($_GET['action'] == 'modifyArticle') {
            if(isset($_FILES['photo']))
            $tmpName = $_FILES['photo']['tmp_name'];
            $name = $_FILES['photo']['name'];
            $size = $_FILES['photo']['size'];
            $error = $_FILES['photo']['error'];
            $type = $_FILES['photo']['type'];

            $arrExtension = explode('.', $name);
            $extension = strtolower(end($arrExtension));

            $extensionsAuthorized = ['jpg', 'jpeg', 'gif', 'png', 'wep'];
            $maxSize = 5000000;

            if (in_array($extension, $extensionsAuthorized) && $size <= $maxSize && $error == 0) {

                // pour modifier le nom d'une image si les noms sont similaires
                $uniqueName = uniqid('', true);
                $fileName = $uniqueName . '.' . $extension;
                // enregistre les images uploader dans le chemin
                move_uploaded_file($tmpName, './app/public/Administration/img/' . $name);
              
            } else {
                echo 'Mauvaise extension ou photo trop volumineuse ou erreur';
            }$data=[
                'id' =>$_GET['id'],
                'picture' => $name,
                'title' => htmlspecialchars($_POST['title']),
                'content' => htmlspecialchars($_POST['content']),
                'category' => htmlspecialchars($_POST['category']), 
                'alt' => htmlspecialchars($_POST['alt']) 
            ];           
            $adminController->modifyArticle($data);  

        // suppression d'article du blog'
        }elseif($_GET['action'] == 'deleteArticle'){
            $adminController->deleteArticle();
       

        // ENVOI DU FORMULAIRE PORTFOLIO
        }elseif ($_GET['action'] == 'sendPicFolio'){
        
        if(isset($_FILES['photo'])) 
            $tmpName = $_FILES['photo']['tmp_name'];
            $name = $_FILES['photo']['name'];
            $size = $_FILES['photo']['size'];
            $error = $_FILES['photo']['error'];
            $type = $_FILES['photo']['type'];

            $arrExtension = explode('.', $name);
            $extension = strtolower(end($arrExtension));

            $extensionsAuthorized = ['jpg', 'jpeg', 'gif', 'png', 'wep'];
            $maxSize = 5000000;

            if (in_array($extension, $extensionsAuthorized) && $size <= $maxSize && $error == 0) {

                // pour modifier le nom d'une image si les noms sont similaires
                $uniqueName = uniqid('', true);
                $fileName = $uniqueName . '.' . $extension;
                // enregistre les images uploader dans le chemin
                move_uploaded_file($tmpName, './app/public/Administration/img/' . $name);
              
            } else {
                echo 'Mauvaise extension ou photo trop volumineuse ou erreur';
            }$data=[
                ':picture' => $name,
                ':title' => htmlspecialchars($_POST['title']),
                ':category' => htmlspecialchars($_POST['category']), 
                ':alt' => htmlspecialchars($_POST['alt']) 
            ];           
            $adminController->portfolioForm($data);           
        }
        
        } else {
            $adminController->connexionAdminPage();               
        }
    }
    catch (Exception $e) {
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