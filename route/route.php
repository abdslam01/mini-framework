<?php

Route::get("/{i}/{j}", function($i, $j){
    echo "direct from route with id=$i, $j";
});
Route::get("/show/{id}/{ab}", "HomeController@show");
Route::all("/index", "HomeController@index");