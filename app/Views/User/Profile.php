<?php

namespace Acme\FsTest\Views\User;

use Acme\FsTest\Views;

class Profile extends Views\BaseView
{
    public function __construct()
    {
        $this->templateFile = 'user/profile.php';
    }

    public function render()
    {
        return parent::render();
    }
}