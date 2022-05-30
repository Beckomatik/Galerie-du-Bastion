<?php
namespace Projet\Models;

class Manager
{
    protected function dbConnect()
    {
        try 
        {
            $db = new \PDO('mysql:host=mysql-lecodedubastion.alwaysdata.net;dbname=lecodedubastion_galeriedubastion;charset=utf8', '250412', 'Onizuka9marin_AD');
            $db->query("SET lc_time_names = 'fr_FR'");

            return $db;
        } 
        catch (\Exception $e) 
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
}