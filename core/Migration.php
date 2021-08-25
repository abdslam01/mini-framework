<?php

use Database\Database;

/**
 * Migration
 */
class Migration {    
    /**
     * db
     *
     * @var Database\Database
     */
    protected $db;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(){
        $this->db = new Database();
    }
}