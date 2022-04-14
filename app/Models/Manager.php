<?php
namespace Projet\Models;
$username = 'root';
$password = '';


class Manager
{
    protected function dbConnect()
    {

        try {
            $db = new \PDO('mysql:host=localhost;dbname=galeriedubastion;charset=utf8', 'root', '');
            $db->query("SET lc_time_names = 'fr_FR'");
            return $db;
        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}