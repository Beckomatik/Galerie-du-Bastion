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
        return $this->view('blog');
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
              header('Location: app/Views/frontend/error.php');
          }
      }

   
 
}