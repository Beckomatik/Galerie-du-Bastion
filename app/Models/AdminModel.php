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


    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++ PORTFOLIO ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
        // ajout des éléments du portfolio en bdd
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
        $req = $db->prepare('SELECT picture, title, category, id, alt FROM portfolios ORDER BY id DESC');
        $req->execute();
        return $req;
        }
 
        // supprimer photos de la bdd depuis le portfolio
        public function deletePicture()
        {
            $db = $this->dbConnect();
            $images = $db->prepare('DELETE FROM portfolios WHERE id=?');
            $images->execute([$_GET['id']]);
            return $images;
        }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++ BLOG +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    
        // ajout des articles du blog en bdd
        public function articleForm($data)
        {
            $db = $this->dbConnect();
            $title = $db->prepare('INSERT INTO blogposts (title, picture, content, category, alt) VALUES(:title, :picture, :content, :category, :alt)');
            $title->execute($data);     
            return $title;
        }

        // récupérer les articles de la base de donnée
        public function getBlogItems()
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT title, picture, content, category, id, alt, created_at FROM blogposts ORDER BY id DESC');
            $req->execute();      
             return $req;
        }

        // page update article
        public function getBlogItem($id)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT title, picture, content, category, id, alt, created_at FROM blogposts WHERE id=?');
            $req->execute(array($id));      
             return $req;
        }

        // modifier article de la bdd depuis le blogadmin
        public function modifyArticle($data)
        {
            $db = $this->dbConnect();

            $images = $db->prepare('UPDATE blogposts SET picture=:picture, alt=:alt, title=:title, content=:content, category=:category  WHERE id=:id ');
            $images->execute(array(':picture' => $data['picture'], ':title' => $data['title'], ':alt' => $data['alt'], ':content' => $data['content'], ':category' => $data['category'], ':id' => $data['id']));
            return $images;
        }

        // supprimer article de la bdd depuis le blogadmin
        public function deleteArticle()
        {
            $db = $this->dbConnect();
            $delArticles = $db->prepare('DELETE FROM blogposts WHERE id=?');
            $delArticles->execute([$_GET['id']]);
            return $delArticles;
        }

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++ INFO COMPTE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
   
        public function infoCompte($id)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT email, firstname, lastname FROM admins WHERE id = ?');
            $req->execute(array($id));
            return $req;
        }

   





}