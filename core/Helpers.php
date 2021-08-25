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

        if(!function_exists("env2")){
            function env2(string $key, string $default=null){
                if(isset($_ENV["ENV"])){
                    try{
                        if(isset($_ENV["ENV"][$key]))
                            return $_ENV["ENV"][$key];
                        throw new Exception("The environment variable '$key' is not set");
                    }catch(string $e){
                        return $default;
                    }
                }
                throw new Exception("\$_ENV[ENV] is not set");
            }
        }
    }
}