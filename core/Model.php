<?php

use Illuminate\Database\Eloquent\Model as BaseModel;
use Database\Database;

class Model extends BaseModel{
    public function __construct(){
        Database::init();
    }
}