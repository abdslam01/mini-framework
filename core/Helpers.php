<?php

class Helpers {
    public static function load(){
        if(!function_exists("route")){
            function route(string $name, $params=[]){
                return Route::url($name, $params);
            }
        }

        if(!function_exists("redirect")){
            function redirect(string $name, $params=[]){
                $path = Route::url($name, $params);
                header("Location: $path");
            }
        }
    }
}