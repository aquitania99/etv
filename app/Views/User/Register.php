<?php

namespace Acme\FsTest\Views\User;

use Acme\FsTest\Views;

class Register extends Views\BaseView
{
    public function __construct()
    {
        $this->templateFile = 'user/register.php';
    }

    public function render()
    {
        return parent::render();
    }
}