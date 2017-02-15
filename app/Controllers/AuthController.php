<?php

namespace Acme\FsTest\Controllers;

use Acme\FsTest\Data;
use Acme\FsTest\Models;
use Acme\FsTest\Views;
use Acme\FsTest\Helpers\PasswordHandler;

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
            $user->password = $_POST['password'];
            $model = new Models\User;
            $loadedDbUser = $model->login($user);

            if($loadedDbUser['id'])
            {
                $_SESSION['logged'] = hash_hmac('sha256', $loadedDbUser['id'], $this->sessionSalt);
                $_SESSION['userId'] = $loadedDbUser['id'];
                $_SESSION['firstName'] = $loadedDbUser['firstName'];
                $_SESSION['lastName'] = $loadedDbUser['lastName'];
                $_SESSION['email'] = $loadedDbUser['email'];
                $_SESSION['password'] = $loadedDbUser['password'];

                $this->redirect('welcome');
            }
            else
            {
                $_SESSION['message'] = 'email/password are incorrect';
                $_SESSION['messageType'] = 'danger';
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
        session_destroy();
        header('Location: login');
    }
}