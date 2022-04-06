<?php

namespace Projet\Controllers;

class AdminController extends Controller
{
     // connexion à la page de connexion
    function connexionAdminPage()
    {
        return $this->viewAdmin('connexionAdmin');
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
 
         $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);
 
         $_SESSION['email'] = $resultat['email']; 
         $_SESSION['mdp'] = $resultat['mdp'];
         $_SESSION['id'] = $resultat['id'];
         $_SESSION['firstname'] = $resultat['firstname'];
         $_SESSION['lastname'] = $resultat['lastname'];
 
         if ($isPasswordCorrect) { 
             require 'app/views/Admin/dashboard.php';
         }          
         else {
             echo 'vos identifiants sont incorrect';
         } 
     }



    // accès au dashboard
    function dashBoard()
    {
        return $this->viewAdmin('dashboard');
    }

    function aboutAdmin()
    {
        return $this->viewAdmin('aboutAdmin');
    }

    // envoi des élémenents de la page portfolio dans la base de données
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

    

    function blogAdmin()
    {
        $imagesManager = new \Projet\Models\AdminModel();
        $myPics = $imagesManager->getPortfolioItems();
        $result = $myPics->fetchAll();
        $resPath = "/app/public/Administration/img/";
        $data=[
            "result" => $result,
            "resPath" => $resPath
        ];
        return $this->viewAdmin('blogAdmin', $data);
    }
    // poster un article
    function postArticle($title, $picture, $content)
    {
        $post = new \Projet\Models\AdminModel();
        $newPost = $post->sendArticle($title, $picture, $content);

        require 'app/views/Admin/blogAdmin.php';
    }

    // envoi d'images depuis blog & portfolio
    function sendImages($name)
    {
        $images = new \Projet\Models\AdminModel();
        $newImage = $images->sendImages($name);

        require 'app/views/Admin/blogAdmin.php';
    }
    // function sendPicFolio($name)
    // {
    //     $images = new \Projet\Models\AdminModel();
    //     $newImage = $images->sendPicFolio($name);

    // }

   

   

    function contactAdmin()
    {
        return $this->viewAdmin('contactAdmin');
    }
 

//     }
//     /*=========================== page EmailView  ==========================================*/
//     function showMails()
//     {
//         $mails = new \Projet\Models\ContactModel();
//         $allMails = $mails->getMails();

//         require 'app/Views/Admin/emailView.php';
//     }

//      /*=========================== supprimer un mail ==================================*/
//      function deleteMail($id)
//      {
//         $deleteMail = new \Projet\Models\ContactModel();
//         $deleteEmail = $deleteMail->deleteMail($id);
 
//          header('Location: indexAdmin.php?action=showMails');
//      }


//      function showMail($id)
//     {
//         $mail = new \Projet\Models\ContactModel();
//         $mailOne = $mail->getMail($id);

//         require 'app/Views/Admin/email.php';
//     }

//     /* retour tableau de bord */
//     function dashbord()
//     {
//         $countMail = new \Projet\Models\ContactModel();
//         $nbrMail = $countMail->countMail();

//         require 'app/Views/Admin/dashboard.php';
//     }


//     function compte($id)
//     {
//         $userManager = new \Projet\Models\AdminModel();
//         $newCompte = $userManager->compte($id);
//         require 'app/Views/Admin/compte.php';
//     }

//     function newCompte($id, $firstname, $mail)
//     {
//         $userManager = new \Projet\Models\AdminModel();
//         $newNameAd = $userManager->newCompte($id, $firstname, $mail);

//         $_SESSION['id'] = $id;
        
//         header('Location: indexAdmin.php?action=compte&id=' . $id);
//     }

}