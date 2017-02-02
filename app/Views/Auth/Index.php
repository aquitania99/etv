<?php

namespace Acme\FsTest\Views\Auth;

use Acme\FsTest\Views;

class Index extends Views\BaseView
{
    public function __construct()
    {
        $this->templateFile = 'auth/index.php';
    }

    public function render()
    {
        return parent::render();
    }
}