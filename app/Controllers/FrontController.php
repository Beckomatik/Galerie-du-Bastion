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
        $data=
        [
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
        $data=
        [
            "result" => $result,
            "resPath" => $resPath
        ];
        return $this->view('blogArticles', $data);
    }

    function oneArticle($id)
    {
        $article = new \Projet\Models\FrontModel();
        $oneArticle = $article->getArticle($id);
        $result = $oneArticle->fetch();
        $resPath = "/app/public/Administration/img/";
        $data=
        [
            "result" => $result,
            "resPath" => $resPath
        ];
      
        return $this->view('blogArticle', $data);
    }

    public function postComment($data)
    {
        $comment = new \Projet\Models\FrontModel();  
        $result = $comment->postComment($data);

        $this->oneArticle($data['idArticle']);

    }

    function userRegistrationPage()
    {
        return $this->view('userRegistrationPage');
    }

    function userRegistration($data)
    {
        $userRegistration = new \Projet\Models\FrontModel();  
  
        if (filter_var($data[':email'], FILTER_VALIDATE_EMAIL)) 
        {
            $newUser = $userRegistration->userRegistration($data);          
            return $this->view('confirmNewUser');
        } 
        else 
        {
            header('Location: app/Views/Front/error.php');
        }
        return $this->view('home');
    }

    function userConnexionPage()
    {
        return $this->view('userConnexionPage');
    }

    function userConnexion($email, $mdp)
    {
        $user = new \Projet\Models\FrontModel();
        $userConnexion = $user->verifyMail($email);
        

        $result = $userConnexion->fetch();
        $correctPassword = password_verify($mdp, $result['mdp']);

        $_SESSION['email'] = $result['email'];
        $_SESSION['mdp'] = $result['mdp'];
        $_SESSION['id'] = $result['id'];

        if($correctPassword)
        {
            return $this->view('confirmConnexion');
        }
        else
        {
            return $this->view('userConnexionPage');
        }
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