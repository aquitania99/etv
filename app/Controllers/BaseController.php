<?php

namespace Acme\FsTest\Controllers;

use Acme\FsTest\Views;

class BaseController
{
    protected $passwordSalt = 'PA55@word@SALT';
    protected $sessionSalt = '$3ssiON!salT';

    protected function redirect($path)
    {
        header("Location: ".$path);
        exit();
    }

    protected function isLogged()
    {
        $loggedUserId = isset($_SESSION['userId']) ? $_SESSION['userId']:NULL;

        if($loggedUserId && isset($_SESSION['logged']))
            return $_SESSION['logged'] == hash_hmac('sha256', $loggedUserId, $this->sessionSalt);

        return FALSE;
    }
}