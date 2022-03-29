<?php

namespace Projet\Controllers;

class AdminController extends Controller
{
     // connexion à la page de connexion
    function connexionAdmin()
    {
        return $this->viewAdmin('connexionAdmin');
    }

    // création de l'administrateur
    function createAdmin($firstname, $lastname, $mdp, $email)
    {
        $userManager = new \Projet\Models\AdminModel();
        $user = $userManager->createAdmin($firstname, $lastname, $mdp, $email);

        require 'app/views/Admin/createAdmin.php';

    }

    function createAdminAccount()
    {
        return $this->viewAdmin('createAdmin');
    }

    function addAdmin()
    {
        return $this->viewAdmin('createAdmin');
    }

     // connexion au tableau de bord apres comparaison du mot de passe

     function connexion($mail, $mdp)
     { //recup du mot de pass
         $userManager = new \Projet\Models\AdminModel();
         $connexAdm = $userManager->recupMdp($mail, $mdp);
 
         $resultat = $connexAdm->fetch();
 
         $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);
 
         $_SESSION['email'] = $resultat['mail']; // transformation des variables recupérées en session
         $_SESSION['mdp'] = $resultat['mdp'];
         $_SESSION['id'] = $resultat['id'];
         $_SESSION['firstname'] = $resultat['firstname'];
         $_SESSION['lastname'] = $resultat['lastname'];
 
 
         $countMail = new \Projet\Models\ContactModel();
         $nbrMail = $countMail->countMail();
 
         if ($isPasswordCorrect) {
 
             require 'app/views/Admin/dashboard.php';
         } 
         
         else {
             echo 'vos identifients sont incorrect';
             //require('views/backend/erreur.php');
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
    function portfolioAdmin()
    {
        return $this->viewAdmin('portfolioAdmin');
    }
    function blogAdmin()
    {
        return $this->viewAdmin('blogAdmin');
    }
    // poster un article
    function postArticle($title, $picture, $content)
    {
        $post = new \Projet\Models\AdminModel();
        $newPost = $post->sendArticle($title, $picture, $content);

        require 'app/views/Admin/blogAdmin.php';
    }

    function contactAdmin()
    {
        return $this->viewAdmin('contactAdmin');
    }
    function infosAdmin()
    {
        return $this->viewAdmin('infosAdmin');
    }

//     // connexion au tableau de bord apres comparaison du mot de passe

//     function connexion($mail, $mdp)
//     { //recup du mot de pass
//         $userManager = new \Projet\Models\AdminModel();
//         $connexAdm = $userManager->recupMdp($mail, $mdp);

//         $resultat = $connexAdm->fetch();

//         $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);

//         $_SESSION['mail'] = $resultat['mail']; // transformation des variables recupérées en session
//         $_SESSION['mdp'] = $resultat['mdp'];
//         $_SESSION['id'] = $resultat['id'];
//         $_SESSION['firstname'] = $resultat['firstname'];


//         $countMail = new \Projet\Models\ContactModel();
//         $nbrMail = $countMail->countMail();

//         if ($isPasswordCorrect) {

//             require 'app/Views/Admin/dashboard.php';
//         } 
        
//         else {
//             echo 'vos identifients sont incorrect';
//             //require('Views/backend/erreur.php');
//         }


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