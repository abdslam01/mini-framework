<?php

use Database\Database;

class Migration {
    protected $db;

    public function __construct(){
        $this->db = new Database();
    }
}