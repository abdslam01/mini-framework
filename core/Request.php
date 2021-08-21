<?php

class Request {
    private $path, $action, $params;

    public function __construct(string $path, $action){
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function match($url){
        $path = preg_replace("#({\w+})#", "([^/]+)", $this->path);
        if(preg_match("#^$path$#", $url, $results)){
            array_shift($results);
            $this->params=$results;
            return true;
        }
        return false;
    }

    public function execute(){
        if(is_string($this->action)){
            [$controller, $method] = explode("@", $this->action);
            $controller = "App\\controllers\\".$controller;
            (new $controller)->$method($this->params);
        }else // $action is function
            //call_user_func_array($this->action, ...$this->params);
            $this->action->__invoke(...$this->params);
    }
}