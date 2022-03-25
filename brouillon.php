<!-- CONTROLLER.PHP---------------------------------------------------- -->
Controller
{
    public function view($viewName)
    {
        include('app/views/Front'/ . $viewName . '.php');
    }
}


<!-- FRONTCONTROLLER.PHP--------------------------------------------------- -->
FrontController extends Controller
{
    public function home()
    {
        return $this->view("home");
    }
}

<!-- table blog------------------------------------------ -->
table

** posts **
id | integer 
title | varchar 
picture | varchar
content | text 
creation_date | date/time 

** comments **
id | integer 
post_id | integer 
author | varchar 
comment | text 
comment_date | date/time 
