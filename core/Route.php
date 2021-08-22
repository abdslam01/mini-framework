<?php

class Route {
    private static $requests;

    private static function main(string $path, $action, string $request_method, bool $multiple=false){
        $request = new Request($path, $action);
        
        if($multiple)
            foreach(explode(" ", "GET POST PUT PATCH DELETE OPTIONS") as $r_method)
                self::$requests[$r_method][] = $request;
        else
            self::$requests[$request_method][] = $request;

        return $request;
    }

    public static function get(string $path, $action){
        return self::main($path, $action, "GET");
    }
    
    public static function post(string $path, $action){
        return self::main($path, $action, "POST");
    }

    public static function put(string $path, $action){
        return self::main($path, $action, "PUT");
    }

    public static function patch(string $path, $action){
        return self::main($path, $action, "PATCH");
    }

    public static function delete(string $path, $action){
        return self::main($path, $action, "DELETE");
    }

    public static function options(string $path, $action){
        return self::main($path, $action, "OPTIONS");
    }
    
    public static function all(string $path, $action){
        return self::main($path, $action, "", true);
    }

    public static function run(){
        foreach(self::$requests[$_SERVER['REQUEST_METHOD']] as $request){
            if($request->match(trim($_GET['url'], '/'))){
                $request->execute();
                die();
            }
        }
        header('HTTP/1.0 404 Not Found');
    }

    public static function url(string $name, $params=[]){
        foreach(self::$requests as $requests){
            foreach($requests as $request){
                if(array_key_exists($name, $request->name())){
                    $path = $request->getPath();
                    foreach($params as $key=>$value){
                        $path = str_replace("{{$key}}", $value, $path);
                    }
                    break;
                }
            }
        }
        return BASE_URL.$path;
    }
}