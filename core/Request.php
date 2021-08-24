<?php

use App\https\HttpRequest;

class Request {
    private $path, $action, $params, $routeName, $httpRequest;

    public function __construct(string $path, $action){
        $this->path = trim($path, '/');
        $this->action = $action;
        $this->httpRequest = new HttpRequest();
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
        $tmpObject = new HttpRequest();

        if(is_string($this->action)){
            [$controller, $method] = explode("@", $this->action);
            $controller = "App\\controllers\\".$controller;

            $reflectionMethodParams = (new ReflectionMethod($controller, $method))->getParameters();
            count($reflectionMethodParams) > 0
                ? ($paramClass=$reflectionMethodParams[0]->getClass())
                : ($paramClass=null);

            $paramClass && (
                    ($paramClassName = $paramClass->getName())===get_class($tmpObject)
                            || $paramClass->getParentClass()->getName()===get_class($tmpObject)
                    )
                // check if the class of first argument of the class::method is HttpRequest
                // forget ? => check https://stackoverflow.com/questions/2692481/getting-functions-argument-names
                ? (new $controller)->$method($this->httpRequest = new $paramClassName,...$this->params)
                : (new $controller)->$method(...$this->params);

        }else{ // $action is function
            $reflectionFunctionParams = (new ReflectionFunction($this->action))->getParameters();
            count($reflectionFunctionParams) > 0
                ? ($paramClass=$reflectionFunctionParams[0]->getClass())
                : ($paramClass=null);

            $paramClass && (
                        ($paramClassName = $paramClass->getName())===get_class($tmpObject)
                            || $paramClass->getParentClass()->getName()===get_class($tmpObject)
                    )
                // check if the class of first argument of the function is HttpRequest
                // forget ? => check https://stackoverflow.com/questions/2692481/getting-functions-argument-names
                ? $this->action->__invoke($this->httpRequest = new $paramClassName, ...$this->params)
                : $this->action->__invoke(...$this->params);
                //or call_user_func_array($this->action, ...$this->params);
        }
    }

    public function name(string $name=null){
        if(!is_null($name))
            $this->routeName[$name] = $this->path;
        return $this->routeName;
    }

    public function getPath(){
        return $this->path;
    }
}