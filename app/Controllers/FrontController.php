<?php

namespace Projet\Controllers;

class FrontController
{
    function home()
    {
        require "app/Views/Front/home.php";
    }

    function about()
    {
        require "app/Views/Front/about.php";
    }

    function portfolio()
    {
        require "app/Views/Front/portfolio.php";
    }

    function blog()
    {
        require "app/Views/Front/blog.php";
    }

    function shop()
    {
        require "app/Views/Front/shop.php";
    }


    function contact()
    {
        require "app/Views/Front/contact.php";
    }

//       /*===================== mail formulaire de contact==================================*/

//       function contactPost($lastname, $firstname, $mail, $phone, $objet,  $content)
//       {
//           $postMail = new \Projet\Models\ContactModel();
  
  
//           if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
//               $Mail = $postMail->postMail($lastname, $firstname, $mail, $phone, $objet,  $content);
//               require 'app/Views/Front/confirmeContact.php';
//           } else {
//               header('Location: app/Views/frontend/error.php');
//           }
//       }
}