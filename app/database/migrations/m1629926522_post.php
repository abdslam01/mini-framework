<?php

namespace App\database\migrations;

use Illuminate\Database\Schema\Blueprint;
use Abdslam01\MiniFrameworkCore\Migration;

class m1629926522_post extends Migration{
    public function up(){
        $this->db->schema->dropIfExists('posts');
        $this->db->schema->create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down(){
        $this->db->schema->dropIfExists('posts');
    }
}
