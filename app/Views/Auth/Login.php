<?php

namespace Acme\FsTest\Views\Auth;

use Acme\FsTest\Views;

class Login extends Views\BaseView
{
    public function __construct()
    {
        $this->templateFile = 'auth/login.php';
    }

    public function render()
    {
        return parent::render();
    }
}