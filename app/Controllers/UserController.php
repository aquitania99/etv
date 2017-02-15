<?php

namespace Acme\FsTest\Controllers;

use Acme\FsTest\Data;
use Acme\FsTest\Models;
use Acme\FsTest\Views;
use Acme\FsTest\Helpers\PasswordHandler;


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
        if(isset($_POST['email']) && isset($_POST['userId']))
        {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            if ( $_POST['password'] !== $_SESSION['password'] ) {
                $pwdEncrypted = PasswordHandler::hashPassword( $_POST['password'] );
            }
            else $pwdEncrypted = $_SESSION['password'];

            $user = new Data\User;
            $user->id = $_SESSION['userId'];
            $user->firstName = $firstName;
            $user->lastName = $lastName;
            $user->email = $email;
            $user->password = $pwdEncrypted;

            $model = new Models\User;

            $updateUser = $model->update( $user );

            if( !is_null($updateUser) ) {
                //reset session variables
                $_SESSION['firstName'] = $user->firstName;
                $_SESSION['lastName'] = $user->lastName;
                $_SESSION['email'] = $user->email;
                $_SESSION['pass']  = $user->password;
                $_SESSION['message'] = 'Profile updated, ready to Rock N\' Roll';
                $_SESSION['messageType'] = 'success';
            } else {
                $_SESSION['message'] = 'Oh dear! Something didn\'t go as planned! =(';
                $_SESSION['messageType'] = 'error';
            }
            $view = new Views\User\Welcome;
            return $view->render();
        }

        $view = new Views\User\Profile;
        return $view->render();

    }

    public function register()
    {
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $pwdEncrypted = PasswordHandler::hashPassword( $_POST['password'] );

            $user = new Data\User;
            $user->firstName = $firstName;
            $user->lastName = $lastName;
            $user->email = $email;
            $user->password = $pwdEncrypted;

            $model = new Models\User;

            $model->add($user);
        }
        else {
            $view = new Views\User\Register;
            return $view->render();
        }
    }

}