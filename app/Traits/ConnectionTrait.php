<?php

namespace Acme\FsTest\Traits;

use Acme\FsTest\Connectors;

trait ConnectionTrait
{
    public function __construct()
    {
        Connectors\Mysql::connect();
    }
}