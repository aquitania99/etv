<?php

namespace Acme\FsTest\Connectors;

use Acme\FsTest\Config;
use Illuminate\Database\Capsule\Manager as DB;

class Mysql
{
    public static $connection;

    public static function connect()
    {
        if ( ! self::$connection )
        {
            self::$connection = new DB;
            self::$connection->addConnection([
                'driver'    => 'mysql',
                'host'      => Config::DB_HOST,
                'database'  => Config::DB_NAME,
                'username'  => Config::DB_USER,
                'password'  => Config::DB_PASSWORD,
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]);

            self::$connection->setAsGlobal();
        }

        return self::$connection;
    }
}