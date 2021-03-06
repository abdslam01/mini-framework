<?php

namespace App\database\migrations;

use Illuminate\Database\Schema\Blueprint;
use Abdslam01\MiniFrameworkCore\Migration;

class m1629926540_comment extends Migration{
    public function up(){
        $this->db->schema->dropIfExists('comments');
        $this->db->schema->create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("post_id")->references("id")->on("posts");
            $table->text("content");
            $table->string("username");
            $table->timestamps();
        });
    }

    public function down(){
        $this->db->schema->dropIfExists('comments');
    }
}
