<?php

namespace Projet\Controllers;

class FrontController extends Controller
{
    function home()
    {
        require $this->view('home');
    }

    function about()
    {
        require $this->view('about');
    }

    function portfolio()
    {
        require $this->view('portfolio');
    }

    function blog()
    {
        require $this->view('blog');
    }

    function shop()
    {
        require $this->view('shop');
    }


    function contact()
    {
        require $this->view('contact');
    }
    function legales()
    {
        require $this->view('legales');
    }
    
    function cgv()
    {
        require $this->view('cgv');
    }

//       /*===================== mail formulaire de contact==================================*/

      function contactPost($data)
      {
          $postMail = new \Projet\Models\ContactModel();
  
  
          if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
              $Mail = $postMail->postMail($data);
              require 'app/Views/Front/confirmeContact.php';
          } else {
              header('Location: app/Views/frontend/error.php');
          }
      }
}