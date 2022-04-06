<?php

namespace Projet\Models;


class AdminModel extends Manager
{
    public function createAdmin($firstname, $lastname, $mdp, $email)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO admins( firstname, lastname, mdp, email )  VALUES( ?,?,?,?)');
        $user->execute(array($firstname, $lastname, $mdp, $email));
    
        return $user;
    }

    public function recupMdp($email)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM admins WHERE email=?');
        $req->execute(array($email));

        return $req;
    }
    public function sendArticle($title, $picture, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO blogposts (title, picture, content) VALUES(?,?,?)');
        $post->execute(array($title, $picture, $content));

        return $post;
    }
    // envoyé des images en bases de données
    public function sendImages($name)
    {
        $db = $this->dbConnect();
        $images = $db->prepare('INSERT INTO portfolios (picture) VALUES(?)');
        $images->execute(array($name));
        echo 'image enregistrée';
        return $images;
    }
    // depuis le portfolio
    // public function sendPicFolio($name)
    // {
       
    //     $db = $this->dbConnect();
    //     $images = $db->prepare('INSERT INTO images (picture) VALUES(?)');
    //     $images->execute(array($name));
    //     echo 'image enregistrée';
    //     return $images;
    // }

    public function portfolioForm($data)
    {
        $db = $this->dbConnect();
        $title = $db->prepare('INSERT INTO portfolios (picture, title, category, alt) VALUES(:picture, :title, :category, :alt)');
        $title->execute($data);
        
        
        return $title;
    }
   

    // récupérer les images de la base de donnée
    public function getPortfolioItems()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT picture, title, category, alt FROM portfolios ORDER BY id DESC');
        $req->execute();

        return $req;

    }



    public function infoCompte($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT email, firstname, lastname FROM admins WHERE id = ?');
        $req->execute(array($id));

        return $req;
    }


//     public function compte($id)
//     {
//         $db = $this->dbConnect();
//         $req = $db->prepare('SELECT firstname, mail FROM administrateurs WHERE id = ?');
//         $req->execute(array($id));
//         return $req->fetch();
      

//         return $req;
//     }

//     public function newCompte($id, $firstname, $mail)
//     {
//         $db = $this->dbConnect();
//         $req = $db->prepare('UPDATE administrateurs SET firstname = :firstname , mail = :mail WHERE id = :id');
//         $req->execute([
//             'mail' => $mail,
//             'firstname' => $firstname,
//             'id' => $id
//         ]);
//         return $req;
//     }

}