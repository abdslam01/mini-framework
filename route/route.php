<?php

use App\https\MyRequest;
use App\https\HttpRequest;

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
})->name("test");