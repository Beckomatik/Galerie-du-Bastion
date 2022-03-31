<?php

namespace Projet\Models;


class ContactModel extends Manager
{
    public function postMail($data)
    {
       
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO contacts( fullname,  mail, phone, objet, content) VALUE(:fullname, :mail, :phone, :objet, :content)');
        $req->execute($data);
        return $req;
    }

//     public function getMails()
//     {
//        $db = $this->dbConnect();
//        $req = $db->query("SELECT id, lastname, firstname,  mail, phone, objet, content  FROM contacts  ORDER BY id DESC " );
//        return $req;
//     }

//        /*================================ nombres de mail  ====================================*/

    // public function countMail()
    // {
    //     $db = $this->dbConnect();
    //     $req = $db->prepare('SELECT COUNT(id) FROM contacts WHERE id');
    //     $req->execute(array());
    //     return $req;
    // }

//       /*====================================== supprimer un mail ===========================================*/

//       public function deleteMail($id)
//       {
//           $db = $this->dbConnect();
//           $req = $db->prepare('DELETE FROM contacts WHERE id = ?');
//           $req->execute(array($id));
//           return $req;
//       }


//        /*================================ show one mail  ====================================*/

//       public function getMail($id)
//       {
//          $db = $this->dbConnect();
//          $req = $db->prepare('SELECT *  FROM contacts WHERE id = ? ' );
//          $req->execute(array($id));
//          return $req->fetch();
//       }

}