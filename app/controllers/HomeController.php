<?php

namespace App\controllers;

use App\Models\Post;

class HomeController extends Controller {
    public function show($params){
        echo "<br>this is the HomeController@show method<br>params<br>";
        print_r($params);
        echo "<br>";
    }

    public function index(){
        echo "HomeController@index using the HTTP method: ".$_SERVER['REQUEST_METHOD'];
        echo "<pre>";
        //  $x = Post::find(2);
        //  $x->title="new title2";
        // // $x->content="content content content content";
        // // $x->image="imagelink";
        //  $x->save();
        print_r(Post::all());
    }
}