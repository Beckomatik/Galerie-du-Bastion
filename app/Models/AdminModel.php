<?php

namespace Projet\Models;


class AdminModel extends Manager
{
    public function createAdmin($firstname, $lastname, $mdp, $email)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO admins( firstname, lastname, mdp, email )  VALUE( ?, ?, ?, ?)');
        $user->execute(array($firstname, $lastname, $mdp, $email));
    
        return $user;
    }

    public function recupMdp($mail, $mdp)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM admins WHERE email=?');
        $req->execute(array($mail));

        return $req;
    }
    public function sendArticle($title, $picture, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO blogposts (title, picture, content) VALUE(?,?,?)');
        $post->execute(array($title, $picture, $content));

        return $post;
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