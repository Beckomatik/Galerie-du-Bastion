<?php

namespace Projet\Models;


class ContactModel extends Manager
// {
//     public function postMail($lastname, $firstname, $mail, $phone, $objet,  $content)
//     {
//         $bdd = $this->dbConnect();
//         $req = $bdd->prepare('INSERT INTO contacts( lastname, firstname,  mail, phone, objet, content ) VALUE(?, ?, ?, ?, ?, ?)');
//         $req->execute(array($lastname, $firstname, $mail, $phone, $objet,  $content));
//         return $req;
//     }

//     public function getMails()
//     {
//        $bdd = $this->dbConnect();
//        $req = $bdd->query("SELECT id, lastname, firstname,  mail, phone, objet, content  FROM contacts  ORDER BY id DESC " );
//        return $req;
//     }

//        /*================================ nombres de mail  ====================================*/

//     public function countMail()
//     {
//         $bdd = $this->dbConnect();
//         $req = $bdd->prepare('SELECT COUNT(id) FROM contacts WHERE id');
//         $req->execute(array());
//         return $req;
//     }

//       /*====================================== supprimer un mail ===========================================*/

//       public function deleteMail($id)
//       {
//           $bdd = $this->dbConnect();
//           $req = $bdd->prepare('DELETE FROM contacts WHERE id = ?');
//           $req->execute(array($id));
//           return $req;
//       }


//        /*================================ show one mail  ====================================*/

//       public function getMail($id)
//       {
//          $bdd = $this->dbConnect();
//          $req = $bdd->prepare('SELECT *  FROM contacts WHERE id = ? ' );
//          $req->execute(array($id));
//          return $req->fetch();
//       }

// }