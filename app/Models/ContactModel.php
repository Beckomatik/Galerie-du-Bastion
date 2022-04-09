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

    public function getMails()
    {
       $db = $this->dbConnect();
       $req = $db->prepare('SELECT id, fullname, mail, phone, objet, content, created_at FROM contacts ORDER BY id DESC');
       $req->execute();
       
       return $req;
    }

    public function getMail($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, fullname, mail, phone, objet, content, created_at  FROM contacts WHERE id = ? ');
        $req->execute(array($id));
        
        return $req;
    }

    public function deleteMail($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM contacts WHERE id = ? ');
        $req->execute(array($id));
        
        return $req;
    }


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


}