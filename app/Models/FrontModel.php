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
        $req = $db->prepare('SELECT id, title, picture, content, category, alt, created_at, DATE_FORMAT(created_at, "%d %M %Y") AS created_at FROM blogposts ORDER BY id DESC');
        $req->execute(array());

        return $req;
    }

    public function getArticle($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, picture, content, category, alt, created_at, DATE_FORMAT(created_at, "%d %M %Y") AS created_at FROM blogposts WHERE id = ?');
        $req->execute(array($id));
        
        return $req;
    }

    public function postComment($data)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments (content, blogpost_id, user_id) VALUE (:content, :blogpost_id, :user_id)');
        $req->execute(array(
            ':content' => $data['content'],
            ':blogpost_id' => $data['idArticle'],
            ':user_id' => $data['idUser'],
        ));
        
        return $req;
    }

    public function getComments($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, comments.content, comments.created_at  FROM comments INNER JOIN users ON comments.user_id=users.id WHERE blogpost_id=? ORDER BY created_at DESC');
        $req->execute(array($id));

        return $req;        
    }


    // DATE_FORMAT(created_at, "%d %M %Y)

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