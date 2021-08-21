<?php

class Route {
    private static $requests;

    public static function get(string $path, $action){
        $request = new Request($path, $action);
        self::$requests['GET'][] = $request;
        return $request;
    }
    
    public static function post(string $path, $action){
        $request = new Request($path, $action);
        self::$requests['POST'][] = $request;
        return $request;
    }

    public static function put(string $path, $action){
        $request = new Request($path, $action);
        self::$requests['PUT'][] = $request;
        return $request;
    }
    
    public static function all(string $path, $action){
        self::get($path, $action);
        self::post($path, $action);
        self::put($path, $action);
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
}