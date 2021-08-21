<?php

namespace App\controllers;

class HomeController extends Controller {
    public function show($params){
        echo "<br>this is the HomeController@show method<br>params<br>";
        print_r($params);
        echo "<br>";
    }

    public function index(){
        echo "HomeController@index using the HTTP method: ".$_SERVER['REQUEST_METHOD'];
    }
}