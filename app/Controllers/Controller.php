<?php

namespace Projet\Controllers;

class Controller
{
    public function view($viewname, $datas = null)
    {
        include('app/Views/Front/' . $viewname . '.php');
    }
    public function viewAdmin($viewname, $datas = null)
    {
        include('app/Views/Admin/' . $viewname . '.php');
    }
}