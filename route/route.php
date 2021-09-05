<?php

use Abdslam01\MiniFrameworkCore\Https\HttpRequest;
use Abdslam01\MiniFrameworkCore\Route;
use App\https\MyRequest;

use function Abdslam01\MiniFrameworkCore\Helpers\route;

Route::get("/{i}/{j}", function(HttpRequest $r, $i, $j){
    print_r($r);
    echo "direct from route with id=$i, $j";
})->name("route i,j");
Route::get("/i/j/{i}", function(HttpRequest $r){
    print_r($r);
    echo "direct from route with [NoParams]";
});
Route::get("/show/{id}/{ab}", "HomeController@show")->name("show");
Route::all("/index", "HomeController@index")->name("index");

Route::get("/test", function(MyRequest $r){
    print_r($r);
    echo route("test");
    // echo "\n".env2("author");
})->name("test");

Route::get("/home", "HomeController@home")->name("home");