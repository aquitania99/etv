<?php

namespace Acme\FsTest\Views\User;

use Acme\FsTest\Views;

class Welcome extends Views\BaseView
{
    public function __construct()
    {
        $this->templateFile = 'user/welcome.php';
    }

    public function render()
    {
        return parent::render();
    }
}