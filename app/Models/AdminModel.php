<?php

namespace Projet\Models;


class AdminModel extends Manager
{
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++ CREATION ADMIN ET CONNEXION ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
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
            $req = $db->prepare('SELECT id, firstname, lastname, mdp, email, role FROM admins WHERE email=?');
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
 
        // supprimer des photos de la bdd depuis le portfolio
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

        // modifier article de la bdd depuis le blogadmin
        public function modifyArticleWithoutPic($data)
        {
            $db = $this->dbConnect();
            $images = $db->prepare('UPDATE blogposts SET alt=:alt, title=:title, content=:content, category=:category  WHERE id=:id ');
            $images->execute(array(':title' => $data['title'], ':alt' => $data['alt'], ':content' => $data['content'], ':category' => $data['category'], ':id' => $data['id']));
           
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
    // ++++++++ INFO COMPTE et SITE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
   
        // infos perso de l'admin
        public function infoCompte($id)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT email, firstname, lastname FROM admins WHERE id = ?');
            $req->execute(array($id));
            return $req;
        }
        
        // récupérer les commentaires présents sur tout le site
        public function getComments()
        {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare(
                'SELECT comments.id AS commentId, blogposts.id AS blogpostsId, DATE_FORMAT(comments.created_at, "Le %d %M %Y à %H:%i") AS created_at, users.pseudo, comments.content, blogposts.title
                FROM comments
                INNER JOIN blogposts ON comments.blogpost_id = blogposts.id
                INNER JOIN users ON comments.user_id = users.id
                ORDER BY comments.id DESC');
            $req->execute();
            
            return $req;
        }
        
        // affichage du nombre de mails dans le dashboard
        public function countMails()
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT COUNT(id) FROM contacts');
            $req->execute();
        
            return $req;
        }

        // affichage du nombre de commentaires dans le dashboard
        public function countComments()
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT COUNT(id) FROM comments');
            $req->execute();

            return $req;
        }

        // affichage du nombre d'utilisateurs dans le dashboard
        public function countUsers()
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT COUNT(id) FROM users');
            $req->execute();

            return $req;
        }

        public function deleteComment($id)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('DELETE FROM comments WHERE id=?');
            $req->execute(array($id));

            return $req;
        }

        public function deleteUser($id)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('DELETE FROM users WHERE id = ? ');
            $req->execute(array($id));
            
            return $req;
        }
        
        // Infos sur les utilisateurs inscrits
        public function getInfosUsers()
        {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, firstname, lastname, pseudo, email, DATE_FORMAT(created_at, "Compte crée le %d %M %Y") AS created_at FROM users ORDER BY id DESC');
        $req->execute();
        
        return $req;
        }

   





}