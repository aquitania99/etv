<?php

namespace Acme\FsTest\Controllers;

use Acme\FsTest\Data;
use Acme\FsTest\Models;
use Acme\FsTest\Views;

class AuthController extends BaseController
{
    public function __construct()
    {

    }

    public function login()
    {
        if( $this->isLogged() )
            $this->redirect('welcome');

        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $user = new Data\User;
            $user->email = $_POST['email'];
            $user->password = hash_hmac('sha256', $_POST['password'], $this->passwordSalt);

            $model = new Models\User;
            $loadedDbUser = $model->login($user);

            if($loadedDbUser['id'])
            {
                $_SESSION['logged'] = hash_hmac('sha256', $loadedDbUser['id'], $this->sessionSalt);
                $_SESSION['userId'] = $loadedDbUser['id'];
                $this->redirect('welcome');
            }
            else
            {
                $_SESSION['message'] = 'email/password are incorrect';
                $_SESSION['messageType'] = 'ERROR';
            }
        }

        $view = new Views\Auth\Login;
        return $view->render();
    }

    public function notFound()
    {
        $view = new Views\Auth\NotFound;
        return $view->render();
    }

    public function logout()
    {
        //TODO: implement please
    }
}