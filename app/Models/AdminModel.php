<?php

namespace Projet\Models;


class AdminModel extends Manager
{
//     public function creatAdmin($firstname, $mdp, $mail)
//     {
//         $bdd = $this->dbConnect();
//         $user = $bdd->prepare('INSERT INTO administrateurs( firstname,mdp, mail )  VALUE ( ?, ?, ?)');
//         $user->execute(array($firstname, $mdp, $mail));
    
//         return $user;
//     }

//     public function recupMdp($mail, $mdp)
//     {
//         $bdd = $this->dbConnect();
//         $req = $bdd->prepare('SELECT * FROM administrateurs  WHERE mail=?');
//         $req->execute(array($mail));

//         return $req;
//     }


//     public function compte($id)
//     {
//         $bdd = $this->dbConnect();
//         $req = $bdd->prepare('SELECT firstname, mail FROM administrateurs WHERE id = ?');
//         $req->execute(array($id));
//         return $req->fetch();
      

//         return $req;
//     }

//     public function newCompte($id, $firstname, $mail)
//     {
//         $bdd = $this->dbConnect();
//         $req = $bdd->prepare('UPDATE administrateurs SET firstname = :firstname , mail = :mail WHERE id = :id');
//         $req->execute([
//             'mail' => $mail,
//             'firstname' => $firstname,
//             'id' => $id
//         ]);
//         return $req;
//     }

}