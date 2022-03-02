<?php

namespace Projet\Controllers;

class adminController
//{
//     // connexion à la page de connexion
//     function createPageAdmin()
//     {
//         require 'app/views/Admin/createAdmin.php';
//     }


//      // création de l'administrateur
//      function createAdmin($firstname, $mdp, $mail)
//      {
//          $userManager = new \Projet\Models\AdminModel();
//          $user = $userManager->creatAdmin($firstname, $mdp, $mail);

//          require 'app/views/Admin/createAdmin.php';
 
//      }

//      // connexion à la page de connexion
//     function connexionAdmin()
//     {

//         require 'app/views/Admin/connexion.php';
//     }

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

//             require 'app/views/Admin/dashboard.php';
//         } 
        
//         else {
//             echo 'vos identifients sont incorrect';
//             //require('views/backend/erreur.php');
//         }


//     }
//     /*=========================== page EmailView  ==========================================*/
//     function showMails()
//     {
//         $mails = new \Projet\Models\ContactModel();
//         $allMails = $mails->getMails();

//         require 'app/views/Admin/emailView.php';
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

//         require 'app/views/Admin/email.php';
//     }

//     /* retour tableau de bord */
//     function dashbord()
//     {
//         $countMail = new \Projet\Models\ContactModel();
//         $nbrMail = $countMail->countMail();

//         require 'app/views/Admin/dashboard.php';
//     }


//     function compte($id)
//     {
//         $userManager = new \Projet\Models\AdminModel();
//         $newCompte = $userManager->compte($id);
//         require 'app/views/Admin/compte.php';
//     }

//     function newCompte($id, $firstname, $mail)
//     {
//         $userManager = new \Projet\Models\AdminModel();
//         $newNameAd = $userManager->newCompte($id, $firstname, $mail);

//         $_SESSION['id'] = $id;
        
//         header('Location: indexAdmin.php?action=compte&id=' . $id);
//     }

// }