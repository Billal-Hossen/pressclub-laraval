<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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

            $table->bigInteger('tag_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->string('title');
            $table->string('description');
            $table->bigInteger('total_view')->nullable()->default(0);
            $table->bigInteger('total_comment')->nullable()->default(0);
            $table->string('image');
            $table->enum('is_featured', [0,1]);
            $table->enum('status', [0,1]);

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
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
