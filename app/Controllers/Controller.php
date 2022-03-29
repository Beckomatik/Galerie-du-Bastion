<?php

namespace Projet\Controllers;

class Controller
{
    public function view($viewname, $error = null)
    {
        include('app/Views/Front/' . $viewname . '.php');
    }
    public function viewAdmin($viewname, $error = null)
    {
        include('app/Views/Admin/' . $viewname . '.php');
    }
}