<?php

use Abdslam01\MiniFrameworkCore\Env;
use Abdslam01\MiniFrameworkCore\Route;
use Abdslam01\MiniFrameworkCore\Helpers\Helpers;

    define('BASE_URL', 
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
        ."://$_SERVER[HTTP_HOST]"
        .(
            in_array('QUERY_STRING', array_keys($_SERVER)) && strstr($_SERVER['QUERY_STRING'], "&url=")
            ? str_replace(explode("&url=", $_SERVER['QUERY_STRING'])[1], "", $_SERVER['REQUEST_URI'])
            : "/"
        )
    );

    require_once __DIR__."/../vendor/autoload.php";

    Env::load();
    Helpers::load();
    Route::loadRoutes();
    Route::run();