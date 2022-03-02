<?php

namespace Projet\Controllers;

class FrontController
{
    function home()
    {
        require "app/views/Front/home.php";
    }

//     function portfolio()
//     {
//         require "app/views/Front/protfolio.php";
//     }

//     function contact()
//     {
//         $mails = new \Projet\Models\ContactModel();
//         $allMails = $mails->getMails();
       
//         require "app/views/Front/contact.php";
//     }

//       /*===================== mail formulaire de contact==================================*/

//       function contactPost($lastname, $firstname, $mail, $phone, $objet,  $content)
//       {
//           $postMail = new \Projet\Models\ContactModel();
  
  
//           if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
//               $Mail = $postMail->postMail($lastname, $firstname, $mail, $phone, $objet,  $content);
//               require 'app/views/Front/confirmeContact.php';
//           } else {
//               header('Location: app/views/frontend/error.php');
//           }
//       }
}