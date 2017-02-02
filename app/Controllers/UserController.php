<?php

namespace Acme\FsTest\Controllers;

use Acme\FsTest\Views;

class UserController extends BaseController
{
    public function welcome()
    {
        if( ! $this->isLogged() )
            $this->redirect('login');

        $view = new Views\User\Welcome;
        return $view->render();
    }

    public function profile()
    {
        //TODO: implement please, this should support the update of firstName, lastName, email and password (make sure you hash it before saving it)
    }

    public function register()
    {
        //TODO: implement please, this should support the creation of a new account to which, once created, you can login as
    }
}