<?php

namespace Projet\Models;

class FrontModel extends Manager{

    public function getPortfolioItems()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT picture, title, category, alt FROM portfolios ORDER BY id DESC');
        $req->execute(array());

        return $req;
    }

    public function getBlogItems()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT title, picture, content, category, alt, created_at FROM blogposts ORDER BY id DESC');
        $req->execute(array());

        return $req;
    }

    public function userRegistration($data)
    {
       
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users( lastname, firstname, email, pseudo, mdp, confirm_mdp) VALUE(:lastname, :firstname, :email, :pseudo, :mdp, :confirm_mdp)');
        $req->execute($data);
        return $req;
    }

    // vérification pour connexion user
    public function verifyMail($email)
    {
       
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, email, mdp FROM users WHERE email=?');
        $req->execute(array($email));
      
        return $req;
    }

}