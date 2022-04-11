<?php

namespace Projet\Controllers;

class FrontController extends Controller
{
    function home()
    {
        return $this->view('home');
    }

    function about()
    {
        return $this->view('about');
    }

    function portfolio()
    {
   
        $imagesManager = new \Projet\Models\FrontModel();
        $myPics = $imagesManager->getPortfolioItems();
        $result = $myPics->fetchAll();
        $resPath = "/app/public/Administration/img/";
        $data=[
            "result" => $result,
            "resPath" => $resPath
        ];
       
        return $this->view('portfolio', $data);
    }

    function blog()
    {
        
        $articleManager = new \Projet\Models\FrontModel();
        $myPosts = $articleManager->getBlogItems();
        $result = $myPosts->fetchAll();
        $resPath = "/app/public/Administration/img/";
        $data=[
            "result" => $result,
            "resPath" => $resPath
        ];
        return $this->view('blog', $data);
    }

    function userRegistrationPage()
    {
        return $this->view('userRegistrationPage');
    }

    function userRegistration($data)
    {
        $userRegistration = new \Projet\Models\FrontModel();
  
  
        if (filter_var($data[':email'], FILTER_VALIDATE_EMAIL)) {
            $newUser = $userRegistration->userRegistration($data);
          
            return $this->view('confirmNewUser');
        } else {
            header('Location: app/Views/Front/error.php');
        }
        return $this->view('home');
    }

    function userConnexionPage()
    {
        return $this->view('userConnexionPage');
    }

    function userConnexion()
    {
        
        return $this->view('home');
    }

    function shop()
    {
        return $this->view('shop');
    }


    function contact()
    {
        return $this->view('contact');
    }
    function legales()
    {
        return $this->view('legales');
    }
    
    function cgv()
    {
        return $this->view('cgv');
    }

//       /*===================== mail formulaire de contact==================================*/

      function contactPost($data)
      {
          $postMail = new \Projet\Models\ContactModel();
  
  
          if (filter_var($data[':mail'], FILTER_VALIDATE_EMAIL)) {
              $Mail = $postMail->postMail($data);
              require 'app/Views/Front/confirmeContact.php';
          } else {
              header('Location: app/Views/Front/error.php');
          }
      }

   
 
}