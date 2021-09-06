<?php

namespace App\controllers;

use App\Models\Post;
use App\https\MyRequest;
use Abdslam01\MiniFrameworkCore\Controller;
use Abdslam01\MiniFrameworkCore\Https\HttpRequest;

use function Abdslam01\MiniFrameworkCore\Helpers\view;

/**
 * HomeController
 */
class HomeController extends Controller {
    public function show(HttpRequest $r,$a, $b){
        print_r($r);
        echo "<br>this is the HomeController@show method<br>params<br>\n";
        echo "<br>";
    }

    public function index(MyRequest $r){
        echo "HomeController@index using the HTTP method: ".$_SERVER['REQUEST_METHOD'];
        print_r($r);
        echo "<pre>";
        //  $x = Post::find(2);
        //  $x->title="new title2";
        // // $x->content="content content content content";
        // // $x->image="imagelink";
        //  $x->save();
        print_r(Post::all());
    }

    public function home(){
        return view("welcome", ['name'=>"Abdessalam"]);
    }
}