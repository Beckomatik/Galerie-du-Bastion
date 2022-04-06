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
   



}