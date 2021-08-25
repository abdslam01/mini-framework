<?php

namespace Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database{
    public static function init(){
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => env2('driver', 'mysql'),
            'host' => env2('host', 'localhost'),
            'database' => env2('database', 'mvc_course'),
            'username' => env2('username', 'root'),
            'password' => env2('password', ''),
            'charset' => env2('charset', 'utf8'),
            'collation' => env2('collation', 'utf8_unicode_ci'),
            'prefix' => env2('prefix', ''),
        ]);

        $capsule->bootEloquent();
    }
}