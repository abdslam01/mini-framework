<?php

function route(string $name, $params=[]){
    return Route::url($name, $params);
}

function redirect(string $name, $params=[]){
    $path = Route::url($name, $params);
    header("Location: $path");
}