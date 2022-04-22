<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';
try {
    
    $adminController = new \Projet\Controllers\AdminController(); //objet controler
    
    if (isset($_GET['action'])) 
    {
        // connexion de l'admin
        if ($_GET['action'] == 'connexionAdmin') 
        { 
            $email = htmlspecialchars($_POST['email']);
            $mdp = $_POST['mdp'];
            if (!empty($email) && !empty($mdp)) 
            {
                $adminController->connexion($email, $mdp);
            } 
            else 
            {
                throw new Exception('renseigner vos identifiants');
            }
        } 
        if($_SESSION['token']=='admin')
        {
        // création d'un nouvel admin
        if ($_GET['action'] == 'createAdmin') 
        {
            $email = $_POST['email'];
            $pass = $_POST['mdp'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            $adminController->createAdmin($firstname, $lastname, $mdp, $email);
        }
        
        // accès aux différentes pages
        elseif ($_GET['action'] == 'createAdminPage') 
        {
            $adminController->createAdminPage();
        } 

        elseif ($_GET['action'] == 'contact') 
        {
            $adminController->contactAdmin();
        } 

        elseif ($_GET['action'] == 'about')
        {
            $adminController->aboutAdmin();
        } 

        elseif ($_GET['action'] == 'portfolio') 
        {
            $adminController->portfolioAdmin();
        } 

        elseif ($_GET['action'] == 'blog') 
        {
            $adminController->blogAdmin();
        } 

        elseif ($_GET['action'] == 'yourinfos') 
        {           
            $adminController->infoCompte();
        } 

        elseif ($_GET['action'] == 'dashBoard') 
        {           
            $adminController->dashBoard();
        } 

        elseif ($_GET['action'] == 'deconnexion') 
        {           
            session_destroy();
            $adminController->connexionAdminPage();
        } 

        // voir tous les mails
        elseif ($_GET['action'] == 'mails') 
        {                      
            $adminController->mailsAdmin();
        }

        // voir un mail
        elseif ($_GET['action'] == 'showMail')
        {
            $id = $_GET['id'];
            $adminController->showMail($id);
        }

        elseif ($_GET['action'] == 'deleteMail')
        {
            $id = $_GET['id'];
            $adminController->deleteMail($id);
        }

        // envoi d'article depuis le blog
        elseif ($_GET['action'] == 'sendArticle') 
        {
            if(isset($_FILES['photo']))

            $tmpName = $_FILES['photo']['tmp_name'];
            $name = $_FILES['photo']['name'];
            $size = $_FILES['photo']['size'];
            $error = $_FILES['photo']['error'];
            $type = $_FILES['photo']['type'];

            $arrExtension = explode('.', $name);
            $extension = strtolower(end($arrExtension));

            $extensionsAuthorized = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
            $maxSize = 5000000;

            if (in_array($extension, $extensionsAuthorized) && $size <= $maxSize && $error == 0) 
            {
                // pour modifier le nom d'une image si les noms sont similaires
                $uniqueName = uniqid('', true);
                $fileName = $uniqueName . '.' . $extension;
                // enregistre les images uploader dans le chemin
                move_uploaded_file(filter_var($tmpName), './app/public/Administration/img/' . filter_var($fileName));
            } 
            else 
            {
                echo 'Mauvaise extension ou photo trop volumineuse ou erreur';
            }
            $data=
            [
                ':picture' => $fileName,
                ':title' => htmlspecialchars($_POST['title']),
                ':content' => htmlspecialchars($_POST['content']),
                ':category' => htmlspecialchars($_POST['category']), 
                ':alt' => htmlspecialchars($_POST['alt']) 
            ];           
            $adminController->articleForm($data);  
        }

        // suppression de photo du porfolio
        elseif($_GET['action'] == 'deletePicture'){
            $adminController->deletePicture();
        }

        // redirection vers page de modification d'un article
        elseif($_GET['action'] == 'updateArticlePage')
        {
            $adminController->updateArticlePage($_GET['id']);  
        }

        // modification d'article du blog'
        elseif ($_GET['action'] == 'modifyArticle') 
        {
            if(!empty($_FILES['photo']))

            $tmpName = $_FILES['photo']['tmp_name'];
            $name = $_FILES['photo']['name'];
            $size = $_FILES['photo']['size'];
            $error = $_FILES['photo']['error'];
            $type = $_FILES['photo']['type'];

            $arrExtension = explode('.', $name);
            $extension = strtolower(end($arrExtension));

            $extensionsAuthorized = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
            $maxSize = 5000000;
            if($size > $maxSize)
            {
                echo 'Le fichier est trop volumineux';die;
            }
            // créer une page d'erreur exprès pour les fichiers de photos trop volumineux
            if (in_array($extension, $extensionsAuthorized) && $size <= $maxSize && $error == 0) 
            {
                // pour modifier le nom d'une image si les noms sont similaires
                $uniqueName = uniqid('', true);
                $fileName = $uniqueName . '.' . $extension;

                // enregistre les images uploader dans le chemin
                move_uploaded_file(filter_var($tmpName), './app/public/Administration/img/' . filter_var($fileName));

                $data=
                [
                    'id' =>$_GET['id'],
                    'picture' => $fileName,
                    'title' => htmlspecialchars($_POST['title']),
                    'content' => htmlspecialchars($_POST['content']),
                    'category' => htmlspecialchars($_POST['category']), 
                    'alt' => htmlspecialchars($_POST['alt']) 
                ];           
                // modify with picture
                $adminController->modifyArticle($data);  
            } 
            else 
            {
                $data=
                [
                    'id' =>$_GET['id'],
                    'title' => htmlspecialchars($_POST['title']),
                    'content' => htmlspecialchars($_POST['content']),
                    'category' => htmlspecialchars($_POST['category']), 
                    'alt' => htmlspecialchars($_POST['alt']) 
                ];  
                $adminController->modifyArticleWithoutPic($data); 
            } 
        }

        // suppression d'article du blog'
        elseif($_GET['action'] == 'deleteArticle')
        {
            $adminController->deleteArticle();
        }

        // ENVOI D'IMAGE du PORTFOLIO
        elseif ($_GET['action'] == 'sendPicFolio')
        {        
            if(isset($_FILES['photo'])) 

            $tmpName = $_FILES['photo']['tmp_name'];
            $name = $_FILES['photo']['name'];
            $size = $_FILES['photo']['size'];
            $error = $_FILES['photo']['error'];
            $type = $_FILES['photo']['type'];

            $arrExtension = explode('.', $name);
            $extension = strtolower(end($arrExtension));

            $extensionsAuthorized = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
            $maxSize = 5000000;

            if (in_array($extension, $extensionsAuthorized) && $size <= $maxSize && $error == 0) 
            {
                // pour modifier le nom d'une image si les noms sont similaires
                $uniqueName = uniqid('', true);
                $fileName = $uniqueName . '.' . $extension;
                // enregistre les images uploader dans le chemin
                move_uploaded_file(filter_var($tmpName), './app/public/Administration/img/' . filter_var($fileName));
            } 
            else 
            {
                echo 'Mauvaise extension ou photo trop volumineuse ou erreur';
            }
            $data=
            [
                ':picture' => $fileName,
                ':title' => htmlspecialchars($_POST['title']),
                ':category' => htmlspecialchars($_POST['category']), 
                ':alt' => htmlspecialchars($_POST['alt']) 
            ];           
            $adminController->portfolioForm($data);           
        }
    }
        else
        {
            header('location: index.php');
        }
    } 
    else 
    {
            $adminController->connexionAdminPage();               
    }
    
}
 catch (Exception $e) 
    {
        require 'app/Views/Admin/error.php';
    }

