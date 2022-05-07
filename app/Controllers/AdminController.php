<?php

namespace Projet\Controllers;

class AdminController extends Controller
{
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++ CONNEXION ET ADMINISTRATION ++++++++++++++++++++++++++++++++++++++++++++
  
    // connexion à la page de connexion
    function connexionAdminPage()
    {
        require 'app/views/Admin/connexionAdmin.php';
    }

    // création de l'administrateur
    function createAdmin($firstname, $lastname, $mdp, $email)
    {
        $userManager = new \Projet\Models\AdminModel();
        $user = $userManager->createAdmin($firstname, $lastname, $mdp, $email);
        require 'app/views/Admin/connexionAdmin.php';
    }

    // accès à la page de création d'un admin
    function createAdminPage()
    {
        return $this->viewAdmin('createAdmin');
    }

    // récupérer et afficher les infos du détenteur du compte
    function infoCompte()
    {
        $id = $_SESSION['id'];       
        $userManager = new \Projet\Models\AdminModel();
        $user = $userManager->infoCompte($id);  
        $info = $user->fetch();            
        return $this->viewAdmin('infosAdmin', $info);
    }   

     // connexion au tableau de bord apres comparaison du mot de passe
     function connexion($email, $mdp)
     { 
         $userManager = new \Projet\Models\AdminModel();
         $connexAdm = $userManager->recupMdp($email);
 
         $resultat = $connexAdm->fetch();         
        
         
         if(!empty($resultat)){
            $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);
            if ($isPasswordCorrect) 
                {
                    $_SESSION['email'] = $resultat['email']; 
                    $_SESSION['mdp'] = $resultat['mdp'];
                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['firstname'] = $resultat['firstname'];
                    $_SESSION['lastname'] = $resultat['lastname'];
                    $_SESSION['role'] = $resultat['role'];
                    // $_SESSION['token'] = 'admin';
                
                    header('Location: indexAdmin.php?action=dashBoard&id=' .$_SESSION['id']);
                }          
            else{
            $error = "Vos identifiants son incorrects !";
                return $this->viewNoAdmin('connexionAdmin', $error);
            } 
        }
        else {
           $error = "Mauvaise adresse email !";
           return $this->viewNoAdmin('connexionAdmin', $error);
        }
     }

   

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++ ACCES PAGES +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    // accès au dashboard
    function dashBoard()
    {
        $items = new \Projet\Models\AdminModel();
        $count = $items->countMails();
        $countMails = $count->fetch();

        $countCom = $items->countComments();
        $countComments = $countCom->fetch();

        $data = 
        [
            "countMails" => $countMails,
            "countComments" => $countComments
        ];
        
        return $this->viewAdmin('dashboard', $data);
    }

    function aboutAdmin()
    {
        return $this->viewAdmin('aboutAdmin');
    }

    function contactAdmin()
    {
        return $this->viewAdmin('contactAdmin');
    }

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++ PORFOLIO ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    // envoi des éléments de la page portfolio vers la base de données
    function portfolioForm($data)
    {
        $form = new \Projet\Models\AdminModel();
        $newForm = $form->portfolioForm($data);

        header('Location: indexAdmin.php?action=portfolio');
    }
    // ajout des photos dans la page porfolioAdmin
    function portfolioAdmin()
    {
        $imagesManager = new \Projet\Models\AdminModel();
        $myPics = $imagesManager->getPortfolioItems();
        $result = $myPics->fetchAll();
        $resPath = "/app/public/Administration/img/";
        $data=[
            "result" => $result,
            "resPath" => $resPath
        ];       
        return $this->viewAdmin('portfolioAdmin', $data);
    }

     // suppression de photos du portfolio
     function deletePicture()
     {
         $delPictures = new \Projet\Models\AdminModel();
         $delPicture = $delPictures->deletePicture(); 
         header('Location: indexAdmin.php?action=portfolio&success=true');
     }

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++ BLOG ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    // envoi des articles de la page blog vers la base de données
    function articleForm($data)
    {
        $form = new \Projet\Models\AdminModel();
        $newForm = $form->articleForm($data);

        header('Location: indexAdmin.php?action=blog');
    }
    // ajout des photos et contenu de la bdd vers la page blog
    function blogAdmin()
    {
        $articleManager = new \Projet\Models\AdminModel();
        $myPost = $articleManager->getBlogItems();
        $result = $myPost->fetchAll();
        $resPath = "/app/public/Administration/img/";
        $data=[
            "result" => $result,
            "resPath" => $resPath
        ];
        return $this->viewAdmin('blogAdmin', $data);
    }   

    // modification d'article du blog
    function modifyArticle($data)
    {
        $modifArticles = new \Projet\Models\AdminModel();
        $modifArticle = $modifArticles->modifyArticle($data);
        header('Location: indexAdmin.php?action=blog&success=true');
    }    
    function modifyArticleWithoutPic($data)
    {
        $modifArticles = new \Projet\Models\AdminModel();
        $modifArticle = $modifArticles->modifyArticleWithoutPic($data);
        header('Location: indexAdmin.php?action=blog&success=true');
    }    

    // redirection vers page de modification d'article
    function updateArticlePage($id)
    {
        $articleManager = new \Projet\Models\AdminModel();
        $myPost = $articleManager->getBlogItem($id);
        $result = $myPost->fetch();
        $resPath = "/app/public/Administration/img/";
        $data=[
            "result" => $result,
            "resPath" => $resPath
        ];
   
        return $this->viewAdmin('updateBlogAdmin', $data);
    }

    // suppression d'article du blog
    function deleteArticle()
    {
        $delArticles = new \Projet\Models\AdminModel();
        $deArticle = $delArticles->deleteArticle();
        header('Location: indexAdmin.php?action=blog&success=true');
    }  
    
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++  MAILS  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    
    function mailsAdmin()
    {
        $mails = new \Projet\Models\ContactModel();
        $seeMails = $mails->getMails();
        $data = $seeMails->fetchAll();

        return $this->viewAdmin('mailsAdmin', $data);
    }
    function commentsAdmin()
    {
        $comments = new \Projet\Models\AdminModel();
        $seeComments = $comments->getComments();
        
        $data = $seeComments->fetchAll();
      
        return $this->viewAdmin('commentsAdmin', $data);
    }
    function deleteComment($id)
    {
        $userComments = new \Projet\Models\AdminModel();        
        $deleteComment = $userComments->deleteComment($id);        

        header('Location: indexAdmin.php?action=commentsAdmin');
    }

    function showMail($id)
    {
        $mail = new \Projet\Models\ContactModel();
        $mailOne = $mail->getMail($id);
        $data = $mailOne->fetch();

        return $this->viewAdmin('mailAdmin', $data);
    }
    function deleteMail($id)
    {
        $mail = new \Projet\Models\ContactModel();
        $mailOne = $mail->deleteMail($id);

        header('Location: indexAdmin.php?action=mails');
    }


}


    
