<?php

namespace Projet\Controllers;

class FrontController extends Controller
{

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++ PAGES +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    function about()
    {
        return $this->view('about');
    }

    function contact($error)
    {
        return $this->view('contact',$error);
    }
    
    function legales()
    {
        return $this->view('legales');
    }
    
    function cgv()
    {
        return $this->view('cgv');
    }

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++ PAGE D'ACCUEIL +++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    function home()
    {
        $imagesManager = new \Projet\Models\FrontModel();
        $myPics = $imagesManager->getPortfolioItemsHome();
        $resultPics = $myPics->fetchAll();
        $resPath = "/app/public/Administration/img/";

        $articleManager = new \Projet\Models\FrontModel();
        $myPosts = $articleManager->getBlogItemsHome();
        $resultBlog = $myPosts->fetchAll();

        $data=
        [
            "resultPics" => $resultPics,
            "resPath" => $resPath,
            "resultBlog" => $resultBlog
        ];
       
        return $this->view('home', $data);
    }

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++ PORTFOLIO ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

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

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++ BLOG +++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    function blogArticles()
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
        
        $result2 = $article->getComments($id);      
        $comments = $result2->fetchAll();
        $datas = array_merge($data, $comments);

        return $this->view('blogArticle', $datas);
    }

    function postComment($data)
    {
        $comment = new \Projet\Models\FrontModel();  
        $result = $comment->postComment($data);

        $this->oneArticle($data['idArticle']);
    }

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++ CREATION USER ET CONNEXION++++++++++++++++++++++++++++++++++++++++++++++

    // page de création de compte
    function userRegistrationPage($error=null)
    {
        return $this->view('userRegistrationPage', $error);
    }
    // création du compte
    function userRegistration($data)
    {
        $userRegistration = new \Projet\Models\FrontModel(); 
        $mail = new \Projet\Models\FrontModel();
        $email = $data[':email'];
        $checkMail = $mail->checkMail($email);
        $result = $checkMail->rowCount();

        if (filter_var($data[':email'], FILTER_VALIDATE_EMAIL)) 
        {
            if($result > 0)
            {
                 $error = "Cette adresse e-mail existe déjà !";

                 return $this->view('userRegistrationPage', $error);
            }
            else 
            {
                $newUser = $userRegistration->userRegistration($data);  

                return $this->view('userConnexionPage');
            }
        } 
        else 
        {
            header('Location: app/Views/Front/error.php');
        }
        return $this->view('home');
    }

    // page de connexion de l'utilisateur
    function userConnexionPage()
    {
        return $this->view('userConnexionPage');
    }
    // connexion de l'utilisateur
    function userConnexion($email, $mdp)
    {
        $user = new \Projet\Models\FrontModel();
        $userConnexion = $user->verifyMail($email);
        $result = $userConnexion->fetch();
        
        if(!empty($result))
        {
            $correctPassword = password_verify($mdp, $result['mdp']);
            
            if($correctPassword)
            {
                $_SESSION['email'] = $result['email'];
                $_SESSION['mdp'] = $result['mdp'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['pseudo'] = $result['pseudo'];
        
                header('Location: index.php?action=myAccount&id=' . $_SESSION['id']);           
            }
            else
            {      
                $error = "Le mot de passe ne correspond pas";      
                return $this->view('userConnexionPage', $error);
            }
        }
        else
        {
            $error = "Email non exisant";      
                return $this->view('userConnexionPage', $error);
        }
    }
    // page d'accueil de l'utilisateur
    function myAccountPage($id)
    {
        $userComments = new \Projet\Models\FrontModel();        
        $result = $userComments->userAllComments($id);        
        $datas = $result->fetchAll();
        
        return $this->view('myAccountPage', $datas);
    }

    function deleteComment($id)
    {
        $userComments = new \Projet\Models\FrontModel();        
        $deleteComment = $userComments->deleteComment($id);        
        
        header('Location: index.php?action=myAccount');
    }


    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++ FORMULAIRE DE CONTACT ++++++++++++++++++++++++++++++++++++++++++++++++++

    function contactPost($data, $error=null)
    {
        $postMail = new \Projet\Models\ContactModel();
  
        if (filter_var($data[':mail'], FILTER_VALIDATE_EMAIL)) 
        {
            $Mail = $postMail->postMail($data);
            require 'app/Views/Front/confirmeContact.php';
        } 
        else 
        {
            header('Location: app/Views/Front/error.php');
        }
    }
}