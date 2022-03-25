<?php

namespace Projet\Models;


class AdminModel extends Manager
{
//     public function creatAdmin($firstname, $mdp, $mail)
//     {
//         $db = $this->dbConnect();
//         $user = $db->prepare('INSERT INTO administrateurs( firstname,mdp, mail )  VALUE ( ?, ?, ?)');
//         $user->execute(array($firstname, $mdp, $mail));
    
//         return $user;
//     }

//     public function recupMdp($mail, $mdp)
//     {
//         $db = $this->dbConnect();
//         $req = $db->prepare('SELECT * FROM administrateurs  WHERE mail=?');
//         $req->execute(array($mail));

//         return $req;
//     }


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