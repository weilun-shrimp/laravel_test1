<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CeatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id');
            $table->date('created_date');
            $table->time('created_time', 0);
            $table->string('title', 255);
            $table->text('excerpt');
            $table->longText('content');
            $table->string('ststus', 120);
            $table->string('comment_ststus', 120);
            $table->unsignedBigInteger('comment_count');
            $table->date('modified_date');
            $table->time('modified_time', 0);
            $table->unsignedBigInteger('parent');
            $table->string('type', 120);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
