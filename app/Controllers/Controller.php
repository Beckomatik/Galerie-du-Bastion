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
        // include('app/Views/Admin/' . $viewname . '.php');

        if(!empty($_SESSION) && $_SESSION['role'] > 0)
        {
            include('app/Views/Admin/' . $viewname . '.php');
        }
        else
            {
                // header('Location: indexAdmin.php?action=error');
                echo 'accès non autorisé';
            }
        }
    public function viewNoAdmin($viewname, $datas = null)
    {
        include('app/Views/Admin/' . $viewname . '.php');
    }
    // public function errorPage()
    // {
    //     include('app/Views/Admin/page404.php');
    // }
   


    }
