<?php

use Illuminate\Database\Eloquent\Model as BaseModel;
use Database\Database;

/**
 * Model
 */
class Model extends BaseModel{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){
        Database::init();
    }
}