<?php

    define('BASE_URL', 
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
        ."://$_SERVER[HTTP_HOST]"
        .str_replace(
            explode("=",$_SERVER['REDIRECT_QUERY_STRING'])[1], "", $_SERVER['REQUEST_URI']
        )
    );

    require_once "../vendor/autoload.php";

    Env::load();
    Helpers::load();
    Route::loadRoutes();
    Route::run();