<?php

namespace App\database\migrations;

use Migration;
use Illuminate\Database\Schema\Blueprint;

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
